<?php
    require_once("important/class.database.php");
    session_start();

    $ConDB = new ClassDbConn;
    $eCon = $ConDB->NewCon();
    if ($eCon == true){
        $column = 'email';
        $value = $_POST['email'];
        try{$eValidate = $ConDB->ValidateExist($eCon, "email_list", $column, $value);
            if($eValidate['result'] == "true"){
                echo "subcribed";
            }else{
                try{$data = ['email' => $_POST['email']];
                    $eInsert = $ConDB->Insert($eCon, "email_list", $data, "");
                    if($eInsert == "true"){
                        echo "added";
                        try{$eValidate = $ConDB->ValidateExist($eCon, "clients", 'email', $_POST['email']);
                            if($eValidate['result'] == "true"){
                                $data = ['newsletter' => 'true'];
                                $of = ['email' => $_POST['email']];
                                $eUpdate = $ConDB->Update($eCon, 'clients', $data, $of);     
                            }else{
                                // return false;
                            }
                        }catch(Exception $e) {
                            $_SESSION['error'] = $e->getMessage();
                            header("Location: error_logger.php");
                            exit();
                        }
                    }else{
                        echo "failed";
                    }
                }catch(Exception $e) {
                    $_SESSION['error'] = $e->getMessage();
                    header("Location: error_logger.php");
                    exit();
                }
            }
        }catch(Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            header("Location: error_logger.php");
            exit();
        }
    }else{
        echo "not connected";
    }

?>