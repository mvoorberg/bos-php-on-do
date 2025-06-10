<?php if(!defined("BINARYOPS_INCLUDE")) { die("Direct access forbidden."); } ?>

<?php

class MultiBlockAltSection {

    var $header;
    var $tagline;
    var $style;

    function __construct($blocks, $style='light') {
        $this->style = $style;
        if (!$blocks) {
            $blocks = array(
                "header" => "Booyah!",
                "tagline" => "Lorem ipsum dolor sit amet",
                array(
                    "title" => "Top Developers",
                    "banner" => "Work with the best",
                    "text" => "Lorem ipsum, dolor sit amet. Lorem ipsum, dolor sit amet.",
                    "icon" => "thumbs-up"
                ),
                array(
                    "title" => "Innovate & Create",
                    "banner" => "High performance solutions",
                    "text" => "Lorem ipsum, dolor sit amet. Lorem ipsum, dolor sit amet. Lorem ipsum, dolor sit amet."
                ),
                array(
                    "title" => "Partner with Us",
                    "banner" => "Trust us with your product development",
                    "text" => "Lorem ipsum, dolor sit amet. Lorem ipsum, dolor sit amet."
                )
            );
        }
        if (isset($blocks["header"])) {
            $this->header = $blocks["header"];
            unset($blocks["header"]);
        }
        if (isset($blocks["tagline"])) {
            $this->tagline = $blocks["tagline"];    
            unset($blocks["tagline"]);
        }
        $this->blocks = $blocks;    
    }

   function render() {
       $class = "multi_block_{$this->style}";
    //    echo $this->style;
?>
       <!-- multi-block-action -->
       <section class="section-gray padding-top borders">
            <div class="container">
                <div class="row">
                <?php if (isset($this->header) && isset($this->tagline)) { ?>
                        <div class="text-center padding-bottom">
                            <h2><?=$this->header?></h2>
                            <p style="font-weight: normal; padding: 0 25px;"><?=$this->tagline?></p>
                        </div>                
                <?php } ?>
                </div>
                <div class="row services-no-margin">
<?php
    $mdSize = floor(12 / sizeof($this->blocks));
    if ($mdSize < 3 && sizeof($this->blocks) > 4) {
        $mdSize = 3;
    }
    $smSize = 12;
    if ($mdSize%2 === 1) {
        $smSize = 6;
    }
    $i = 1;
    foreach ($this->blocks as $block) {
        $icon = isset($block['icon']) ? $block['icon'] : "fa-star";
?>
        <div class="col-xs-12 col-sm-<?=$smSize?> col-md-<?=$mdSize?> text-center padding-bottom">
            <div class="row head-service">
                <div class="col-md-12">
                    <?=bosIcon($icon)?>
                </div>
                <div class="col-md-12">
                    <h4><?=$block['title']?></h4>
                    <h5><?=$block['banner']?></h5>
                </div>
            </div>
            <p><?=$block['text']?></p>
        </div>
<?php 
        if ($smSize === 6 && $i%2 === 0) {
            echo '<div class="clearfix visible-sm-block"></div>';
        }
        if ($mdSize === 2 && $i%2 === 0 || $mdSize === 3 && $i%4 === 0 || $mdSize === 4 && $i%3 === 0) {
            echo '<div class="clearfix visible-lg-block visible-md-block" style="margin-bottom: 20px;"></div>';
        }
        $i++;
    }
?>
			   </div> <!-- End of row -->
		   </div>
	   </section> <!-- End multi-block-action -->
<?php
	}

} // end of class MultiBlockAltSection
