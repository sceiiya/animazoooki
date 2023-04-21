<?php
session_start();

date_default_timezone_set('Asia/Manila');

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
// $ERROR = $_SESSION['error'];
// $ERROR = $_POST['error message'];
// $ERROR = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed interdum sapien quis odio molestie, a elementum nulla facilisis. Aliquam malesuada, lacus vitae euismod consequat, tortor quam volutpat felis, nec varius ipsum tellus ac mi. Sed eget tellus sapien. Maecenas feugiat nisi id vestibulum suscipit. Fusce semper ultrices lectus nec malesuada. Donec posuere quis velit sit amet posuere.";
$ERROR = json_encode($_POST['error']);

if(empty($ERROR)){
    return false;
}else{
$wError = fopen("../errorlog/user_errorlog/errorlog.txt", "a");
fwrite($wError,"\n
>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
Date: ".date('Y-m-d H:i:s')."
Error: ".wordwrap($ERROR, 80, "\n")." 
<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
\n");
fclose($wError);
}
unset($_SESSION['error']);