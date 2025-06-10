<?php
	define("BINARYOPS_INCLUDE", 'true');
	define("BINARYOPS_TITLE", 'Contact our Full Stack consultancy');

    define("BINARYOPS_META_DESCRIPTION", "We would love to hear from you! Begin your next project right, contact BinaryOps Software and let's start the conversation!");
    define("BINARYOPS_META_CANONICAL", "/contact");

	require_once '../abtest.inc.php';
    // Define the AB test variations and assign a weight to each.
    $values['A'] = 3;
    $values['B'] = 7;
    $values['C'] = 10;
    $values['Z'] = 0;  // Zero weight is NEVER selected 

    bosABTest('lp', $values);

    // define("BINARYOPS_AB_TEST", $abCookie);
    // define("BINARYOPS_AB_COUNTER", $visitCounter);

    define("BINARYOPS_SHOW_NAV", false);
	require_once '../header.inc.php';
	require_once '../title.inc.php';

        // $title = new TitleSection("Contact Us", "Call or email us today!");
        // $title->render();
?>

    <div class="container-fluid landing-container" style="xheight:550px;">
        <div class="container">
            <div class="row">

                <!-- Sidebars -->
                <div class="col-md-8 sidebars">



<?php if (BINARYOPS_AB_TEST === 'lp-A') { ?>
    <h1>Contact the experts at BinaryOps Software!</h1>
        <h3>We would love to hear about your project.
                        Give us a call or drop us an email to start the conversation.</h3>

<?php } else if (BINARYOPS_AB_TEST === 'lp-B') { ?>
    <h1>Speak with our expert Node.js Developers Today!</h1>
        <h3>Give us a call or drop us an email to start the conversation.</h3>

<?php } else { // BINARYOPS_AB_TEST === 'C' ?>
    <h1>Contact BinaryOps Software Today!</h1>
        <h3>We would love to hear about your project.
                        Give us a call or drop us an email to start the conversation.</h3>
<?php } ?>

        <!--
            bla bla, lots of experience, keepng our technical skills up to date. We now deliver software solutions using
            the latest technology and devOps methods.
             
            We have been solving complex problems for many years! We have probably seen a variation of your specific
            problem before. Drop us line <email or phone number here> and we'll let you know how we solved a problem
            like yours in the past. Free, no strings attached.

            -->
                </div><!-- End Sidebars -->

                <!-- Content Right -->
                <div id="contact-wrapper" class="col-md-4">
                    <!-- Tabs -->
                    <div class="tabs">
                        <!-- Tab Content -->
                        <div class="tab-content tab-content-top" style="background-color:#fff;">
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
                                        <p>Something went wrong sending your message through our system.</p>
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
                                        <input id="send-message-btn" class="btn btn-primary btn-block" type="submit" value="Send Message" />
                                        <span class="loading"></span>
                                    </div>
                                </form>
                            </div><!-- End Tab nav -->
						</div><!-- End Tab Content -->
					</div><!-- End Tabs -->
                </div><!-- End Content Right -->
            </div>
        </div>
        <div class="landing-container" id="imageContainer">
            <img src="/img/slide/slides/2.jpg" alt="Deliver Great Software">
        </div>
    </div>
    <!-- Following empty container fixes footer overlap! -->
    <div class="container"></div>

<?php

        // <!-- Contact Us -->
        // <section class="paddings">
        //     <div class="container">
        //         <div class="row">



        //         </div>
        //     </div>
        //     <!-- End Container-->
        // </section>
        // <!-- End Contact Us-->

	require_once '../footer.inc.php';
?>

    <script>
		// ****************************************************************
		// Submit Contact form directly to email
		// ****************************************************************
		$('#uservoice_contactform').submit(function(evt) {
			evt.preventDefault();  // Don't do default action

			// Grab the data we need to send
			var message = $('#message').val();
			var mobile = $('#mobile').val();
			var subject = "BinaryOps.ca inquiry";
			var name = $('#fullname').val();
			var email = $('#email').val();

			// Execute the JSONP request to submit the ticket
			//contentType: 'application/json; charset=utf-8',
			try {
				$.ajax({
					type: "POST",
					url: '/mailer.php',
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
