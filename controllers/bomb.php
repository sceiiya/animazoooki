<?php

// $email = 'coronapungal111@gmail.com'; 
// // $email = $_POST['email'];  // receive the email from front end
// $otp = rand(100000, 999999); //generates random otp
// $_SESSION['session_otp'] = $otp;  // stores the otp into a session variable
// $message = "Your one time email verification code is" . $otp;  //embed the otp into message.
// $sub = "Email verification from piechpi";
// $headers = "From : " . "sceiiya";
//     try{
//         $retval = mail($email,$sub,$message);
//         $timestamp =  $_SERVER["REQUEST_TIME"];  // generate the timestamp when otp is forwarded to user email/mobile.
//         $_SESSION['time'] = $timestamp;          // save the timestamp in session varibale for further use.
//         if($retval)
//         {
//             require_once('verification-form.php');  // send the otp verification page to user
//         }
//     }

//     catch(Exception $e)
//     {
//         die('Error: '.$e->getMessage());
//     }


// $otp = $_POST['otp'];  //receives the otp entered by the user
// $timestamp =  $_SERVER["REQUEST_TIME"];  // record the current time stamp 
//     if(($timestamp - $_SESSION['time']) > 300)  // 300 refers to 300 seconds
//     {
//         echo json_encode(array("type"=>"error", "message"=>"OTP expired. Pls. try again."));
//     }
//     else{
//         if ($otp == $_SESSION['session_otp']) 
//         {
//             unset($_SESSION['session_otp']);
//             echo json_encode(array("type"=>"success", "message"=>"Your Email is verified!"));
//         } 
//         else {
//             echo json_encode(array("type"=>"error", "message"=>"Email verification failed"));
//         }
//     }

echo $_SERVER["REQUEST_TIME"];