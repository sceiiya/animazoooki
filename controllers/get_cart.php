<?php
    include("important/class.database.php");
    require_once("important/connect_DB.php");
    session_start();

    $getInfo = new ClassDbConn;
    $DB = $getInfo->NewCon();
    $of = $_SESSION['userid'];
    $qSelect = "SELECT * FROM `clientcart` WHERE `client_id` = $of AND `date_removed` IS NULL ORDER BY `date_added` DESC";
    echo $qSelect;

    $eSelect = mysqli_query($DB, $qSelect);

    if ($eSelect == true) {
        try{ 
            // $rowsz = mysqli_fetch_array($eSelect);
            // $rowImgg = $rowsz['images'];
            // $rowImg = json_decode($rowImgg);
            // echo $rowImg[0];
            $sHtml = "
                    <table id='admin_prod_tbl' class='table table-striped table-hover'>
                        <tr>
                            <th style='display:none'>Product ID</th>
                            <th></th>  
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Action</th>
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
                        <td style='display:none'>".$pInfo['id']."</td>
                        <td>".$pInfo."</td>
                        <td><a class='adPListImgCont' href='/all-products/product/?id=".$pInfo['id']."' target='_blank'><img class='adPListImg' loading='lazy' id='imgtest' src='".$imageFile."' onerror='defaultimg(this);'></td>     
                        <td>".$pInfo['name']."</td>
                        <td>$ ".number_format($pInfo['price'])."</td>
                        <td>
                            <button class='btn $class redbgwhitec' onclick=remove('".$pInfo['id']."')>Remove</button>
                        </td>
                    ";
                } catch(Exception $e) {
                    $_SESSION['error'] = 'Level : '.$admAccess.'<br>'.'Admin User : '.$admUsername.'<br>'.$e->getMessage();
                    header("Location: error_logger.php");
                    exit();
                }
            }

            $sHtml .= "</table>
                <button id='addProduct' style='display:' onclick='addProduct()'>Add Product</button>
                ";
            
            echo $sHtml;
        } catch (Exception $e){
            echo "error";
            mysqli_close($dbConnection);
        }
    } else {
        echo "no connect";
    }
