<?php 
// $ruturl = getenv('HTTP_HOST')."/controllers/important/class.product.php";
// require_once('"'.$ruturl.'"');
require_once("important/class.product.php");


try{          
    $qSelect = "SELECT * FROM $dbDatabase .`products` WHERE `date_archived` IS NULL ORDER BY RAND() LIMIT 6";
    $eSelect = mysqli_query($dbConnection, $qSelect);

    $sugHTML = '<section class="content-cards-container"><div class="card-cont-attr">';
    while($rows = mysqli_fetch_array($eSelect)) {
        $rowImg='';
        $imageFile='';
        try{
            $rowImg = json_decode($rows['images']);
            // json_decode($RANDITEM['images']);
            if(!$rowImg)  {
                $imageFile = "/admin/listing/product_img/animazoooki_onload.png";
            } else {
                // $rowImg = $rowImg;
                $imageFile = $rowImg[rand(0,count(($rowImg))-1)];
            }
            $sugHTML.= 
                '<a class="card-attr card_light" href="/all-products/product?id='
                .$rows['id'].
                '" title='
                .$rows['name'].
                '>
                    <div class="item-img-cont">
                        <img src="'
                        .$imageFile.
                        '" class="item-img-main" alt="'
                        .$rows['name'].
                        '" onerror="DEFOimgPlaceholder(this)">
                    </div>
                    <div class=" item-inf-cont">
                        <div class="item-inf-tex-cont">
                            <p class="item-name txt-light-inv">
                                '
                                .$rows["name"].
                                '
                            </p>
                        </div>
                        <div class="item-inf-tex-cont mb-0 pt-0">
                            <p class="item-price">$'
                            .number_format($rows["price"]).
                            '</p>
                        </div>
                        <div class="item-inf-tex-cont mt-0 pt-0">
                            <p class="item-sold-count">'
                            .number_format($rows["sold"]).
                            ' sold</p>
                        </div>
                        <div class="item-inf-tex-cont">
                            <p class="rating-cont txt-light-inv">';

                                    switch ($rows['ratings']) {
                                        case '5': $sugHTML.= '<i class="fas fa-star rated"></i><i class="fas fa-star rated"></i><i class="fas fa-star rated"></i><i class="fas fa-star rated"></i><i class="fas fa-star rated"></i>';
                                            break;
                                        case '4': $sugHTML.= '<i class="fas fa-star rated"></i><i class="fas fa-star rated"></i><i class="fas fa-star rated"></i><i class="fas fa-star rated"></i><i class="fas fa-star unrated"></i>';
                                            break;
                                        case '3': $sugHTML.= '<i class="fas fa-star rated"></i><i class="fas fa-star rated"></i><i class="fas fa-star rated"></i><i class="fas fa-star unrated"></i><i class="fas fa-star unrated"></i>';
                                            break;
                                        case '2': $sugHTML.= '<i class="fas fa-star rated"></i><i class="fas fa-star rated"></i><i class="fas fa-star unrated"></i><i class="fas fa-star unrated"></i><i class="fas fa-star unrated"></i>';
                                            break;
                                        case '1': $sugHTML.= '<i class="fas fa-star rated"></i><i class="fas fa-star unrated"></i><i class="fas fa-star unrated"></i><i class="fas fa-star unrated"></i><i class="fas fa-star unrated"></i>';
                                            break;
                                        default: $sugHTML.= '<i class="fas fa-star unrated"></i><i class="fas fa-star unrated"></i><i class="fas fa-star unrated"></i><i class="fas fa-star unrated"></i><i class="fas fa-star unrated"></i>';
                                            break;
                                    }                        
                            
                                
                                $sugHTML.='
                            </p>
                        </div>
                    </div>
                </a>';








            // mysqli_close($dbConnection);
        }catch(Exception $e){
            $_SESSION['error'] = 'Product ID : '.$prodInfo['id'].'<br>'.$e->getMessage();
            header("Location: error_logger.php");
            exit();
        } 
    }
    $sugHTML.= '</div></section>';
    echo $sugHTML;

    mysqli_close($dbConnection);
    exit();
}catch(Exception $e){
    $_SESSION['error'] = 'Product ID : '.$prodInfo['id'].'<br>'.$e->getMessage();
    header("Location: error_logger.php");
    exit();
} 