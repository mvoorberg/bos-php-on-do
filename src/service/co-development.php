<?php
	define("BINARYOPS_INCLUDE", 'true');
	define("BINARYOPS_TITLE", 'Co-Development - Experienced Teams in Canada');

	define("BINARYOPS_META_DESCRIPTION", "Add expert developers to your team with co-development services from BinaryOps Software.");
    define("BINARYOPS_META_CANONICAL", "/service/co-development");

	require_once '../header.inc.php';
	require_once '../title.inc.php';

	$singleQuote = "'"; // breaks atom PHP code formatting

        const TITLE_TEXT = <<<TITLE
Co-Development teams are a great way to add missing skills to an existing team, or simply bring in additional resources to meet specific goals.
TITLE;

	$link = bosPageLink("/services");
	$breadcrumb = "<a href=\"{$link}\">Our Services</a>";
	$title = new TitleSection("Co-Development Teams", "100% Canadian Developers", "handshake-o", TITLE_TEXT, $breadcrumb);
        $title->render();

		require_once '../box-action.inc.php';
		$boxAction = new BoxActionSection("Need help with your project?");
		$boxAction->render();

		// *********************************************************************
		// ** Side-by-side Paragraphs										  **
		// *********************************************************************
		$mainText = <<<MAINTEXT
Co-Development is a great way to rapidly elevate the software development practices and productivity of your team. 
Our expert consultants will work closely with your team during all phases of the project 
helping to ensure positive outcomes that bring exceptional business results.
MAINTEXT;

		$bullets = array(
						"Project Planning", 
						"Architecture Design", 
						"Performance", 
						"Scalability",
						"Refactoring", 
						"Reusabiltiy", 
						"Unit Testing", 
						"Continuous Integration", 
						"Cloud Deployment", 
						"Mentoring");

		//$icons = array("fa fa-cogs");
		$icons = array();

		$images = array("/img/services-carousel/text-codevelopment-1.jpg",
						"/img/services-carousel/text-codevelopment-2.jpg");

		require_once './service.inc.php';
		$serviceBox = new BoxServiceSection("Co-Development", "Use Team Augmentation to accelerate your business", $mainText, $bullets, $icons, $images);
		$serviceBox->render();

		// *********************************************************************
		// ** Side-by-side Paragraphs										  **
		// *********************************************************************
		$leftText = <<<LEFTTEXT
<p>We can bring additional software development skills and best practices to your team while developing and implementing your project.
When the project is complete, your team will have the skills and knowledge to maintain the solution going forward, as well as develop new
solutions using the same paradigms.
</p>
LEFTTEXT;

$singleQuote = "'";
$rightText = <<<RIGHTTEXT
<p>We can evaluate your current practises, as well as the current software inventory and will work with you to document a plan to achieve your long term goals.
During the course of each project, we work with your team members to identify and articulate the incremental changes required to reach those goals while meeting project deliverables.
</p><p>
If you don{$singleQuote}t currently have development staff in-house, we can review the current state and make a recommendation based on your stated objectives.
</p>
RIGHTTEXT;

		require_once './service-alt.inc.php';
		$serviceAlt = new BoxServiceAltSection("Why choose BinaryOps?", $leftText, "How we can help", $rightText);
		$serviceAlt->render();

		// *********************************************************************
		// ** Include a blog Category 										  **
		// *********************************************************************
		require_once '../latest-blog.inc.php';
		$blogSection = new LatestBlogSection('../blog/cache/latest-tag-devops-posts.html');
		$blogSection->render();
?>

<?php
	require_once '../footer.inc.php';
?>
<!-- htmlmin:ignore -->
    </body>
</html>
<!-- htmlmin:ignore -->
