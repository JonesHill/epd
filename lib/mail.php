<?php

// Let's write something to validaite our inputs. 
//
// Returns true or false. 
function validate($input, $type) {
	$return_boolean = false; 

	switch($type) {
		case "alpha":
		break;
	}

	return $return_boolean;
}

// Constants
define( "RECIPIENT_NAME", "TEST HILL" );
define( "RECIPIENT_EMAIL", "bryceahill@gmail.com" );
define( "EMAIL_SUBJECT", "Appointment Request" );

// NOTE: These will become our variable names for the email message. 
$allowed_fields = array(
	"first_name",
	"last_name",
	"mailing_add",
	"city",
	"state",
	"zip",
	"phone",
	"email",
	"comments"
);


$required_fields = array(
	"first_name"  => "First name is required",
	"last_name"   => "Last name is required",
	"mailing_add" => "Mailing address is required",
	"city"  	  => "City is required",
	"state" 	  => "State is required",
	"zip"  		  => "Zip code is required",
	"phone"  	  => "Phone number is required",
	"email"  	  => "Email address is required"
);


// All fields but comments are required. 


$errors = array();

// Make sure the required fields have been submitted. 
foreach($required_fields as $field_name => $error_message) {
	if(empty( $_POST[ $field_name ] )) {
		$errors[] = $error_message;
	}
}

// Make sure our posted fields are allowed. 
foreach($_POST as $field_name => $value) {
	if(in_array( $field_name, $allowed_fields )) {
		if($value != "") {
			$$field_name = $value; 
		}
		// or  $($field_name)  ?
	}
}

// Now, check our errors
if(count($errors) > 0) {

}
else {
	// Send out the email. !

}


// if(isset($_POST["first_name"])) {
// 	$first_name = $_POST["first_name"];
// }

// if(isset($_POST["last_name"])) {
// 	$last_name = $_POST["last_name"];
// }

// if(isset($_POST["mailing_add"])) {
// 	$mailing_add = $_POST["mailing_add"];
// }

// if(isset($_POST["city"])) {
// 	$city = $_POST["city"];
// }

// if(isset($_POST["state"])) {
// 	$state = $_POST["state"];
// }

// if(isset($_POST["zip"])) {
// 	$zip = $_POST["zip"];
// }

// if(isset($_POST["phone"])) {
// 	$phone = $_POST["phone"];
// }

// if(isset($_POST["email"])) {
// 	filtervar($email, FILTER_VALIDATE_EMAIL)
// 	$email = $_POST["email"];
// }

// if(isset($_POST["comments"])) {
// 	$comments = $_POST["comments"];
// }




if(isset($_GET["ajax"])) {
	// AJAX response
}
else {
	// Form submitted without JS 
	// display thank you or whatever. 
}