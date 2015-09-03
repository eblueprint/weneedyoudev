<?php
//ini_set('display_errors',1);
//error_reporting(E_ALL);

function SendHTMLEmail($body_number = 1,$email,$from,$subject,$greeting,$title,$surname) {

include('Mail.php');
include('Mail/mime.php');


// edit these values to match your database information
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'quotient_live');

/** MySQL database username */
define('DB_USER', 'quotient_live');

/** MySQL database password */
//define('DB_PASSWORD', 'quotient123A');
define('DB_PASSWORD', 'balances123A!');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');


$server = DB_HOST;
$user = DB_USER;
$password = DB_PASSWORD;
$db = DB_NAME;

$con = mysql_connect($server,$user,$password); 

mysql_select_db($db, $con);

// example query
$result = mysql_query( "SELECT wp.*,
(SELECT meta_value FROM wp_postmeta pm WHERE meta_key = 'clinicaltrialinfo_dates' AND pm.post_id = wp.id ) AS dates,
(SELECT meta_value FROM wp_postmeta pm WHERE meta_key = 'clinicaltrialinfo_payment' AND pm.post_id = wp.id ) AS payment,
(SELECT meta_value FROM wp_postmeta pm WHERE meta_key = 'clinicaltrialinfo_short_description' AND pm.post_id = wp.id ) AS description
FROM wp_posts wp WHERE post_type = 'clinicaltrial' AND post_status = 'publish';" );


$postList = '';
// show all posts by author 1 (admin)
while($row = mysql_fetch_array($result)){
    if($row['post_status'] == "publish") {
      $postList .= "".$row['post_title']." <br />";
      $postList .= "".$row['dates']." <br />";
      $postList .= "".$row['payment']." <br />";
      $postList .= "".$row['description']." <br />";
    }
}

mysql_close($con);

$mime = new Mail_mime("\n");

$hdrs = array('From'=>"$from",'Subject'=>"$subject");

$message = file_get_contents('emails/emailbody_'.$body_number.'.html');
$message = str_replace("{greeting}",ucwords($greeting),$message);
$message = str_replace("{title}",ucwords($title),$message);
$message = str_replace("{surname}",ucwords($surname),$message);
$message = str_replace("{list}",$postList,$message);

$mime->setHTMLBody($message);

$message = file_get_contents('emails/emailbody_'.$body_number.'.txt');
$message = str_replace("{greeting}",ucwords($greeting),$message);
$message = str_replace("{title}",ucwords($title),$message);
$message = str_replace("{surname}",ucwords($surname),$message);
$message = str_replace("{list}",$postList,$message);

$mime->setTXTBody(strip_tags("$message"));

$attachment = file_get_contents('images/base.jpg');
$mime->addHTMLImage($attachment,'img/jpg','base.jpg',false,1);
$attachment = file_get_contents('images/bottomline.jpg');
$mime->addHTMLImage($attachment,'img/jpg','bottomline.jpg',false,2);
$attachment = file_get_contents('images/header.jpg');
$mime->addHTMLImage($attachment,'img/jpg','header.jpg',false,3);
$attachment = file_get_contents('images/qc.jpg');
$mime->addHTMLImage($attachment,'img/jpg','qc.jpg',false,4);
$attachment = file_get_contents('images/strapline.jpg');
$mime->addHTMLImage($attachment,'img/jpg','strapline.jpg',false,5);
$attachment = file_get_contents('images/topline.jpg');
$mime->addHTMLImage($attachment,'img/jpg','topline.jpg',false,6);


//	do not ever try to call these lines in reverse order
$body = $mime->get();
$hdrs = $mime->headers($hdrs);
$mail =& Mail::factory('mail');
$result = $mail->send($email, $hdrs, $body);
  if ($result) {
  //	echo "email ok\n";
  } else {
  //	echo "email failed\n";
  }
}