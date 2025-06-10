<?php if(!defined("BINARYOPS_INCLUDE")) { die("Direct access forbidden."); } ?>

<?php
function getAuthorMeta($authorName, $authorFallback) {

	// Build Author info from the Article meta.
	$slugAuthor = strtolower($authorName ? $authorName : $authorFallback);
	$slugAuthor = preg_replace('/[^A-Za-z0-9-]+/', '-', $slugAuthor);

	/**
	 * Content is similar to but not necessarily the same as used on our About page.
	 */
	$author = array();
	switch($slugAuthor) {
	 	case "mark-voorberg":
			$author['name'] = "Mark Voorberg";
			$author['email'] = "mark@binaryops.ca";
			$author['image'] = "/img/team-members/2.png";
			$author['title'] = "Co-Founder";
			$author['twitter'] = "https://twitter.com/mvoorberg";
			$author['linkedin'] = "https://www.linkedin.com/in/mark-voorberg-24462819/";
			$author['bio'] = <<<MARK_BIO
			Mark has been doing database design and building custom software for over twenty years.
			With a background in electronics, he quickly moved into software development and
			has been building database software solutions ever since, on many projects of all sizes.
MARK_BIO;
			break;
		case "wiebo-troost":
			$author['name'] = "Wiebo Troost";
			$author['email'] = "wiebo@binaryops.ca";
			$author['image'] = "/img/team-members/1.png";
			$author['title'] = "Co-Founder";
			$author['twitter'] = "https://twitter.com/troostw";
			$author['linkedin'] = "https://www.linkedin.com/in/wiebo-troost-7483343/";
			$author['bio'] = "";
			<<<WIEBO_BIO
			Wiebo is an exceptionally talented software developer with over twenty years experience with IT consulting.
			He loves to work on challenging projects and is quick to understand new business processes and provide technical solutions that work.
WIEBO_BIO;
			break;
		default:
			$author['name'] = "BinaryOps Software";
			$author['email'] = "info@binaryops.ca";
			$author['image'] = "/img/logo_shield_small.png";
			$author['title'] = "Custom Software Developers";
			$author['twitter'] = "https://twitter.com/BinaryOpsCa";
			$author['linkedin'] = "https://www.linkedin.com/company-beta/10581194";
			$author['bio'] = <<<BINARYOPS_BIO
			BinaryOps is a software development firm located on Vancouver Island in beautiful Victoria, BC.
			We develop custom mobile and web applications, and we help businesses with API design, 
			software architecture, frameworks, tools, testing and continuous integration.
BINARYOPS_BIO;
			break;
	}
	return $author;
}
?>
