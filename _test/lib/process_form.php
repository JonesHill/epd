<?php

// Simple email validation. 
function isValidEmail($email) {
	return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Constants
define( "RECIPIENT_NAME", "TEST HILL" );
define( "RECIPIENT_EMAIL", "bryceahill@gmail.com" );
define( "EMAIL_SUBJECT", "Appointment Request" );

if(isset($_POST["form_type"])) {
	$form_type = $_POST["form_type"];
}

error_log(print_r($_POST,1));


// NOTE: These will become our variable names for the email message. 
$allowed_fields = array(
	// "first_name",
	// "last_name",
	"name",
	"street_address",
	"city",
	"state",
	"zip",
	"phone",
	"email",
	"comments"
);


$required_fields = array(
	"name", 
	"street_address",
	"city",
	"state",
	"zip",
	"phone",
	"email"
);

$error = false;
$success = false;
$invalid_email = false;


////NEED TO PROTECT THIS SOME HOW< MAKE SUREO SOMEONE SUBMITTED A FORM...
// Make sure the required fields have been submitted. 
foreach($required_fields as $value) {
	if(empty( $_POST[ $value ] )) {
		$error = true;
	}
	else if($value == "email") {
		$error = !isValidEmail($_POST[ $value ]);
		if($error) {
			$invalid_email = true;
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
if(!$error) {
	$to = RECIPIENT_EMAIL;
	$headers = "From: " . RECIPIENT_EMAIL . "\r\n" .
			"Reply-To: " . $email;
	$subject = EMAIL_SUBJECT;
				
	$comments = isset($comments) ? $comments : "";			
	//build body of email
	$body = "Name:  " . $name . "\r\n" .
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
		$q = "&name=".$name."&street_address=".$street."&city=".$city."&state=".$state."&zip=".$zip.
			 "&phone=".$phone."&email=".$email."&comments=".$comments;
		header("Location: ../appointment.php?err=true&inv=".$invalid_email . $q);
	}
	else {
		// Display thank you or whatever. 
		header("Location: ../appointment.php?mail_sent=true");
	}

}



