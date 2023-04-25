<?php 
// $ruturl = getenv('HTTP_HOST')."/controllers/important/class.product.php";
// require_once('"'.$ruturl.'"');
require_once("important/class.product.php");


try{          
    $qSelect = "SELECT * FROM $dbDatabase .`products` WHERE `date_archived` IS NULL ORDER BY RAND() LIMIT 3";
    $eSelect = mysqli_query($dbConnection, $qSelect);

    $sugHTML = "";
    while($rows = mysqli_fetch_array($eSelect)) {
        try{
            $rowImg = json_decode($rows['images']);
            // json_decode($RANDITEM['images']);
            if($rowImg == NULL)  {
                $imageFile = "/admin/listing/product_img/animazoooki_onload.png";
            } else {
                // $rowImg = $rowImg;
                $imageFile = $rowImg[rand(0,count(($rowImg))-1)];
            }
            $sugHTML.= '
            <a class="suggest-card-attr card_light" href="/all-products/product_in_dynamic_template/index.php?id='.$rows['id'].'" title="'.$imageFile.'">
            <div class="suggest-item-img-cont">
                <img src="'.$imageFile.'" class="suggest-item-img-main"  onerror="DEFOimgPlaceholder(this)" alt="">
            </div>
            <div class=" suggest-item-inf-cont">
                <div class="suggest-item-inf-tex-cont">
                    <p class="suggest-item-name txt-light-inv">
                        '.$rows['name'].'
                    </p>
                </div>
            </div>
            </a>
            ';
            echo $sugHTML;
        }catch(Exception $e){
            $_SESSION['error'] = 'Product ID : '.$prodInfo['id'].'<br>'.$e->getMessage();
            header("Location: error_logger.php");
            exit();
        } 
    }
    // $prod = new Product;
    // $RANDITEM = $prod->fetchRandN(3);

    // if($_GET['id']){
    //     $GET_PInfo = new Product;
    //     $prodInfo = $GET_PInfo->fetch($_GET['id']);
    // }else{
    //     header('Location: ../');
    // }
    // $ITEMS = $RANDITEM;

    // while($ITEMS){
    //     try {
    //         echo $RANDITEM['name'];
    //     }catch(Exception $e){
    //         $_SESSION['error'] = 'Product ID : '.$prodInfo['id'].'<br>'.$e->getMessage();
    //         header("Location: error_logger.php");
    //         exit();
    //     } 
    // }


    // $prod = new Product;
    // $RANDITEM = $prod->fetchRandN(3);

    // $SuggestHTML ="<br/>";
    // foreach ($RANDITEM) {
    //     $SuggestHTML .= $RANDITEM['name'];
    //     $SuggestHTML .= $RANDITEM['images'];
    // }
    // echo $SuggestHTML;

                // foreach (json_decode($ImgData['images']) as $key => $value) {
                //     echo "link is: ".$value."  from the  ".($key+1)."<br/>";
                // }

    // foreach ($RANDITEM as $key => $value) {
    //         echo 
    //         'key : '.$key.'<br>
    //         '.'value : '.$value.'<br>
            
    //         ';
    //     }
    
    // json_decode($RANDITEM['images']);
    // if($rowImg == NULL)  {
    //     $imageFile = "/admin/listing/product_img/animazoooki_onload.png";
    // } else {
    //     // $rowImg = $rowImg;
    //     $imageFile = $rowImg[rand(0,count(($rowImg))-1)];
    // }
}catch(Exception $e){
    $_SESSION['error'] = 'Product ID : '.$prodInfo['id'].'<br>'.$e->getMessage();
    header("Location: error_logger.php");
    exit();
} 