<?php

session_start();
 
if ($_POST['answer']!=$_SESSION['result']) {
  header('Location: /apply-now/form-error/');
  die();
}


/* require_once('recaptchalib.php');
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
if(!isset($_POST['submit']))
{
	//This page should not be accessed directly. Need to submit the form.
	echo "error; you need to submit the form!";
  die();
}
$trial = $_POST['trialname'];
$hear = $_POST['hear'];
$hearother = $_POST['hearother'];
$gender = $_POST['gender'];
$pregnant = $_POST['pregnant'];
$monthspregnant = $_POST['monthspregnant'];
$dateofbirth = $_POST['dob'];
$salutation = $_POST['title'];
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];
$emailaddress = $_POST['email'];
$contactnumber = $_POST['contactnumber'];
$ethnicorigin = $_POST['ethnicorigin'];
$ethnicother = $_POST['ethnicother'];
$passport = $_POST['passport'];
$ni = $_POST['ni'];
$jobstatus = $_POST['jobstatus'];
$occupation = $_POST['occupation'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$town = $_POST['town'];
$city = $_POST['city'];
$postcode = $_POST['postcode'];
$newsletter = $_POST['newsletter'];
$callback = $_POST['callback'];

//Validate first
$email_from = 'nottingham@quotientclinical.com';//<== update the email address
$email_subject = "Quick Application  Form submission";
$email_body = "
A new applicant has submitted their details:

Study code: $trial

Where did you hear about us?: $hear, $hearother

Name: $salutation $firstname $middlename $lastname

Gender: $gender

Are you pregnant & lactating?: $pregnant

Date of birth: $dateofbirth

Address: $address1, $address2, $town, $city, $postcode

Email address: $emailaddress

Telephone number: $contactnumber

Job status: $jobstatus

Occupation: $occupation

Ethnic origin: $ethnicorigin

Passport No.: $passport

National Insurance No.: $ni

Would you like to sign up to our study alerts?: $newsletter

Would you like someone to ring you back and complete a full application form over the phone?: $callback

".
$to = "nottingham@quotientclinical.com,enquiries@awardmarketing.co.uk,sarah@awardmarketing.co.uk,annward071@gmail.com";//<== update the email address
//$to = "garry.bain@gmail.com";//<== update the email address
$headers = "From: $emailaddress \r\n";
$headers .= "Reply-To: $emailaddress \r\n";
//Send the email!


mail($to,$email_subject,$email_body,$headers);
//done. redirect to thank-you page.


/// Send the HTML email to the user
include('sendemail.php');
SendHTMLEMail(4,$emailaddress,$email_from,$email_subject,"Dear",$salutation,$lastname);


 header('Location: /form-thank-you/');
?>