<?php

session_start();

    if(!isset($_SESSION['admusername'])){
        header('Location: /admin/login/index.php');
    }else{
        $admAccess = $_SESSION['admaccess'];
        $admUsername = $_SESSION['admusername'];
        $admId = $_SESSION['admid'];    
        $admFirstName = $_SESSION['admfirstname'];
        $admLastName = $_SESSION['admlastname'];
        $admEmail = $_SESSION['admemail'];
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" onerror="GetCDNFailed()"/>
    <title>Animazooki Dashboard</title>

</head>

<body style="display:flex; width: 100%; justify-content:space-between; flex-direction:row">
    <input id="accessChecker" value="<?php echo $admAccess ?>" style="display: none;">
    <div class="containerr">
        <div class="navigation ADMINNavCont ADMINNavCont-out">
            <ul>
                <li>
                    <a id='TOGicon' href="#">
                        <span class="icon" style="z-index: 50;"><ion-icon name="settings-outline"></ion-icon></span>
                        <span class="title ADMINheadNavs">Animazooki Admin</span>
                    </a>
                </li>
                <li>
                    <a id="adminDashboard">
                        <span class="icon"><ion-icon name="speedometer-outline"></ion-icon></span>
                        <span class="title ADMINheadNavs">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a id="adminProducts">
                        <span class="icon"><ion-icon name="layers-outline"></ion-icon></span>
                        <span class="title ADMINheadNavs">Products</span>
                    </a>
                </li>
                <li>
                    <a id="adminCustomers">
                        <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                        <span class="title ADMINheadNavs">Customers</span>
                    </a>
                </li>
                <li>
                    <a id="adminOrders">
                        <span class="icon"><ion-icon name="cube-outline"></ion-icon></span>
                        <span class="title ADMINheadNavs">Orders</span>
                    </a>
                </li>
                <li>
                    <a id="adminUsers">
                        <span class="icon"><ion-icon name="people-circle-outline"></ion-icon></span>
                        <span class="title ADMINheadNavs">Admin Users</span>
                    </a>
                </li>
                <!-- <li>
                    <a id="adminAccess">
                        <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                        <span class="title">Access</span>
                    </a>
                </li> -->
                <li>
                    <a id="adminChangePass">
                        <span class="icon"><ion-icon name="key-outline"></ion-icon></span>
                        <span class="title ADMINheadNavs">Change Password</span>
                    </a>
                </li>
                <li>
                    <a id="adminSignout">
                        <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                        <span class="title ADMINheadNavs">Sign Out</span>
                    </a>
                </li>
            </ul>

        </div>

        <!-- main -->
        <div class="mainAdmin">

        </div>
    </div>

    <?php include("../../includes/admin/modals/admin_modals.php"); ?>

</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="/assets/js/jquery-3.6.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" onerror="GetCDNFailed()"></script>
<script src="/assets/js/adminscripts.js"></script>
<script src="/assets/js/admin_addProduct.js"></script>
<?php
try{          
    if(isset($_GET['status'])){
        switch ($_GET['status']) {
            case 'success':
                echo '<script>toastr.success("Saved Succesfully, you can now view the product!", "Product Listed!");</script>';
                break;
            case 'failed':
                echo '<script>)toastr.warning("Something went wrong", "Product Listing Failed!");</script>';
                break;
            case 'error':
                echo '<script>toastr.error("Something went wrong", "Action Error!");</script>';
                break;
                case 'successM':
                    echo '<script>toastr.success("Updated Succesfully, you can now view the product!", "Product Modified!");</script>';
                    break;
                case 'failedM':
                    echo '<script>)toastr.warning("Something went wrong", "Updating Product Failed!");</script>';
                    break;
            default: exit();
                break;
        }
    }else{
        exit();
        // header('Location: ../');
    }
}catch(Exception $e){
    $_SESSION['error'] = '<br>'.$e->getMessage();
    header("Location: ../error_logger.php");
    exit();
} 

?>