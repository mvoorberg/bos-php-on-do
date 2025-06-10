<?php if(!defined("BINARYOPS_INCLUDE")) { die("Direct access forbidden."); } ?>

<?php

class BoxServiceSection {

	var $title;
	var $tagline;
	var $mainParagraph;
	var $bullets;
	var $icons;
	var $images;
	var $leftParagraph;
	var $leftTitle;
	var $rightParagraph;
	var $rightTitle;

	function __construct($title = "Default Title",
								$tagline = "Your tagline goes here",
								$mainParagraph = "Lorem ipsum dolor sit amet...",
								$bullets = array("One", "Two", "Three", "Four", "Five"),
								$icons = array("fa fa-bell", "devicons devicons-nodejs_small", "fa fa-anchor", "fa fa-book"),
								$images = array("/img/works/angularjs.jpg", "/img/works/mongodb.jpg", "/img/works/nodejs.jpg")) {
									$this->title = $title;
									$this->tagline = $tagline;
									$this->mainParagraph = $mainParagraph;
									$this->bullets = $bullets;
									$this->icons = $icons;
									$this->images = $images;
								}

	function render() {

		// BULLET POINTS *****************************************************
		$bulletColumnA = "";
		$bulletColumnB = "";
		if (count($this->bullets) > 0) {
			foreach ($this->bullets as $pos => $bullet) {
				if ($pos % 2) {
					$bulletColumnB .= "<li><i class=\"fa fa-check\"></i>{$bullet}</li>";
				} else {
					$bulletColumnA .= "<li><i class=\"fa fa-check\"></i>{$bullet}</li>";
				}
			}
		}

		// SLIDESHOW IMAGES *****************************************************

		$imageHtml = "<h4>No Image</h4>";

		if (count($this->images) == 1) {
			$image = $this->images[0];
			$baseImage = basename($image, '.jpg');
			$imageHtml = "<img src=\"{$image}\" style=\"width:100%;\" alt=\"{$baseImage}\">";

		} else if (count($this->images) > 0) {
			$carouselIndicators = "";
			$carouselItems = "";
			$dataTarget = strtolower($this->title);	// Make a usable id from the Title.
			$dataTarget = preg_replace('/[^A-Za-z0-9-]+/', '-', $dataTarget);
			foreach ($this->images as $pos => $image) {
				$indicatorClass = "";
				$imageClass = "item";
				if ($pos == 0) {
					$indicatorClass .= "active";
					$imageClass .= " active"; // Note: the leading space!!
				}
				$carouselIndicators .= "<li data-target=\"#carousel-{$dataTarget}\" data-slide-to=\"{$pos}\" class=\"{$indicatorClass}\"></li>\n";

				$baseImage = basename($image, '.jpg');
				$carouselItems .= "<div class=\"{$imageClass}\"><img src=\"{$image}\" alt=\"{$baseImage}\"></div>\n";
			}
			$imageHtml = <<<CAROUSEL
			<!-- Simple-slide -->
			<div id="carousel-{$dataTarget}" class="carousel slide bs-docs-carousel-example">
				<ol class="carousel-indicators">
					{$carouselIndicators}
				</ol>
				<div class="carousel-inner">
					{$carouselItems}
				</div>
				<a class="left carousel-control" aria-label="Previous" href="#carousel-{$dataTarget}" data-slide="prev">
					<span class="icon-prev"></span>
					<span class="noshow-icon">Previous</span>
				</a>
				<a class="right carousel-control" aria-label="Next" href="#carousel-{$dataTarget}" data-slide="next">
					<span class="icon-next"></span>
					<span class="noshow-icon">Next</span>
				</a>
			</div>
			<!-- End Simple-slide -->
CAROUSEL;
		}

		// BULLET POINTS *****************************************************
		$iconSet = "";
		if (count($this->icons) > 0) {
			$iconSet .= "<div class=\"technologies\">";
			foreach ($this->icons as $pos => $icon) {
				$iconSet .= "<i class=\"fa {$icon}\"></i>\n";
			}
			$iconSet .= "</div>";
		}


       $section = <<<EOT
	<!-- Services Carousel -->
	<section class="paddings">
	<div class="container">
		<div class="row position-relative">
			<i class="fa fa-cogs icon-section top right"></i>
			<div class="col-md-7">
				{$imageHtml}
			</div>
			<div class="col-md-5">
				<h2 class="title-subtitle">
					{$this->title}
					<span>{$this->tagline}</span>
				</h2>
				<p>{$this->mainParagraph}</p>
				<div class="row">
					<ul class="col-sm-6 list">
						{$bulletColumnA}
					</ul>
					<ul class="col-sm-6 list">
						{$bulletColumnB}
					</ul>
					</div>
				{$iconSet}
			</div>
		</div>
	</div>
	<!-- End Container-->
	</section>
	<!-- End Services Carousel-->
EOT;

		// join them all & print.
		echo $section;
	}

} // end of class BoxServiceSection
