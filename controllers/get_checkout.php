<?php

// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cart_items'])) {
    // if (isset($_POST['cart_items'])) {

    $cart_items = json_decode($_POST['checking'], true);
    // $cart_items = [{"cart_id":"4","prod_id":"100104","quantity":"2"}…"cart_id":"2","prod_id":"100137","quantity":"1"}];
    $res='';
    foreach ($cart_items as $cart_item) {
        $cart_id = $cart_item['cart_id'];
        $prod_id = $cart_item['prod_id'];
        $quantity = $cart_item['quantity'];
        $res .= "Cart Item: {$cart_id}, Quantity: {$quantity}, Prod ID: {$prod_id}\n";
    }
    $res.="Subtotal: ".$_POST['subtotal']."\nShipping Fee: ".$_POST['shiptotal']."\nTotal: ".$_POST['total']."\n";
    echo $res;
// }

    include("important/class.database.php");
    require_once("important/connect_DB.php");
    session_start();

    $getInfo = new ClassDbConn;
    $DB = $getInfo->NewCon();
    $of = $_SESSION['userid'];
    $qSelect = "SELECT * FROM `clientcart` WHERE `client_id` = $of AND `date_removed` IS NULL ORDER BY `date_added` DESC";

    $eSelect = mysqli_query($DB, $qSelect);
 
    if ($eSelect == true) {
        try{ 
            // $rowsz = mysqli_fetch_array($eSelect);
            // $rowImgg = $rowsz['images'];
            // $rowImg = json_decode($rowImgg);
            // echo $rowImg[0];
            $sHtml = "
                    <table id='admin_prod_tbl' class='table table-striped table-hover w-100'>
                        <tr>
                            <th style='display:none'>Cart ID</th>
                            <th style='display:none'>Product ID</th>
                            <th class='txt-light-inv'>Image</th>
                            <th class='txt-light-inv'>Product Name</th>
                            <th class='txt-light-inv'>Qty</th>
                            <th class='txt-light-inv'>Total Price</th>
                        </tr>
                ";
                // print_r( $rows = mysqli_fetch_array($eSelect));
                while($rows = mysqli_fetch_array($eSelect)) {
                    try{
                        $pid = $rows['product_id'];
                        $of = ['id' => $pid];
                        $pInfo = $getInfo->GSelect($DB, 'products', $of, '', '');
            
                    // $rowsz = mysqli_fetch_array($eSelect);
                    // $rowImgg = $rowsz['images'];
                    $rowImg = json_decode($pInfo['images']);
                    if($rowImg == NULL)  {
                        $imageFile = "/admin/listing/product_img/animazoooki_onload.png";
                    } else {
                        // $rowImg = $rowImg;ERRpsuc()
                        $imageFile = $rowImg[rand(0,count(($rowImg))-1)];
                    }
                    // print_r($rowImg[0]);
                    
                    $sHtml .= "<tr>
                            <td style='display:none' class='CARTsessID'>".$rows['id']."</td>
                            <td style='display:none' class='CARTprodID'>".$pInfo['id']."</td>
                            <td><a class='adPListImgCont' title='".$pInfo['name']."' href='/all-products/product/?id=".$pInfo['id']."' target='_blank'><img class='adPListImg' loading='lazy' id='imgtest' src='".$imageFile."' onerror='defaultimg(this);'></td>     
                            <td valign='middle' class='txt-light-inv'>".$pInfo['name']."</td>
                            <th valign='middle' class='txt-light-inv'>
                            <div class='d-flex' style='max-width: 80px; min-width: 70px;'>
                                <input style='color:black;' id='meqty' min='1' readonly name='quantity' value='".number_format($rows['qnty'])."' type='number' class='form-control' />
                            </div>
                            </th>
                            <td valign='middle' class='priceee txt-light-inv'>$ ".number_format($pInfo['price'])."</td>
                        ";
                    } catch(Exception $e) {
                        $_SESSION['error'] = $e->getMessage();
                        header("Location: error_logger.php");
                        exit();
                    }
                }

            $sHtml .= "</table>
            <div class='total-price'>
            <table>
                <tr>
                    <td id='checksubTotal'>Subtotal: $ ".$_POST['subtotal']."</td>
                    <td id='checkshipTotal'>Shipping Fee: $ ".$_POST['shiptotal']."</td>
                    <td id='checkTotal'>Total: $ ".$_POST['total']."</td>
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