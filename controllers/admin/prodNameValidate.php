<?php
    require_once("../important/class.database.php");
    session_start();

    $ConDB = new ClassDbConn;
    $eCon = $ConDB->NewCon();
    if ($eCon == true){
        try{
            $column = "name";
            $value = addslashes($_POST['name']);
            $valid = $ConDB->ValidateExist($eCon, 'products', $column, $value);

            if($valid["result"] == "true"){
                echo "exist";
            }else{
                echo "new";
            }
        } catch(Exception $e) {
            echo "error validating";
            $_SESSION['error'] = $e->getMessage();
            header("Location: error_logger.php");
            exit();
        }
    }
