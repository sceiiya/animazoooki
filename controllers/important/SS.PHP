<?php

    require_once('class.product.php');

    $P = new Product;
    $eP = $P->fetchRandN(4);

    foreach ($seP as $key => $value) {
        echo 
        'key : '.$key.'
        '.'value : '.$value.'
        
        ';
    }

?>