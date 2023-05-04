<?php
    require_once("important/class.database.php");
    session_start();

    $ConDB = new ClassDbConn;
    $eCon = $ConDB->NewCon();
    if ($eCon == true){
        try{
            $cart = [
                'client_id' => $_SESSION['userid'],
                'product_id' => $_POST['id'],
                'qnty' => '1',
                'date_added' => date("Y-m-d H:i:s")
            ];
            $eInsert = $ConDB->Insert($eCon, "clientcart", $cart);
                if($eInsert == "true"){
                    echo "true";
                }else{
                    echo "false";
                }
            }catch(Exception $e) {
                echo "error registering";
                $_SESSION['error'] = $e->getMessage();
                header("Location: error_logger.php");
                exit();
            }
    }else{
        echo "not connected";
    }