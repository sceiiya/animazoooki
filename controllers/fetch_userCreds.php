<?php   
    session_start();                    
        try{
            $UserData = [
                'username' => $_SESSION['username'],
                'name' => $_SESSION['fullname'],
                'email' => $_SESSION['email'],
                'theme' => $_SESSION['theme'],
                'status' => $_SESSION['status'],
                'log' => "logged"
            ];

            echo json_encode($UserData);
        }catch(Exception $e){
            $_SESSION['error'] = $e->getMessage();
            header("Location: error_logger.php");
            exit();
        }
