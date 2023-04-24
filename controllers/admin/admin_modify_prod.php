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
    $index = $_POST['nid'];
    $qSelect = "SELECT `name`, `category`, `series`, `price`, `stocks`, `description`, `designer`, `manufacturer`,`images` FROM $dbDatabase .`products` WHERE `id` = '{$index}'";
    $eSelect = mysqli_query($dbConnection, $qSelect);

    if ($eSelect == true) {
        $_SESSION['index'] = $index;
        $rows = mysqli_fetch_assoc($eSelect);

        echo json_encode($rows);
    } else {
        echo "Failed to process, please call system administrator!";
    }
} else {
    echo "Failed to connect, please call system administrator!";
}