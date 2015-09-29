<?php

// this deffo executes fine


/* List variables */

#$emailbody ="";
#$emailbody .=$diet;
#mail("garry.bain@gmail.com", "vars", $emailbody);

/*
$trial = $_POST['trialname'];
$hear = $_POST['hear'];
$hearother = $_POST['hearother'];
$hearrec = $_POST['hearrec'];
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
$heightfeet = $_POST['feet'];
$heightinches = $_POST['inches'];
$weightstones = $_POST['stones'];
$weightpounds = $_POST['pounds'];
$heightcm = $_POST['height'];
$weightkg = $_POST['weight'];
$feetbmi = $_POST['calcval'];
$metresbmi = $_POST['bmi'];
$smoke = $_POST['smoke'];
$smokeamount = $_POST['smokeamount'];
$smokeamountother = $_POST['smokeamountother'];
$lastsmoke = $_POST['lastsmoke'];
$alcohol = $_POST['alcohol'];
$nicotine = $_POST['nicotine'];
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
$dietaryrequirements = $_POST['dietaryrequirements'];
$diet_other = $_POST['diet-other'];
$clinicaltrial2 = $_POST['clinicaltrial2'];
$newsletter = $_POST['newsletter'];
*/

//define('DRUPAL_ROOT', "/var/www/vhosts/vps-555798.vps-10.com/admin");
define('DRUPAL_ROOT', "/home/weneedyou/public_html/admindev");
require_once DRUPAL_ROOT . '/includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);


$node = new stdClass(); // Create a new node object
$node->type = "full"; // Or page, or whatever content type you like
node_object_prepare($node); // Set some default values
// If you update an existing node instead of creating a new one,
// comment out the three lines above and uncomment the following:
// $node = node_load($nid); // ...where $nid is the node id

$node->title    = "Application from: $firstname $lastname";
$node->language = LANGUAGE_NONE; // Or e.g. 'en' if locale is enabled
$node->uid = 1; // UID of the author of the node; or use $node->name

#$node->body[$node->language][0]['value']   = $bodytext;
#$node->body[$node->language][0]['summary'] = text_summary($bodytext);
#$node->body[$node->language][0]['format']  = 'filtered_html';

/* Others variables to be inserted */


function protect($inp) { 
    if(is_array($inp)) 
        return array_map(__METHOD__, $inp); 

    if(!empty($inp) && is_string($inp)) { 
        return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp); 
    } 

    return $inp; 
} 


#

//Where did you hear about us

$node->field_where_did_you_hear_about_u['und'][0]['value'] = protect($hear);

// here other field

if($hear == "recommendation") {

    $node->field_hear_other['und'][0]['value'] = protect($hearrec);

} else {

    $node->field_hear_other['und'][0]['value'] = protect($hearother);

}

// Gender

$node->field_gender['und'][0]['value'] = protect($gender);

// Pregnant

$node->field_are_you_pregnant['und'][0]['value'] = protect($pregnant);

// DOB

$node->field_date_of_birth['und'][0]['value'] = protect($dateofbirth);

// DOB NEW

$newdob = str_replace('/', '-', $dateofbirth);
//$newdob .= " 00:00:00";// "2011-05-25 10:35:58"


$originalDate = $newdob; // store the new date which has - replacing the /

$newDate = date("Y-m-d", strtotime($originalDate)); // change the date to the Y-m-d american type

//$originalDate .= " 00:00:00";// "2011-05-25 10:35:58"

$node->field_dob['und'][0]['value'] = $newDate; // store the American type date which is fixed to UK d-m-Y inside Drupal


/*$to = "garry.bain@gmail.com";//<== update the email address
$headers = "VARS \r\n";
$headers .= "Reply-To: $emailaddress \r\n";
//Send the email!
mail($to,$newDate,$newDate,$headers);*/

//$node->field_dob['und'][0]['value'] = 




// Email

$node->field_email['und'][0]['value'] = protect($emailaddress);

// Salutation

$node->field_salutation['und'][0]['value'] = protect($salutation);

// First Name

$node->field_first_name['und'][0]['value'] = protect($firstname);

// Middle Name

$node->field_middle_name['und'][0]['value'] = protect($middlename);

// Last Name

$node->field_last_name['und'][0]['value'] = protect($lastname);

// Preferred Contact Number

$node->field_preferred_contact_number['und'][0]['value'] = protect($contactnumber);

// Ethnic Origin

$node->field_ethnic_origin['und'][0]['value'] = protect($ethnicorigin);

// NI number

$node->field_national_insurance['und'][0]['value'] = protect($ni);

// Passport

$node->field_passport['und'][0]['value'] = protect($passport);

// Your Job Status

$node->field_your_job_status['und'][0]['value'] = protect($jobstatus);

// Occupation

$node->field_occupation['und'][0]['value'] = protect($occupation);

// Address 1

$node->field_address_line_1['und'][0]['value'] = protect($address1);

// Address 2

$node->field_address_line_2['und'][0]['value'] = protect($address2);

// Address 3

$node->field_address_line_3['und'][0]['value'] = protect($town);

// City

$node->field_city['und'][0]['value'] = protect($city);

// Postcode

$node->field_postcode['und'][0]['value'] = protect($postcode);

// Height cm

$node->field_height_cm_['und'][0]['value'] = protect($heightcm);

