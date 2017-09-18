<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['company'])		||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = strip_tags(htmlspecialchars($_POST['name']));
$company = strip_tags(htmlspecialchars($_POST['company']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));

// Create the email and send the message
$to = 'qret@engsoc.queensu.ca'; 
$email_subject = "Website Contact Form:  $name";
$email_body = "Queen's Rocketry Sponsorship Contact.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nCompany: $company\n\n";
$headers = "From: noreply@queensrocketry.ca\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";	
mail($to,$email_subject,$email_body,$headers);
return true;			
?>
