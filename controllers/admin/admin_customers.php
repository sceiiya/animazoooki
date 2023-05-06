<?php
    include("../important/connect_DB.php");

    session_start();

    if(!isset($_SESSION['admusername'])){
        header('Location: /admin/index.php');
    }else{
        $admAccess = $_SESSION['admaccess'];
        $admUsername = $_SESSION['admusername'];
        $admId = $_SESSION['admid'];    
        $admFirstName = $_SESSION['admfirstname'];
        $admLastName = $_SESSION['admlastname'];
        $admEmail = $_SESSION['admemail'];
    }

    $class = '';
    if($admAccess == 'System Admin' || $admAccess == 'Supervisor') {
        $class = 'filler';
    } else {
        $class = 'disabled';
    }

    $qSelect = "SELECT * FROM $dbDatabase .`clients` WHERE `status` != 'spectating' ORDER BY `id` DESC";
    $eSelect = mysqli_query($dbConnection, $qSelect);

    if ($eSelect == true) {
        $sHtml = "
                <table id='admin_cust_tbl' class='table table-striped table-hover'>
                    <tr>
                        <th style='display:none'>id</th>  
                        <th>Username</th>
                        <th>Name</th>
                        <th>Email</th>    
                        <th>Date Registered</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
            ";
        while($rows = mysqli_fetch_array($eSelect)) {

            $sHtml .= "<tr>
                    <td style='display:none'>".$rows['id']."</td>
                    <td>".$rows['username']."</td>
                    <td>".$rows['name']."</td>
                    <td>".$rows['email']."</td>
                    <td>".$rows['date_added']."</td>
                    <td id='cusStatus".$rows['id']."' >".$rows['status']."</td>
                    <td>
                        <button class='btn btn-light $class' id='btn-custAct' onclick=cusAct('".$rows['id']."')>Activate</button>&nbsp;
                        <button class='btn redbgwhitec $class' id='btn-custDeact' onclick=cusDeact('".$rows['id']."')>Deactivate</button>
                    </td>
                ";
        }

        $sHtml .= "</table>";
        
        echo $sHtml;
    } else {
        echo "Failed to connect, please call system administrator!";
    }