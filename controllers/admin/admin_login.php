<?php
    include("../important/connect_DB.php");
    session_start();

    if ($dbConnection == true) {
        $sUsername = $_POST['username'];
        $sPassword = md5($_POST['password']);

        if ($sUsername == "" || $sPassword == "") {
            echo "Incomplete, please fill out all fields!";
            
        } else {
            try {
                //Username checker if existing in database
                $qUserSelect = "SELECT `adminusername` FROM $dbDatabase.`adminusers` WHERE `adminusername` = '$sUsername'";
                $eUserSelect = mysqli_query($dbConnection, $qUserSelect);
                $userRows = mysqli_fetch_assoc($eUserSelect);
                $nUserTotalRows = mysqli_num_rows($eUserSelect);

                if($nUserTotalRows < 1) {
                    echo "Invalid username or password";
                    mysqli_close($dbConnection);
                } else if ($nUserTotalRows > 0){
                // Check if password is correct
                    $qUserPassSelect = "SELECT `adminpassword` FROM $dbDatabase.`adminusers` WHERE `adminusername` = '$sUsername'";
                    $eUserPassSelect = mysqli_query($dbConnection, $qUserPassSelect);
                    $userPassRows = mysqli_fetch_assoc($eUserPassSelect);
                    if($userPassRows['adminpassword'] != $sPassword){
                        echo "Invalid username or password";
                        mysqli_close($dbConnection);
                    } else if ($userPassRows['adminpassword'] == $sPassword){
                    // Check status of the account
                        $qStatSelect = "SELECT `status` FROM $dbDatabase.`adminusers` WHERE `adminusername` = '$sUsername' AND `adminpassword` = '$sPassword'";
                        $eStatSelect = mysqli_query($dbConnection, $qStatSelect);
                        $statRows = mysqli_fetch_assoc($eStatSelect);

                        if ($statRows['status'] == "Active") {
                            $qSelect = "SELECT `accesslevel`, `adminid`, `adminfirstname`, `adminlastname`, `adminemail` FROM $dbDatabase.`adminusers` WHERE `adminusername` = '$sUsername'";
                            $eSelect = mysqli_query($dbConnection, $qSelect);
                            $rows2 = mysqli_fetch_assoc($eSelect);

                                $_SESSION['admaccess'] = $rows2['accesslevel'];
                                $_SESSION['admusername'] = $sUsername;
                                $_SESSION['admid'] = $rows2['adminid'];    
                                $_SESSION['admfirstname'] = $rows2['adminfirstname'];
                                $_SESSION['admlastname'] = $rows2['adminlastname'];
                                $_SESSION['admemail'] = $rows2['adminemail'];
                                echo "Login Success";
                                mysqli_close($dbConnection);

                        } else {
                            echo "Account Inactive/Disabled";
                            mysqli_close($dbConnection);
                        }
                    }
                }
            } catch(Exception $e) {
                echo "Error";
            }
        }
    } else {
        echo "Failed to connect, please call system administrator!";
    }