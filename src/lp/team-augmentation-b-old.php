<?php if(!defined("BINARYOPS_INCLUDE")) { die("Direct access forbidden."); } ?>
<?php
    require_once '../conversation.inc.php';
    
    $options["header"] = "Need help with a software project?";
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

                <!-- Sidebars -->
                <div class="col-md-8 sidebars">
                    <h1>Augment your team, instantly add  speed and innovation</h1>
                        <p>
                        We work with your team, and gain an in-depth understanding of your existing implementation.
                        </p><p>
                        We update the software architecture to revitalize it. 
                        </p>
                        <p>
                            We work with the latest development and devops technologies. 
                        </p>
                        <p>We work with your team so they can quickly
                        respond to changing business needs and introduce changes into production well into the future.
                        </p><p>
                        We do this on premise as well as in the cloud.
                        </p>
                </div><!-- End Sidebars -->

                <!-- Content Right -->
                <div class="col-md-4">
                    <img src="../img/works/achievement.jpg" alt="Achievement">
                   
                </div><!-- End Content Right -->

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