// Weight kg

$node->field_weight_kg_['und'][0]['value'] = protect($weightkg);

// Height ft

$node->field_height_ft_['und'][0]['value'] = protect($heightfeet);

// Height inches

$node->field_height_inches_['und'][0]['value'] = protect($heightinches);

// Weight stones

$node->field_weight_stones_['und'][0]['value'] = protect($weightstones);

// Weight pounds

$node->field_weight_pounds_['und'][0]['value'] = protect($weightpounds);

// BMI

//if(!empty($bmiknown)) {

//$node->field_bmi['und'][0]['value'] = protect($bmiknown); 

//} else {

// bmi has been caluclated

    if(!empty($metresbmi)) {
$node->field_bmi['und'][0]['value'] = protect($metresbmi); 
} else {
$node->field_bmi['und'][0]['value'] = protect($feetbmi);
}


//}



// Smoke yes/no

$node->field_smoke['und'][0]['value'] = protect($smokeamount);

/*
No Quit less than 6 months ago
No Never or quit more than 6 months ago
Yes 11
Yes 10
*/

// Nicotine yes/no

$node->field_nicotine['und'][0]['value'] = protect($nicotine);

// Alcohol yes/no

$node->field_alcohol['und'][0]['value'] = protect($alcohol);

// Dietary Requirements

$node->field_dietary_requirements['und'][0]['value'] = protect($diet);

// Urine Test

$node->field_urine_test['und'][0]['value'] = protect($urinetest);

// Registered with GP

$node->field_registered_with_gp['und'][0]['value'] = protect($surgery);

// Prescribed Medication

$node->field_prescribed_medication['und'][0]['value'] = protect($medication);

// Med name / how often

$node->field_prescribed_medication_name['und'][0]['value'] = $namemedication .' '. $usemedication;

// Suffering from allergies

$node->field_suffering_from_allergies['und'][0]['value'] = protect($allergies);

// Allergy

$node->field_allergy['und'][0]['value'] = protect($whichallergies);

// Allergy Medication

$node->field_allergy_medication['und'][0]['value'] = protect($allergies_med);

// Operations

$node->field_operations['und'][0]['value'] = protect($anyoperations);

// Operation Details

$node->field_operation_details['und'][0]['value'] = $operation .' '. $operationdate;

// Asthma Problems

$node->field_asthma_problems['und'][0]['value'] = protect($asthma);

// Asthma How Long (details)

$node->field_asthma_details['und'][0]['value'] = protect($howlongasthma);

// Asthma Diagnosis Age

$node->field_asthma_diagnosis_age['und'][0]['value'] = protect($ageasthma);

// Asthma Medication yes/no

$node->field_asthma_medication['und'][0]['value'] = protect($asthma_medication);

// Asthma Medication name

$node->field_name_of_asthma_medication['und'][0]['value'] = protect($asthma_medication_details);

// Asthma Clinic

$node->field_asthma_clinic['und'][0]['value'] = protect($asthma_clinic);

// Asthma Clinic Attendance

$node->field_asthma_clinic_attendance['und'][0]['value'] = protect($asthma_clinic_details);

// Diabetes yes no

$node->field_diabetes_diagnosis['und'][0]['value'] = protect($diabetes);

// Diabetes Type

$node->field_diabetes_type['und'][0]['value'] = protect($diabetestype);

// Diabetes Controlled

$node->field_diabetes_controlled['und'][0]['value'] = protect($diabetes_input);

// Liver Problems

$node->field_liver_problems['und'][0]['value'] = protect($liver);

// Skin Problems

$node->field_skin_problems['und'][0]['value'] = protect($skin);

// Skin Details

$node->field_skin_details['und'][0]['value'] = protect($skindetails);

// Skin Severity

$node->field_skin_severity['und'][0]['value'] = protect($skindetails2);

// Heart Problems

$node->field_heart_problems['und'][0]['value'] = protect($heart);

// Stomach bowel problems

$node->field_stomach_bowel_problems['und'][0]['value'] = protect($stomach);

// Suffer from mirgraines

$node->field_suffer_from_migraines['und'][0]['value'] = protect($migraines);

// Urinary kidney problems

$node->field_urinary_kidney_problems['und'][0]['value'] = protect($urinary);

// Nervous system problems

$node->field_nervous_system_problems['und'][0]['value'] = protect($nervous);

// Muscle bone joint problems

$node->field_muscles_bone_joint_problem['und'][0]['value'] = protect($muscle);

// Eye problems

$node->field_eye_problems['und'][0]['value'] = protect($eye);

// Ear throat nose problems

$node->field_ear_throat_nose_problems['und'][0]['value'] = protect($ear);

// Tropical diseases

$node->field_tropical_diseases['und'][0]['value'] = protect($tropical);

// Any other problems

$node->field_any_other_problems['und'][0]['value'] = protect($otherproblems);

// Problem details

$node->field_problem_details['und'][0]['value'] = protect($medicalMore);


// End of fields


# $node->field_test['und'][0]['value'] = $ethnicorigin;


// I prefer using pathauto, which would override the below path
$path = 'node_created_on' . date('YmdHis');
$node->path = array('alias' => $path);

if($node = node_submit($node)) { // Prepare node for saving
    node_save($node);
    echo "Node with nid " . $node->nid . " saved!\n";
}



?>
