<?php
    include("../important/connect_DB.php");

    $qSelect = "SELECT * FROM $dbDatabase .`orders` ORDER BY `orderid` DESC";
    $eSelect = mysqli_query($dbConnection, $qSelect);

    if ($eSelect == true) {
        $sHtml = "
                <table id='admin_order_tbl' class='table table-striped table-hover'>
                    <tr>
                        <th>Order ID</th>  
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th>Order Total</th>    
                        <th>Order Qty</th>
                        <th>Payment Method</th>
                        <th>Date Purchased</th>
                        <th>Status</th>
                    </tr>
            ";
        while($rows = mysqli_fetch_array($eSelect)) {

            $sHtml .= "<tr>
                    <td>".$rows['orderid']."</td>
                    <td>".$rows['product_code']."</td>
                    <td>".$rows['product_name']."</td>
                    <td>".$rows['order_total']."</td>
                    <td>".$rows['product_quantity']."</td>
                    <td>".$rows['payment_method']."</td>
                    <td>".$rows['date_ordered']."</td>
                    <td>".$rows['order_status']."</td>
                ";
        }

        $sHtml .= "</table>";
        
        echo $sHtml;
    } else {
        echo "not connected";
    }