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

            $columnP = "password";
            $valueP = $_POST['password'];
            $validP = $ConDB->ValidateExist($eCon, 'clients', $columnP, $valueP);

            if($validU["result"] == "true" && $validP["result"] == "true"){
                echo "Login Success";
                    $getData = ['username' => $_POST['username']];
                    $Data = $ConDB->Select($eCon, 'clients', $getData);
                    
                    $_SESSION['username'] = $_POST['username'];
                    $_SESSION['userid'] = $Data['id'];    
                    $_SESSION['fullname'] = $Data['name'];
                    $_SESSION['email'] = $Data['email'];
                    $_SESSION['status'] = $Data['status'];

                    $of = ['username' => $_POST['username']];
                    $getDate=['date_last_login' => date("Y-m-d H:i:s")];
                    $up_date = $ConDB->Update($eCon, 'clients', $getDate, $of);

            }elseif($validU["result"] == "false" && $validP["result"] == "true"){
                echo "wrong username";
            }elseif($validU["result"] == "true" && $validP["result"] == "false"){
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

    // if ( $connectionName == true) { // update this for connection name
    //     $sEmail = $_POST['email'];
    //     $sPassword = $_POST['password'];
    //     $_SESSION['email'] = $sEmail;
    //     try {
    //         $qSelect = "SELECT `password` FROM `database_name`.`table_name` WHERE `username` = '$sEmail'";
    //         $eSelect = mysqli_query($connectionName, $qSelect); // update this for connection name
    //         $rows = mysqli_fetch_assoc($eSelect);
    //         $nTotalRows = mysqli_num_rows($eSelect);

    //         if ($nTotalRows > 0 && $rows['password'] == $sPassword) {    
    //             echo "Login Success";
    //             mysqli_close($connectionName);
    //         }else{
    //             echo "Login Failed";
    //             mysqli_close($connectionName);
    //         }
    //     } catch(Exception $e) {
    //         echo "error";
    //     }
    // } else {
    //     echo "Failed to connect, please call system administrator!";
    // }