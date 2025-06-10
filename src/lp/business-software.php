<?php
	define("BINARYOPS_INCLUDE", 'true');
	define("BINARYOPS_TITLE", 'Business Software - custom development');
	define("BINARYOPS_META_DESCRIPTION", "Find out how you can future proof your custom business software with BinaryOps.");
    define("BINARYOPS_META_CANONICAL", "/lp/business-software");

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

?>
<?php if (BINARYOPS_AB_TEST === 'lp-A') { 
    require_once './business-software-a.php';
} else if (BINARYOPS_AB_TEST === 'lp-B') { 
    require_once './business-software-b.php';
}
?>
    
<!-- htmlmin:ignore -->
	</body>
</html>
<!-- htmlmin:ignore -->
