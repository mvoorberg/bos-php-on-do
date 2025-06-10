<?php
	/**************************************************************************
	 ** This file is fetched using: http://localhost:8088/blog/feed/latest   **
	 **************************************************************************/

	// DEBUG INFO *****************************************
	echo "<p>Today is " . date("Y-m-d H:i:s") . "</p>\n";
	echo "<a href=\"/blog/feed/latest\">This file should run from /blog/feed/latest !</a>\n";
	echo "<p>Running in " . getcwd() . "</p>\n"; 

	$filename = getcwd() . "/./cache/";
	if (file_exists($filename)) {
	    echo "The folder $filename exists.\n";
	} else {
	    echo "The folder $filename does not exist!\n";
	}

	// ****************************************************
	$latest = array();
	$categories = array();
	$tags = array();

	if($articles) {
		reset($articles);

		$singleArticle = array();

		foreach($articles as $article) {
			$singleArticle['title'] = $article->getTitle();
			// For our purposes, assume one Category per Article.
			//$singleArticle['category'] = array_values($article->getCategories())[0];

			$singleArticle['categories'] = array_values($article->getCategories());
			$singleArticle['tags'] = array_values($article->getTags());

			// For some reason the Urls have a double slash after the domain name - strip it out.
			$singleArticle['link'] = str_replace('//blog/', '/blog/', $article->getUrl());
			$singleArticle['preview'] = substr(strip_tags($article->getContent()), 0, 150) . "...";
			$singleArticle['date'] = date(DATE_RSS, strtotime($article->getDate()));
			$singleArticle['month'] = date('M', strtotime($article->getDate()));
			$singleArticle['day'] = date('j', strtotime($article->getDate()));

/*
				<!-- Removes these dates from the latest layout -->
				<div class="col-md-3">
					<div class="date"><span><i class="fa fa-calendar-o"></i>{$singleArticle['month']}</span>{$singleArticle['day']}</div>
				</div>
*/
			$single = <<<POST
				<!-- Item Post -->
				<li class="row row-eq-height">
					<div class="col-sm-11">
						<div class="info info-latest">
							<h4><a href="{$singleArticle['link']}" title="Read More">{$singleArticle['title']}</a></h4>
							<p>{$singleArticle['preview']}</p>
						</div>
					</div>
					<div class="col-sm-1">
						<div class="link">
							<a href="{$singleArticle['link']}" title="Read More">
								<span>{$singleArticle['title']}</span>
							<i class="fa fa-chevron-right"></i></a>
						</div>
					</div>
				</li>
				<!-- End Item Post -->
POST;

			// Build an array of Articles from all Categories...
			if (count($latest) < 3) {
				array_push($latest, $single);
			}

			// Build an Array of Arrays.
			// Articles for each Category, where the category name is the Key.
			foreach($singleArticle['categories'] as $category) {
				$key = "cat~{$category}";
				if (!array_key_exists($key, $categories)) {
					$categories[$key] = Array();
				}
				if (count($categories[$key]) < 4) {
					array_push($categories[$key], $single);
				}
			}

			// Build an Array of Arrays by Tag.
			// Articles for each Tag, where the tag name is the Key.
			foreach($singleArticle['tags'] as $tag) {
				$key = "tag~{$tag->name}";
				if (!array_key_exists($key, $categories)) {
					$categories[$key] = Array();
				}
				if (count($categories[$key]) < 4) {
					array_push($categories[$key], $single);
				}
			}
		}
	}


	// LATEST ARTICLES *****************************************
	// Add Header & Footer!
	array_unshift($latest, "<h3>Latest Blog Posts</h3>\n <!-- Box -->\n <ul class=\"box\">");
	array_push($latest, '</ul>');

	// Write it to the cache folder for include on the home page!
	$latestHtml = implode("\n", $latest);
	$updated = file_put_contents('./cache/latest-posts.html', $latestHtml);

	if ($updated) {
		echo "<h1>Cache updated</h1>";
		echo $latestHtml;
	} else {
		echo "<h1>Cache update failed!</h1>";
	}

	// TAGS and CATEGORIES *****************************************
	foreach($categories as $keyName => $cat) {

		$type = substr($keyName, 0, 3); // tag or cat
		$name = substr($keyName, 4);

		// Make a usable filename from the Category name.
		$slug = strtolower($keyName);
		$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $slug);

		// Add Header & Footer!
		if ($type == 'tag') {
			array_unshift($cat, "<h3>Latest Posts tagged {$name}</h3>\n <!-- Box -->\n <ul class=\"box\">");
		} else {
			array_unshift($cat, "<h3>Latest in {$name}</h3>\n <!-- Box -->\n <ul class=\"box\">");
		}
		array_push($cat, '</ul>');

		// Write it to the cache folder for include in whichever page(s)!
		$catHtml = implode("\n", $cat);
		$updated = file_put_contents("./cache/latest-{$slug}-posts.html", $catHtml);

		if ($updated) {
			echo "<h1>Cache updated for {$type}:{$slug}</h1>";
			echo $catHtml;
		} else {
			echo "<h1>Cache update failed for {$type}:{$slug}!</h1>";
		}
	}
