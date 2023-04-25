<section class="suggest-cards-container">
<?php 

require_once('../../controllers/important/class.product.php');

try{          
    if($_GET['id']){
        $GET_PInfo = new Product;
        $prodInfo = $GET_PInfo->fetch($_GET['id']);
    }else{
        header('Location: ../');
    }
}catch(Exception $e){
    $_SESSION['error'] = 'Product ID : '.$prodInfo['id'].'<br>'.$e->getMessage();
    header("Location: ../error_logger.php");
    exit();
} 

?>
    <div class="suggest-card-cont-attr">

        <a class="suggest-card-attr card_light" href="/all-products/Shalltear-Bloodfallen_t-shirt/" title="Shalltear Bloodfallen OVERLORD Anime Series inspired T-shirt">
            <div class="suggest-item-img-cont">
                <img src="/all-products/Shalltear-Bloodfallen_t-shirt/1.jpg" class="suggest-item-img-main"  onerror="DEFOimgPlaceholder(this)" alt="">
            </div>
            <div class=" suggest-item-inf-cont">
                <div class="suggest-item-inf-tex-cont">
                    <p class="suggest-item-name txt-light-inv">
                        Shalltear Bloodfallen OVERLORD Anime Series inspired T-shirt
                    </p>
                </div>
            </div>
        </a>

        <a class="suggest-card-attr card_light" href="/all-products/minato-aqua-scale-figurine/" title="Minato Aqua: Aqua Iro Super Dream Ver. 1/7 Scale Figure">
            <div class="suggest-item-img-cont">
                <img src="/all-products/minato-aqua-scale-figurine/1.jpg" class="suggest-item-img-main"  onerror="DEFOimgPlaceholder(this)" alt="">
            </div>
            <div class=" suggest-item-inf-cont">
                <div class="suggest-item-inf-tex-cont">
                    <p class="suggest-item-name txt-light-inv">
                        Minato Aqua: Aqua Iro Super Dream Ver. 1/7 Scale Figure
                    </p>
                </div>
            </div>
        </a>

        <a class="suggest-card-attr card_light"  href="/all-products/Enna-Alouette_t-shirt/" title="Enna Alouette NIJISANJI EN inspired T-shirt">
            <div class="suggest-item-img-cont">
                <img src="/all-products/Enna-Alouette_t-shirt/3.jpg" class="suggest-item-img-main"  onerror="DEFOimgPlaceholder(this)" alt="">
            </div>
            <div class=" suggest-item-inf-cont">
                <div class="suggest-item-inf-tex-cont">
                    <p class="suggest-item-name txt-light-inv">
                        Enna Alouette NIJISANJI EN inspired T-shirt
                    </p>
                </div>
            </div>
        </a>

    </div>
</section>