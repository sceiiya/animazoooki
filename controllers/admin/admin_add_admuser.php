<?php
    include("../important/connect_DB.php");
    
    session_start();

    if(!isset($_SESSION['admusername'])){
        header('Location: /admin/login/index.php');
    }else{
        $admAccess = $_SESSION['admaccess'];
        $admUsername = $_SESSION['admusername'];
    }

    if ($dbConnection == true) {
        $sFirstName = addslashes($_POST['regfirstname']);
        $sLastName = addslashes($_POST['reglastname']);
        $sUsername = $_POST['regusername'];  
        $sEmail = $_POST['regemail'];
        $nPassword = substr(sha1(mt_rand()),17,12);

        
        if ( $sFirstName == "" || $sLastName == "" || $sUsername == "" || $sEmail == "") {
            echo "Incomplete, please fill out all fields!";
            mysqli_close($dbConnection);
        } else { 
            try {
                // Username checker if already used
                $qUserNselect = "SELECT `adminusername` FROM $dbDatabase.`adminusers`  WHERE `adminusername` = '$sUsername'";
                $eUserNselect = mysqli_query($dbConnection, $qUserNselect); 
                $userNameRows = mysqli_fetch_assoc($eUserNselect);
                $nUserTotalRows = mysqli_num_rows($eUserNselect);

                if ($nUserTotalRows > 0) {
                    echo "Username already used!";
                    mysqli_close($dbConnection);
                } else {
                    $qInsert = "INSERT INTO $dbDatabase.`adminusers` 
                        (`adminfirstname`, `adminlastname`, `accesslevel`, `adminusername`, `adminemail`, `adminpassword`, `status` ,`date_created`, `created_by`) 
                        VALUES 
                        ('{$sFirstName}', '{$sLastName}', 'Agent', '{$sUsername}', '{$sEmail}', '{$nPassword}', 'Active', '".date("Y-m-d H:i:s")."', '{$admUsername}')";        
                    $eInsert = mysqli_query($dbConnection, $qInsert);

                    if ($eInsert == true) {
                        echo "Admin Added!";
                        require_once('../../phpmailer/class.phpmailer.php');

                        $mail = new PHPMailer();
                        
                        $mail->IsSMTP();
                        // $mail->SMTPDebug = 2;
                        $mail->SMTPAuth 	= true;
                    
                        $mail->Host 	  = 'smtp.hostinger.com';
                        include("../important/connect_Email.php");
                        $mail->FromName   = "System Administrator";
                        $mail->SMTPSecure = 'ssl';
                        $mail->Port 	  = 465;                        
                        
                        $mail->AddAddress($sEmail, $sFirstName);
                    
                        $mail->Subject = "New admin user";
                        $mail->Body = nl2br("
                        New admin user account created!
                        
                        Please take note of your credentials. You now have access to Animazooki Dashboard.
                        Be reminded that your access level is on Agent level. To change access level, 
                        please contact your system administrator.

                        Do not share your credentials, you may change your password once you've logged in!
                    
                        First Name: {$sFirstName}
                        Last Name: {$sLastName}
                        Username: {$sUsername}
                        Email: {$sEmail}
                        Password: {$nPassword}
                    
                        Click <a href='http://localhost/admin/login/index.php'>here<a> to log in.

                        ");
                        
                        $mail->IsHTML(true);

                        // if(!$mail->Send()) {
                        //     echo "not sent";
                        // } else {
                        //     echo "sent";
                        // }

                        mysqli_close($dbConnection);
                    } else {
                        echo "Faile to add new admin";
                        mysqli_close($dbConnection);
                    }
                }
            } catch(Exception $e) {
                echo 'Error: ' .$e->getMessage();
            }

        }

    } else {
        echo "Connection Failed!";
    }