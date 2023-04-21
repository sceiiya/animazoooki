<?php   
    // require_once("important/class.database.php");
    session_start();                    
        
    // $ConDB = new ClassDbConn;
    // $eCon = $ConDB->NewCon();
    // if($eCon == true){
        try{
            $UserData = [
                'username' => $_SESSION['username'],
                'name' => $_SESSION['fullname'],
                'email' => $_SESSION['email'],
                'theme' => $_SESSION['theme'],
                'status' => $_SESSION['status'],
                'log' => "logged"
            ];

            // $_SESSION['userid'] = $Data['id'];
            // $_SESSION['fullname'] = $Data['name'];    
            // $_SESSION['email'] = $Data['email'];
            // $_SESSION['cellno'] = $Data['contactno'];
            // $_SESSION['shipping_add'] = $Data['default_shipping_address'];
            // $_SESSION['billing_add'] = $Data['billing_address'];
            // $_SESSION['ttl_ordrs'] = $Data['total_orders'];
            // $_SESSION['ttl_rvws'] = $Data['total_reviews'];

            echo json_encode($UserData);
        }catch(Exception $e){
            // echo $e->getMessage();
        }
    // }