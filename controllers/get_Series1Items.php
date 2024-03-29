<?php 
require_once("important/class.product.php");
try{          
    $qSelect = "SELECT * FROM $dbDatabase .`products` WHERE `series` LIKE 'Hololive%' AND`date_archived` IS NULL ORDER BY RAND() LIMIT 3";
    $eSelect = mysqli_query($dbConnection, $qSelect);

    $sugHTML = '<div class="card-cont-attr-featured-coll">';
    while($rows = mysqli_fetch_array($eSelect)) {
        $rowImg='';
        $imageFile='';
        try{
            $rowImg = json_decode($rows['images']);
            if(!$rowImg)  {
                $imageFile = "/animazoooki_onload.png";
            } else {
                $imageFile = $rowImg[rand(0,count(($rowImg))-1)];
            }
            $sugHTML.= 
                '<a class="card-attr-featured-coll card_light" href="/all-products/product?id='
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
        }catch(Exception $e){
            $_SESSION['error'] = 'Product ID : '.$prodInfo['id'].'<br>'.$e->getMessage();
            header("Location: error_logger.php");
            exit();
        } 
    }
    $sugHTML.= '</div>';
    echo $sugHTML;
    mysqli_close($dbConnection);
    exit();
}catch(Exception $e){
    $_SESSION['error'] = 'Product ID : '.$prodInfo['id'].'<br>'.$e->getMessage();
    header("Location: error_logger.php");
    exit();
} 