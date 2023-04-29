<?php

session_start();


switch (true) {

    case (!empty($_SESSION['error'])):
        $ERROR = $_SESSION['error'];
        log_ERROR($ERROR);
        break;

    case (!empty($_POST['error'])):
        $ERROR = $_POST['error'];
        log_ERROR($ERROR);
        break;
    default:
        return "undefined";
        break;
}

function log_ERROR($ERROR){
$br = ['<br />', '<br>', '<b>', '</b>'];
$spc = "\n";

if(empty($ERROR)){
    return false;
}else{
date_default_timezone_set('Asia/Manila');
$wError = fopen("../errorlog/product_errorlog/errorlog.txt", "a");
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