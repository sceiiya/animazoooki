<?php
require_once('../important/class.product.php');
session_start();

$ConDB = new ClassDbConn;
$eCon = $ConDB->NewCon();

    $GetNum = $ConDB->FetchNum($eCon, 'products', 'date_archived', 'NULL');
    $ProdNum = $GetNum['total'];
    for ($i = 1; $i <= $ProdNum; $i++) {
        $DataOf = ['id' => $i];
        $DataName = $ConDB->Select($eCon, 'products', $DataOf);  
        $Prod = new Product;
        $AddProduct = $Prod->createPage($DataName['name']);
    }