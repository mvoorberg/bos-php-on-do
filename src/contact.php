<?php
define("BINARYOPS_INCLUDE", 'true');
define("BINARYOPS_TITLE", 'Contact - Custom Web and Mobile Development');

define(
	"BINARYOPS_META_DESCRIPTION",
	// "Contact BinaryOps Software in Victoria, BC by email at info@binaryops.ca or by phone at +1 (866) 578-4890"
	"We would love to hear from you! Begin your next project right, contact BinaryOps Software and let's start the conversation!"
	// "We'd love to hear from you! There are a bunch of ways to reach us, so pick the one that works best for you, and let's start the conversation!"	
);
define("BINARYOPS_META_CANONICAL", "/contact");

require_once 'header.inc.php';
require_once 'title.inc.php';

$title = new TitleSection("Contact Us", "Call or email us today!");
$title->render();
?>

<!-- Contact Us -->
<section class="paddings">
	<div class="container">
		<div class="row">

			<!-- Contact Form -->
			<div id="contact-wrapper" class="col-md-8">
				<h2>Contact BinaryOps Software Today!</h2>
				<p class="lead">We would love to hear about your project.
					Give us a call or drop us an email to start the conversation.</p>
				<hr class="tall">

				<a id="contactForm" class="header-offset"></a>
				<!-- Tabs -->
				<div class="tabs">
					<!-- Tab nav -->
					<ul class="nav nav-tabs">
						<li class="active"><a href="#contactUs" data-toggle="tab">
								<i class="fa fa-envelope"></i>Contact Us</a>
						</li>
					</ul>
					<!-- End Tab nav -->

					<!-- Tab Content -->
					<div class="tab-content">
						<!-- Tab item -->
						<div class="tab-pane active" id="contactUs">

							<h4>Contact Us</h4>
							<div id="uservoice_success" class="panel panel-success" style="display:none;">
								<div class="panel-heading">
									<h3 class="panel-title">Got it, Thanks!</h3>
								</div>
								<div style="padding:10px;">
									<p>We'll have someone get back to you as soon as possible.
										<br>In the meantime, perhaps one of the following links might be useful or interesting:
										<div class="list-group">
											<a href="/blog/" class="list-group-item">Blog</a>
											<a href="/" class="list-group-item">Home</a>
										</div>
									</p>
								</div>
							</div> <!-- End uservoice_success -->
							<div id="uservoice_error" class="panel panel-danger" style="display:none;">
								<div class="panel-heading">
									<h3 class="panel-title">Ack!</h3>
								</div>
								<div style="padding:10px;">
									<p>Something went wrong posting to our ticketing system.</p>
									<p>While we sort that out, you can use the following link to send your message as an email instead:
										<div class="list-group">
											<a id="uservoice_fallback" href="#" class="list-group-item">Send an email to Support</a>
										</div>
										Thanks, and sorry about that.
									</p>
								</div>
							</div> <!-- End uservoice_error -->
							<form class="form" id="uservoice_contactform">
								<div class="form-group">
									<input class="form-control" type="text" placeholder="Full Name" name="fullname" id="fullname">
								</div>
								<div class="form-group">
									<input class="form-control" type="email" placeholder="Email Address" name="email" id="email">
								</div>
								<div class="form-group">
									<input class="form-control" type="text" placeholder="Phone Number" name="mobile" id="mobile">
								</div>
								<div class="form-group">
									<textarea class="form-control" rows="10" name="message" placeholder="Your Message" id="message"></textarea>
								</div>
								<div class="form-group">
									<p>
										<input id="send-message-btn" class="btn btn-primary btn-lg" type="submit" value="Send Message" />
									</p>
									<span class="loading"></span>
								</div>
							</form>
						</div><!-- End Tab nav -->
					</div><!-- End Tab Content -->
				</div> <!-- End Tabs -->

			</div>
			<!-- End Contact Form -->

			<!-- Sidebars -->
			<div class="col-md-4 sidebars">

				<aside>
					<h4>Our Office</h4>
					<address>
						<i class="fa fa-map-marker"></i><strong>Address:</strong> <br />

						<strong>BinaryOps Software Inc.</strong><br />
						#662 185-911 Yates St.<br />
						Victoria, BC V8V 4Y9<br />
					</address>

					<address>
						<i class="fa fa-envelope"></i> <a href="mailto:info@binaryops.ca"> info@binaryops.ca</a><br />
					</address>
				</aside>

				<aside>
					<a class="twitter-timeline" data-width="300" data-height="450" data-theme="light" data-link-color="#d21c2d" href="https://twitter.com/BinaryOpsCa?ref_src=twsrc%5Etfw">Tweets by BinaryOpsCa</a>
					<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
				</aside>
			</div>
			<!-- End Sidebars -->
		</div>
		<!-- End Container-->
</section>
<!-- End Contact Us-->

<!-- Google Map -->
<div id="map-wrapper-space" class="important-info">
	<div id="map-wrapper">
		<div id="map"></div>
	</div>
</div>
<!-- End Google Map -->

<?php
require_once 'footer.inc.php';
?>

<script>
	// ****************************************************************
	// Submit Contact form directly to email
	// ****************************************************************
	$('#uservoice_contactform').submit(function(evt) {
		evt.preventDefault(); // Don't do default action

		// Grab the data we need to send
		var message = $('#message').val();
		var mobile = $('#mobile').val();
		var subject = "BinaryOps.ca inquiry";
		var name = $('#fullname').val();
		var email = $('#email').val();

		// Execute the JSONP request to submit the ticket
		try {
			$.ajax({
				type: "POST",
				url: 'mailer.php',
				data: {
					message: message,
					subject: subject + " from: " + name,
					name: name,
					mobile: mobile,
					email: email
				},
				success: function(data) {
					//console.log("success", data);
					$('#uservoice_contactform').fadeOut(400, function(evt) {
						$('#uservoice_success').fadeIn(400);
					});
				},
				error: function(d, msg) {
					//console.log("error", d, msg);
					$('#uservoice_contactform').fadeOut(400, function(evt) {
						$('#uservoice_error').fadeIn(400);
						var ref = "mailto:support" + "@binaryops.ca?subject=BinaryOps.ca%20Inquiry%20Email&body=" + encodeURIComponent(message);
						$('#uservoice_fallback').attr("href", ref);
					});
				}
			});
		} catch (err) {
			//console.log(err);
			$('#uservoice_contactform').fadeOut(400, function(evt) {
				$('#uservoice_error').fadeIn(400);
				var ref = "mailto:support" + "@binaryops.ca?subject=BinaryOps.ca%20Inquiry%20Email&body=" + encodeURIComponent(message);
				$('#uservoice_fallback').attr("href", ref);
			});
		}
		return false;
	});
</script>

<!-- htmlmin:ignore -->
</body>

</html>
<!-- htmlmin:ignore -->