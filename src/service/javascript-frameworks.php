<?php
	define("BINARYOPS_INCLUDE", 'true');
	define("BINARYOPS_TITLE", 'Modern Web Applications');

	define("BINARYOPS_META_DESCRIPTION", "Let BinaryOps Software help you implement an architecture, and software development processes that fits your business.");
    define("BINARYOPS_META_CANONICAL", "/service/javascript-frameworks");

	require_once '../header.inc.php';
	require_once '../title.inc.php';

	const TITLE_TEXT = <<<TITLE
Popular JavaScript frameworks provide common design patterns and a consistent structure to grow your application with your business.
TITLE;

	$link = bosPageLink("/services");
	$breadcrumb = "<a href=\"{$link}\">Our Services</a>";
	$title = new TitleSection("JavaScript Frameworks", "Leverage our Experience", ["devicons-angular", "devicons-react", "devicons-vuejs"], TITLE_TEXT, $breadcrumb);
	$title->render();

	require_once '../box-action.inc.php';
	$boxAction = new BoxActionSection("Need help with your project?");
	$boxAction->render();

	// *********************************************************************
	// ** Side-by-side Paragraphs										  **
	// *********************************************************************
	$singleQuote = "'"; // breaks atom PHP code formatting
	$mainText = <<<MAINTEXT
Open source JavaScript frameworks can be used to build rich internet applications of reusable components.
Components can be nested and combined as necessary to create dynamic web applications.
Extend the HTML syntax to elegantly connect your components providing the interactive behavior we
expect from modern web applications while writing code that is consistent and testable.
MAINTEXT;

	$bullets = array("Project Planning", "Architecture Design", "Performance", "Application Stability",
					"Testing", "Reusabiltiy", "Source Code Control", "Database Tuning");

	$icons = array("devicons devicons-angular", "devicons devicons-react", "devicons devicons-ember", "devicons devicons-javascript");

	$images = array("/img/services-carousel/text-angular-1.jpg",
					"/img/services-carousel/text-angular-2.jpg");

	require_once './service.inc.php';
	$serviceBox = new BoxServiceSection("JavaScript Development", "Build testable and re-usable components", $mainText, $bullets, $icons, $images);
	$serviceBox->render();

	// *********************************************************************
	// ** Side-by-side Paragraphs										  **
	// *********************************************************************
	$leftText = <<<LEFTTEXT
<p>BinaryOps Software is the first choice for clients when starting a new project or when their projects need expert help.
The BinaryOps advantage comes from our in-depth knowledge of information technology solutions and platforms and our
ability to deliver innovative, cost effective, cutting edge technology solutions.
<br/>
We have real-world Angular experience and know how to maximize the framework to
build rich internet applications of reusable components.
</p><p>
We have become the partner of choice for start-ups and established organizations because we focus on quality, service, flexibility and value.
Delivering quality is critical in everything we do because well written performs better, scales better and in the long run, is cheaper to extend and maintain.
</p>
LEFTTEXT;

	$rightText = <<<RIGHTTEXT
<p>We started developing with Angular before it was released. Combine that with our extensive
knowledge of Node.js and many other server-side technologies, we are able to deliver
performant web applications to meet the needs of your business, both today and in the future.
</p><p>
The Angular framework moves what have been traditionally server-side responsibilities, to the browser 
helping to reduce server loads and improve testability, making it ideal for test-driven development.

These characteristics allow us to focus on building dynamic applications
that require fewer server resources, and are not bound to any particular server technology.
</p><p>
Contact us today to meet with one of our senior developers and get some ideas about your project!
</p>
RIGHTTEXT;

	require_once './service-alt.inc.php';
	$serviceAlt = new BoxServiceAltSection("Why choose BinaryOps?", $leftText, "How we can help", $rightText);
	$serviceAlt->render();

	// *********************************************************************
	// ** Include a blog Category 										  **
	// *********************************************************************
	require_once '../latest-blog.inc.php';
	$blogSection = new LatestBlogSection('../blog/cache/latest-cat-apis-posts.html');
	$blogSection->render();
?>

<?php
	require_once '../footer.inc.php';
?>
<!-- htmlmin:ignore -->
    </body>
</html>
<!-- htmlmin:ignore -->