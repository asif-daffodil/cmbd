<?php
// email
$to = "lecturer@dipti.com.bd";
$subject = "Test mail";
$message = "Hello! This is a simple email message.";
$from = "asif@dti.ac";
$headers = "From: $from";
$sendEmail = mail($to, $subject, $message, $headers);

if ($sendEmail) {
    echo "Email sent successfully";
} else {
    echo "Email not sent";
}
