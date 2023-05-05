<?php
include("../important/connect_DB.php");

session_start();

if (!isset($_SESSION['admusername'])) {
    header('Location: /admin/index.php');
} else {
    $admAccess = $_SESSION['admaccess'];
    $admUsername = $_SESSION['admusername'];
    $admId = $_SESSION['admid'];
    $admFirstName = $_SESSION['admfirstname'];
    $admLastName = $_SESSION['admlastname'];
    $admEmail = $_SESSION['admemail'];
}

$class = '';
$display = '';
if ($admAccess == 'System Admin' || $admAccess == 'Supervisor') {
    $class = 'filler';
    $display = '';
} else {
    $class = 'disabled';
    $display = 'none';
}
// FOR NUMBER OF PRODUCTS IN DATABASE
$qtotalPSelect = "SELECT COUNT(id) AS TotalProducts FROM $dbDatabase.`products`";
$etotalPSelect = mysqli_query($dbConnection, $qtotalPSelect);
$totalProdRows = mysqli_fetch_assoc($etotalPSelect);

// FOR NUMBER OF PRODUCTS TAGGED AS DELIVERED IN DATABASE
$qtotalSalesSelect = "SELECT SUM(product_quantity) AS TotalSales FROM $dbDatabase.`orders` WHERE `order_status` = 'Delivered'";
$etotalSalesSelect = mysqli_query($dbConnection, $qtotalSalesSelect);
$totalSalesRows = mysqli_fetch_assoc($etotalSalesSelect);

// FOR NUMBER OF CUSTOMERS THAT ARE NOT SPECTATING, REGARDLESS IF ACTIVE OR INACTIVE IN DATABASE
$qtotalCusSelect = "SELECT COUNT(id) AS TotalRegistered FROM $dbDatabase.`clients` WHERE `status` != 'spectating'";
$etotalCusSelect = mysqli_query($dbConnection, $qtotalCusSelect);
$totalCusRows = mysqli_fetch_assoc($etotalCusSelect);

// FOR TOTAL EARNINGS BASED ON SUCCESSFULLY DELIVERED PRODUCTS IN DATABASE
$qtotalEarnSelect = "SELECT SUM(order_total) AS TotalEarn FROM $dbDatabase.`orders` WHERE `order_status` = 'Delivered'";
$etotalEarnSelect = mysqli_query($dbConnection, $qtotalEarnSelect);
$totalEarnRows = mysqli_fetch_assoc($etotalEarnSelect);

