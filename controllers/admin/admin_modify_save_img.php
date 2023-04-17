<?php
    include("../important/connect_DB.php");

    session_start();

    $index = $_SESSION['index'];
    
    if ($dbConnection == true) {
        $Pimg = $_FILES['image'];
        $Pname = $_POST['name'];

        if($Pimg == "") {
            echo "Missing image file!";
            mysqli_close($dbConnection);
        } else { 
            try {
                    $ext = pathinfo($Pimg['name'], PATHINFO_EXTENSION);
                    $Pimgname = uniqid() . '.' . $ext;
                    move_uploaded_file($Pimg['tmp_name'], '../../admin/listing/product_img/' . $Pimgname);
        
                    $qInsert = "UPDATE $dbDatabase.`products` SET `image` = '$Pimgname' WHERE `id` = '$index'";
        
                    $eInsert = mysqli_query($dbConnection, $qInsert);
                    
                        if ($eInsert == true) {
                            echo "Image file saved!";
                            mysqli_close($dbConnection);
                        } else {
                            echo "Failed to save image!";
                            mysqli_close($dbConnection);
                        }
            } catch(Exception $e) {
                echo 'Error: ' .$e->getMessage();
                mysqli_close($dbConnection);
            }
        }
    } else {
        echo "Connection Failed!";
    }