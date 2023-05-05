<?php

// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cart_items'])) {
    // if (isset($_POST['cart_items'])) {

    // $cart_items = json_decode($_POST['checking'], true);
    // // $cart_items = [{"cart_id":"4","prod_id":"100104","quantity":"2"}…"cart_id":"2","prod_id":"100137","quantity":"1"}];
    // $res='';
    // foreach ($cart_items as $cart_item) {
    //     $cart_id = $cart_item['cart_id'];
    //     $prod_id = $cart_item['prod_id'];
    //     $quantity = $cart_item['quantity'];
    //     $res .= "Cart Item: {$cart_id}, Quantity: {$quantity}, Prod ID: {$prod_id}\n";
    // }
    // $res.="Subtotal: ".$_POST['subtotal']."\nShipping Fee: ".$_POST['shiptotal']."\nTotal: ".$_POST['total']."\n";
    // echo $res;
// }

    require_once("important/class.database.php");
    // require_once("important/connect_DB.php");
    session_start();

    $getInfo = new ClassDbConn;
    $DB = $getInfo->NewCon();
    $of = $_SESSION['userid'];
    $sHtml ='';
    if ($DB == true) {
        try{ 
    $sHtml = "
    <table id='check_prod_tbl' class='table table-striped table-hover'>
        <tr>
            <th style='display:none'>Cart ID</th>
            <th style='display:none'>Product ID</th>
            <th class='txt-light-inv'>Image</th>
            <th class='txt-light-inv'>Product Name</th>
            <th class='txt-light-inv'>Qty</th>
            <th class='txt-light-inv'>Total Price</th>
        </tr>
    ";

    $cart_items = json_decode($_POST['checking'], true);
    foreach ($cart_items as $cart_item) {
        $cart_id = $cart_item['cart_id'];
        $prod_id = $cart_item['prod_id'];
        $quantity = $cart_item['quantity'];

        $of = ['id' => $prod_id];
        $pInfo = $getInfo->GSelect($DB, 'products', $of, '', '');

        $rowImg = json_decode($pInfo['images']);
            if($rowImg == NULL)  {
                $imageFile = "/admin/listing/product_img/animazoooki_onload.png";
            } else {
                $imageFile = $rowImg[rand(0,count(($rowImg))-1)];
            }

        $sHtml .= "
            <tr>
                <td style='display:none' class='CARTsessID'>".$cart_id."</td>
                <td style='display:none' class='CARTprodID'>".$prod_id."</td>
                <td><a class='adPListImgCont' title='".$pInfo['name']."' href='/all-products/product/?id=".$pInfo['id']."' target='_blank'><img class='adPListImg' loading='lazy' id='imgtest' src='".$imageFile."' onerror='defaultimg(this);'></td>     
                <td valign='middle' class='txt-light-inv'>".$pInfo['name']."</td>
                <th valign='middle' class='txt-light-inv'>".$quantity."</th>
                <td valign='middle' class='priceee txt-light-inv'>$ ".number_format($pInfo['price']*$quantity)."</td>
            </tr>
            ";
    }

            $sHtml .= "</table>
            <div class='total-price'>
            <table>
                <tr class='rwflx'>
                    <td class='clflx'>
                    <div>
                    Subtotal: 
                    </div>
                    <div id='checksubTotal'>
                    $ ".$_POST['subtotal']."
                    </div>
                    </td>
                    <td class='clflx'>
                    <div>
                    Shipping Fee: 
                    </div>
                    <div id='checkshipTotal'>
                    $ ".$_POST['shiptotal']."
                    </div>
                    </td>
                    <td class='clflx'>
                    <div>
                    Total: 
                    </div>
                    <div id='checkTotal'>
                    $ ".$_POST['total']."
                    </div>
                    </td>
                </tr>
            </table>
            </div>
                ";
            
            echo $sHtml;
        } catch (Exception $e){
            echo "error";
            mysqli_close($dbConnection);
        }
    } else {
        echo "no connect";
    }

    // if(mysqli_fetch_array($eSelect) == 0){
    //     $sHtml .= '<div>Cart is empty! You may browse Products and add to cart products you like!</div>';
    // }


    // <tr>
    //     <td>Subtotal</td>
    //     <td id='cartsubTotal'>$ 0.00</td>
    // </tr>
    // <tr>
    //     <td>Shipping Fee</td>
    //     <td>$ 0.00</td>
    // </tr>








    // // $itemz = $_POST['cart_items']; 
    // $itemz = "[{\"cart_id\":\"3\",\"quantity\":\"1\"},{\"cart_id\":\"1\",\"quantity\":\"3\"}]";
    // $items = json_decode($itemz);
    // echo $itemz;
    // foreach ($itemz as $key => $value) {
    //     # code...
    // }