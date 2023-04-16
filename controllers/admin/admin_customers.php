<?php
    include("../important/connect_DB.php");

    $qSelect = "SELECT * FROM $dbDatabase .`clients` ORDER BY `id` ASC";
    $eSelect = mysqli_query($dbConnection, $qSelect);

    if ($eSelect == true) {
        $sHtml = "
                <table id='admin_cust_tbl' class='table table-striped table-hover'>
                    <tr>
                        <th style='display:none'>id</th>  
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

            $sHtml .= "<tr>
                    <td style='display:none'>".$rows['id']."</td>
                    <td>".$rows['username']."</td>
                    <td>".$rows['f_name']."</td>
                    <td>".$rows['l_name']."</td>
                    <td>".$rows['email']."</td>
                    <td>".$rows['date_added']."</td>
                    <td>".$rows['status']."</td>
                    <td>
                        <button class='btn btn-info' onclick=activate('".$rows['id']."')>Activate</button>&nbsp;
                        <button class='btn btn-danger' onclick=deactivate('".$rows['id']."')>Deactivate</button>
                    </td>
                ";
        }

        $sHtml .= "</table>";
        
        echo $sHtml;
    } else {
        echo "not connected";
    }