<?php

//ini_set('display_errors',1);
//error_reporting(E_ALL);

session_start();


// prevent from going to Emails
 
/*if ($_POST['answer']!=$_SESSION['result']) {
  header('Location: /apply-now/form-error/');
  die();
}*/


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


// Identify is city is a - then block the whole submission!


//if ($_POST['city'] === "-") {

//$to = "garry.bain@gmail.com,annward071@gmail.com ";
//<== update the email address

//$headers = "From: Spam Detect QUOTIENT CLINICAL Website Form \r\n";
//$headers .= "Reply-To: $email\r\n";
//Send the email!

// this executes from the live site!

//$email_body = "This is a spam detection email as city is entered incorrectly";

//mail($to,$email_subject,$email_body,$headers);

//} else { // else process the form as normal!

if(!isset($_POST['submit'])) {

	//This page should not be accessed directly. Need to submit the form.
	echo "error; you need to submit the form!";
  die();
}


$trial = $_POST['trialname'];
$hear = $_POST['hear'];
$hearother = $_POST['hearother'];
$hearrec = $_POST['hearrec'];
$gender = $_POST['gender'];
$pregnant = $_POST['pregnant'];
$monthspregnant = $_POST['monthspregnant'];
$dobday = $_POST['dob_day'];
$dobmonth = $_POST['dob_month'];
$dobyear = $_POST['dob_year'];
// new date
$dateofbirth = "$dobday/$dobmonth/$dobyear";
// new date
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
$heightfeet = $_POST['feet'];
$heightinches = $_POST['inches'];
$weightstones = $_POST['stones'];
$weightpounds = $_POST['pounds'];
$heightcm = $_POST['height'];
$weightkg = $_POST['weight'];
$feetbmi = $_POST['calcval'];
$metresbmi = $_POST['bmi'];
$bmiknown = $_POST['bmiknown'];
$smoke = $_POST['smoke'];
$smokeamount = $_POST['smokeamount'];
$smokeamountother = $_POST['smokeamountother'];
$lastsmoke = $_POST['lastsmoke'];
$alcohol = $_POST['alcohol'];
$unitsperweek = $_POST['units'];
$studies = $_POST['studies'];
$other_clinics = $_POST['other-clinics'];
$urinetest = $_POST['urinetest'];
$children = $_POST['children'];
$why_children = $_POST['why-children'];
$why_children_other = $_POST['why-children-other'];
$contraception = $_POST['contraception'];
$which_contraception = $_POST['which-contraception'];
$which_contraception_other = $_POST['which-contraception-other'];
$surgery = $_POST['surgery'];
$medication = $_POST['medication'];
$namemedication = $_POST['namemedication'];
$usemedication = $_POST['usemedication'];
$allergies = $_POST['allergies'];
$whichallergies = $_POST['whichallergies'];
$allergies_med = $_POST['allergies-med'];
$allergies_med_details = $_POST['allergies-med-details'];
$anyoperations = $_POST['anyoperations'];
$operation = $_POST['operation'];
$operationdate = $_POST['operationdate'];
$asthma = $_POST['asthma'];
$howlongasthma = $_POST['howlongasthma'];
$ageasthma = $_POST['ageasthma'];
$asthma_medication = $_POST['asthma-medication'];
$asthma_medication_details = $_POST['asthma-medication-details'];
$asthma_clinic = $_POST['asthma-clinic'];
$asthma_clinic_details = $_POST['asthma-clinic-details'];
$diabetes = $_POST['diabetes'];
$diabetestype = $_POST['diabetestype'];
$diabetes_input = $_POST['diabeteshow'];
$liver = $_POST['liver'];
$skin = $_POST['skin'];
$skindetails = $_POST['skindetails'];
$skindetails2 = $_POST['skindetails2'];
$heart = $_POST['heart'];
$stomach= $_POST['stomach'];
$migraines = $_POST['migraines'];
$urinary = $_POST['urinary'];
$nervous = $_POST['nervous'];
$muscle = $_POST['muscle'];
$eye = $_POST['eye'];
$ear = $_POST['ear'];
$tropical = $_POST['tropical'];
$otherproblems = $_POST['otherproblems'];
$medicalMore = $_POST['extraInfoArea'];
$diet = $_POST['diet'];
$diet_other = $_POST['diet-other'];
$clinicaltrial2 = $_POST['clinicaltrial2'];
$newsletter = $_POST['newsletter'];

//Validate first
$email_from = 'nottingham@quotientclinical.com';//<== update the email address
$email_subject = "Full Application Form Submission";
$email_body = "
A new applicant has submitted their details:

Study code: $trial

Where did you hear about us?: $hear, $hearother, $hearrec

----------------------------------- Step 1: Introduction --------------------------------------------

