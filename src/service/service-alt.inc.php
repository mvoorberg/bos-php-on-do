<?php if(!defined("BINARYOPS_INCLUDE")) { die("Direct access forbidden."); } ?>

<?php

class BoxServiceAltSection {

	var $leftTitle;
	var $leftParagraph;
	var $rightTitle;
	var $rightParagraph;

	function __construct($leftTitle = "The Left",
								$leftParagraph = "Left side text...",
								$rightTitle = "The Right",
								$rightParagraph = "Right side text...") {

		$this->leftTitle = $leftTitle;
		$this->leftParagraph = $leftParagraph;
		$this->rightTitle =  $rightTitle;
		$this->rightParagraph = $rightParagraph;
   }

   function render() {
       $section = <<<EOT
<section class="section-gray paddings borders">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h3>{$this->leftTitle}</h3>{$this->leftParagraph}
			</div>
			<div class="col-md-6">
				<h3>{$this->rightTitle}</h3>{$this->rightParagraph}
			</div>
		</div>
	</div>
</section>
EOT;

		// join them all & print.
		echo $section;
	}

} // end of class BoxServiceAltSection
