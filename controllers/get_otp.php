<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';
require('important/class.database.php');
session_start();                    
    
try{
    $OTP = rand(100000, 999999);
    $timestamp =  $_SERVER["REQUEST_TIME"];  

    $ConDB = new ClassDbConn;
    $eCon = $ConDB->NewCon();
    if ($eCon == true){
        $newotp = ['otp_code' => $OTP , 'new_otp_dt' => $timestamp];
        // $of = ['username' => 'sceiiya'];
        $of = ['username' => $_SESSION['username']];
        $eUpdate = $ConDB->Update($eCon, 'clients', $newotp, $of);
            if($eUpdate == "true"){
                echo "true";
            }else{
                echo "false";
                $_SESSION['error'] = $eUpdate;
                header("Location: error_logger.php");
                exit();
            }
    }    
}catch(Exception $e){
    echo 'error';
    $_SESSION['error'] = $e->getMessage();
    header("Location: error_logger.php");
    exit();
} 

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                  
    include('important/connect_Email.php');             //Enable SMTP authentication
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('support@animazoooki.wd49p.com', 'Animazoooki Verify User');
    $mail->addBCC($_SESSION['email'], $_SESSION['username']);

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Animazooki Verification Code';
    $mail->Body    = '
    This is your One-Time Passcode will expire after 10 minutes!<br/>
    Please do not share this code with others for your security! <br/>
    <br/><br/>
    <strong styles="font-size:120px; text-align: center; font-weight:800; width:100%; background-color:##a50113; color:#fffbf2;">'.$OTP.'</strong>
    <br/><br/>
    You may click this <a href="https://'.getenv("HTTP_HOST").'/?otp='.$OTP.'">link</a> to verify your account quickly.<br/>
     ';

    $mail->send();
    // echo 'Message has been sent';
} catch (Exception $e) {
    $_SESSION['error'] = $e->getMessage().'<br>'.$mail->ErrorInfo;
    header("Location: error_logger.php");
    exit();
}