<?php
    include("../important/connect_DB.php");

session_start();

    $sUsername = $_SESSION['admusername'];

    if ($dbConnection == true) {
        $sCurrentPass = $_POST['currentpassword'];
        $sNewPass = $_POST['newpassword'];
        $sConfirmPass = $_POST['confirmpassword'];

        try {
            $qSelect = "SELECT `adminpassword` FROM $dbDatabase.`adminusers` WHERE `adminusername` = '$sUsername'";
            $eSelect = mysqli_query($dbConnection, $qSelect);
            $rows = mysqli_fetch_assoc($eSelect);

            if($rows['adminpassword'] != $sCurrentPass) {
                echo "Incorrect Current Password!";
                mysqli_close($dbConnection);
            } else if($sCurrentPass == "" || $sNewPass == "" || $sConfirmPass == "") {
                echo "Incomplete, please fill out all fields!";
                mysqli_close($dbConnection);
            } else if ($sNewPass != $sConfirmPass){
                echo "Passwords does not match!";
                mysqli_close($dbConnection);
            } else {
                $qUpdate = "UPDATE $dbDatabase.`adminusers` SET `adminpassword` = '{$sNewPass}' WHERE `adminusername` = '{$sUsername}'";                
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