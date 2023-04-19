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
            // print_r($valid);
            if($valid["result"] == "true"){
                echo "Username Already Used";
            }else{
                try{                    
                    $_SESSION['email'] = $sEmail;

                    $data=[
                        "name"=> $_POST['name'],
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


    // if ( $connectionName == true) { // update this for connection name
    //     $sName = $_POST['name'];
    //     $sEmail = $_POST['email'];
    //     $sPassword = $_POST['password'];
    //     $sConfirmPass = $_POST['confirmpassword'];
        
    //     $_SESSION['email'] = $sEmail;
    //     try {
    //         $qSelect = "SELECT `password` FROM `database_name`.`table_name` WHERE `username` = '$sEmail'";
    //         $eSelect = mysqli_query($connectionName, $qSelect); // update this for connection name
    //         $rows = mysqli_fetch_assoc($eSelect);
    //         $nTotalRows = mysqli_num_rows($eSelect);

    //         if ($nTotalRows > 0 && $rows['password'] == $sPassword) {    
    //             echo "Sign-up Success";
    //             mysqli_close($connectionName);
    //         }else{
    //             echo "Sign-up Failed";
    //             mysqli_close($connectionName);
    //         }
    //     } catch(Exception $e) {
    //         echo "error";
    //     }
    // } else {
    //     echo "Failed to connect, please call system administrator!";
    // }