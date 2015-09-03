<?php
session_start();

if ($_POST['answer']!=$_SESSION['result'] && $_GET['answer']!=$_SESSION['result']) {
  if ($_GET['question']) {
	$question = urldecode($_GET['question']);
	eval("\$answer = $question;");
	if ($answer == $_GET['answer']) {
 	   echo 'SUCCESS';
	} else {
	    echo 'FAILED'; 
	}
  } else {
   echo 'FAILED'; 
}
    
} else {
  echo 'SUCCESS';
}
?>