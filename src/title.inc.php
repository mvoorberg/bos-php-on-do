<?php if(!defined("BINARYOPS_INCLUDE")) { die("Direct access forbidden."); } ?>

<?php

class TitleSection {

   var $title;
   var $banner;
   var $iconHtml;
   var $content;
   var $breadcrumb;

   function __construct($title, $banner, $icons = 'fa-code', $content = '', $breadcrumb = '') {
		$this->title = $title;  // the large black text
		$this->banner = $banner; // the red banner
		$this->content = $content;

		if ($breadcrumb) {
			$this->breadcrumb = $breadcrumb; // Like: <a href="/index.php">Home</a>
		} else {
			$this->breadcrumb = $this->title;
		}

        // Make everything an array of icon names
        if (!is_array($icons)) {
            $icons = array($icons);
        }
        // Create a list of HTML icons
        $this->iconHtml = "";
        foreach ($icons as $icon) {
            $this->iconHtml .= bosIcon($icon);
        }

   }

   function render() {
    $pre = <<<EOT
<section class="title-section">
    <div class="container">
        <div class="row crumbs">
            <div class="col-md-12"><a href="/">Home</a> / {$this->breadcrumb}</div>
        </div>
        <div class="row title"><div class="col-md-12">
            <span class="large-title">{$this->title}</span> 
            <h1><span class="subtitle-section">{$this->banner}</span></h1>
        </div></div>
EOT;

            //    <!-- Search-->
            //    <div class="col-md-3">
            //        <form id="searchForm" class="search" action="#" method="Post">
            //            <div class="input-group">
            //                <input class="form-control" placeholder="Search..." id="s" type="text" required="required">
            //                <span class="input-group-btn">
            //                    <button class="btn btn-primary" type="submit" name="subscribe" >Go!</button>
            //                </span>
            //            </div>
            //        </form>
            //    </div>
            //    <!-- End Search-->

		if ($this->content) {
            // <!-- info-title-section - optional -->
			$mid = <<<EOT
<div class="row info-title-section">
    <div class="col-sm-3 incon-title">{$this->iconHtml}</div>
    <div class="col-sm-9"><p>{$this->content}</p></div>
</div>
EOT;
		} else {
			$mid = "<!-- info-title-section - excluded --> ";
		}

        // <!-- End Title Section -->
		$post = "</div></section>";

//        <!-- search-results-section -->
//        <section class="search_results">
//            <div id="searchResultsContainer" style="display:none;padding: 30px 0 30px 0;">
//				<div class="container">
//					<div class="row info-title-section" style="border: solid 1px #dedede;">
//						<!-- Title -->
//						<div class="row title">
//							<div class="col-md-12" >
//								<h1 style="float:right;">Search Results</h1>
//							</div>
//						</div>
//						<!-- End Title-->
//
//						<div class="col-md-2 incon-title">
//						   <i class="fa fa-search"></i>
//						</div>
//						<div class="col-md-10">
//							<div style="float:right">
//							   <a id="searchClose" href="#"><i class="fa fa-close" style="font-size:1em;"></i></a>
//							</div>
//						   <div id="resultsDiv"><!-- Search results go here. --></div>
//						</div>
//					</div>
//				</div>
//            </div>
//        </section>
//        <!-- End search-results-section -->


		// join them all & print.
		echo $pre . $mid . $post;
   }

} // end of class TitleSection
