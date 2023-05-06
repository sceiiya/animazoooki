<?php session_start();?>

<div class="container pt-5 w-75 bg-light-in">
    <h2>My Purchases</h2>
<?php
    require_once('../../controllers/important/class.database.php');

    $getInfo = new ClassDbConn;
    $DB = $getInfo->NewCon();
    // $of = [ 'user_id' => $_SESSION['userid']];
    $clID = $_SESSION['userid'];
    $qSelect = "SELECT * FROM $dbDatabase .`orders` WHERE `user_id` = $clID ORDER BY `date_ordered` DESC";
    $eSelect = mysqli_query($DB, $qSelect);

if ($eSelect == true) {
    try{ 
    $sHtml ="
    <table id='check_prod_tbl' class='table table-striped table-hover'>
        <tr>
            <th style='display:none'>Order ID</th>
            <th class='txt-light-inv'>Image</th>
            <th class='txt-light-inv'>Product Name</th>
            <th class='txt-light-inv'>Qty</th>
            <th class='txt-light-inv'>Total Price</th>
        </tr>
    ";
    while($rows = mysqli_fetch_array($eSelect)) {
        $sHtml .="<tr><th>Order ID: ".$rows['order_code']."</th></tr>";
        $PID = json_decode($rows['product_codes']);
        foreach ($PID as $idP => $qty) {
            // $pid = $rows['product_id'];
            $of = ['id' => $idP];
            $pInfo = $getInfo->GSelect($DB, 'products', $of, '', '');
    
            $rowImg = json_decode($pInfo['images']);
            if($rowImg == NULL)  {
                $imageFile = "/admin/listing/product_img/animazoooki_onload.png";
            } else {
                $imageFile = $rowImg[rand(0,count(($rowImg))-1)];
            }
        
            $sHtml .= "<tr>
                <td style='display:none' class='CARTprodID'>".$pInfo['id']."</td>
                <td><a class='adPListImgCont' title='".$pInfo['name']."' href='/all-products/product/?id=".$pInfo['id']."' target='_blank'><img class='adPListImg' loading='lazy' id='imgtest' src='".$imageFile."' onerror='defaultimg(this);'></td>     
                <td valign='middle' class='txt-light-inv'>".$pInfo['name']."</td>
                <th valign='middle' class='txt-light-inv'>".number_format($qty)."</th>
                <td valign='middle' class='priceee txt-light-inv'>$ ".number_format($pInfo['price']*$qty)."</td>
                </tr>";
        }
            $sHtml .= "
                <tr>
                    <th>
                    Total: $ ".number_format($rows['order_total'])."
                    </th>
                    <th valign='middle' class='txt-light-inv'>
                        <button class='btn redbgwhitec' onclick=receiveOrder(".$rows['order_code'].")>Receive</button>
                    </th>
                </tr>";
    }

        $sHtml .= "</table>";

        echo $sHtml;
    } catch (Exception $e){
        echo "error";
        mysqli_close($dbConnection);
    }
} else {
    echo "no connect";
}
?>

    <!-- <p>NO CONTENT YET</p> -->
</div>











<!-- <?php 
// session_start();
?>

<div class="container pt-5 w-75 bg-light-in">
    <h2>My Purchases</h2>
<?php
    // require_once('../../controllers/important/class.database.php');
    // $getInfo = new ClassDbConn;
    // $DB = $getInfo->NewCon();
    // $of = [ 'user_id' => $_SESSION['userid']];
    // $sHtml ="
    // <table id='check_prod_tbl' class='table table-striped table-hover'>
        // <tr>
            // <th style='display:none'>Order ID</th>
            // <th class='txt-light-inv'>Image</th>
            // <th class='txt-light-inv'>Product Name</th>
            // <th class='txt-light-inv'>Qty</th>
            // <th class='txt-light-inv'>Total Price</th>
        // </tr>
    // ";
    // if ($DB == true) {
        // $ord=['date_ordered'=>'DESC'];
        // $PurchaseInfo = $getInfo->GSelect($DB, 'orders', $of, $ord, '');
        // foreach ($PurchaseInfo as $PurchaseInfo) {
            // $sHtml .="
            // <tr><th>".$PurchaseInfo['order_code']."</th></tr>";
            // $PrudInfo = json_decode($PurchaseInfo['product_codes']);
            // foreach ($PrudInfo as $ProdID => $Qunatity) {
                // $pid = ['id' => $ProdID];
                // $Pinfo = $getInfo->GSelect($DB, 'products', $pid, '', '');
                // $rowImg = json_decode($Pinfo['images']);
                // if($rowImg == NULL)  {
                    // $imageFile = "/admin/listing/product_img/animazoooki_onload.png";
                // } else {
                    // $imageFile = $rowImg[rand(0,count(($rowImg))-1)];
                // }
                // $sHtml .= "
                // <tr>
                    // <td style='display:none' class='CARTprodID'>".$ProdID."</td>
                    // <td><a class='adPListImgCont' title='".$Pinfo['name']."' href='/all-products/product/?id=".$Pinfo['id']."' target='_blank'><img class='adPListImg' loading='lazy' id='imgtest' src='".$imageFile."' onerror='defaultimg(this);'></td>     
                    // <td valign='middle' class='txt-light-inv'>".$Pinfo['name']."</td>
                    // <th valign='middle' class='txt-light-inv'>".$Qunatity."</th>
                    // <td valign='middle' class='priceee txt-light-inv'>$ ".number_format($Pinfo['price']*$Qunatity)."</td>
                // </tr>
                // ";
            // }
        // }
// 
    // }
// 
// 
    // echo $sHtml;
?>

    <p>NO CONTENT YET</p>
</div> -->
