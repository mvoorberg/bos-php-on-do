<?php
if(!defined("BINARYOPS_INCLUDE")) { die("Direct access forbidden."); }
if(!defined("BINARYOPS_SHOW_NAV")) { define("BINARYOPS_SHOW_NAV", true); }

//require_once 'author.inc.php';

// Redirect anything on "www." to the non-www domain.
// This wasn't playing nice in .htaccess & mod_rewrite.
if (substr($_SERVER['HTTP_HOST'], 0, 4) === 'www.') {
	// Once this has settled, we can probably remove the no-cache headers.
	// header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
	// header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');

	// If the user came here with "www." prefix, redirect without it!
	// $protocol = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
	header('Location: https://' . (substr($_SERVER['HTTP_HOST'], 4)) . $_SERVER['REQUEST_URI'], true, 301);
	exit(0);
}

if (!defined("BINARYOPS_AB_TEST")) { define("BINARYOPS_AB_TEST", "No-Test"); }
if (!defined("BINARYOPS_AB_COUNTER")) { define("BINARYOPS_AB_COUNTER", "0"); }
if (!defined("BINARYOPS_TITLE")) { define("BINARYOPS_TITLE", "Full Stack Software Development"); }

// if (!defined("BINARYOPS_META_DESCRIPTION")) {
// 	****Don't apply the same meta-description across multiple pages, it gets SEO-penalized.****
// }

function bosPageLink($pageUrl) {
	// If we're running locally, include the file extension.
	if ("~ENVIRONMENT~" != "LIVE_SITE") {
		$pageUrl .= ".php";
	}
	return $pageUrl;
}

function bosIcon($icon) {
	$iconHtml = "";
	if (substr($icon, 0, strlen("devicons-")) === "devicons-") {
		$iconHtml = " <i class=\"devicons {$icon}\"></i>";
	} else if (substr($icon, 0, strlen("fa-")) === "fa-") {
		$iconHtml = " <i class=\"fa {$icon}\"></i>";
	} else {
		$iconHtml = " <i class=\"fa fa-{$icon}\"></i>";   // some pages have a font-awesome and block of text.
	}
	return $iconHtml;
}

?>
<!-- htmlmin:ignore -->
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php echo BINARYOPS_TITLE; ?> - BinaryOps Software</title>

		<meta name="theme-color" content="#d21c2d"/>
<?php 

	if (defined("BINARYOPS_META_DESCRIPTION")) {
		// In 2020, the recommended length is between 120 & 158 chars.
		$metaDescription = BINARYOPS_META_DESCRIPTION;
		$bestCta = "";

		// Find the best (longest) CTA that fits within the max recommended length.
		$maxLen = 158;
		$ctaArr = [
			"Call today!", 
			"Call us today!", 
			"Give us a call today!", 
			"Let's get started today!"
		]; // Longer CTAs should be the better ones.
		$i = 0;
		while($i < count($ctaArr) && strlen($metaDescription . " " . $ctaArr[$i]) <= $maxLen) {
			$bestCta = $ctaArr[$i];
			$i++;
		}
		$metaDescription = htmlspecialchars($metaDescription . " " . $bestCta);
		
		echo "<meta name=\"description\" content=\"{$metaDescription}\" />\n";
		echo "<meta property=\"og:description\" content=\"{$metaDescription}\" />\n";
	}
	if (defined("BINARYOPS_META_CANONICAL")) {
		$queryParameter = ""; // default no parameters!
		if (defined("BINARYOPS_META_CURRENT")) {
			$queryParameter = (BINARYOPS_META_CURRENT === "?page=1" ? "" : BINARYOPS_META_CURRENT);
		}
		$canonicalBase = "https://binaryops.ca" . BINARYOPS_META_CANONICAL;
		echo "<link rel=\"canonical\" href=\"{$canonicalBase}{$queryParameter}\" />\n";
		echo "<meta property=\"og:url\" content=\"{$canonicalBase}{$queryParameter}\" />\n";

		if (defined("BINARYOPS_META_PREV")) {
			$fragmentPrev = (BINARYOPS_META_PREV === "?page=1" ? "" : BINARYOPS_META_PREV);
			echo "<link rel=\"prev\" href=\"{$canonicalBase}{$fragmentPrev}\" />\n";
		}
		if (defined("BINARYOPS_META_NEXT")) {
			$fragmentNext = BINARYOPS_META_NEXT;
			echo "<link rel=\"next\" href=\"{$canonicalBase}{$fragmentNext}\" />\n";
		}
	}
	// Don't use robots=noindex for now.
	// if (@$_SERVER["HTTPS"] !== "on") {
	// 	echo "<meta robots=\"noindex\">\n";
	// }
	 ?>
		<meta name="author" content="binaryops.ca"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		
		<meta property="og:type" content="website"/>

		<?php 
			if (defined("BINARYOPS_META_IMAGE")) {
				echo "<meta property=\"og:image\" content=\"https://binaryops.ca/blog/articles/" . BINARYOPS_META_IMAGE . "\"/>\n"; 
			} else {
				echo "<meta property=\"og:image\" content=\"https://binaryops.ca/css/skins/red/logo-shield.jpg\"/>\n"; 
			}
		?>
	    <meta property="og:title" content="<?php echo BINARYOPS_TITLE; ?> - BinaryOps Software"/>
		<meta property="og:site_name" content="BinaryOps Software"/>
		<meta name="twitter:card" content="summary" />
        <meta name="twitter:site" content="@binaryopsca" />
	    <script>
			var gtmAbTest = "<?=BINARYOPS_AB_TEST?>";
			var gtmAbCounter = "<?=BINARYOPS_AB_COUNTER?>";
		</script>
