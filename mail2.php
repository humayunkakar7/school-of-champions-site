<?php $name = $_POST['name'];
$email = $_POST['email'];
$subject = "Admission Form";
$guardian_name = $_POST['guardian_name'];
$cnic = $_POST['cnic'];
$p_number = $_POST['p_number'];
$s_number = $_POST['s_number'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$grade = $_POST['grade'];
$school_name = $_POST['school_name'];
$timing = $_POST['timing'];
$english_class = $_POST['english_class'];
$address = $_POST['address'];
$toi = $_POST['toi'];
$hobbies = $_POST['hobbies'];
$formcontent ="Name: $name \n Email: $email \n Father/Guardian Name: $guardian_name \n Guardian's CNIC #: $cnic \n Primary Phone #: $p_number \n Secondary Phone #: $s_number \n Date of Birth: $dob \n Gender: $gender \n Class: $grade \n School Name: $school_name \n Tution Timings: $timing \n Interested in English Classes: $english_class \n Address: $address \n Topics of Interest: $toi \n Hobbies: $hobbies ";

$recipient = "admissions@soc.org.pk";
//$subject = "Contact Form";

$error_message = "";
$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

if(!preg_match($email_exp,$email)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
    die($error_message);
}

$string_exp = "/^[A-Za-z .'-]+$/";
if(!preg_match($string_exp,$name)) {
  	$error_message .= 'The name you entered does not appear to be valid.<br />';
    die($error_message);
}

if(!preg_match($string_exp,$guardian_name)) {
  	$error_message .= 'The guardian name you entered does not appear to be valid.<br />';
    die($error_message);
}

if(!preg_match($string_exp,$toi)) {
  	$error_message .= 'You entered invalid data in your topics of interest!<br />';
    die($error_message);
}
if(!preg_match($string_exp,$hobbies)) {
  	$error_message .= 'You entered invalid data in your Hobbies Section!<br />';
    die($error_message);
}

$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
echo "Thank You!";
?>

