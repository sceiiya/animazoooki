<?php
    include("../important/connect_DB.php");

    if ($dbConnection == true) {
        $index = $_POST['index'];

        $dateTime = date("Y-m-d H:i:s");
        $qUpdate = "UPDATE $dbDatabase .`products` SET `date_archived` = '{$dateTime}' WHERE `id` = '{$index}'";
        $eUpdate = mysqli_query($dbConnection, $qUpdate);

        if ($eUpdate == true) {
            echo "Deleted!";
        } else {
            echo "Failed to process, please call system administrator!";
         }
         
    } else {
        echo "Failed to connect, please call system administrator!";
    }