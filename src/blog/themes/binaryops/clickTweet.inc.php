<?php
	if(!defined("BINARYOPS_INCLUDE")) { die("Direct access forbidden."); }
?>

<?php
/**
 * Shorten text length to x characters.
 */
function shortenTweet($input, $length, $ellipses = true, $strip_html = true) {
	if ($strip_html) {
		$input = strip_tags($input);
	}
	if (strlen($input) > $length) {
		$last_space = strrpos(substr($input, 0, $length), ' ');
		$input = substr($input, 0, $last_space);
		if ($ellipses) {
			$input .= '...';
		}
	}
	return $input;
}

function click2Tweet($article) {
// Sample tweet...
// [tweet hashtag="nodejs nginx"]Six reasons to front your Node.js app with Nginx[/tweet]

	$revisedArticle = preg_replace_callback('/\[tweet\s*(hashtag="(.*)")*](.*)\[\/tweet]/i', function($matches) use (&$article) {

			$handle = "BinaryOpsCa";
			// print_r($matches);
			$page = str_replace('//blog/', '/blog/', $article->getUrl());
			$urlPage = "&url={$page}";
			$urlHandle = "&via={$handle}&related={$handle}";
			$hashtag = str_replace(array(';', ' '), ',', trim("{$matches[2]}")); // trim, then remove spaces & semi-colons
			$urlHashtag = "";
			$hashtagDisplay = "";
			if ($hashtag) {
				$urlHashtag = "&hashtags={$hashtag}";
				$hashtagArray = explode(',', $hashtag); // split to array on spaces!
				$hashtagDisplay = ' #' . implode(' #', $hashtagArray); // join with hash & space!
			}
			$text = $matches[3];
			$tweetTrimSize = 140 - strlen("{$hashtagDisplay} via @{$handle}"); // {$page}
			$shortDisplay = shortenTweet($text, $tweetTrimSize);
			$shortEncoded = urlencode($shortDisplay);

			$template = <<<TWITTER
				<div class="clearfix"></div>
				<div class='click-to-tweet'>
					<div class='ctt-text'>
						<a href='https://twitter.com/share?text={$shortEncoded}{$urlHandle}{$urlHashtag}{$urlPage}' target='_blank'>{$shortDisplay}{$hashtagDisplay}</a>
					</div>
					<div class='ctt-button'>
						<a href='https://twitter.com/share?text={$shortEncoded}{$urlHandle}{$urlHashtag}{$urlPage}' target='_blank' class='btn btn-primary'>Click To Tweet</a>
					</div>
					<i class="fa fa-twitter"></i>
				</div>
TWITTER;
			return $template;
		}, $article->getContent());
	return $revisedArticle;
}
?>
