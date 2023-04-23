<?php

require_once('../important/class.product.php');
session_start();

    $Name = "Mama Mia";

    $Prod = new Product;
    $AddProduct = $Prod->createPage($Name);