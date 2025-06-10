<?php
	define("BINARYOPS_INCLUDE", 'true');
	define("BINARYOPS_TITLE", 'Business Software Consultants - outsource your software development');

    define("BINARYOPS_META_DESCRIPTION", "Outsourcing software development. Add speed, agility and innovation with BinaryOps on your team");
    define("BINARYOPS_META_CANONICAL", "/lp/software-development-outsourcing");

	require_once '../abtest.inc.php';
    // Define the AB test variations and assign a weight to each.
    $values['A'] = 5;
    $values['B'] = 5;
    // $values['C'] = 0;
    // $values['Z'] = 0;  // Zero weight is NEVER selected 

    bosABTest('lp', $values);

    // define("BINARYOPS_AB_TEST", $abCookie);
    // define("BINARYOPS_AB_COUNTER", $visitCounter);

    define("BINARYOPS_SHOW_NAV", false);
	require_once '../header.inc.php';
	require_once '../title.inc.php';

        // $title = new TitleSection("Contact Us", "Call or email us today!");
        // $title->render();
    require_once './software-development-outsourcing-a.php';
?>
    
<!-- htmlmin:ignore -->
	</body>
</html>
<!-- htmlmin:ignore -->
