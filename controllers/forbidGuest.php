<?php

    ob_start(); 

    ob_end_flush(); 

    // session_start();
    // $_SESSION['name'] = "guest";

    if(!isset($_SESSION['username'])){
        header('Location: /forbidden/');
        exit; 
    }elseif(str_contains($_SESSION['username'], 'guest')){
        header('Location: /forbidden/');
        exit; 
    }else{
        return "valid user";
    }