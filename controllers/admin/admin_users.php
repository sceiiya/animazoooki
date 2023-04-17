<?php
    include("../important/connect_DB.php");

    $qSelect = "SELECT * FROM $dbDatabase .`adminusers` ORDER BY `adminid` ASC";
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
                    <td>".$rows['date_created']."</td>
                    <td>".$rows['status']."</td>
                    <td>
                        <button class='btn btn-info' onclick=activate('".$rows['adminid']."')>Activate</button>&nbsp;
                        <button class='btn btn-danger' onclick=deactivate('".$rows['adminid']."')>Deactivate</button>
                    </td>
                ";
        }

        $adLPCode .= "</table>";
        
        echo $adLPCode;
    } else {
        echo "not connected";
    }