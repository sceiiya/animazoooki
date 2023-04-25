<?php

    require_once('class.product.php');

    $P = new Product;
    $eP = $P->fetchRandN(2);

    // print_r($eP);
    // // echo $eP;
    // echo $eP['series'];
    $seP = json_encode($eP);
    foreach ($seP as $key => $value) {
        echo 
        'key : '.$key.'
        '.'value : '.$value.'
        
        ';
    }

?>