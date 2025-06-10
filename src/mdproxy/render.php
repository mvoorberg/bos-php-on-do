<?php
	require './markdown/block/CodeTrait.php';
	require './markdown/block/FencedCodeTrait.php';
	require './markdown/block/HeadlineTrait.php';
	require './markdown/block/HtmlTrait.php';
	require './markdown/block/ListTrait.php';
	require './markdown/block/QuoteTrait.php';
	require './markdown/block/RuleTrait.php';
    require './markdown/block/TableTrait.php';

	require './markdown/inline/CodeTrait.php';
	require './markdown/inline/EmphStrongTrait.php';
	require './markdown/inline/LinkTrait.php';
	require './markdown/inline/StrikeoutTrait.php';
	require './markdown/inline/UrlLinkTrait.php';

	require './markdown/Parser.php';
	require './markdown/Markdown.php';
	require './markdown/GithubMarkdown.php';

    use cebe\markdown\GithubMarkdown;

    // **************************************
    //  Set HEADERS before any content goes.
    // **************************************
    $seconds_to_cache = 3600;
    $ts = gmdate("D, d M Y H:i:s", time() + $seconds_to_cache) . " GMT";
    header("Expires: $ts");
    header("Pragma: cache");
    header("Cache-Control: max-age=$seconds_to_cache");

    header("Access-Control-Allow-Origin: *");
    
    // **************************************
    //  Check and apply $_GET parameters.
    // **************************************
    // $cors = "*";
    // if (isset($_GET['cors'])) {
    //     $cors = $_GET["cors"];
    // }    
    // header("Access-Control-Allow-Origin: " . $cors);
    
    if (isset($_GET['url'])) {        
        $url = $_GET["url"];
    }
    if (empty($url)) {
        echo "url is required";
        return;
    } 

    // Future, check the referrer - maybe.
    // $ref = $_SERVER['HTTP_REFERER'];
    // if (strpos($ref, 'transomjs.github.io') !== FALSE) {
    //    // allow render
    // }

    // **************************************
    //  Fetch content with Curl.
    // **************************************
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    
    $markdown = curl_exec($ch);
    curl_close($ch);
        
    // **************************************
    //  Render HTML with github markdown
    // **************************************
    $parser = new GithubMarkdown();
    echo $parser->parse($markdown);
