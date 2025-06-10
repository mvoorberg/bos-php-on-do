<?php
	define("BINARYOPS_INCLUDE", 'true');
	define("BINARYOPS_TITLE", 'Software Design - We Build Custom Apps');

	define("BINARYOPS_META_DESCRIPTION", "Let BinaryOps Software help you implement an architecture, and software development processes that fits your business.");
    define("BINARYOPS_META_CANONICAL", "/service/software-design");

	require_once '../header.inc.php';
	require_once '../title.inc.php';

	$singleQuote = "'"; // breaks atom PHP code formatting
	$nothing = ""; // fix atom PHP code formatting

	const TITLE_TEXT = <<<TITLE
Software design is the foundation of your custom software solution.
It combines the solution to real-world problems encountered within your business, but also the requirements for security, performance, scalability and maintainability.
TITLE;

	$link = bosPageLink("/services");
	$breadcrumb = "<a href=\"{$link}\">Our Services</a>";
	$title = new TitleSection("Software Design", "We Build Custom Applications", "building-o", TITLE_TEXT, $breadcrumb);
	$title->render();

	require_once '../box-action.inc.php';
	$boxAction = new BoxActionSection("Need help with your project?");
	$boxAction->render();

	// *********************************************************************
	// ** Side-by-side Paragraphs										  **
	// *********************************************************************
	$singleQuote = "'"; // breaks atom PHP code formatting
	$mainText = <<<MAINTEXT
We can design your software for agility, scalability, security, continuous and cloud deployments.
We can design and build your new app, or transition your existing applications for deployment to the cloud.
MAINTEXT;

		$bullets = array("Requirements Analysis", "Project Planning", "IT Architecture", "Design for Performance", "Application Scalability",
						"Address Technical Debt", "Reusabiltiy", "Separation of Concerns", "Single Responsibility", "Maintainability");

		//$icons = array("fa fa-cogs");
		$icons = array();

		$images = array("/img/services-carousel/text-architecture-1.jpg"); // "/img/services-carousel/text-architecture-2.jpg"

		require_once './service.inc.php';
		$serviceBox = new BoxServiceSection("Software Design", "Maintainable and testable software solutions", $mainText, $bullets, $icons, $images);
		$serviceBox->render();

		// *********************************************************************
		// ** Side-by-side Paragraphs										  **
		// *********************************************************************
		$leftText = <<<LEFTTEXT
<p>We have designed and developed solutions in a large variety of settings and followed many of them through their entire lifecycles.
We understand the long-term implications of decisions made during the design process and we{$singleQuote}ll explain them in a meaningful way.
Working with you each step of the way, we can start with your existing software, or build something new from scratch.
Together, we will make sure that the design suits your budget and your long term goals.
</p>
<p>
Some of the custom solutions we{$singleQuote}ve built include:
<p>
<ul>
	<li>Cryptocurrency Trading Software</li>
	<li>Labratory Results Delivery</li>
	<li>ERP System Integration</li>
	<li>Customer Facing Data Delivery</li>
	<li>Business Activity Monitoring Solutions</li>
	<li>Software-as-a-Service (Saas) Applications</li>
	<li>Blog Software</li>
	<li>Custom ETL and Data Loaders</li>
	<li>Email Distribution Management</li>
	<li>Dynamic Reporting</li>
	<li>GIS Mapping</li>
	<li>eCommerce</li>
</ul>
LEFTTEXT;

$rightText = <<<RIGHTTEXT
<p>We can rebuild applications or upgrade legacy systems, use REST APIs, and migrate to the Cloud.
We rationalize and re-engineer existing systems to enable them for web and mobile clients.
</p><p>
Application development is constantly evolving and staying up-to-date requires a significant investment in skills development.
We work hard to stay on top of our game so that we can deliver solutions that will serve your organization for years to come.
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