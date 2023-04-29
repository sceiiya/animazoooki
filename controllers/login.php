<?php
    require_once("important/class.database.php");
    session_start();
    
    try{
    $ConDB = new ClassDbConn;
    $eCon = $ConDB->NewCon();

            $columnU = "username";
            $valueU = $_POST['username'];
            $validU = $ConDB->ValidateExist($eCon, 'clients', $columnU, $valueU);

            $ggetData = ['username' => $_POST['username']];
            $DData = $ConDB->GSelect($eCon, 'clients', $ggetData, '', '');

            // $columnP = "password";
            $valueP = $_POST['password'];
            // $validP = $ConDB->ValidateExist($eCon, 'clients', $columnP, $valueP);

            if($validU["result"] == "true" && $DData["password"] == $valueP){
                echo "Login Success";
                    // session_destroy();
                    $getData = ['username' => $_POST['username']];
                    $Data = $ConDB->GSelect($eCon, 'clients', $getData, '', '');
                    
                    $_SESSION['username'] = $_POST['username'];
                    $_SESSION['userid'] = $Data['id'];    
                    $_SESSION['fullname'] = $Data['name'];
                    $_SESSION['email'] = $Data['email'];
                    $_SESSION['theme'] = $Data['theme'];
                    $_SESSION['status'] = $Data['status'];
                    $_SESSION['profile_img'] = $Data['profile_img'];

                    $of = ['username' => $_POST['username']];
                    $getDate=['date_last_login' => date("Y-m-d H:i:s")];
                    $up_date = $ConDB->Update($eCon, 'clients', $getDate, $of);

            }elseif($validU["result"] == "false"){
                echo "wrong username";
                // $_SESSION['error'] = json_encode($validU);
                // header("Location: error_logger.php");
                // exit();
            }elseif($validU["result"] == "true" && $valueP !== $DData["password"]){
                echo "wrong password";
                // $_SESSION['error'] = $validU;
                // header("Location: error_logger.php");
                // exit();
            }else{
                echo "user does not exist";
                // $_SESSION['error'] = $validU;
                // header("Location: error_logger.php");
                // exit();
            }
        }catch(Exception $e){
            $_SESSION['error'] = $e->getMessage();
            header("Location: error_logger.php");
            exit();
        }