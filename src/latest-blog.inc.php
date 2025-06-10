<?php if(!defined("BINARYOPS_INCLUDE")) { die("Direct access forbidden."); } ?>

<?php

class LatestBlogSection {

   var $filename;

   function __construct($cacheFile = false) {
		if ($cacheFile) {
			$this->filename = $cacheFile;  //
		} else {
			$this->filename = "./blog/cache/latest-posts.html";
		}
   }

   function render() {
		if (file_exists($this->filename)) {
			$cache = file_get_contents($this->filename);
			// <div class="container wow bounceIn" data-wow-offset="10" data-wow-duration="1.5s" data-wow-delay="0.5s">
			$section = <<<EOT
			<!-- post-blog-section -->
			<section class="content_info">
				<div class="paddings post-testimonials">
					<div class="container">
						<div class="row">
							<div id="blog-posts" class="col-md-12">
								{$cache}
						 	</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End post-blog-section -->
EOT;
		} else {
			$section = "<!-- WARNING: {$this->filename} does not exist -->\n";
		}

		// print it.
		echo $section;
	}

} // end of class LatestBlogSection