<?php
	/***********************************************************************
	*** THESE ARE THE INCLUDES FOR THE LIVE WEBSITE
	***********************************************************************/
	// ~ENVIRONMENT~ is injected during the Grunt build process. See the Gruntfile.
	if ("~ENVIRONMENT~" == "LIVE_SITE") {

/*
		Do we need these? 
    <script> var dataLayer = []; </script>
*/		
?>
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-KLJXNN');</script>
	<!-- End Google Tag Manager -->

	<link type="text/css" media="screen" rel="stylesheet" href="/css/built.clean.min.css?v=~CSS_CACHE_BUSTER~"/>
	<link type="text/css" media="screen" rel="stylesheet" href="/css/carousel/owl.carousel.css"/>
	<link type="text/css" media="screen" rel="stylesheet" href="/css/carousel/owl.theme.css"/>

	<link rel="preload" type="font/woff" crossorigin="anonymous" as="font" href="/fonts/fontawesome-webfont.woff?v=4.7.0"/>
	<link rel="preload" type="font/woff" crossorigin="anonymous" as="font" href="/fonts/fontawesome-webfont.woff2?v=4.7.0"/>
	<link rel="preload" type="font/woff" crossorigin="anonymous" as="font" href="https://fonts.gstatic.com/s/opensans/v15/mem8YaGs126MiZpBA-UFVZ0e.ttf"/>
	<link rel="preload" type="font/woff" crossorigin="anonymous" as="font" href="https://fonts.gstatic.com/s/opensans/v15/mem5YaGs126MiZpBA-UN7rgOUuhs.ttf"/>
	<link rel="preload" type="font/woff" crossorigin="anonymous" as="font" href="https://fonts.gstatic.com/s/opensans/v15/mem5YaGs126MiZpBA-UN_r8OUuhs.ttf"/>

<?php
	} else {
		$useCleanCss = false; // Toggle for local testing of cleaned and minified CSS.
		if ($useCleanCss) {

			// <link type="text/css" media="screen" rel="stylesheet" href="/css/built.clean.min.css?v=~CSS_CACHE_BUSTER~"/>
?>
			<link type="text/css" media="screen" rel="stylesheet" href="/css/built.min.css?v=~CSS_CACHE_BUSTER~"/>
<?php
		} else {
?>
	<!-- *******************************************************************
	*** THESE ARE THE INCLUDES FOR THE DEVELOPMENT WEBSITE
	******************************************************************** -->

	<!-- bootstrap.css  - include resets ( Media querys, grid, responsive layout). -->
	<link type="text/css" media="screen" rel="stylesheet" href="/css/bootstrap/bootstrap.min.css"/>
	<link type="text/css" media="screen" rel="stylesheet" href="/css/bootstrap/bootstrap-theme.min.css"/>
	<!-- jquery.fancybox.css  - Lightbox (used on Home, About & Service pages )-->
	<link type="text/css" media="screen" rel="stylesheet" href="/css/../js/fancybox/jquery.fancybox.css"/>
	<!-- Apply some theme related style choices -->
	<link type="text/css" media="screen" rel="stylesheet" href="/css/skins/theme-options.css"/>
	<!-- Animations (removed April-2017 with no noticeable differences)-->
	<!-- <link type="text/css" media="screen" rel="stylesheet" href="/css/animations/animate.css"/> -->
	<!-- revolution Slider (Homepage slideshow)-->
	<!-- <link type="text/css" media="screen" rel="stylesheet" href="/css/slide/revolution.css"/>
	<link type="text/css" media="screen" rel="stylesheet" href="/css/../js/rs-plugin/css/settings.css"/> -->
	<!-- carousel (Used on Home & (2x)About pages) -->
	<link type="text/css" media="screen" rel="stylesheet" href="/css/carousel/owl.carousel.css"/>
	<link type="text/css" media="screen" rel="stylesheet" href="/css/carousel/owl.theme.css"/>
	<!-- scrollbar (Used in the Latest Blog Posts section on Home page)-->
	<!-- <link type="text/css" media="screen" rel="stylesheet" href="/css/scrollbar/jquery.mCustomScrollbar.css"/> -->
	<!-- flickr -->
	<!--  @import url("flickr/flickr.css");  -->
	<!-- Icons Font-Awesome -->
	<link type="text/css" media="screen" rel="stylesheet" href="/css/icons/font-awesome.min.css"/>
	<!-- Icons Font Devicons (Services page)-->
	<link type="text/css" media="screen" rel="stylesheet" href="/css/icons/devicons.min.css"/>
	<!-- Google font -->
	<link type="text/css" media="screen" rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,400,300,700"/>

	<!-- Theme CSS -->
	<link type="text/css" media="screen" rel="stylesheet" href="/css/style.css"/>
	<!-- Responsive CSS -->
	<link type="text/css" media="screen" rel="stylesheet" href="/css/theme-responsive.css"/>
	<!-- Skins Theme -->
	<link type="text/css" media="screen" rel="stylesheet" href="/css/skins/red/red.css" class="skin_color"/>

	<!-- Head Libs -->
	<script src="/js/modernizr.js"></script>

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-KLJXNN');</script>
	<!-- End Google Tag Manager -->

<?php
	}
} ?>
	<!-- Favicons -->
	<link rel="shortcut icon" href="/img/icons/favicon.ico">
	<link rel="apple-touch-icon" href="/img/icons/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/img/icons/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/img/icons/apple-touch-icon-114x114.png">

	<script type="application/ld+json">
		{
			"@context": "https://schema.org",
			"@type": "LocalBusiness",
			"address": {
				"@type": "PostalAddress",
				"addressLocality": "Victoria",
				"addressRegion": "BC",
				"postalCode":"V8V 4Y9",
				"streetAddress": "#662 185-911 Yates St."
			},
			"description": "BinaryOps Software is a full stack software development consultancy.",
			"name": "BinaryOps Software Inc.",
			"image":"https://binaryops.ca/img/logo_shield_small.png",
			"openingHours": "Mo,Tu,We,Th,Fr 09:00-16:00",
			"geo": {
					"@type": "GeoCoordinates",
					"latitude": "48.4253506",
					"longitude": "-123.3602591"
				}
		}
	</script>

	<!--[if lte IE 8]>
		<link rel="stylesheet" href="/css/ie/ie.css" type="text/css" media="screen" />
	<![endif]-->

	<!--[if lte IE 8]>
		<script src="/js/responsive/html5shiv.js"></script>
		<script src="/js/responsive/respond.js"></script>
	<![endif]-->

    </head>
    <body>
