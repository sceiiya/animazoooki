<?php
    include("../important/connect_DB.php");

    session_start();

    if(!isset($_SESSION['admusername'])){
        header('Location: /admin/index.php');
    }else if($_SESSION['admaccess'] == 'Agent'){
        header('Location: /admin/index.php');
    }else {
        $admAccess = $_SESSION['admaccess'];
        $admUsername = $_SESSION['admusername'];
        $admId = $_SESSION['admid'];    
        $admFirstName = $_SESSION['admfirstname'];
        $admLastName = $_SESSION['admlastname'];
        $admEmail = $_SESSION['admemail'];
    }


    $qSelect = "SELECT * FROM $dbDatabase .`products` ORDER BY `id` DESC";
    $eSelect = mysqli_query($dbConnection, $qSelect);

    $ofile = fopen("../../reports/csv/products.csv", "wa+");

    fwrite($ofile, "ID, Name, Category, Series, Price, Image, Stocks, Reviews, Ratings, Sizes, Variations, Sold, Description, Designer, Manufacturer, Date Added, Added By, Date Archived, Archived By, Date Modified, Modified By\n");
    while($rows = mysqli_fetch_assoc($eSelect)) {
        fwrite($ofile, '"'.$rows['id'].'","'.$rows['name'].'","'.$rows['category'].'","'.$rows['series'].'","'.$rows['price'].'","'.str_replace(',','',$rows['images']).'","'.$rows['stocks'].'","'.$rows['reviews'].'","'.$rows['ratings'].'","'.str_replace(',','',$rows['sizes']).'","'.str_replace(',','',$rows['variation']).'","'.$rows['sold'].'","'.$rows['description'].'","'.$rows['designer'].'","'.$rows['manufacturer'].'","'.$rows['date_added'].'","'.$rows['added_by'].'","'.$rows['date_archived'].'","'.$rows['archived_by'].'","'.$rows['date_modified'].'","'.$rows['modified_by'].'"');
        fwrite($ofile, "\n");
    }
    fclose($ofile);

                // require 'PHPMailer/src/Exception.php';
                // require 'PHPMailer/src/PHPMailer.php';
                // require 'PHPMailer/src/SMTP.php';

                //Load Composer's autoloader
                require '../../vendor/autoload.php';

                //Import PHPMailer classes into the global namespace
                //These must be at the top of your script, not inside a function
                use PHPMailer\PHPMailer\PHPMailer;
                use PHPMailer\PHPMailer\SMTP;
                use PHPMailer\PHPMailer\Exception;

    if ($eSelect == true) {
        try {

            // require_once('../../phpmailer/class.phpmailer.php');

            //             $mail = new PHPMailer();
                        
            //             $mail->IsSMTP();
            //             $mail->SMTPAuth 	= true;
                    
            //             $mail->Host 	  = 'smtp.hostinger.com';
            //             include("../important/connect_Email.php");
            //             $mail->FromName   = "System Administrator";
            //             $mail->SMTPSecure = 'ssl';
            //             $mail->Port 	  = 465;                        
                        
            //             $mail->AddAddress($admEmail, $admUsername);
            //             $mail->AddAttachment("../../reports/csv/products.csv");
                    
            //             $mail->Subject = "Products Report";
            //             $mail->Body = nl2br("
            //             See attached document for the report.
                        
            //             ");
                        
            //             $mail->IsHTML(true);

            //             if(!$mail->Send()) {
            //                 echo "Email not sent!";
            //             } else {
            //                 echo "Email sent!";
            //             }



                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);

                // try {
                    //Server settings
                    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                
                    $mail->isSMTP();                                         
                    $mail->Host       = 'smtp.hostinger.com';                
                    $mail->SMTPAuth   = true;                  
                    include('../important/connect_Email.php');             
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         
                    $mail->Port       = 465;                                 

                    //Recipients
                    $mail->setFrom('support@animazoooki.wd49p.com', 'System Administrator');
                    $mail->addAddress($admEmail, $admUsername);     //Add a recipient

                    //Attachments
                    $mail->addAttachment('../../reports/csv/products.csv');         //Add attachments

                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = "Products Report as CSV File";
                    $mail->Body    = nl2br("
                                 See attached document for the report.
                                
                                 ");
                    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    if(!$mail->Send()) {
                        echo "Email not sent!";
                    } else {
                        echo "Email sent!";
                    }
                // } catch (Exception $e) {
                //     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                // }
                        mysqli_close($dbConnection);
        } catch(Exception $e) {
            echo "error";
        }
    } else {
        echo "Failed to connect, please call system administrator!";
    }
