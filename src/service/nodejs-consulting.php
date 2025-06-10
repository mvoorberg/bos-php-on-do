<?php
	define("BINARYOPS_INCLUDE", 'true');
	define("BINARYOPS_TITLE", 'Node.js Consulting - Expert Developers');

	define("BINARYOPS_META_DESCRIPTION", "Let BinaryOps Software help you develop and deploy a Node.js application that fits your business.");
    define("BINARYOPS_META_CANONICAL", "/service/nodejs-consulting");

	require_once '../header.inc.php';
	require_once '../title.inc.php';

	$singleQuote = "'"; // breaks atom PHP code formatting
	$nothing = ""; // breaks atom PHP code formatting

	$titleText = <<<TITLE
We help amazing organizations succeed by providing professional Node.js development and consulting services.
Our experts have proven expertise and understand Node.js and it{$singleQuote}s package ecosystem.
TITLE;

	$link = bosPageLink("/services");
	$breadcrumb = "<a href=\"{$link}\">Our Services</a>";
	$title = new TitleSection("Node.js Consulting", "Leverage our Experience", "devicons-nodejs_small", $titleText, $breadcrumb);
	$title->render();

	require_once '../box-action.inc.php';
	$boxAction = new BoxActionSection("Need help with your project?");
	$boxAction->render();

	// *********************************************************************
	// ** Side-by-side Paragraphs										  **
	// *********************************************************************
	$mainText = <<<MAINTEXT
We{$singleQuote}ve been programming with Node.js since v0.10.
If you have a new project that you need help with or an existing app that needs maintenance and upgrades, we can help.
We{$singleQuote}ve developed Node apps for large companies and small ones.
Whether it{$singleQuote}s a web application, a REST API, system tools or something else, we{$singleQuote}re here to help.

We can deploy your app to your own servers, Amazon AWS, Google Cloud, Windows Azure, or another provider.
Launch your next server-side JavaScript project with confidence, contact us today!
MAINTEXT;

	$bullets = array("MEAN Stack",
					"Custom CLI Tools",
					"Private NPM",
					"REST APIs",
					"Dependency Mgmt",
					"Debugging Node.js",
					"Package Development",
					"Professional Support"
				);

	$icons = array("devicons devicons-nodejs large", "devicons devicons-npm large");

	$images = array("/img/services-carousel/text-nodejs-1.jpg",
					"/img/services-carousel/text-nodejs-2.jpg");

	require_once './service.inc.php';
	$serviceBox = new BoxServiceSection("Node.js Development Consulting", "Building for the future with Node.js", $mainText, $bullets, $icons, $images);
	$serviceBox->render();

	// *********************************************************************
	// ** Side-by-side Paragraphs										  **
	// *********************************************************************
	$leftText = <<<LEFTTEXT
<p>We have deployed Node applications in a variety of production environments and know what it takes to manage change and avoid pitfalls.
We have the skills and experience to develop the right solution, delivering your project with confidence.
</p><p>
Our senior software engineers have helped many companies succeed with Node.js keeping them ahead of their competitors
by providing professional development and consulting services.
We{$singleQuote}ve been using Node professionally for several years and can move your web or mobile application development forward.
</p>
LEFTTEXT;

	$rightText = <<<RIGHTTEXT
<p>We have established practices, methods and code libraries to develop your custom solution using Node.js.
We will set up your project for success, making use{$nothing} of private libraries and open source projects on NPM to arrive at
a stable, maintainable and cost effective solution for your business.
</p><p>
Developing solutions with Node allows us to deliver working software faster and with less overhead.
The Node package manager has thousands of useful modules that can accelerate the
development of many aspects of your project. Using pre-built modules on the server and
sharing the same programming language between front-end & back-end, developers can seamlessly move throughout the codebase as needed.
</p>
<ul class="list">
	<li><i class="fa fa-check"></i>Leverage NPM for useful features</li>
	<li><i class="fa fa-check"></i>JavaScript lets us easily move from front to back</li>
	<li><i class="fa fa-check"></i>Designed for high performance services</li>
	<li><i class="fa fa-check"></i>Scale up microservices as needed</li>
	<li><i class="fa fa-check"></i>Smaller development teams and smaller codebases</li>
	<li><i class="fa fa-check"></i>Node.js is a mature platform with an LTS plan</li>
</ul>
RIGHTTEXT;

	require_once './service-alt.inc.php';
	$serviceAlt = new BoxServiceAltSection("Why develop with BinaryOps?", $leftText, "We can help with your Node project!", $rightText);
	$serviceAlt->render();

	// *********************************************************************
	// ** Include a blog Category 										  **
	// *********************************************************************
	require_once '../latest-blog.inc.php';
	$blogSection = new LatestBlogSection('../blog/cache/latest-tag-nodejs-posts.html');
	$blogSection->render();
?>

<?php
	require_once '../footer.inc.php';
?>
<!-- htmlmin:ignore -->
    </body>
</html>
<!-- htmlmin:ignore -->