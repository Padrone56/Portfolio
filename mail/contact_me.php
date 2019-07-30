<?php
// Check for empty fields
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// Create the email and send the message
$to = "http://formspree.io/rheynsza@gmail.com"; 
$subject = "Portfolio Contact Form:  $name";
$body = "You have received a new message from your portfolio contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email\n\nPhone: $phone\n\nMessage:\n$message";
$header = "From: noreply@portfolio.com\n"; 
$header .= "Reply-To: $email";	

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
