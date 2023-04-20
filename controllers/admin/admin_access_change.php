<?php
    include("../important/connect_DB.php");

    session_start();

    if(!isset($_SESSION['admusername'])){
        header('Location: /admin/login/index.php');
    }else{
        $admAccess = $_SESSION['admaccess'];
        $admUsername = $_SESSION['admusername'];

    }

if ($dbConnection == true) {
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $userName = $_POST['username'];
    $email = $_POST['email'];
    $accessLevel = $_POST['access'];

    if ($firstName == "" || $lastName == "" || $userName == "" || $email == "" || $accessLevel == "Access Level") {
        echo "Incomplete, please fill out all fields.";
        
    } else {
        try {
            //Username checker if existing in database
            $qUserSelect = "SELECT `adminusername` FROM $dbDatabase.`adminusers` WHERE `adminusername` = '$userName'";
            $eUserSelect = mysqli_query($dbConnection, $qUserSelect);
            $nUserTotalRows = mysqli_num_rows($eUserSelect);

            if($nUserTotalRows < 1) {
                echo "Username doesn't exist";
                mysqli_close($dbConnection);
            } else if ($nUserTotalRows > 0){
                // Data checker bsed on username if correct
                $qDataSelect = "SELECT `adminfirstname`, `adminlastname`, `adminemail` FROM $dbDatabase.`adminusers` WHERE `adminusername` = '$userName'";
                $eDataSelect = mysqli_query($dbConnection, $qDataSelect);
                $dataRows = mysqli_fetch_assoc($eDataSelect);
                if($dataRows['adminfirstname'] != $firstName) {
                    echo "Incorrect First Name!";
                    mysqli_close($dbConnection);
                } else if($dataRows['adminlastname'] != $lastName) {
                    echo "Incorrect Last Name!";
                    mysqli_close($dbConnection);
                }else if($dataRows['adminemail'] != $email) {
                    echo "Incorrect Email";
                    mysqli_close($dbConnection);
                } else {
                    $dateTime = date("Y-m-d H:i:s");
                    $qUpdate = "UPDATE $dbDatabase .`adminusers` 
                    SET `accesslevel` = '{$accessLevel}', `date_modified` = '{$dateTime}', `modified_by` = '{$admUsername}'
                    WHERE `adminfirstname` = '{$firstName}' AND `adminlastname` = '{$lastName}' AND `adminusername` = '{$userName}' AND `adminemail` = '{$email}'";
                    $eUpdate = mysqli_query($dbConnection, $qUpdate);
                    if ($eUpdate == true) {
                        echo "Access Changed!";
                        mysqli_close($dbConnection);
                    } else {
                        echo "Failed to update, please check your information or call system administrator!";
                        mysqli_close($dbConnection);
                    }
                }   
            }
        } catch (Exception $e) {
            echo "error";
        }
    }
} else {
    echo "Failed to connect, please call system administrator!";
}