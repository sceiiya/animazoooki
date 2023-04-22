<?php
    include("../important/connect_DB.php");

    session_start();

    if(!isset($_SESSION['admusername'])){
        header('Location: /admin/index.php');
    }else if( $_SESSION['admaccess'] == 'Agent') {
        header('Location: /admin/index.php');
    }else {
        $admAccess = $_SESSION['admaccess'];
        $admUsername = $_SESSION['admusername'];
    }
    
    if ($dbConnection == true) {
        $Pcode = $_POST['code'];  
        $Pname = $_POST['name'];
        $Pprice = $_POST['price'];
        $Pqty = $_POST['qty'];
        $Pdesc = $_POST['description'];
        
        if( $Pcode == "" || $Pname == "" || $Pprice == "" || $Pqty == "" || $Pdesc == "") {
            echo "Incomplete";
            mysqli_close($dbConnection);
        } else { 
            try {
                    $qInsert = "INSERT INTO $dbDatabase.`products` 
                        (`category`, `name`, `price`, `stocks`, `description`, `date_added`, `added_by`) 
                        VALUES 
                        ('{$Pcode}', '{$Pname}', '{$Pprice}', '{$Pqty}', '{$Pdesc}','".date("Y-m-d H:i:s")."', '{$admUsername}')";
        
                    $eInsert = mysqli_query($dbConnection, $qInsert);
                    
                        if ($eInsert == true) {
                            echo "Product info saved!";
                            mysqli_close($dbConnection);
                        } else {
                            echo "Failed to save!";
                            mysqli_close($dbConnection);
                        }
            } catch(Exception $e) {
                echo 'Error: ' .$e->getMessage();
                mysqli_close($dbConnection);
            }

        }

    } else {
        echo "Failed to connect, please call system administrator!";
    }