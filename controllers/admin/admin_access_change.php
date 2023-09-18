<?php
    include("../important/connect_DB.php");
    session_start();
    if(!isset($_SESSION['admusername'])){
        header('Location: /admin/index.php');
    }else if( $_SESSION['admaccess'] == 'Agent') {
        header('Location: /admin/index.php');
    }else {
        $admAccess = $_SESSION['admaccess'];
        $admUsername = $_SESSION['admusername'];
    }

if ($dbConnection == true) {
    $adminId = $_POST['index'];
    $accessLevel = $_POST['access'];
    $accessPass = md5($_POST['accesspass']);

    if ($accessPass == "") {
        echo "Invalid password!";
        mysqli_close($dbConnection);
    } else {
        try {
            //Password checker
            $qUserSelect = "SELECT `adminpassword` FROM $dbDatabase.`adminusers` WHERE `adminusername` = '$admUsername'";
            $eUserSelect = mysqli_query($dbConnection, $qUserSelect);
            $nUserTotalRows = mysqli_num_rows($eUserSelect);
            $userPassRows = mysqli_fetch_assoc($eUserSelect);

            if($userPassRows['adminpassword'] != $accessPass) {
                echo "Invalid Password";
                mysqli_close($dbConnection);
            } else if ($userPassRows['adminpassword'] == $accessPass){
                    $dateTime = date("Y-m-d H:i:s");
                    $qUpdate = "UPDATE $dbDatabase .`adminusers` 
                    SET `accesslevel` = '{$accessLevel}', `date_modified` = '{$dateTime}', `modified_by` = '{$admUsername}'
                    WHERE `adminid` = '{$adminId}'";
                    $eUpdate = mysqli_query($dbConnection, $qUpdate);
                    if ($eUpdate == true) {
                        echo "Access Changed!";
                        mysqli_close($dbConnection);
                    } else {
                        echo "Failed to update, please check your information or call system administrator!";
                        mysqli_close($dbConnection);
                    }
                }   
            
        } catch (Exception $e) {
            echo "error";
        }
    }
} else {
    echo "Failed to connect, please call system administrator!";
}