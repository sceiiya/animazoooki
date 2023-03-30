<?php
    include(""); // update this for connection path
    session_start();

    if ( $connectionName == true) { // update this for connection name
        $sName = $_POST['name'];
        $sEmail = $_POST['email'];
        $sPassword = $_POST['password'];
        $sConfirmPass = $_POST['confirmpassword'];
        
        $_SESSION['email'] = $sEmail;
        try {
            $qSelect = "SELECT `password` FROM `database_name`.`table_name` WHERE `username` = '$sEmail'";
            $eSelect = mysqli_query($connectionName, $qSelect); // update this for connection name
            $rows = mysqli_fetch_assoc($eSelect);
            $nTotalRows = mysqli_num_rows($eSelect);

            if ($nTotalRows > 0 && $rows['password'] == $sPassword) {    
                echo "Sign-up Success";
                mysqli_close($connectionName);
            }else{
                echo "Sign-up Failed";
                mysqli_close($connectionName);
            }
        } catch(Exception $e) {
            echo "error";
        }
    } else {
        echo "Failed to connect, please call system administrator!";
    }