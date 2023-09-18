<?php
    require_once("important/class.database.php");
    session_start();
    $ConDB = new ClassDbConn;
    $eCon = $ConDB->NewCon();
    if ($eCon == true){
        try{
            $column = "username";
            $value = $_POST['username'];
            $valid = $ConDB->ValidateExist($eCon, 'clients', $column, $value);

            $columnE = "email";
            $valueE = $_POST['email'];
            $validE = $ConDB->ValidateExist($eCon, 'clients', $columnE, $valueE);

            // print_r($valid);
            if($valid["result"] == "true"){
                echo "Username Already Used";
            }elseif($validE["result"] == "true"){
                echo "This Email is Already Used";
            }else{
                try{                    
                    $_SESSION['email'] = $_POST['email'];

                    $data=[
                        "name"=> addslashes($_POST['name']),
                        "username"=> $_POST['username'],
                        "email"=> $_POST['email'],
                        "password"=> md5($_POST['password']),
                        "date_added" => date("Y-m-d H:i:s"),
                        "contactno" => '99999999999',
                        "billing_address" => "Enter your Billing Address",
                        "default_shipping_address" => "Enter your Shipping Address",
                        "otp_code" => rand(100000, 999999)
                    ];

                    $eInsert = $ConDB->Insert($eCon, "clients", $data);
                    if($eInsert == "true"){
                        echo "Sign-up Success";
                    }else{
                        echo "Sign-up Failed";
                    }
                }catch(Exception $e) {
                    echo "error registering";
                    $_SESSION['error'] = $e->getMessage();
                    header("Location: error_logger.php");
                    exit();
                }
            }
        } catch(Exception $e) {
            echo "error validating";
            $_SESSION['error'] = $e->getMessage();
            header("Location: error_logger.php");
            exit();
        }
    }else{
        echo "not connected";
    }