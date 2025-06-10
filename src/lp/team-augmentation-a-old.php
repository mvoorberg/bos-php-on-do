<?php if(!defined("BINARYOPS_INCLUDE")) { die("Direct access forbidden."); } ?>
<?php
    require_once '../conversation.inc.php';
    
    $options["header"] = "Need help with a project?";
    $options["message"] = "Please contact me about my project. My name is [name] and you can reach me at [contact].";
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
            <h1>Augment your team with the right resources at the right time</h1>
                <h3>Eliminate risks and gain productivity</h3>
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

    require_once '../box-action.inc.php';
    $boxAction = new BoxActionSection("Add us to your team today!");
    $boxAction->render();
