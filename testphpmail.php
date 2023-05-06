<?php

// require 'PHPMailer/src/Exception.php';
// require 'PHPMailer/src/PHPMailer.php';
// require 'PHPMailer/src/SMTP.php';
include("controllers/important/connect_DB.php");

$qSelect = "SELECT * FROM $dbDatabase .`products` ORDER BY id DESC";
$eSelect = mysqli_query($dbConnection, $qSelect);


$ofile = fopen("reports/csv/products.csv", "wa+");

fwrite($ofile, "ID, Name, Category, Series, Price, Image, Stocks, Reviews, Ratings, Sizes, Variations, Sold, Description, Designer, Manufacturer, Date Added, Added By, Date Archived, Archived By, Date Modified, Modified By\n");
while($rows = mysqli_fetch_assoc($eSelect)) {
    fwrite($ofile, '"'.$rows['id'].'","'.$rows['name'].'","'.$rows['category'].'","'.$rows['series'].'","'.$rows['price'].'","'.str_replace(',','',$rows['images']).'","'.$rows['stocks'].'","'.$rows['reviews'].'","'.$rows['ratings'].'","'.str_replace(',','',$rows['sizes']).'","'.str_replace(',','',$rows['variation']).'","'.$rows['sold'].'","'.$rows['description'].'","'.$rows['designer'].'","'.$rows['manufacturer'].'","'.$rows['date_added'].'","'.$rows['added_by'].'","'.$rows['date_archived'].'","'.$rows['archived_by'].'","'.$rows['date_modified'].'","'.$rows['modified_by'].'"');
    fwrite($ofile, "\n");
}
fclose($ofile);

//Load Composer's autoloader
require 'vendor/autoload.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



//Create an instance; passing true enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                  
    include('controllers/important/connect_Email.php');             //Enable SMTP authentication
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS

    //Recipients
    $mail->setFrom('support@animazoooki.wd49p.com', 'MailerSceiiya');
    // $mail->addAddress('coronapungal111@gmail.com', 'Joe User');     //Add a recipient
    // $mail->addAddress('coronapungal111@gmail.com');               //Name is optional
    $mail->addReplyTo('coronapungal111@gmail.com', 'Information');
    $mail->addCC('coronapungal111@gmail.com');
    $mail->addBCC('coronapungal111@gmail.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->AddAttachment("reports/csv/products.csv");
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Products Report";
    $mail->Body = nl2br("
    See attached document for the report.
    
    ");
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}