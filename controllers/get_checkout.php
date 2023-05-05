<?php

// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cart_items'])) {
    // if (isset($_POST['cart_items'])) {

    $cart_items = json_decode($_POST['checking'], true);
    // $cart_items = [{"cart_id":"4","prod_id":"100104","quantity":"2"}…"cart_id":"2","prod_id":"100137","quantity":"1"}];
    $res='';
    foreach ($cart_items as $cart_item) {
        $cart_id = $cart_item['cart_id'];
        $prod_id = $cart_item['prod_id'];
        $quantity = $cart_item['quantity'];
        $res .= "Cart Item: {$cart_id}, Quantity: {$quantity}, Prod ID: {$prod_id}\n";
    }
    $res.="Subtotal: ".$_POST['subtotal']."\nShipping Fee: ".$_POST['shiptotal']."\nTotal: ".$_POST['total']."\n";
    echo $res;
// }










    // // $itemz = $_POST['cart_items']; 
    // $itemz = "[{\"cart_id\":\"3\",\"quantity\":\"1\"},{\"cart_id\":\"1\",\"quantity\":\"3\"}]";
    // $items = json_decode($itemz);
    // echo $itemz;
    // foreach ($itemz as $key => $value) {
    //     # code...
    // }