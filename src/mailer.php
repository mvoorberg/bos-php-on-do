<?php

    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] != "POST") {
		// Not a POST request, set a 403 (forbidden) response code.
		http_response_code(403);
		$err = ['error' =>  "There was a problem with your submission, please try again."];
		echo json_encode($err);
		exit;
	}

	// Get the form fields and remove whitespace.
	$name = strip_tags(trim($_POST["name"]));
	$name = str_replace(array("\r","\n"),array(" "," "),$name);

	$subject = strip_tags(trim($_POST["subject"]));
	$subject = str_replace(array("\r","\n"),array(" "," "),$subject);

	$mobile = strip_tags(trim($_POST["mobile"]));
	$mobile = str_replace(array("\r","\n"),array(" "," "),$mobile);

	$description = strip_tags(trim($_POST["description"]));
	$description = str_replace(array("\r","\n"),array(" "," "),$description);

	$abtest = strip_tags(trim($_POST["abtest"]));
	$abtest = str_replace(array("\r","\n"),array(" "," "),$abtest);

	$pageurl = strip_tags(trim($_POST["pageurl"]));
	$pageurl = str_replace(array("\r","\n"),array(" "," "),$pageurl);

	$email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);

	$message = trim($_POST["message"]);

	$postData = ['name' => $name,
					'email' => $email,
					'subject' => $subject,
					'message' => $message];

	// Check that data was sent to the mailer.
	if (empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
	    // Set a 400 (bad request) response code and exit.
	    http_response_code(400);
		$postData['error_message'] = "Oops! There was a problem with your submission. Please complete the form and try again.";
	    echo json_encode($postData);
	    exit;
	}

	// Build the email content.
	$email_content = "";
	$email_content .= "$message\n";
	$email_content .= "\n"; // spacer
	$email_content .= "Name: $name\n";
	$email_content .= "Email: $email\n";
	$email_content .= "Mobile: $mobile\n";
	$email_content .= "\n"; // spacer
	$email_content .= "URL: $pageurl\n";
	$email_content .= "Description: $description\n";
	$email_content .= "AB Test: $abtest\n";
	$email_content .= "\n"; // spacer
	$email_content .= "\n"; // spacer
	$email_content .= "__________________________________________________________\n";
	$email_content .= "This inquiry was sent from the BinaryOps.ca mailer script.\n";

	// Build the email headers.
	$email_headers = "From: $name <$email>";

	// Set the recipient email address.
	$recipient = "admin@binaryops.ca";

	// Send the email.
	if (mail($recipient, $subject, $email_content, $email_headers)) {
	    // Set a 200 (success) response code.
	    http_response_code(200);
		$postData['success_message'] = "Thank You! Your message has been sent.";
	    echo json_encode($postData);
	} else {
	    // Set a 500 (internal server error) response code.
	    http_response_code(500);
		$postData['error_message'] = "Oops! Something went wrong and we couldn't send your message.";
	    echo json_encode($postData);
	}
