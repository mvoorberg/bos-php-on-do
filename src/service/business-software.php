<?php
	define("BINARYOPS_INCLUDE", 'true');
	define("BINARYOPS_TITLE", 'Custom Software to Grow Your Business');

	define("BINARYOPS_META_DESCRIPTION", "Let BinaryOps Software build your custom business software, specifically designed to support your data workflows.");
    define("BINARYOPS_META_CANONICAL", "/service/business-software");

	require_once '../header.inc.php';
	require_once '../title.inc.php';

	$titleText = <<<TITLE
Work with our expert consultants to streamline the flow of data within your organization so that it 
aligns with your current business processes. 
We can help you identify potential problem areas and propose actionable solutions, or create a custom solution 
tailored to the needs of your business.
We have the experience to see the bigger picture and to develop strategies to improve your system stability 
and efficiency.
TITLE;
// Leverage your data to increase your competitive advantage.

	$link = bosPageLink("/services");
	$breadcrumb = "<a href=\"{$link}\">Our Services</a>";
	$title = new TitleSection("Custom Business Software", "We Can Help Your Business Grow‎", "fa-star", $titleText, $breadcrumb);
	$title->render();

	require_once '../box-action.inc.php';
	$boxAction = new BoxActionSection("Need help with your project?");
	$boxAction->render();

	// *********************************************************************
	// ** Side-by-side Paragraphs										  **
	// *********************************************************************
	$mainText = <<<MAINTEXT
Custom business software and system integrations are designed to support data workflows within your business.
Collect the data required to serve your customers and track your business activities. 
Use that data as the basis for making better strategic decisions. 
Let your data become the cornerstone of your competitive advantage.
At BinaryOps Software, we have successfully deployed custom systems and integrated existing systems in many different industries.
MAINTEXT;

	$bullets = array(
				"Health Care", 
				"Telecom", 
				"Government", 
				"Energy & Petroleum",
				"Start Ups", 
				"Manufacturing", 
				"Laboratory Testing", 
				"Real Estate", 
				"e-Commerce",
				"Cryptocurrency"
				);

	//$icons = array("fa fa-cogs");  // Left as an example
	$icons = array();

	$images = array("/img/services-carousel/text-enterprise-1.jpg",
					"/img/services-carousel/text-enterprise-2.jpg");

	require_once './service.inc.php';
	$serviceBox = new BoxServiceSection("Business Software", "Obtain strategic advantages over your competition", $mainText, $bullets, $icons, $images);
	$serviceBox->render();

	// *********************************************************************
	// ** Side-by-side Paragraphs										  **
	// *********************************************************************
	$leftText = <<<LEFTTEXT
<p>We apply current coding best practices and deliver outstanding web applications to our clients.
We bring over 20 years of custom software development experience combined with expert-level experience with latest technologies.
We understand that your existing software supports your current business processes, and that continuity is critical.
We will work independently or as an extension of your team to increase velocity and responsiveness.
We solve the immediate, day to day problems, as well as provide a strategic direction for custom software development within your organization.
</p>
LEFTTEXT;

	$rightText = <<<RIGHTTEXT
<p>We are a team of senior software developers based in Victoria, BC and serving customers in western Canada and the Pacific Northwest.
We can work with you to do the necessary analysis to make sure the solution is designed to fit your business,
or jump right in and contribute along-side your existing team.
</p><p>
We deliver results faster through a modern approach to development, testing and deployment.
We work with your team to start thinking in terms of microservices and cloud deployment, and provide a migration path for your current systems.
</p>
RIGHTTEXT;

	require_once './service-alt.inc.php';
	$serviceAlt = new BoxServiceAltSection("Why choose BinaryOps?", $leftText, "We can help!", $rightText);
	$serviceAlt->render();

	// *********************************************************************
	// ** Include a blog Category 										  **
	// *********************************************************************
	require_once '../latest-blog.inc.php';
	$blogSection = new LatestBlogSection('../blog/cache/latest-cat-general-posts.html');
	$blogSection->render();
?>

<?php
	require_once '../footer.inc.php';
?>

<!-- htmlmin:ignore -->
	</body>
</html>
<!-- htmlmin:ignore -->
