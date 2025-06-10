
<?php
if( count($articles) < 1 ){
	echo "<h3>No articles found!</h3>";
} else {

	$pageSize = 6;			// Number of articles per page.
	$maxNeighbourLinks = 4; // links before and after the current page.

	// Blog pagination variables
	$articleNum = 0; 		// Article numbers start at *0*.
	$thisPage = ""; 		// Navigation placeholder for the current page.
	$metaPrev = null;		// Used to define rel=prev page metadata.
	$metaCurrent = null;	// Used to define rel=canonical query parameter.
	$articlePageNum = 0;	// Page number for the current article, within the loop.
	$prevPages = array(); 	// Navigation links for the previous neighbouring pages.
	$nextPages = array(); 	// Navigation links for the next neighbouring pages.

	// Page numbers start at *1*.
	$currentPage = (int)isset($_GET['page']) ? $_GET['page'] : 1; // default page #1
	if ($currentPage < 1) {
		$currentPage = 1;
	}
	$lastPage = ceil(count($articles)/$pageSize);
	if ($currentPage > $lastPage) {
		// If user asks for a page larger than we have, use the LAST available page.
		$currentPage > $lastPage; 
	}
	$lastArticle = $currentPage * $pageSize; // last article on this page
	$firstArticle = $lastArticle - $pageSize; // first article on this page

  foreach($articles as $article) {

	$articlePageNum = ceil(($articleNum + 1) / $pageSize);
	// Useful debugging info, don't delete it.
	// echo "articleNum {$articleNum} is on page {$articlePageNum} <br> ";

	if ($articleNum < $firstArticle) {
		$prevPages[$articlePageNum] = "<li><a href=\"?page={$articlePageNum}\" alt=\"Page {$articlePageNum}\">{$articlePageNum}</a></li>";
		$metaPrev = "?page=" . $articlePageNum;

		// Don't include too many Previous page options
		if (count($prevPages) > $maxNeighbourLinks) {
			$key = key($prevPages);
			unset($prevPages[$key]);  // discard the first entry.
		}
	}

	if (count($nextPages) < $maxNeighbourLinks && $articleNum >= $lastArticle ) {
		$nextPages[$articlePageNum] = "<li><a href=\"?page={$articlePageNum}\" alt=\"Page {$articlePageNum}\">{$articlePageNum}</a></li>";
		if (!defined("BINARYOPS_META_NEXT")) {
			define("BINARYOPS_META_NEXT", "?page={$articlePageNum}");
		}
	} else {
		if (count($nextPages) >= $maxNeighbourLinks) {
			// We can stop looping articles now.
			break;
		}		
	}

	if ($articleNum >= $firstArticle && $articleNum < $lastArticle ) {
		// if (!defined("BINARYOPS_META_CURRENT") && $articlePageNum > 1) {
		// 	define("BINARYOPS_META_CURRENT", "?page={$articlePageNum}");
		// }
		$metaCurrent = "?page={$articlePageNum}";
		$thisPage = "<li class=\"active\"><span>{$currentPage}</span></li>";
?>
		<!-- Item Post -->
		<article class="post">
			<div class="row">
				<!-- Image and meta post -->
				<div class="col-md-5">
					<!-- Image Post -->
					<?php
					if ($article->getMeta('image')) {
						echo '<div class="post-image"><a href="' . $article->getPath() . '"><img src="/blog/articles/' . $article->getMeta('image') . '" alt="' . $article->getTitle() .'"></a></div>';
					}
					?>
					<!-- End Image Post -->
				</div>
				<!-- End Image and meta post -->

				<!-- Info post -->
				<div class="col-md-7">
					<h2 class="title"><a href="<?php echo $article->getPath(); ?>"><?php echo $article->getTitle(); ?></a></h2>
					<!-- Post Meta -->
					<div class="row">
						<div class="col-md-12">
							<div class="post-meta">
								<span><i class="fa fa-calendar">&nbsp;</i> <?php echo $article->getUpdatedDate($global['date.format']); ?></span>
								<span><i class="fa fa-user">&nbsp;</i>By <?php echo ($author = $article->getAuthor()) ? $author : $global['author.name']; ?></span>
								<?php
								$cats = $article->getCategories();
								if ($cats) {
									foreach ($cats as $slug => $category) {
										echo '<span><i class="fa fa-check">&nbsp;</i><a href="/blog/category/'.$slug.'">'. $category .'</a></span>';
									}
								}
								?>
							</div>
						</div>
					</div>
					<!-- End Post Meta -->
					 <p><?php echo $article->getSummary(250); ?>[...]</p>
					 <a href="<?php echo $article->getPath(); ?>" class="btn btn-primary">Read more...</a>
				</div>
				<!--End Info post -->
			</div>
		</article>
		<!-- End Item Post -->
<?php
	} // include article on this page

	$articleNum++;
	// print_r($article);
  } // end of article loop!

// Wait until we've looped to the end before setting meta-prev & meta-current.
if (isset($metaPrev)) {
	define("BINARYOPS_META_PREV", $metaPrev);
}
if (isset($metaCurrent)) {
	define("BINARYOPS_META_CURRENT", $metaCurrent);
}

?>
		<!-- Pagination -->
		<ul class="pagination">
			<?php 
			// Page one links use JavaScript to remove the query parameter.
			$needle = "href=\"?page=1\"";
			$replacement = "href=\"?page=1\" onclick=\"window.location.href=window.location.href.split('?')[0]; return false;\"";
			$firstPage = "<li><a href=\"?page=1\" alt=\"First Page\"><span class=\"noshow-icon\">First</span><i class=\"fa fa-angle-double-left\"></i></a></li>";
			echo str_replace($needle, $replacement, $firstPage);
			echo str_replace($needle, $replacement, implode(" ", $prevPages));
			echo $thisPage;
			echo implode(" ", $nextPages);
			echo "<li><a href=\"?page={$lastPage}\" alt=\"Last Page\"><span class=\"noshow-icon\">Last</span><i class=\"fa fa-angle-double-right\"></i></a></li>";
			?>
		</ul>
		<!-- End Pagination -->
<?php
}
?>
