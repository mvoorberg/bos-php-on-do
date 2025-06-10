<?php  
	header("Content-Type:application/json");
	
	$dataArr = array();
	$articleList = array();
	
	if($articles) {
		reset($articles);
		
		$singleArticle = array();
		
		foreach($articles as $article) {
			$singleArticle['title'] = $article->getTitle();
			// For some reason the Urls have a double slash after the domain name - strip it out.
			$singleArticle['link'] = str_replace('//blog/', '/blog/', $article->getUrl());
			$singleArticle['preview'] = substr(strip_tags($article->getContent()), 0, 150) . "...";
			$singleArticle['date'] = date(DATE_RSS, strtotime($article->getDate()));
			$singleArticle['month'] = date('M', strtotime($article->getDate()));
			$singleArticle['day'] = date('j', strtotime($article->getDate()));
			
			$articleList[] = $singleArticle;
			
			if (count($articleList) > 4) {
				break;
			}
		}
		
	}

	$dataArr['data'] = $articleList;	

    // output json
	$jsonArticles = json_encode($dataArr, JSON_PRETTY_PRINT);
	echo $jsonArticles;	
