<?php

require('important/class.database.php');

session_start();                    
    

try{
    $OTP = rand(100000, 999999);
    $_SESSION['sesh_otp'] = $OTP;
    $timestamp =  $_SERVER["REQUEST_TIME"];  // generate the timestamp when otp is forwarded to user email/mobile.
    $_SESSION['time'] = $timestamp;          // save the timestamp in session varibale for further use.

    $ConDB = new ClassDbConn;
    $eCon = $ConDB->NewCon();
    if ($eCon == true){
        $newotp = ['otp_code' => $OTP];
        $of = ['username' => 'sceiiya'];
        // $of = ['username' => $_SESSION['username']];
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
    $_SESSION['error'] = $e->getMessage();
    header("Location: error_logger.php");
    exit();
} 

// //Load Composer's autoloader
// require 'vendor/autoload.php';

// //Import PHPMailer classes into the global namespace
// //These must be at the top of your script, not inside a function
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;



// //Create an instance; passing `true` enables exceptions
// $mail = new PHPMailer(true);

// try {
//     //Server settings
//     $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
//     $mail->isSMTP();                                            //Send using SMTP
//     $mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
//     $mail->SMTPAuth   = true;                  
//     include('important/connect_Email.php');             //Enable SMTP authentication
//     $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
//     $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

//     //Recipients
//     $mail->setFrom('support@animazoooki.wd49p.com', 'Animazoooki');
//     $mail->addBCC('coronapungal111@gmail.com', '');

//     //Content
//     $mail->isHTML(true);                                  //Set email format to HTML
//     $mail->Subject = 'Animazooki Verification Code';
//     $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
//     $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

//     $mail->send();
//     echo 'Message has been sent';
// } catch (Exception $e) {
//     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
// }



//     // if(!isset($_SESSION['usernamereg'])){
//     //     header('Location: /activity_website/register.php');
//     // }else{
//     //     $sUsername = $_SESSION['usernamereg'];
//     //     $sEmail = $_SESSION['emailreg'];
//     // }

//     // if ($dbConnection == true) {
//     //     $sOTP = $_POST['otp'];
//     //     try {
//     //         $qSelect = "SELECT `ClientOTP` FROM `u955154186_db_djstrading`.`clients` WHERE `ClientUsername` = '$sUsername' AND `ClientEmail` = '$sEmail'";
//     //         $eSelect = mysqli_query($dbConnection, $qSelect);
//     //         $rows = mysqli_fetch_assoc($eSelect);
//     //         $nTotalRows = mysqli_num_rows($eSelect);

//     //         if ($rows['ClientOTP'] == $sOTP) {
//     //             $qUpdate = "UPDATE `u955154186_db_djstrading`.`clients` SET `ClientStatus` = 'active' WHERE `ClientUsername` = '{$sUsername}' AND `ClientOTP` =  '{$sOTP}'";
//     //             $eUpdate = mysqli_query($dbConnection, $qUpdate);
//     //             echo "OTP Verified";
//     //             mysqli_close($dbConnection);
//     //         }else{
//     //             $qUpdate = "UPDATE `u955154186_db_djstrading`.`clients` SET `ClientStatus` = 'inactive' WHERE `ClientUsername` = '{$sUsername}' AND `ClientEmail` =  '{$sEmail}'";
//     //             $eUpdate = mysqli_query($dbConnection, $qUpdate);
//     //             echo "OTP Not Verified";
//     //             mysqli_close($dbConnection);
//     //         }
//     //     } catch(Exception $e) {
//     //         echo "error";
//     //     }
//     // } else {
//     //     echo "Failed to connect, please call system administrator!";
//     // }