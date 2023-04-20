<?php     
    if(!isset($_SESSION['username'])){
        header('/forbidden/');
    }elseif(str_contains($_SESSION['username'], 'guest')){
        header('/forbidden/');
    }else{
        return "valid user";
    }