<?php

session_start();

if ($_POST['answer']!=$_SESSION['result']) {
 // header('Location: /apply-now/form-error/');
 // die();
}


/*
 require_once('recaptchalib.php');
 $privatekey = "6LeeuNQSAAAAAKqTRF9s_YziJ4ZBvql-QKRfgJx3";
 $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
    die ("The reCAPTCHA wasn't entered correctly. Please go back and try it again.") ."(reCAPTCHA said: " . $resp->error . ")";
  } 

*/
ob_start();
if(!isset($_POST['Submit']))
{
	//This page should not be accessed directly. Need to submit the form.
	echo "error; you need to submit the form!";
}
$trial = $_POST['clinicaltrial'];
$dateofbirth = $_POST['dob'];
$salutation = $_POST['title'];
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$volnumber = $_POST['volnumber'];
//Validate first
$email_from = 'nottingham@quotientclinical.com';//<== update the email address
$email_subject = "Existing Volunteer Form submission - Study: $trial";
$email_body = "
An existing volunteer has submitted their details for new trial:

Study code: $trial

Name: $salutation $firstname $middlename $lastname

Date of birth: $dateofbirth

Volunteer Number: $volnumber

Email address: $email


";
$to = "nottingham@quotientclinical.com,enquiries@awardmarketing.co.uk,webmaster@weneedyou.co.uk";//<== update the email address
//$to = "garry.bain@gmail.com";//<== update the email address
$headers = "From: QUOTIENT CLINICAL Website Form <quotientwebsite@weneedyou.co.uk> \r\n";
$headers .= "Reply-To: $emailaddress \r\n";
//Send the email!

//mail("garry.bain@gmail.com", "this is executing66666", "this is executing666666");


mail($to,$email_subject,$email_body,$headers);



//done. redirect to thank-you page.

/// Send the HTML email to the user
//include('drupal_send_exist.php');
include('sendemail.php');
//SendHTMLEMail(1,$email,$email_from,$email_subject,"Dear",$salutation,$lastname);

header('Location: /existing-volunteers-thank-you/');
?>