<?php if ("~ENVIRONMENT~" == "LIVE_SITE") { ?>
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KLJXNN" height="0" width="0" style="display:none;visibility:hidden;"></iframe></noscript>
<?php } ?>

    <div id="layout" class="layout-wide style-light">
<!-- htmlmin:ignore -->

        <!-- Header-->
        <header>

    <!--Navbar-->

	<nav class="navbar" role="navigation">
		<div class="container">
			<div class="navbar-header">
			
				<a href="/" class="navbar-brand navbar-brand-lg hidden-xs" title="Return Home">
					<img src="/css/skins/red/logo.png" alt="BinaryOps Software Inc." class="logo_img">
				</a>
				<a href="/" class="navbar-brand navbar-brand-xs hidden-sm hidden-md hidden-lg" title="Return Home">
					<img src="/css/skins/red/logo.png" alt="BinaryOps Software Inc." class="logo_img">
				</a>

				<?php if (BINARYOPS_SHOW_NAV) { ?>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<?php } ?>
			</div>

			<?php if (BINARYOPS_SHOW_NAV) { ?>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="/">HOME</a></li>
						<li><a href="<?=bosPageLink("/services");?>">SERVICES</a></li>
						<li><a href="<?=bosPageLink("/about-us");?>">ABOUT</a></li>
						<li><a href="/blog/">BLOG</a></li>
						<li><a href="<?=bosPageLink("/contact");?>">CONTACT</a></li>
					</ul>
				</div>
			<?php } ?>
		</div>
	</nav>
	<!--/.Navbar-->

        </header>
        <!-- End Header-->
