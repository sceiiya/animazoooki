<?php

require_once('../important/class.product.php');
session_start();

$ConDB = new ClassDbConn;
$eCon = $ConDB->NewCon();

    $GetNum = $ConDB->FetchNum($eCon, 'products', 'date_archived', 'NULL');
    $ProdNum = $GetNum['total'];
    for ($i = 0; $i < $ProdNum; $i++) {
        $DataOf = ['id' => $ProdNum];

        $DataName = $ConDB->Select($eCon, 'products', $DataOf);    
        $Prod = new Product;
        $AddProduct = $Prod->createPage($DataName['name']);
    }

    // $DataOf = ['id' => $ProdNum];

    // $ImgData = $ConDB->Select($eCon, 'products', $DataOf);
    // if($validU["result"] == "true" && $DData["password"] == $valueP){
        // $FFF;
        // foreach (json_decode($ImgData['name']) as $key => $value) {
        //     $Prod = new Product;
        //     $AddProduct = $Prod->createPage($DataOf['name']);
        // }

    // $Name = "Mama Mia";

    // $Prod = new Product;
    // $AddProduct = $Prod->createPage($Name);