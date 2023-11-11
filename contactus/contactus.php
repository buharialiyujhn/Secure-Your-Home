<?php
// load the Swift Mailer library
require '../vendor/autoload.php';

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// create a new MySQL connection
$connection = new mysqli(
  'localhost',
  'root',
  '',
  'secure_home',
  '3306'
);

// check if the connection was successful
if ($connection->connect_error) {
  die('Error connecting to database: ' . $connection->connect_error);
}

// create the email message
$email_message = (new Swift_Message())
  ->setFrom(['yuvasriravi.b2017@gmail.com' => 'Secure Your Home'])
  ->setTo(['yuvasriravi.b2017@gmail.com' => 'Secure Your Home'])
  ->setSubject('Contact Form Submission')
  ->setBody(sprintf("Name: %s\nEmail: %s\nMessage: %s", $name, $email, $message));

// create the mailer instance
$transport = new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl');
$transport->setUsername('yuvasriravi.b2017@gmail.com');
$transport->setPassword('qukwgpfuidkupfic');
$mailer = new Swift_Mailer($transport);

// send the email
$result = $mailer->send($email_message);

// check if the email was sent successfully
if ($result) {
  // save the form data to the database
  $query = sprintf('INSERT INTO contactus (name, email, message) VALUES ("%s", "%s", "%s")',
    $name, $email, $message
  );
  $result = $connection->query($query);

  // check if the query was successful
  if ($result) {
    echo 'Success';
  } else {
    http_response_code(500);
    echo 'Error saving to database.';
  }
} else {
  http_response_code(500);
  echo 'Error sending email.';
}

// close the database connection
$connection->close();
?>
