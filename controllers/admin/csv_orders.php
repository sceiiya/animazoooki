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


    $qSelect = "SELECT * FROM $dbDatabase .`orders` ORDER BY `orderid` DESC";
    $eSelect = mysqli_query($dbConnection, $qSelect);

    if ($eSelect == true) {
        try {

            $ofile = fopen("../../reports/csv/orders.csv", "wa+");

            fwrite($ofile, "Order ID, User ID, Product Code, Product Name, Order Total, Product Quantity, Payment Method, Shipping Method, date_ordered, Order Status, Date Delivered\n");
            while($rows = mysqli_fetch_assoc($eSelect)) {
                fwrite($ofile, '"'.$rows['orderid'].'","'.$rows['user_id'].'","'.$rows['product_code'].'","'.$rows['product_name'].'","'.$rows['order_total'].'","'.$rows['product_quantity'].'","'.$rows['payment_method'].'","'.$rows['shipping_method'].'","'.$rows['date_ordered'].'","'.$rows['order_status'].'","'.$rows['date_delivered'].'"');
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
                        $mail->AddAttachment("../../reports/csv/orders.csv");
                    
                        $mail->Subject = "Orders Report";
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