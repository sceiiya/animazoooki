<?php
    include("important/class.database.php");
    require_once("important/connect_DB.php");
    session_start();

    $getInfo = new ClassDbConn;
    $DB = $getInfo->NewCon();
    $of = $_SESSION['userid'];
    $qSelect = "SELECT * FROM `clientcart` WHERE `date_removed` IS NULL AND `client_id` = $of ORDER BY `date_added` DESC";

    $eSelect = mysqli_query($DB, $qSelect);

    if ($eSelect == true) {
        try{ 
            $sHtml = "
                    <table id='check_prod_tbl' class='table table-striped table-hover'>
                        <tr>
                            <th style='display:none'>Cart ID</th>
                            <th style='display:none'>Product ID</th>
                            <th class='txt-light-inv'>Select</th> 
                            <th class='txt-light-inv'>Image</th>
                            <th class='txt-light-inv'>Product Name</th>
                            <th class='txt-light-inv'>Qty</th>
                            <th class='txt-light-inv'>Unit Price</th>
                            <th class='txt-light-inv'>Action</th>
                        </tr>
                ";
                while($rows = mysqli_fetch_array($eSelect)) {
                        $pid = $rows['product_id'];
                        $of = ['id' => $pid];
                        $pInfo = $getInfo->GSelect($DB, 'products', $of, '', '');
            
                    $rowImg = json_decode($pInfo['images']);
                    if($rowImg == NULL)  {
                        $imageFile = "/admin/listing/product_img/animazoooki_onload.png";
                    } else {
                        // $rowImg = $rowImg;ERRpsuc()
                        $imageFile = $rowImg[rand(0,count(($rowImg))-1)];
                    }
                    
                        $sHtml .= "<tr>
                            <td style='display:none' class='CARTsessID'>".$rows['id']."</td>
                            <td style='display:none' class='CARTprodID'>".$pInfo['id']."</td>
                            <td valign='middle'><input onclick='getSubNTotal()' type='checkbox' name='".$pInfo['name']."' value='".$pInfo['id']."'></td>
                            <td><a class='adPListImgCont' title='".$pInfo['name']."' href='/all-products/product/?id=".$pInfo['id']."' target='_blank'><img class='adPListImg' loading='lazy' id='imgtest' src='".$imageFile."' onerror='defaultimg(this);'></td>     
                            <td valign='middle' class='txt-light-inv'>".$pInfo['name']."</td>
                            <th valign='middle' class='txt-light-inv'>
                            <div class='d-flex' style='max-width: 80px; min-width: 70px;'>
                                <input style='color:black;' id='meqty' min='1' readonly name='quantity' value='".number_format($rows['qnty'])."' type='number' class='form-control' />
                                <div class='clflx'>
                                <button style='color:#a50113;' class='btn btn-link px-2' >
                                        <i class='fas fa-arrow-up'></i>
                                    </button>
                                    <button style='color:#a50113;' class='btn btn-link px-2' >
                                        <i class='fas fa-arrow-down'></i>
                                    </button>
                                </div>
                             </div>
                            </th>
                            <td valign='middle' class='priceee txt-light-inv'>$ ".number_format($pInfo['price'])."</td>
                            <td valign='middle' class='txt-light-inv'>
                                <button class='btn redbgwhitec' onclick=itemRemove(".$rows['id'].")>Remove</button>
                            </td>
                            ";
                }
                if(mysqli_num_rows($eSelect) == 0){
                    $sHtml .= '</table><div>Cart is empty! You may browse Products and add to cart products you like!</div>';
                }else{
                    $sHtml .= "</table>

                    <div class='total-price'>

                        <table>
                            <tr>
                                <td>Subtotal</td>
                                <td id='cartsubTotal'>$ 0.00</td>
                            </tr>
                            <tr>
                                <td>Shipping Fee</td>
                                <td id='cartshipTotal'>$ 0.00</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td id='cartTotal'>$ 0.00</td>
                            </tr>
                        </table>
                    </div>
                    <div class='txtr' >
                        <button style='margin-right: 38px;' id='AddOrderBttn' class='btn mt-3 mb-5 redbgwhitec'>Checkout</button>
                    </div>
                    ";
                }
            echo $sHtml;

        } catch (Exception $e){
            echo "error";
            mysqli_close($dbConnection);
        }
    } else {
        echo "no connect";
    }