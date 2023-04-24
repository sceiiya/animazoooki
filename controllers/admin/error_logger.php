<?php


// $ERROR = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed interdum sapien quis odio molestie, a elementum nulla facilisis. Aliquam malesuada, lacus vitae euismod consequat, tortor quam volutpat felis, nec varius ipsum tellus ac mi. Sed eget tellus sapien. Maecenas feugiat nisi id vestibulum suscipit. Fusce semper ultrices lectus nec malesuada. Donec posuere quis velit sit amet posuere.";
// $Opt_eERROR = wordwrap($ERROR, 80, "\n");
// echo $Opt_eERROR;
// if(empty($_SESSION['error'])){
//     return false;
// }elseif(!empty($_SESSION['error'])){
//     $ERROR = $_SESSION['error'];
//     // $Opt_ERROR = wordwrap($ERROR, 80, "<br>");
// }elseif(empty($_POST['error'])){
//     return false;
// }elseif(!empty($_POST['error'])){
//     $ERROR = json_encode($_POST['error']);
// }else{
//     return "undefined";
//     // $Opt_ERROR = wordwrap($ERROR, 80, "<br>");
// }
session_start();

// $_SESSION['error'] = "ahgsdgljwafsjgdxhvwtytytytytytytytytytytytytytytytytytytytytytytytytxjggggggggggggggggggggggggggggggggggggggggggggggggggggfcjmyhwdxufvwqyio8dddddddddddddddddwyqhn";

switch (true) {
    // case (empty($_SESSION['error'])):
    //     return false;
    //     break;
    case (!empty($_SESSION['error'])):
        $ERROR = $_SESSION['error'];
        log_ERROR($ERROR);
        break;
    // case (empty($_POST['error'])):
    //     return false;
    //     break;
    case (!empty($_POST['error'])):
        $ERROR = $_POST['error'];
        log_ERROR($ERROR);
        break;
    default:
        return "undefined";
        break;
}

// $ERROR = $_SESSION['error'];
// $ERROR = $_POST['error message'];
// $ERROR = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed interdum sapien quis odio molestie, a elementum nulla facilisis. Aliquam malesuada, lacus vitae euismod consequat, tortor quam volutpat felis, nec varius ipsum tellus ac mi. Sed eget tellus sapien. Maecenas feugiat nisi id vestibulum suscipit. Fusce semper ultrices lectus nec malesuada. Donec posuere quis velit sit amet posuere.";

// $ERROR = $_POST['error'];
function log_ERROR($ERROR){
$br = ['<br />', '<br>', '<b>', '</b>'];
$spc = "\n";
//wordwrap($string, character count(INT), $value to be replaced per number of characters)
//str_replace($toBeReplaced, $replace, $string)
if(empty($ERROR)){
    return false;
}else{
date_default_timezone_set('Asia/Manila');
$wError = fopen("../../errorlog/admin_errorlog/errorlog.txt", "a");
fwrite($wError,"\n
>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
Date: ".date('Y-m-d H:i:s')."
Error: ".wordwrap(str_replace($br, $spc, $ERROR), 80, "\n")." 
<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
\n");
fclose($wError);
}
unset($_SESSION['error']);
}


//param
// get from javascript
    //for try catch type of script
        // try{
        //     //do something;
        // }catch(error){
        //     ERROR_logger(error);
        // }

    //for ajax type of script
        // $.ajax({
        //     type: 'type',
        //     url: "/controllers/admin/error_logger.php",
        //     success:(result)=>{
        //       if(result == "success" ){
        //         //do something;
        //       }else{
        //         ERROR_logger(result);
        //       }
        //     }
        //   })



// get from controller php
// assuming the controllers are all inside the /controllers/admin/ folder
            // try{
            //     //do something;
            // }catch(Exception $err){
            //     $_SESSION['error'] = 'Level : '.$admAccess.'<br>'.'Admin User : '.$admUsername.'<br>'.$err->getMessage();
            //     header("Location: error_logger.php");
            //     exit();
            // }


//js script to be included in admin script
// function ERROR_logger(nERROR){
//     var errrorr ={
//       error: nERROR
//     };
//     $.post("/controllers/error_logger.php", errrorr,
//     ()=>{toastr.error("Please Report this to our support", "Something went wrong");;}
//     );
//   }