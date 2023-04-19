<?php
    include("../important/connect_DB.php");

    session_start();

    if(!isset($_SESSION['admusername'])){
        header('Location: /admin/login/index.php');
    }else{
        $admAccess = $_SESSION['admaccess'];
        $admUsername = $_SESSION['admusername'];
        $admId = $_SESSION['admid'];    
        $admFirstName = $_SESSION['admfirstname'];
        $admLastName = $_SESSION['admlastname'];
        $admEmail = $_SESSION['admemail'];
    }

    $class = '';
    $display = '';
    if($admAccess == 'System Admin') {
        $class = 'filler';
        $display = '';
    } else {
        $class = 'disabled';
        $display = 'none';

    }

    $qSelect = "SELECT * FROM $dbDatabase .`adminusers` ORDER BY `adminid` DESC";
    $eSelect = mysqli_query($dbConnection, $qSelect);

    if ($eSelect == true) {
        $adLPCode = "
                <table id='admin_users_tbl' class='table table-striped table-hover'>
                    <tr>
                        <th style='display:none'>Admin ID</th>  
                        <th>Username</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Access Level</th>     
                        <th>Date Registered</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
            ";
        while($rows = mysqli_fetch_array($eSelect)) {

            $adLPCode .= "<tr>
                    <td style='display:none'>".$rows['adminid']."</td>
                    <td>".$rows['adminusername']."</td>
                    <td>".$rows['adminfirstname']."</td>
                    <td>".$rows['adminlastname']."</td>
                    <td>".$rows['adminemail']."</td>
                    <td>".$rows['accesslevel']."</td>
                    <td>".$rows['date_created']."</td>
                    <td>".$rows['status']."</td>
                    <td>
                        <button class='btn btn-info $class' onclick=admAct('".$rows['adminid']."')>Activate</button>&nbsp;
                        <button class='btn btn-danger $class' onclick=admDeact('".$rows['adminid']."')>Deactivate</button>
                    </td>
                ";
        }

        $adLPCode .= "</table>
                <button id='addAdmin' style='display: $display;' onclick='addAdmin()'>Add Admin</button>
                ";
        
        echo $adLPCode;
    } else {
        echo "Failed to connect, please call system administrator!";
    }