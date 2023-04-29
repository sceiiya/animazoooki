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


    $qSelect = "SELECT * FROM $dbDatabase .`clients` ORDER BY `id` DESC";
    $eSelect = mysqli_query($dbConnection, $qSelect);

    if ($eSelect == true) {
        try {

            $ofile = fopen("../../reports/csv/customers.csv", "wa+");

            fwrite($ofile, "ID, Name, Username, Email, Password, Contact No., Shipping Add., Billing Add.s, Country, Total Orders, Total Reviews, Theme, Status, Date Added, Date Modified, OTP Code, Date Last Login, Newsletter, Profile Image\n");
            while($rows = mysqli_fetch_assoc($eSelect)) {
                fwrite($ofile, '"'.$rows['id'].'","'.$rows['name'].'","'.$rows['username'].'","'.$rows['email'].'","'.$rows['password'].'","'.$rows['contactno'].'","'.$rows['default_shipping_address'].'","'.$rows['billing_address'].'","'.$rows['Country'].'","'.$rows['total_orders'].'","'.$rows['total_reviews'].'","'.$rows['theme'].'","'.$rows['status'].'","'.$rows['date_added'].'","'.$rows['date_modified'].'","'.$rows['otp_code'].'","'.$rows['date_last_login'].'","'.$rows['newsletter'].'","'.$rows['profile_img'].'"');
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
                        $mail->AddAttachment("../../reports/csv/customers.csv");
                    
                        $mail->Subject = "Customers Report";
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