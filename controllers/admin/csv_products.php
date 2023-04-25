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

    if ($eSelect == true) {
        try {

            $ofile = fopen("../../reports/csv/products.csv", "wa+");

            fwrite($ofile, "ID, Name, Category, Series, Price, Image, Stocks, Reviews, Ratings, Sizes, Variations, Sold, Description, Designer, Manufacturer, Date Added, Added By, Date Archived, Archived By, Date Modified, Modified By\n");
            while($rows = mysqli_fetch_assoc($eSelect)) {
                fwrite($ofile, '"'.$rows['id'].'","'.$rows['name'].'","'.$rows['category'].'","'.$rows['series'].'","'.$rows['price'].'","'.str_replace(',','',$rows['images']).'","'.$rows['stocks'].'","'.$rows['reviews'].'","'.$rows['ratings'].'","'.str_replace(',','',$rows['sizes']).'","'.str_replace(',','',$rows['variation']).'","'.$rows['sold'].'","'.$rows['description'].'","'.$rows['designer'].'","'.$rows['manufacturer'].'","'.$rows['date_added'].'","'.$rows['added_by'].'","'.$rows['date_archived'].'","'.$rows['archived_by'].'","'.$rows['date_modified'].'","'.$rows['modified_by'].'"');
                fwrite($ofile, "\n");
            }
            fclose($ofile);

            require_once('../../phpmailer/class.phpmailer.php');

                        $mail = new PHPMailer();
                        
                        $mail->IsSMTP();
                        $mail->SMTPAuth 	= true;
                    
                        $mail->Host 	  = 'smtp.hostinger.com';
                        include("../important/connect_Email.php");
                        $mail->FromName   = "System Administrator";
                        $mail->SMTPSecure = 'ssl';
                        $mail->Port 	  = 465;                        
                        
                        $mail->AddAddress($admEmail, $admUsername);
                        $mail->AddAttachment("../../reports/csv/products.csv");
                    
                        $mail->Subject = "Products Report";
                        $mail->Body = nl2br("
                        See attached document for the report.
                        
                        ");
                        
                        $mail->IsHTML(true);

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