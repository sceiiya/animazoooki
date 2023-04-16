<?php
    include("../important/connect_DB.php");
    
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
                        (`category`, `name`, `price`, `stocks`, `description`, `date_added`) 
                        VALUES 
                        ('{$Pcode}', '{$Pname}', '{$Pprice}', '{$Pqty}', '{$Pdesc}','".date("Y-m-d H:i:s")."')";
        
                    $eInsert = mysqli_query($dbConnection, $qInsert);
                    
                        if ($eInsert == true) {
                            echo "Product info saved!";
                            mysqli_close($dbConnection);
                        } else {
                            echo "Failed to save!";
                            mysqli_close($dbConnection);
                        }
                // }
            } catch(Exception $e) {
                echo 'Error: ' .$e->getMessage();
                mysqli_close($dbConnection);
            }

        }

    } else {
        echo "Connection Failed!";
    }