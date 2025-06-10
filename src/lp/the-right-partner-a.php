<?php if(!defined("BINARYOPS_INCLUDE")) { die("Direct access forbidden."); } ?>
<?php
    require_once '../conversation.inc.php';
    
    $options["header"] = "Need help with a project?";
    $options["message"] = "I'd like to speak with someone about  my project. My name is [name] and you can reach me at [contact].";
    $options["button"] = "Send My Message";
    $options["fields"] = array(
        "name" => "Your Full Name",
        "contact" => "Email or Phone number",
        "project" => "Type of Project",
        "business" => "Business Name or Type"
    );

    $convoSection = new ConversationSection($options);
?>

<style>
    .landing-container-local {
        background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('/img/slide/slides/2.jpg');
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        position: static;
    }
    .landing-container-local h1 {
        position: static;
        
    }
    .landing-container-local .sidebars h1 {
        position: static;
        font-size:1.8rem;
    }
    .landing-container-local .sidebars h2 {
        color: white;
        position: static;
        font-size:1.8rem;
    }
    .landing-container-local .sidebars h3 {
        position: static;
    }
    .landing-container-local .sidebars p {
        color:#efefef;
        2text-shadow:0px 2px 5px rgba(0, 0, 0, 0.5);
        font-size: 1.1rem;
        line-height: 1.3;
        font-weight: 800;
    }
    .lp-box-action{
        background-color:black;
    }

    .conversation-local{
        background-color: #27292B;
        padding: 20px 20px 20px 20px;

    }
        
    </style>
    <div class="container-fluid landing-container landing-container-local" style="xheight:550px;">
        <div class="container">
            <div class="row">

                <!-- Sidebars -->
                <div class="col-md-8 sidebars">
                    <h1>The Right Partner for software development</h1>
                        <h3>Add speed, innovation and creativity</h3>
                        <p>
                            By adding BinaryOps resources to your team, you gain speed, innovation and
                            rapid skills development of your existing team! </p>
                        <p>    
                        At Binaryops we have been solving the complex business problems for 20 years.
                        We work on integrated solutions behind the firewall or in front.
                        </p>
                        
                        <h2>The right people for the right project</h2>
                </div><!-- End Sidebars -->

                <!-- Content Right -->
                <div class="col-md-4">
                <img src="../img/works/achievement.jpg" alt="Achievement">
                   
                </div><!-- End Content Right -->
            </div>
        </div>
        <!-- footer top-->
        <footer class="footer-top">
            <div class="container">
               <div class="row">
                   <!-- <div class="hidden-xs col-sm-1">
                   </div> -->
                   <div class="col-sm-12 col-xs-12">
                   <?php
                        $convoSection->renderThinHTML();
                    ?>
                   </div>
                   <!-- <div class="hidden-xs col-sm-1">
                   </div> -->
               </div>
            </div>
        </footer>
        <!-- End footer Top-->
        <?php
        $sample = array(
		array(
			"title" => "Top Developers",
			"banner" => "Work with the best",
			"text" => "In depth experience with core business applications.",
			"icon" => "thumbs-up"
		),
		array(
			"title" => "Innovate & Create",
			"banner" => "High performance solutions",
			"text" => "Update the  software architecture to be agile"
		),
		array(
			"title" => "Partner with Us",
			"banner" => "Trust us with your product development",
			"text" => "Gain speed and creativity."
		)
	);
	
    require_once '../multi-block-alt.inc.php';
    
	$blockSectionAlt = new MultiBlockAltSection($sample);
	$blockSectionAlt->render();
?>
        
        <?php
            require_once '../box-action.inc.php';
            $boxAction = new BoxActionSection("Add us to your team today!");
            $boxAction->render();
        ?> 
</div>

        
<!-- Following empty container fixes footer overlap! -->
<div class="container"></div>

<?php
    define("BINARYOPS_SHOW_FOOTER_TOP", false);
    define("BINARYOPS_SHOW_FOOTER_MIDDLE", false);
    require_once '../footer.inc.php';
    $convoSection->renderJavaScript();
?>
