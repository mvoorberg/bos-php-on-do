<?php
define("BINARYOPS_INCLUDE", 'true');
define("BINARYOPS_TITLE", 'Privacy Policy - Custom Web and Mobile Development');

define(
	"BINARYOPS_META_DESCRIPTION",
	// "Contact BinaryOps Software in Victoria, BC by email at info@binaryops.ca or by phone at +1 (866) 578-4890"
	"We would love to hear from you! Begin your next project right, contact BinaryOps Software and let's start the conversation!"
	// "We'd love to hear from you! There are a bunch of ways to reach us, so pick the one that works best for you, and let's start the conversation!"	
);
define("BINARYOPS_META_CANONICAL", "/privacy");

require_once 'header.inc.php';
require_once 'title.inc.php';

$title = new TitleSection("Privacy Policy", "Last updated Jan 11, 2023");
$title->render();
?>

<!-- Contact Us -->
<section class="paddings">
	<div class="container">
		<div class="row">

			<!-- Contact Form -->
			<div id="contact-wrapper" class="col-md-8">
				
			<?php include 'privacy-policy.php'; ?>


			</div>
			<!-- End Contact Form -->

			<!-- Sidebars -->
			<div class="col-md-4 sidebars">

				<aside>
					<h4>Additional information provided to BinaryOps</h4>
					<p>
					 
						We also receive Other Information when submitted to our Websites or in other ways, 
						such as responses or opinions that you provide if you participate in a focus group, 
						contest, activity or event, feedback that you provide about our products or services, 
						information that you provide if you apply for a job with BinaryOps Software, enrol in a 
						certification programme or other educational programme hosted by us or a vendor, 
						request support, interact with our social media accounts or otherwise communicate 
						with someone at BinaryOps Software.
					</p>
				</aside>

			</div>
			<!-- End Sidebars -->
		</div>
		<!-- End Container-->
</section>
<!-- End Privacy -->


<?php
require_once 'footer.inc.php';
?>

<!-- htmlmin:ignore -->
</body>

</html>
<!-- htmlmin:ignore -->