<?php
	define("BINARYOPS_INCLUDE", 'true');
	define("BINARYOPS_TITLE", 'Custom Web and Mobile App Development');

	define("BINARYOPS_META_DESCRIPTION", "Let BinaryOps Software help you implement an architecture, and software development processes that fits your business.");
    define("BINARYOPS_META_CANONICAL", "/service/web-and-mobile-apps");

	require_once '../header.inc.php';
	require_once '../title.inc.php';

        const TITLE_TEXT = <<<TITLE
Enable your mobile workforce, or extend your brand to millions of devices.
TITLE;

		$link = bosPageLink("/services");
		$breadcrumb = "<a href=\"{$link}\">Our Services</a>";
		$title = new TitleSection("Web and Mobile App Development", "Usability on the Go", "fa-cogs", TITLE_TEXT, $breadcrumb);
        $title->render();

		require_once '../box-action.inc.php';
		$boxAction = new BoxActionSection("Need help with your project?");
		$boxAction->render();

		// *********************************************************************
		// ** Side-by-side Paragraphs										  **
		// *********************************************************************
		$singleQuote = "'"; // breaks atom PHP code formatting
		$mainText = <<<MAINTEXT
Deploy your web and mobile applications with confidence. We have developed many responsive, scalable web apps on premise and in the cloud.
MAINTEXT;

		$bullets = array("Project Planning", 
						"Architecture Design", 
						"Performance Tuning", 
						"Responsive UI",
						"Secure API", 
						"UI/UX Design", 
						"Cloud Deployment", 
						"Scalable");

		//$icons = array("fa fa-cogs");
		$icons = array();

		$images = array("/img/services-carousel/text-web-mobile-1.jpg",
						"/img/services-carousel/text-web-mobile-2.jpg");

		require_once './service.inc.php';
		$serviceBox = new BoxServiceSection("Web and Mobile App Development", "Design and Usability", $mainText, $bullets, $icons, $images);
		$serviceBox->render();

		// *********************************************************************
		// ** Side-by-side Paragraphs										  **
		// *********************************************************************
		$leftText = <<<LEFTTEXT
<p>We understand that Web and Mobile applications are much more than branding and PR.
We have established methods for developing and maintaining back-end functionality
and managing the full software development life cycle of mobile apps. We work closely with our clients to
develop a responsive experience that your users, clients and employees will love.
</p>
LEFTTEXT;

$rightText = <<<RIGHTTEXT
<p>Application development is a complex landscape of cloud providers, technologies, libraries and frameworks.
Let us help you implement an architecture, and software development processes that fits your business.
Your users expect perfectly polished user interfaces, quick response times, intuitive interfaces and seamless updates.
While your business relies on your application running smoothly, and keeping your data secure.
Trust our years of experience building critical business software to make your project a success.
</p><p>
Whether you need a public facing mobile app, or a fully integrated app for your mobile work-force,
we will design the software architecture and deployment model that fits those needs.
We work closely with all stakeholders to ensure the app functions perfectly, and is secure, scalable and cost effective.
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