<?php
    require_once("important/class.database.php"); // update this for connection path
    session_start();

    $ConDB = new ClassDbConn;
    $eCon = $ConDB->NewCon();
    if($eCon == true){
        try{
            $data = [
                'email' => $_POST['username'],
                'password' => $_POST['password'],
            ];
            echo $data["email"];
        }catch(Exception $e){
            return "login failed";
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