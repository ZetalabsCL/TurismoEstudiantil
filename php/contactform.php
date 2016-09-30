<?php

 // ++++++++++++++++++++++++++++++++++++
error_reporting(0);

  
 // configuration
 
$email_it_to = "contacto@turismoestudiantil.cl";

$error_message = "Por favor, complete el formulario primero";

$rnd=$_POST['rnd'];
$name=$_POST['name'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$body=$_POST['body'];

  
if(!isset($rnd) || !isset($name) || !isset($email) || !isset($subject) || !isset($body)) {
	echo $error_message;
    die();
}


$subject = stripslashes($subject);
$email_from = $email;

$email_message = "Mensaje enviado por '".stripslashes($name)."', email:".$email_from;
$email_message .=" on ".date("d/m/Y")."\n\n";
$email_message .= stripslashes($body);
$email_message .="\n\n";

// Always set content-type when sending HTML email


$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8". "\r\n";
$headers .= 'Desde: '.stripslashes($name);

//$headers .= 'From: <'.$email_from.'>' . "\r\n";

mail($email_it_to,$subject,$email_message,$headers);



?>