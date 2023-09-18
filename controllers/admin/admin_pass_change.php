<?php
    include("../important/connect_DB.php");
    session_start();

    if(!isset($_SESSION['admusername'])){
        header('Location: /admin/index.php');
    }else{
        $admAccess = $_SESSION['admaccess'];
        $admUsername = $_SESSION['admusername'];
    }


    if ($dbConnection == true) {
        $sCurrentPass = md5($_POST['currentpassword']);
        $sNewPass = md5($_POST['newpassword']);
        $sConfirmPass = md5($_POST['confirmpassword']);

        try {
            $qSelect = "SELECT `adminpassword` FROM $dbDatabase.`adminusers` WHERE `adminusername` = '$admUsername'";
            $eSelect = mysqli_query($dbConnection, $qSelect);
            $rows = mysqli_fetch_assoc($eSelect);

            if($sCurrentPass == "" || $sNewPass == "" || $sConfirmPass == "") {
                echo "Incomplete, please fill out all fields!";
                mysqli_close($dbConnection);
            } else if ($sNewPass != $sConfirmPass){
                echo "Passwords does not match!";
                mysqli_close($dbConnection);
            } else if($rows['adminpassword'] != $sCurrentPass) {
                echo "Invalid password!";
                mysqli_close($dbConnection);
            } else {
                $qUpdate = "UPDATE $dbDatabase.`adminusers` SET `adminpassword` = '{$sNewPass}' WHERE `adminusername` = '{$admUsername}'";                
                $eUpdate = mysqli_query($dbConnection, $qUpdate);
    
                if ($eUpdate == true) {
                    echo "Password saved!";
                    mysqli_close($dbConnection);                
                } else {
                    echo "Failed to process, please call system administrator!";
                    mysqli_close($dbConnection);
                } 
            }
        } catch(Exception $e) {
            echo "error";
        }
    } else {
        echo "Failed to connect, please call system administrator!";
    }