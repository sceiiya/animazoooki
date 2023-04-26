<?php 
// $ruturl = getenv('HTTP_HOST')."/controllers/important/class.product.php";
// require_once('"'.$ruturl.'"');
require_once("important/class.product.php");


try{          
    $qSelect = "SELECT * FROM $dbDatabase .`products` WHERE `date_archived` IS NULL ORDER BY RAND() LIMIT 3";
    $eSelect = mysqli_query($dbConnection, $qSelect);

    $sugHTML = "";
    $rowImg;
    $imageFile;
    while($rows = mysqli_fetch_array($eSelect)) {

        try{
            $rowImg = json_decode($rows['images']);
            // json_decode($RANDITEM['images']);
            if(!$rowImg)  {
                $imageFile = "/admin/listing/product_img/animazoooki_onload.png";
            } else {
                // $rowImg = $rowImg;
                $imageFile = $rowImg[rand(0,count(($rowImg))-1)];
            }
            $sugHTML.= '
            <a class="suggest-card-attr card_light" href="/all-products/product/index.php?id='.$rows['id'].'" title="'.$rows['name'].'">
            <div class="suggest-item-img-cont">
                <img src="'.$imageFile.'" class="suggest-item-img-main" loading="lazy" onerror="DEFOimgPlaceholder(this)" alt="">
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
            // mysqli_close($dbConnection);
        }catch(Exception $e){
            $_SESSION['error'] = 'Product ID : '.$prodInfo['id'].'<br>'.$e->getMessage();
            header("Location: error_logger.php");
            exit();
        } 
    }
    echo $sugHTML;

    mysqli_close($dbConnection);
    exit();
}catch(Exception $e){
    $_SESSION['error'] = 'Product ID : '.$prodInfo['id'].'<br>'.$e->getMessage();
    header("Location: error_logger.php");
    exit();
} 