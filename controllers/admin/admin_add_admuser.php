<?php
    include("../important/connect_DB.php");
    session_start();
    
    if(!isset($_SESSION['admusername'])){
        header('Location: /admin/index.php');
    }else if( $_SESSION['admaccess'] == 'Agent') {
        header('Location: /admin/index.php');
    }else if( $_SESSION['admaccess'] == 'Supervisor') {
        header('Location: /admin/index.php');
    }else {
        $admAccess = $_SESSION['admaccess'];
        $admUsername = $_SESSION['admusername'];
    }

    require '../../vendor/autoload.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

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
                    $cryptPass = md5($nPassword);
                    $qInsert = "INSERT INTO $dbDatabase.`adminusers` 
                        (`adminfirstname`, `adminlastname`, `accesslevel`, `adminusername`, `adminemail`, `adminpassword`, `status` ,`date_created`, `created_by`) 
                        VALUES 
                        ('{$sFirstName}', '{$sLastName}', 'Agent', '{$sUsername}', '{$sEmail}', '{$cryptPass}', 'Active', '".date("Y-m-d H:i:s")."', '{$admUsername}')";        
                    $eInsert = mysqli_query($dbConnection, $qInsert);



                    if ($eInsert == true) {
                        echo "User added!";

                        $mail = new PHPMailer(true);

                        $mail->isSMTP();
                        $mail->Host       = 'smtp.hostinger.com';
                        $mail->SMTPAuth   = true;                  
                        include('../important/connect_Email.php');
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                        $mail->Port       = 465;
                        $mail->setFrom('support@animazoooki.wd49p.com', 'System Administrator');
                        $mail->addAddress($sEmail, $sFirstName);
                        $mail->isHTML(true);
                        $mail->Subject = "New dashboard user";
                        $mail->Body = nl2br("
                        Dashboard user account created!
                        
                        Please take note of your credentials. You now have access to Animazooki Dashboard.
                        Be reminded that your access level is on Agent level. To change access level, 
                        please contact your system administrator.

                        Do not share your credentials, you may change your password once you've logged in!
                    
                        First Name: {$sFirstName}
                        Last Name: {$sLastName}
                        Username: {$sUsername}
                        Email: {$sEmail}
                        Temporary Password: {$nPassword}
                    
                        Click <a href='https://".getenv('HTTP_HOST')."/admin/index.php'>here<a> to log in.

                        ");

                        if(!$mail->Send()) {
                            echo "Email not sent!";
                        } else {
                            echo " Email sent!";
                        }
                        mysqli_close($dbConnection);
                    } else {
                        echo "Failed to add new user";
                        mysqli_close($dbConnection);
                    }
                }
            } catch(Exception $e) {
                echo 'Error: ' .$e->getMessage();
            }
        }
    } else {
        echo "Failed to connect, please call system administrator!";
    }