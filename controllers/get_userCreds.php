<?php   
    require_once("important/class.database.php");
    session_start();                    
        
    $ConDB = new ClassDbConn;
    $eCon = $ConDB->NewCon();
    if($eCon == true){
        try{  
            $getData = ['username' => $_SESSION['username']];
            $Data = $ConDB->GSelect($eCon, 'clients', $getData, '', '');
            
            $_SESSION['userid'] = $Data['id'];
            $_SESSION['fullname'] = $Data['name'];    
            $_SESSION['email'] = $Data['email'];
            $_SESSION['cellno'] = $Data['contactno'];
            $_SESSION['shipping_add'] = $Data['default_shipping_address'];
            $_SESSION['billing_add'] = $Data['billing_address'];
            $_SESSION['ttl_ordrs'] = $Data['total_orders'];
            $_SESSION['ttl_rvws'] = $Data['total_reviews'];
            
            echo "success";
            // return "success";
            // $_SESSION['status'] = $Data['status'];
        }catch(Exception $e){
            $_SESSION['error'] = $e->getMessage();
            header("Location: error_logger.php");
            exit();
        }
    }else{
        echo "not connected";
    }