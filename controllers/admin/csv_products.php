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
        require '../../vendor/autoload.php';
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;

    if ($eSelect == true) {
        try {
                //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);
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
                $mail->addAddress($admEmail, $admUsername);     

                //Attachments
                $mail->addAttachment('../../reports/csv/products.csv');         
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = "Products Report as CSV File";
                $mail->Body    = nl2br("
                                 See attached document for the report.
                ");
                    if(!$mail->Send()) {
                        echo "Email not sent!";
                    } else {
                        echo "Email sent!";
                    }
            mysqli_close($dbConnection);
        } catch(Exception $e) {
            echo "error";
        }
    } else {
        echo "Failed to connect, please call system administrator!";
    }