Name: $salutation $firstname $middlename $lastname
Gender: $gender ".($gender != "Male"?" Are you pregnant & lactating?: $pregnant":"")."
Date of birth: $dateofbirth
Address: $address1, $address2, $town, $city, $postcode
Email address: $emailaddress
Telephone number: $contactnumber
Job status: $jobstatus
Occupation: $occupation
Ethnic origin: $ethnicorigin
Passport No.: $passport
National Insurance No.: $ni

------------------------------------- Step 2: Personal Details ----------------------------------------

Height in cm: $heightcm
Weight in KG: $weightkg
Height in Feet / Inches: $heightfeet / $heightinches
Weight in Stone / Pounds: $weightstones / $weightpounds
BMI: $feetbmi $metresbmi $bmiknown

Do you smoke?: ".($smokeamount>0 && $smokeamount!=6?"Yes ":"No ").($smokeamount==6 ? "Quit less than 6 months ago " :($smokeamount == 0 ? "Never or quit more than 6 months ago ":  ($smokemount >0 ?"how many?: ":$smokeamount)))." $smokeamountother
Do you drink alcohol?: $alcohol ".($alcohol=="Yes"?" how many units do you drink per week?: $unitsperweek":"")."
Have you any specific dietary requirements?: $diet
Are you happy to undergo a urine test to check for non-medical drugs?: $urinetest

------------------------------------- Step 3 / Step 4: Medical Assessment ----------------------------------------

Are you able to have children?: ".$children."
".(!children=="No"?"
Can you tell us the reason you cannot have children?: $why_children $why_children_other
":"")."
Do you currently use contraception?: ".($contraception?"Yes":"No")."
".($contraception?"
Can you tell us which form of contraception you use?: $which_contraception $which_contraception_other
":"")."
Have you been registered with a GP in the UK for over 12 months?: ".($surgery?"Yes":"No")."

Are you taking any prescribed or over the counter medication?: $medication ".($medication!='No'?" - $namemedication
How often do you take it?: $usemedication":"")."

Are you suffering from any allergies?: $allergies".($allergies!='No'?"

If yes, please tell us which allergies you have: $whichallergies

Do you take medication to alleviate allergic symptoms?: $allergies_med
".($allergies_med?"If yes, please specify: $allergies_med_details":"")."":"")."

Have you had any operations?: $anyoperations".($anyoperations!='No'?" 
If yes, please specify: $operation  Date (month/year if known): $operationdate":"")."

Have you had / are you suffering from:

Asthma problems?: $asthma".($asthma!='No'?"

  If yes...How long have you suffered with Asthma?: $howlongasthma
  Age of diagnosis: $ageasthma
  Are you currently taking asthma medication?: $asthma_medication
  Name of asthma medication: $asthma_medication_details
  Do you attend an asthma clinic at your GP surgery?: $asthma_clinic
  How often do you attend?: $asthma_clinic_details
  ":"")."

Have you been diagnosed with diabetes?: $diabetes".($diabetes=='Yes'?"
  If yes, which type?: $diabetestype
  If Type II, how is your diabetes controlled?: $diabetes_input
  ":"")."

Have you had / are you suffering from:

Liver problems?: $liver

Skin problems?: $skin".($skin!='No'?" 
  If yes, details: $skindetails $skindetails2
  ":"")."
Heart problems?: $heart

Stomach / bowel problems?: $stomach
 
Migraines?: $migraines

Urinary (including kidney) problems?: $urinary

Nervous system problems?: $nervous

Muscle / bone / joint problems?: $muscle

Eye problems? e.g. glaucoma, retinal detachment etc: $eye

Ear / throat / nose problems?: $ear

Tropical disease? e.g. malaria: $tropical

Any other problems not included above?: $otherproblems


If Yes to any of the above please give more info: $medicalMore

--------------------------------------------------------------------------------------------------------- 

Would you like to sign up to our study alerts?: ".($newsletter?"Yes":"No")."";

//$to = "nottingham@quotientclinical.com,enquiries@awardmarketing.co.uk,sarah@awardmarketing.co.uk,annward071@gmail.com,annwardtest@gmail.com";
$to = "garry.bain@gmail.com,annward071@gmail.com ";
//<== update the email address

$headers = "From: QUOTIENT CLINICAL Website Form \r\n";
$headers .= "Reply-To: $email\r\n";
//Send the email!

// this executes from the live site!


mail($to,$email_subject,$email_body,$headers);



/// Send the HTML email to the user
include('drupal_send.php');
include('sendemail.php');
//SendHTMLEMail(2,$emailaddress,$email_from,$email_subject,"Dear",$salutation,$lastname);

//done. redirect to thank-you page.
 header('Location: /full-application-thank-you/');


?>