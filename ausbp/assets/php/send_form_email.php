<?php
if(isset($_POST['email'])) {

// EDIT THE 2 LINES BELOW AS REQUIRED
$email_to = "csi.query.reg@gmail.com";
$email_subject = "test";
function died($error) {
// your error code can go here
echo "We are very sorry, but there were error(s) found with the form you submitted. ";
echo "These errors appear below.<br /><br />";
echo $error."<br /><br />";
echo "Please go back and fix these errors.<br /><br />";
die();
}

// validation expected data exists

$first_name = $_POST['first_name']; // required
$last_name = $_POST['last_name']; // required
$email_from = $_POST['email']; // required
$telephone = $_POST['telephone']; // not required
$comments = $_POST['comments']; // required

$email_message .= "First Name: ". $first_name ."\n";
$email_message .= "Last Name: ". $last_name ."\n";
$email_message .= "Email: ". $email_from ."\n";
$email_message .= "Telephone: ". $telephone ."\n";
$email_message .= "Comments: ". $comments ."\n";


// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
header("Location: http://www.csidjscoe.com/");
  ?>

<!-- include your own success html here -->

Thank you for contacting us. We will be in touch with you very soon.

<?php

}
?>