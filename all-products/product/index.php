<!DOCTYPE html>
<html lang="en">

<head>
    <!-- head meta tags and css links -->
    <?php include("../../includes/head.php"); ?>
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
    <title id="PRODUCT_TITLE"><?php try{echo $prodInfo['name'].' | Animazoooki Merch Co.';}catch(Exception $e){$_SESSION['error'] = 'Product ID : '.$prodInfo['id'].'<br>'.$e->getMessage();header("Location: ../error_logger.php");exit();} ?></title>
</head>

<body class="bg-light">

<!-- messenger -->
    <?php include('../../includes/messenger_plugin.php'); ?>
<!-- toaster -->
    <?php include("../../includes/cart_toaster.php"); ?>
<!-- back to top -->
    <?php include('../../includes/back_to_top.php'); ?>
<!-- promo -->
    <?php include("../../includes/promo_animation.php"); ?>
<!-- header -->
    <?php include("../../includes/headers.php"); ?>
<!-- login modal -->
    <?php include("../../includes/login_modal.php"); ?>
<!-- signup modal -->
    <?php include("../../includes/signup_modal.php"); ?>
<!-- navigation bar heading -->
    <?php include("../../includes/main_navbar_header.php"); ?>

    <section class="wrapper">
        <!--left side of the main--->
        <aside class="side-l">

        <input type="number" id="pID" value="<?php try{echo $prodInfo['id'];}catch(Exception $e){$_SESSION['error'] = 'Product ID : '.$prodInfo['id'].'<br>'.$e->getMessage();header("Location: ../error_logger.php");exit();} ?>" style="display: none;">
            <!-- <div class="chat-div">
            chat assistant
           </div> -->

        </aside>
        <!--left side of the main--->

        <!--content of the main--->
        <main class="ind-product-cont bg-light-in">

            <div class="product-main-inf">
                <div class="product-imgs-cont">
                    <div class="product-img-cont">
                        <img class="product-img-main" loading='lazy' src="<?php try{echo json_decode($prodInfo['images'])[0];}catch(Exception $e){$_SESSION['error'] = 'Product ID : '.$prodInfo['id'].'<br>'.$e->getMessage();header('Location: ../error_logger.php');exit();} ?>"
                            alt="" onerror="ProdimgPlaceholder(this);">
                    </div>
                    <!-- <ul class="product-img-sub-cont-holder"> -->
                    <?php try{
                        $subIMG = '<ul class="product-img-sub-cont-holder">';
                        foreach(json_decode($prodInfo['images']) as $key => $value) {
                            $activeClass = $key == 0 ? ' active' : '';
                            $subIMG .=
                                '<li class="product-img-sub-cont' . $activeClass . '">
                            <img class="product-img-sub" loading="lazy" src="'.$value.'"
                            alt="" onerror="ProdimgPlaceholder(this);">
                            </li>';
                        }
                        echo $subIMG;
                        // echo json_decode($prodInfo['images'])[1];
                        }catch(Exception $e){
                            $_SESSION['error'] = 'Product ID : '.$prodInfo['id'].'<br>'.$e->getMessage();
                            header('Location: ../error_logger.php');
                            exit();
                        } ?>
                        <!-- <li class="product-img-sub-cont active">
                            <img class="product-img-sub" loading='lazy' src="php script here"
                                alt="" onerror="ProdimgPlaceholder(this);">
                        </li>
                        <li class="product-img-sub-cont">
                            <img class="product-img-sub" loading='lazy' src="/all-products/Usada-Pekora_t-shirt/2.jpg"
                                alt="" onerror="ProdimgPlaceholder(this);">
                        </li>
                        <li class="product-img-sub-cont">
                            <img class="product-img-sub" loading='lazy' src="/all-products/Usada-Pekora_t-shirt/3.jpg"
                                alt="" onerror="ProdimgPlaceholder(this);">
                        </li>
                        <li class="product-img-sub-cont">
                            <img class="product-img-sub" loading='lazy' src="/all-products/Usada-Pekora_t-shirt/4.jpg"
                                alt="" onerror="ProdimgPlaceholder(this);">
                        </li> -->
                    </ul>
                </div>
                <div class="product-inf-cont">
                    <div class="product-name txtl">
                    <?php try{echo $prodInfo['name'];}catch(Exception $e){$_SESSION['error'] = 'Product ID : '.$prodInfo['id'].'<br>'.$e->getMessage();header("Location: ../error_logger.php");exit();} ?>
                    </div>
                    <div class="product-headinf-cont my-1">
                        <em class="product-sold-count">
                        <?php try{echo $prodInfo['sold'].' sold';}catch(Exception $e){$_SESSION['error'] = 'Product ID : '.$prodInfo['id'].'<br>'.$e->getMessage();header("Location: ../error_logger.php");exit();} ?>
                        </em>
                        &nbsp;&nbsp;|&nbsp;&nbsp;
                        <div class="product-rating-cont txtc">
                        <?php try{
                            switch ($prodInfo['ratings']) {
                                case '5': echo '<i class="fas fa-star rated"></i><i class="fas fa-star rated"></i><i class="fas fa-star rated"></i><i class="fas fa-star rated"></i><i class="fas fa-star rated"></i>';
                                    break;
                                case '4': echo '<i class="fas fa-star rated"></i><i class="fas fa-star rated"></i><i class="fas fa-star rated"></i><i class="fas fa-star rated"></i><i class="fas fa-star unrated"></i>';
                                    break;
                                case '3': echo '<i class="fas fa-star rated"></i><i class="fas fa-star rated"></i><i class="fas fa-star rated"></i><i class="fas fa-star unrated"></i><i class="fas fa-star unrated"></i>';
                                    break;
                                case '2': echo '<i class="fas fa-star rated"></i><i class="fas fa-star rated"></i><i class="fas fa-star unrated"></i><i class="fas fa-star unrated"></i><i class="fas fa-star unrated"></i>';
                                    break;
                                case '1': echo '<i class="fas fa-star rated"></i><i class="fas fa-star unrated"></i><i class="fas fa-star unrated"></i><i class="fas fa-star unrated"></i><i class="fas fa-star unrated"></i>';
                                    break;
                                default: echo '<i class="fas fa-star unrated"></i><i class="fas fa-star unrated"></i><i class="fas fa-star unrated"></i><i class="fas fa-star unrated"></i><i class="fas fa-star unrated"></i>';
                                    break;
                            }                        
                        }catch(Exception $e){$_SESSION['error'] = 'Product ID : '.$prodInfo['id'].'<br>'.$e->getMessage();header("Location: ../error_logger.php");exit();} ?>
                            &nbsp;&nbsp;|&nbsp;&nbsp; 
                        <em class="product-rating-count">
                        <?php try{echo number_format($prodInfo['reviews']).' reviews';}catch(Exception $e){$_SESSION['error'] = 'Product ID : '.$prodInfo['id'].'<br>'.$e->getMessage();header("Location: ../error_logger.php");exit();} ?>
                        </em>&nbsp;&nbsp;|&nbsp;&nbsp;
                        <em class="product-stocks-count txtred">
                        <?php try{echo number_format($prodInfo['stocks']).' in stock';}catch(Exception $e){$_SESSION['error'] = 'Product ID : '.$prodInfo['id'].'<br>'.$e->getMessage();header("Location: ../error_logger.php");exit();} ?>
                        </em>
                        </div>
                    </div>
                    <div class="clflx txtl">
                        <strong><label class="item-price">$<?php try{echo number_format($prodInfo['price']);}catch(Exception $e){$_SESSION['error'] = 'Product ID : '.$prodInfo['id'].'<br>'.$e->getMessage();header("Location: ../error_logger.php");exit();} ?></label></strong>
                        <div><label>Shipping:</label>&nbsp;&nbsp;<label>From Overseas</label></div>
                        <div><label>Availability:</label>&nbsp;&nbsp;
                        <label>
                        <?php try{
                            if(!is_numeric($prodInfo['stocks'])){
                                echo 'out of stocks! please notice our support';
                            }elseif($prodInfo['stocks'] == 0){
                                echo 'out of stocks! please notice our support';
                            }elseif($prodInfo['stocks'] <= 20){
                                echo 'Limited stocks! only '.$prodInfo['stocks'].' left!';
                            }else
                            echo 'In-stock';              
                            }catch(Exception $e){$_SESSION['error'] = 'Product ID : '.$prodInfo['id'].'<br>'.$e->getMessage();header("Location: ../error_logger.php");exit();} ?>
                        </label></div>
                    </div>
                    <div>&nbsp;</div>
                    <div class="txtl">
                        <label id="pCateg">Category:</label>&nbsp;&nbsp;
                        <label id="pCateg">
                        <?php try{echo $prodInfo['category'];}catch(Exception $e){$_SESSION['error'] = 'Product ID : '.$prodInfo['id'].'<br>'.$e->getMessage();header("Location: ../error_logger.php");exit();} ?>
                        </label>&nbsp;&nbsp;|&nbsp;&nbsp; 
                        <label id="pCateg">Series:</label>&nbsp;&nbsp;
                        <label id="pCateg">
                        <?php try{echo $prodInfo['series'];}catch(Exception $e){$_SESSION['error'] = 'Product ID : '.$prodInfo['id'].'<br>'.$e->getMessage();header("Location: ../error_logger.php");exit();} ?>
                        </label>
                    </div>

                    <div class="clflx txtl">
                        <div>
                            Variation:
                        </div>
                        <!-- <div class="rwflx"> -->
                        <?php try{
                        $pVars = '<div class="rwflx">';
                        foreach(json_decode($prodInfo['variation']) as $key => $value) {
                            $pVars .=
                            '<button class="product-variation"><label for="product-name">'.$value.'</label></button>';
                        }
                        echo $pVars;
                        }catch(Exception $e){
                            $_SESSION['error'] = 'Product ID : '.$prodInfo['id'].'<br>'.$e->getMessage();
                            header('Location: ../error_logger.php');
                            exit();
                        } ?>
                        </div>
                        <div>
                            Size:
                        </div>

                        <?php try{
                        $pSizes = '<div class="rwflx">';
                        foreach(json_decode($prodInfo['sizes']) as $key => $value) {
                            $pSizes .=
                            '<button class="product-variation"><label for="product-name">'.$value.'</label></button>';
                        }
                        echo $pSizes;

                    }catch(Exception $e){
                            $_SESSION['error'] = 'Product ID : '.$prodInfo['id'].'<br>'.$e->getMessage();
                            header('Location: ../error_logger.php');
                            exit();
                        } ?>

                        </div>
                    </div>
                    <div class="rwflx txtl">
                        <div class="qty w100 mt-5 txtr me-1">
                            <!-- <span class="minus">-</span>
                            <input type="number" class="count" name="qty" value="1">
                            <span class="plus">+</span> -->
                            <button type="button" class="product cart-button" id="liveToastBtn">Add to Cart</button>
                            <button class="product buy-button"><a href="/all-products/checkout/">Buy Now</a></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-desc txtl pt-3 ps-2">
                Product Description:<br/>
                Product Name: <?php try{echo $prodInfo['name'];}catch(Exception $e){$_SESSION['error'] = 'Product ID : '.$prodInfo['id'].'<br>'.$e->getMessage();header("Location: ../error_logger.php");exit();} ?><br/><br/>

                Series: <?php try{echo $prodInfo['series'];}catch(Exception $e){$_SESSION['error'] = 'Product ID : '.$prodInfo['id'].'<br>'.$e->getMessage();header("Location: ../error_logger.php");exit();} ?>
                <br/>
                Manufacturer: <?php try{echo $prodInfo['manufacturer'];}catch(Exception $e){$_SESSION['error'] = 'Product ID : '.$prodInfo['id'].'<br>'.$e->getMessage();header("Location: ../error_logger.php");exit();} ?>
                <br/>
                Designer: <?php try{echo $prodInfo['designer'];}catch(Exception $e){$_SESSION['error'] = 'Product ID : '.$prodInfo['id'].'<br>'.$e->getMessage();header("Location: ../error_logger.php");exit();} ?>
                <br/>
                <br/><br/>
                <?php try{echo str_replace("  ", "<br>", wordwrap($prodInfo['description'], 120, "<br/>"));}catch(Exception $e){$_SESSION['error'] = 'Product ID : '.$prodInfo['id'].'<br>'.$e->getMessage();header("Location: ../error_logger.php");exit();} ?>
                <br/><br/>

            </div>
            <br/><br/><br/>
            <div class="product-foot-div">

                Customer Reviews
            </div>
            <?php 
            try{
                $RevInfo = $GET_PInfo->fetchReview($prodInfo['id']);

                $rvHTML = "</div>";
                    if($RevInfo->num_rows != 0 ){
                        foreach($RevInfo as $RevInfo){
                            $rvHTML .= "<p><strong>".$RevInfo['username']."</strong>- ".$RevInfo['rating_comment']."<br/>".$RevInfo['date_reviewed']." > ".$RevInfo['rating']." out of 5!</p><br/><br/>";
                        }
                    }else{
                        $rvHTML .= "<br/><br/>No Reviews Yet<br/><br/>";
                    }
                echo $rvHTML;
            }catch(Exception $e){
            $_SESSION['error'] = 'Product ID : '.$prodInfo['id'].'<br>'.$e->getMessage();
                header("Location: ../error_logger.php");
                exit();
                } 
            ?>
            <div class="product-foot-div">
                Similar Products
            </div>
            <div id="sim-prods">

            </div>

        </main>
        <!-- end of content for the main--->

        <!--right side of the main--->
        <aside class="side-r ">
            <aside class="side-sec-t">
<!-- suggest top product container here -->
                <?php include("../../includes/right_top_suggest_side.php"); ?>
            </aside>

            <aside class="side-sec-b">
<!-- suggest bottom article container here -->
                <?php include("../../includes/right_bottom_suggest_side.php"); ?>
            </aside>
        </aside>
        <!--end of right side of the main--->
    </section>

<!-- footer -->
<?php include("../../includes/footer.php"); ?>
</body>
</html>
<!-- scripts libries -->
<?php include("../../includes/scripts_library.php"); ?>
<script src="/assets/js/script.js"></script>
<script src="/assets/js/products.js"></script>
<?php include("../../includes/validatorControl.php"); ?>