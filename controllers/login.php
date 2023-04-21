<?php
    require_once("important/class.database.php"); // update this for connection path
    session_start();

    $ConDB = new ClassDbConn;
    $eCon = $ConDB->NewCon();
    if($eCon == true){
        try{

            $columnU = "username";
            $valueU = $_POST['username'];
            $validU = $ConDB->ValidateExist($eCon, 'clients', $columnU, $valueU);

            $ggetData = ['username' => $_POST['username']];
            $DData = $ConDB->Select($eCon, 'clients', $ggetData);

            // $columnP = "password";
            $valueP = $_POST['password'];
            // $validP = $ConDB->ValidateExist($eCon, 'clients', $columnP, $valueP);

            if($validU["result"] == "true" && $DData["password"] == $valueP){
                echo "Login Success";
                    // session_destroy();
                    $getData = ['username' => $_POST['username']];
                    $Data = $ConDB->Select($eCon, 'clients', $getData);
                    
                    $_SESSION['username'] = $_POST['username'];
                    $_SESSION['userid'] = $Data['id'];    
                    $_SESSION['fullname'] = $Data['name'];
                    $_SESSION['email'] = $Data['email'];
                    $_SESSION['theme'] = $Data['theme'];
                    $_SESSION['status'] = $Data['status'];

                    $of = ['username' => $_POST['username']];
                    $getDate=['date_last_login' => date("Y-m-d H:i:s")];
                    $up_date = $ConDB->Update($eCon, 'clients', $getDate, $of);

            }elseif($validU["result"] == "false"){
                echo "wrong username";
            }elseif($validU["result"] == "true" && $valueP !== $DData["password"]){
                echo "wrong password";
            }else{
                echo "user does not exist";
            }
            // $data = [
            //     'email' => 'email',
            //     'password' => 'confirmpassword',
            // ];
            // $eSelect = $ConDB->Select($eCon, "clients", $data);
            // print_r($eSelect);
        }catch(Exception $e){
            echo "login failed";
        }
    }