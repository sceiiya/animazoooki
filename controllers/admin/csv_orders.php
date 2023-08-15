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

    $ofile = fopen("../../reports/csv/orders.csv", "wa+");

    fwrite($ofile, "Order ID, User ID, Product Code, Product Name, Order Total, Product Quantity, Payment Method, Shipping Method, date_ordered, Order Status, Date Delivered\n");
    while($rows = mysqli_fetch_assoc($eSelect)) {
        fwrite($ofile, '"'.$rows['orderid'].'","'.$rows['user_id'].'","'.$rows['product_code'].'","'.$rows['product_name'].'","'.$rows['order_total'].'","'.$rows['product_quantity'].'","'.$rows['payment_method'].'","'.$rows['shipping_method'].'","'.$rows['date_ordered'].'","'.$rows['order_status'].'","'.$rows['date_delivered'].'"');
        fwrite($ofile, "\n");
    }
    fclose($ofile);

    require '../../vendor/autoload.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    if ($eSelect == true) {
        try {

            $mail = new PHPMailer(true);

            require_once('../../phpmailer/class.phpmailer.php');

                        $mail = new PHPMailer();

                        $mail->SMTPDebug = SMTP::DEBUG_SERVER;  
                        $mail->isSMTP();
                        $mail->Host       = 'smtp.hostinger.com';
                        $mail->SMTPAuth   = true;                  
                        include('../important/connect_Email.php');
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                        $mail->Port       = 465;
                        $mail->setFrom('support@animazoooki.wd49p.com', 'System Administrator');
                        $mail->addAddress($admEmail, $admUsername);
                        $mail->addAttachment('../../reports/csv/orders.csv');
                        $mail->isHTML(true);
                        $mail->Subject = "Orders Report as CSV File";
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