if ($dbConnection == true) {
    $price = $totalEarnRows['TotalEarn'];
    $priceFormat = number_format($price);
    $sHtml = "
            <div class='topbar'>
                <div class='toggle'>
                    <!-- <ion-icon name='menu-outline'></ion-icon> -->
                    <p>Welcome!&nbsp</p><p style='color:black;'> $admUsername</p>
                </div>
                <div class='user'>
                    <img src='/assets/img/profile.png' alt='userimage'>
                </div>
            </div>

            <div class='cardBox'>
                <div class='card'>
                    <div>
                        <div class='numbers'>" . $totalProdRows['TotalProducts'] . "</div>
                        <div class='cardName'>Total Product Count</div>
                    </div>
                    <div class='iconBox'>
                        <ion-icon name='albums-outline'></ion-icon>
                    </div>
                </div>
                <div class='card'>
                    <div>
                        <div class='numbers'>" . $totalSalesRows['TotalSales'] . "</div>
                        <div class='cardName'>Sales</div>
                    </div>
                    <div class='iconBox'>
                        <ion-icon name='cart-outline'></ion-icon>
                    </div>
                </div>
                <div class='card'>
                    <div>
                        <div class='numbers'>" . $totalCusRows['TotalRegistered'] . "</div>
                        <div class='cardName'>Registered Customers</div>
                    </div>
                    <div class='iconBox'>
                        <ion-icon name='person-add-outline'></ion-icon>
                    </div>
                </div>
                <div class='card'>
                    <div>
                        <div class='numbers'>$ $priceFormat</div>
                        <div class='cardName'>Earnings</div>
                    </div>
                    <div class='iconBox'>
                        <ion-icon name='cash-outline'></ion-icon>
                    </div>
                </div>
            </div>



            <div class='details'>
                <!-- order details list -->
                <div class='recentOrders'>
                    <div class='cardHeader'>
                        <h2>Recent Orders</h2>
                        <div class='reportCon container col-md-8 d-flex flex-row justify-content-between align-items-center'>                      
                          <select class='form-select' id='reportList' style='display: $display'>
                            <option selected disabled value='Select Report'>Select Report</option>
                            <option value='Products CSV'>Products CSV</option>
                            <option value='Customers CSV'>Customers CSV</option>
                            <option value='Orders CSV'>Orders CSV</option>
                            <option value='Products PDF'>Products PDF</option>
                            <option value='Customers PDF'>Customers PDF</option>
                            <option value='Orders PDF'>Orders PDF</option>
                          </select>
                          <br>
                          <button type='submit' onclick='sendReport();' style='display: $display' class='btn ms-2 redbgwhitec'>Send</button>
                      </div>
                    </div>
             ";
    // FOR DATA IN RECENT ORDERS
    $qLatestOrdersSelect = "SELECT * FROM $dbDatabase.`orders` ORDER BY `orderid` DESC LIMIT 10;";
    $eLatestOrdersSelect = mysqli_query($dbConnection, $qLatestOrdersSelect);


    $sHtml .= "
            <table>
                <thead>
                    <tr>
                        <td>Product Name</td>
                        <td>Product Price</td>
                        <td>Payment Method</td>
                        <td>Status</td>
                    </tr>
                </thead>
            ";
    while ($totalLatestOrdersRows = mysqli_fetch_assoc($eLatestOrdersSelect)) {

        $tablePrice = number_format($totalLatestOrdersRows['order_total']);
        $sHtml .= "
                <tbody>
                    <tr>
                        <td>" . $totalLatestOrdersRows['product_name'] . "</td>
                        <td>$ $tablePrice</td>
                        <td>" . $totalLatestOrdersRows['payment_method'] . "</td>
                        <td><span class='status " . $totalLatestOrdersRows['order_status'] . "'>" . $totalLatestOrdersRows['order_status'] . "</span></td>
                    </tr>
                </tbody>
                ";
    }
    $sHtml .= "
            </table>
            </div>
             ";

    $sHtml .= "
            <div class='recentCustomers'>
                <div class='cardHeader'>
                    <h2>Recent Buyers</h2>
                </div>
            ";

    // FOR DATA IN RECENT BUYERS BASED ON DATE ORDERED IN DATABASE

    // RETRIEVE CUSTOMERS USERNAME FROM TWO TABLES JOINED, BASED ON ID
    $qRecentSelect = "SELECT DISTINCT `username`, `country` FROM $dbDatabase.`clients` INNER JOIN $dbDatabase.`orders` ON `clients`.`id` = `orders`.`user_id` WHERE `status` = 'Active' ORDER BY `orders`.`date_ordered` DESC LIMIT 6";
    $eRecentSelect = mysqli_query($dbConnection, $qRecentSelect);
    while ($totalRecentRows = mysqli_fetch_assoc($eRecentSelect)) {

        $sHtml .= "
                <table>
                ";
        $sHtml .= "
                <tr>
                    <td width='60px'>
                        <div class='imgBox'><img src='/assets/img/profile.png' alt='Customer Photo'></div>
                    </td>
                    <td>
                        <h4>" . $totalRecentRows['username'] . "<br><span>" . $totalRecentRows['country'] . "</span></h4>
                    </td>
                </tr>
                ";
    }
    $sHtml .= "
            </table>
            ";
    $sHtml .= "
            </div>
            </div>
            ";

    echo $sHtml;
} else {
    echo "Failed to connect, please call system administrator!";
}
