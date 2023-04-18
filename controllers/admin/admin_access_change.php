<?php
    include("../important/connect_DB.php");

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
            $dateTime = date("Y-m-d H:i:s");
            $qUpdate = "UPDATE $dbDatabase .`adminusers` 
            SET `accesslevel` = '{$accessLevel}', `date_modified` = '{$dateTime}'
            WHERE `adminfirstname` = '{$firstName}' AND `adminlastname` = '{$lastName}' AND `adminusername` = '{$userName}' AND `adminemail` = '{$email}'
            ";

            $eUpdate = mysqli_query($dbConnection, $qUpdate);

            if ($eUpdate == true) {
                echo "Access Changed!";
                mysqli_close($dbConnection);
            } else {
                echo "Failed to update, please check your information or call system administrator!";
                mysqli_close($dbConnection);
            }
        } catch (Exception $e) {
            echo "error";
        }
    }
} else {
    echo "Failed to connect, please call system administrator!";
}