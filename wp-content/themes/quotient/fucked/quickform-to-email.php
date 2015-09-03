<?php
ob_start();
if(!isset($_POST['submit']))
{
	//This page should not be accessed directly. Need to submit the form.
	echo "error; you need to submit the form!";
}
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
//Validate first
if(empty($gender))
{
    echo "Please Select Gender";
    exit;
}
if(IsInjected($email))
{
    echo "Bad email value!";
    exit;
}
$email_from = 'daniel@danieleast.co.uk';//<== update the email address
$email_subject = " New Quick Application Form Submission";
$email_body = '
A new applicant has submitted their details:

NAME: $salutation $firstname $middlename $lastname

GENDER: $gender

DOB: $dateofbirth

ADDRESS: $address1, $address2, $town, $city, $postcode

EMAIL: $emailaddress

TEL: $contactnumber

JOB STATUS: $jobstatus

OCCUPATION: $occupation

ETHNIC ORIGIN: $ethnicorigin

PASSPORT NO.: $passport

NATIONAL INSURANCE NO.: $ni

NEWSLETTER: $newsletter

';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

//$to = "daniel@danieleast.co.uk";//<== update the email address
//$to = "garry.bain@gmail.com";//<== update the email address
$headers = "From: $emailadress \r\n";
$headers .= "Reply-To: $emailaddress \r\n";
//Send the email!
mail($to,$email_subject,$email_body);

//done. redirect to thank-you page.
?>
<?php header('Location: http://www.weneedyou.co.uk/form-thank-you/');?>
<?php
// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}

?>