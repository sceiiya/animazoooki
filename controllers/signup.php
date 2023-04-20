<?php
    require_once("important/class.database.php"); // update this for connection path
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
                    $_SESSION['email'] = $sEmail;

                    $data=[
                        "name"=> addslashes($_POST['name']),
                        "username"=> $_POST['username'],
                        "email"=> $_POST['email'],
                        "password"=> $_POST['password'],
                        "date_added" => date("Y-m-d H:i:s"),
                        "otp_code" => rand(100000, 999999)
                    ];

                    $eInsert = $ConDB->Insert($eCon, "clients", $data, "");
                    if($eInsert == "true"){
                        echo "Sign-up Success";
                    }else{
                        echo "Sign-up Failed";
                    }
                }catch(Exception $e) {
                    echo "error registering";
                }
            }
        } catch(Exception $e) {
            echo "error validating";
        }

    }else{
        echo "not connected";
    }