<?php
    require '../vendor/autoload.php';
    require_once("important/class.database.php");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    session_start();

    $getInfo = new ClassDbConn;
    $DB = $getInfo->NewCon();
    $of = $_SESSION['userid'];
    $sHtml ='<style>
    #check_prod_tbl tr td img {
        width: 140px;
        height: 140px;
    }
    
    #check_prod_tbl{
        width: calc(95%-50px) !important;
        box-sizing: border-box;
        margin: 10px 3px 10px 3px !important;
        padding: 2px !important;
    }</style>';
    $orderCode = 'ORD'.strtoupper(substr(sha1(mt_rand()),17,8)).'ZOOKI';
    $orderQuantity=0;
    $productCodes=[];
    $oneCode='';
    $oneName='';
    if ($DB == true) {
        try{ 
        $sHtml = "
        <table id='check_prod_tbl' class='table table-striped table-hover'>
            <tr>
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
            $oneCode = $prod_id;
            $quantity = intval($cart_item['quantity']);
            $orderQuantity = intval($orderQuantity) + intval($quantity);

            $cartI = [
                'date_removed' => date("Y-m-d H:i:s"),
            ];
            $ofcart = ['id' => $cart_id];
            $remCart = $getInfo->Update($DB, 'clientcart', $cartI, $ofcart);

            $of = ['id' => $prod_id];
            $pInfo = $getInfo->GSelect($DB, 'products', $of, '', '');
            $oneName = $pInfo['name'];
            $currPrice = intval($pInfo['price']);
            $currStocks = intval($pInfo['stocks']);
            $currSold = intval($pInfo['sold']);
            $newStocks = $currStocks-$quantity;
            $newSold = $currSold+$quantity;
            $newOrder = [
                'stocks' => $newStocks,
                'sold' => $newSold,
            ];
            $UPpInfo = $getInfo->Update($DB, 'products', $newOrder,$of);
            
            $rowImg = json_decode($pInfo['images']);
                if($rowImg == NULL)  {
                    $imageFile = "https://".getenv("HTTP_HOST")."/admin/listing/product_img/animazoooki_onload.png";
                } else {
                    $imageFile = $rowImg[rand(0,count(($rowImg))-1)];
                }
            
            $productCodes[$prod_id] = $quantity;
            $sHtml .= "
                <tr>
                    <td><a class='adPListImgCont' title='".$pInfo['name']."' href='https://".getenv("HTTP_HOST")."/all-products/product/?id=".$pInfo['id']."' target='_blank'><img style='width:75px; height:75px;' class='adPListImg' loading='lazy' id='imgtest' src='".$imageFile."' ></td>     
                    <td valign='middle' class='txt-light-inv'>".$pInfo['name']."</td>
                    <th valign='middle' class='txt-light-inv'>".$quantity."</th>
                    <td valign='middle' class='priceee txt-light-inv'>$ ".number_format($pInfo['price']*$quantity)."</td>
                </tr>
                ";
        }

            $sHtml .= "</table>
            <div class='total-price'>
                    <div>Subtotal: $ ".$_POST['subtotal']."</div><br/>
                    <div>Shipping Fee: $ ".$_POST['shiptotal']."</div><br/>
                    <strong>Please prepare this amout of money for faster transaction the time you will receive your merch!
                    <div>Total: $ ".$_POST['total']."</div></strong><br/>
            </div>
                ";
            
            $productCodes = json_encode($productCodes);
            $NewOrder = [
                'order_code' => $orderCode,
                'user_id' => $_SESSION['userid'],
                'product_code' => $oneCode,
                'product_codes' => $productCodes,
                'product_name' => $oneName,
                'order_subtotal' => $_POST['subtotal'],
                'order_shipfee' => $_POST['shiptotal'],
                'order_total' => $_POST['total'],
                'product_quantity' => $orderQuantity,
                'payment_method' => $_POST['paymeth'],
                'date_ordered' => date("Y-m-d H:i:s"),
                'order_status' => 'Pending',
            ];
            $InOrderInfo = $getInfo->Insert($DB, 'orders', $NewOrder);
        
            
            $mail = new PHPMailer(true);
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                  
            include('important/connect_Email.php');             //Enable SMTP authentication
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                
            //Recipients
            $mail->setFrom('support@animazoooki.wd49p.com', 'Animazoooki');
            $mail->addBCC($_SESSION['email'], $_SESSION['username']);
                
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Processing Order #'.$orderCode;
            $mail->Body    = '
            Greetings '.$_POST['name'].'!<br/>
            Your Order is already under process. Please wait for further notification<br/>
            <br/>
            We have also received you shipping details: <br/>
            Phone Number: '.$_POST['cellno'].'<br/>
            Email: '.$_POST['email'].'<br/>
            Payment Method'.$_POST['paymeth'].'<br/>
            <br/>
            Please make sure that your contact mediums are reachable<br/>and able to be in touch at the time of the delivery.
            <br/><br/><br/>
            This is the overview of what you have purchased from us:
            <br/>
            <br/><br/>
            '.$sHtml.'
            <br/><br/>
            <br/><br/>
            Thank you for shopping with us!
            <strong>with Animazoooki, your delusions are safe!</strong>
             ';
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                
            $mail->send();
            echo 'true';
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage().'<br>'.$mail->ErrorInfo;
            header("Location: error_logger.php");
            exit();
        }

    } else {
        echo "no connect";
    }