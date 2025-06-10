<?php if(!defined("BINARYOPS_INCLUDE")) { die("Direct access forbidden."); } ?>

<?php

class BoxActionSection {

   var $title;

   function __construct($title) {
		if ($title) {
			$this->title = $title;  // the large White text
		} else {
			$this->title = "Find out how we can help with your project!";
		}
   }

   function render() {
	   $contactUrl = bosPageLink("/contact") . "#contactForm";
       $section = <<<EOT
	   <!-- box-action -->
	   <section class="box-action lp-box-action">
		   <div class="container">
			   <div class="title">
				   <p class="lead">{$this->title}</p>
			   </div>
			   <div class="button high-contrast">
				   <a id="high-contrast-link" href="{$contactUrl}">Contact Us</a>
			   </div>
			   <div class="small-title">
				   <p>
					   <span>Start today!</span>
					   <a id="high-contrast-link-small" href="{$contactUrl}" class="btn btn-primary learn-more">Get a Free Quote</a>
				   </p>
			   </div>
		   </div>
	   </section>
	   <!-- End box-action-->
EOT;

		// join them all & print.
		echo $section;
	}

} // end of class BoxActionSection
