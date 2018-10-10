<?php $name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$subject = $_POST['subject'];
$formcontent="From: $name \n Message: $message";
$recipient = "info@soc.org.pk";
//$subject = "Contact Form";

$error_message = "";
$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

if(!preg_match($email_exp,$email)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
    die($error_message);
}

$string_exp = "/^[A-Za-z .'-]+$/";
if(!preg_match($string_exp,$name)) {
  	$error_message .= 'The First Name you entered does not appear to be valid.<br />';
    die($error_message);
}

$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
echo "Thank You!";
?>