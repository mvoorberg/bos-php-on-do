<?php
	define("BINARYOPS_INCLUDE", 'true');
	define("BINARYOPS_TITLE", 'Contact a Full-Stack Developer');

	define("BINARYOPS_META_DESCRIPTION", "We would love to hear from you! Begin your next project right, contact BinaryOps Software and let's start the conversation!");
    define("BINARYOPS_META_CANONICAL", "/contact");

	require_once '../abtest.inc.php';
    // Define the AB test variations and assign a weight to each.
    $values['A'] = 3;
    $values['B'] = 7;
    $values['C'] = 10;
    $values['Z'] = 0;  // Zero weight is NEVER selected 

    bosABTest('lp', $values);



    // define("BINARYOPS_AB_TEST", $abCookie);
    // define("BINARYOPS_AB_COUNTER", $visitCounter);

    define("BINARYOPS_SHOW_NAV", false);
	require_once '../header.inc.php';
	require_once '../title.inc.php';

        // $title = new TitleSection("Contact Us", "Call or email us today!");
        // $title->render();

	require_once '../conversation.inc.php';
    
    $options["header"] = "Have a Problem to Solve?";
    $options["message"] = "I'd like to speak with someone about a [project] project for [business]. My name is [name] and you can reach me at [contact].";
    $options["button"] = "Send My Message";
    $options["fields"] = array(
        "name" => "Your Full Name",
        "contact" => "Email or Phone number",
        "project" => "Type of Project",
        "business" => "Business Name or Type"
    );

	$convoSection = new ConversationSection($options);
?>
<div style="background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('/img/slide/slides/2.jpg');
        background-repeat: no-repeat; background-position: center; background-size: cover;">
	<?=$convoSection->renderHTML()?>
</div>
<?php
	$sample = array(
		"header" => "Top Developers",
		"tagline" => "Top DevelopersTop DevelopersTop DevelopersTop DevelopersTop DevelopersTop DevelopersTop Developers",
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
	
    require_once '../multi-block-alt.inc.php';
    
	$blockSectionAlt = new MultiBlockAltSection($sample);
	$blockSectionAlt->render();

	require_once '../multi-block.inc.php';
	
	// dark or light
	$blockSection = new MultiBlockSection($sample, 'dark'); 
	$blockSection->render();


	require_once '../footer.inc.php';

	$convoSection->renderJavaScript();

?>


<!-- htmlmin:ignore -->
	</body>
</html>
<!-- htmlmin:ignore -->
