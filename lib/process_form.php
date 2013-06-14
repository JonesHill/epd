<?php

// Simple email validation. 
function isValidEmail($email) {
	return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Constants
define( "RECIPIENT_NAME", "TEST HILL" );
define( "RECIPIENT_EMAIL", "bryceahill@gmail.com" );


if(isset($_POST["form_type"])) {
	$form_type = $_POST["form_type"];
}

// error_log(print_r($_POST,1));
$name = "";
$first_name = "";
$last_name = "";
$street_address = "";
$city = "";
$state = "";
$zip = "";
$phone = "";
$email = "";
$comments = "";
$message = "";
$location = "";

$overall_rating = "";
$professional_phone = "";
$proper_greet = "";
$friendly_to_child = "";
$cleanliness_expectations = "";
$financial_matters = "";
$refer_us = "";
$better_comments = "";
$positive_comments = "";
$password_input = '';

$errors = array();
$success = false;
$invalid_email = false;
error_log(print_r($_POST,1));
if($_SERVER['REQUEST_METHOD'] == "POST") {

	if($_POST['password_input'] != '') {
		//SPAM BOT ABORT
		error_log("We are getting spammed...");
		return;
	}
	
	switch($form_type) {

		case "appointment":
			// NOTE: These will become our variable names for the email message. 
			$allowed_fields = array(
				"first_name",
				"last_name",
				"street_address",
				"city",
				"state",
				"zip",
				"phone",
				"email",
				"comments"
			);


			$required_fields = array(
				"first_name",
				"last_name",
				"street_address",
				"city",
				"state",
				"zip",
				"phone",
				"email"
			);

			

			// Make sure the required fields have been submitted. 
			foreach($required_fields as $value) {
				if(empty( $_POST[ $value ] )) {
					$errors[] = $value;
				}
				else if($value == "email") {
					$email_error = !isValidEmail($_POST[ $value ]);
					if($email_error) {
						$invalid_email = true;
						$errors[] = $value;
					}
				}
			}

			// Make sure our posted fields are allowed. 
			foreach($_POST as $field_name => $value) {
				if(in_array( $field_name, $allowed_fields )) {
					if($value != "") {
						// Sanitize
						$$field_name = $value; 
					}
					// or  $($field_name)  ?
				}
			}

			// Send out email if no error
			if(count($errors) == 0) {
				$to = RECIPIENT_EMAIL;
				$headers = "From: " . RECIPIENT_EMAIL . "\r\n" .
						"Reply-To: " . $email;
				$subject = "Appointment Request";
							
				$comments = isset($comments) ? $comments : "";			
				//build body of email
				$body = "Name:  " . $first_name . " " . $last_name . "\r\n" .
						"Address: " . $street_address . " " . $city . " " . $state . ", " . $zip . "\r\n" .
						"Phone: " . $phone . "\r\n" .
						"Email: " . $email . "\r\n" .
						"Comments: " . $comments;
								
				$success = mail($to, $subject, $body, $headers);
			}


			if(isset($_GET["ajax"])) {
				echo $success ? "success" : "error";
			}
			else {
				// Form submitted without JS 
				if(!$success) {
					$q = "&first_name=".$first_name."&last_name=".$last_name."&street_address=".$street_address."&city=".$city."&state=".$state."&zip=".$zip.
						 "&phone=".$phone."&email=".$email."&comments=".$comments;
					header("Location: ../contact/schedule-appointment.php?err=true&inv=".$invalid_email . $q);
				}
				else {
					// Display thank you or whatever. 
					header("Location: ../contact/schedule-appointment.php?mail_sent=true");
				}
			}

		break;

		case "feedback":
		// NOTE: These will become our variable names for the email message. 
			$allowed_fields = array(
				"name",
				"overall_rating",
				"professional_phone",
				"proper_greet",
				"friendly_to_child",
				"cleanliness_expectations",
				"financial_matters",
				"refer_us",
				"better_comments",
				"positive_comments"
			);

			$required_fields = array(
				"name"
			);

			// Make sure the required fields have been submitted. 
			foreach($required_fields as $value) {
				if(empty( $_POST[ $value ] )) {
					$errors[] = $value;
				}
				else if($value == "email") {
					$email_error = !isValidEmail($_POST[ $value ]);
					if($email_error) {
						$invalid_email = true;
						$errors[] = $value;
					}
				}
			}

			// Make sure our posted fields are allowed. 
			foreach($_POST as $field_name => $value) {
				if(in_array( $field_name, $allowed_fields )) {
					if($value != "") {
						// Sanitize
						$$field_name = $value; 
					}
					// or  $($field_name)  ?
				}
			}

			// Send out email if no error
			if(count($errors) == 0) {
				$to = RECIPIENT_EMAIL;
				$headers = "From: " . RECIPIENT_EMAIL . "\r\n" .
						"Reply-To: " . $email;
				$subject = "Feedback From Website";
							
				if($overall_rating = "very") { 
					$overall_rating = "Very Satisfied";
				} else if($overall_rating = "avg") {
					$overall_rating = "Satisfied";
				} else if($overall_rating = "somewhat") {
					$overall_rating = "Somewhat Satisfied";
				}	

				if($professional_phone == "idk") {
					$professional_phone = "I don't know";
				}
				//build body of email
				$body  = "Patient Name:  " . $name . "\r\n\r\n";
				$body .= "How would you rate your overall visit? $overall_rating\r\n";
				$body .= "Did the staff treat you professionally on the phone? ".ucfirst($professional_phone)."\r\n";
				$body .= "Did the staff greet you properly? ".ucfirst($proper_greet)."\r\n";
				$body .= "Were the assistants and hygienist's friendly and professional to you and your child? ".ucfirst($friendly_to_child)."\r\n";
				$body .= "Did cleanliness of our practices meet your expectations? ".ucfirst($cleanliness_expectations)."\r\n";
				$body .= "Were your financial matters handled in a timely and well addressed manner? ".ucfirst($financial_matters)."\r\n";
				$body .= "Would you refer your friends and family to us? ".ucfirst($refer_us)."\r\n\r\n";
				$body .= "Please comment on how we could make your visit better: \r\n".$better_comments."\r\n\r\n";
				$body .= "Please feel free to share positive comments here: \r\n".$positive_comments."\r\n\r\n";

								
				$success = mail($to, $subject, $body, $headers);
			}


			if(isset($_GET["ajax"])) {
				echo $success ? "success" : "error";
			}
			else {
				// Form submitted without JS 
				if(!$success) {
					$q = "&name=".$name."&better_comments=".$better_comments."&positive_comments=".$positive_comments;
					header("Location: ../contact/feedback.php?err=true" . $q);
				}
				else {
					// Display thank you or whatever. 
					header("Location: ../contact/feedback.php?mail_sent=true");
				}
			}

		break;

		case "contact":
			// NOTE: These will become our variable names for the email message. 
			$allowed_fields = array(
				"name",
				"phone",
				"email",
				"location",
				"message"
			);

			$required_fields = array(
				"name",
				"phone",
				"email",
				"location"
			);


			// Make sure the required fields have been submitted. 
			foreach($required_fields as $value) {
				if(empty( $_POST[ $value ] )) {
					$errors[] = $value;
				}
				else if($value == "email") {
					$email_error = !isValidEmail($_POST[ $value ]);
					if($email_error) {
						$invalid_email = true;
						$errors[] = $value;
					}
				}
			}

			// Make sure our posted fields are allowed. 
			foreach($_POST as $field_name => $value) {
				if(in_array( $field_name, $allowed_fields )) {
					if($value != "") {
						// Sanitize
						$$field_name = $value; 
					}
					// or  $($field_name)  ?
				}
			}

			// Send out email if no error
			if(count($errors) == 0) {
				$to = RECIPIENT_EMAIL;
				$headers = "From: " . RECIPIENT_EMAIL . "\r\n" .
						"Reply-To: " . $email;
				$subject = "Inquiry from the Website.";
							
				$comments = isset($comments) ? $comments : "";			
				//build body of email
				$body = "Name:  " . $name . "\r\n" .
						"Phone: " . $phone . "\r\n" .
						"Email: " . $email . "\r\n" .
						"Location: " . ucfirst($location) . " Office\r\n\r\n" .
						"Message: " . $message;
								
				$success = mail($to, $subject, $body, $headers);
			}


			if(isset($_GET["ajax"])) {
				echo $success ? "success" : "error";
			}
			else {
				// Form submitted without JS 
				if(!$success) {
					$q = "&name=".$name."&phone=".$phone."&email=".$email."&message=".$message;
					header("Location: ../contact/index.php?err=true&inv=".$invalid_email . $q);
				}
				else {
					// Display thank you or whatever. 
					header("Location: ../contact/index.php?mail_sent=true");
				}
			}
		break;
	}
}
else {
	// Who's hittin my page?
	error_log("Error: Requesting form page without post.");
}

		





