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

<div class="topbar">
    <div class="toggle">
        <!-- <ion-icon name="menu-outline"></ion-icon> -->
        <p>Welcome! <?php echo $admUsername; ?></p>
    </div>
    <div class="user">
        <img src="/assets/img/profile.png" alt="userimage">
    </div>
</div>

<div class="cardBox">
    <div class="card">
        <div>
            <div class="numbers">1,504</div>
            <div class="cardName">Total Product Count</div>
        </div>
        <div class="iconBox">
            <ion-icon name="albums-outline"></ion-icon>
        </div>
    </div>
    <div class="card">
        <div>
            <div class="numbers">80</div>
            <div class="cardName">Sales</div>
        </div>
        <div class="iconBox">
            <ion-icon name="cart-outline"></ion-icon>
        </div>
    </div>
    <div class="card">
        <div>
            <div class="numbers">284</div>
            <div class="cardName">Registered Customers</div>
        </div>
        <div class="iconBox">
            <ion-icon name="person-add-outline"></ion-icon>
        </div>
    </div>
    <div class="card">
        <div>
            <div class="numbers">₱7,342</div>
            <div class="cardName">Earnings</div>
        </div>
        <div class="iconBox">
            <ion-icon name="cash-outline"></ion-icon>
        </div>
    </div>
</div>

<div class="details">
    <!-- order details list -->
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Recent Orders</h2>
            <a href="#" class="btn-csv">Products CSV</a>
            <a href="#" class="btn-csv">Sales CSV</a>
            <a href="#" class="btn-csv">Customers CSV</a>
        </div>
        <table>
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Price</td>
                    <td>Payment</td>
                    <td>Status</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Product 1</td>
                    <td>₱1200</td>
                    <td>Paid</td>
                    <td><span class="status delivered">Delivered</span></td>
                </tr>
                <tr>
                    <td>Product 2</td>
                    <td>₱1200</td>
                    <td>Due</td>
                    <td><span class="status pending">Pending</span></td>
                </tr>
                <tr>
                    <td>Product 3</td>
                    <td>₱1200</td>
                    <td>Paid</td>
                    <td><span class="status return">Return</span></td>
                </tr>
                <tr>
                    <td>Product 4</td>
                    <td>₱1200</td>
                    <td>Due</td>
                    <td><span class="status inprogress">In Progress</span></td>
                </tr>
                <tr>
                    <td>Product 5</td>
                    <td>₱1200</td>
                    <td>Paid</td>
                    <td><span class="status delivered">Delivered</span></td>
                </tr>
                <tr>
                    <td>Product 6</td>
                    <td>₱1200</td>
                    <td>Paid</td>
                    <td><span class="status pending">Pending</span></td>
                </tr>
                <tr>
                    <td>Product 7</td>
                    <td>₱1200</td>
                    <td>Paid</td>
                    <td><span class="status return">Return</span></td>
                </tr>
                <tr>
                    <td>Product 8</td>
                    <td>₱1200</td>
                    <td>Due</td>
                    <td><span class="status inprogress">In Progress</span></td>
                </tr>
                <tr>
                    <td>Product 9</td>
                    <td>₱1200</td>
                    <td>Paid</td>
                    <td><span class="status pending">Pending</span></td>
                </tr>
                <tr>
                    <td>Product 10</td>
                    <td>₱1200</td>
                    <td>Due</td>
                    <td><span class="status inprogress">In Progress</span></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="recentCustomers">
        <div class="cardHeader">
            <h2>Recent Customers</h2>
        </div>
        <table>
            <tr>
                <td width="60px">
                    <div class="imgBox"><img src="/assets/img/profile.png" alt="Customer Photo"></div>
                </td>
                <td>
                    <h4>Pedro<br><span>Philippines</span></h4>
                </td>
            </tr>
            <tr>
                <td width="60px">
                    <div class="imgBox"><img src="/assets/img/profile.png" alt="Customer Photo"></div>
                </td>
                <td>
                    <h4>Pedro<br><span>Philippines</span></h4>
                </td>
            </tr>
            <tr>
                <td width="60px">
                    <div class="imgBox"><img src="/assets/img/profile.png" alt="Customer Photo"></div>
                </td>
                <td>
                    <h4>Pedro<br><span>Philippines</span></h4>
                </td>
            </tr>
            <tr>
                <td width="60px">
                    <div class="imgBox"><img src="/assets/img/profile.png" alt="Customer Photo"></div>
                </td>
                <td>
                    <h4>Pedro<br><span>Philippines</span></h4>
                </td>
            </tr>
            <tr>
                <td width="60px">
                    <div class="imgBox"><img src="/assets/img/profile.png" alt="Customer Photo"></div>
                </td>
                <td>
                    <h4>Pedro<br><span>Philippines</span></h4>
                </td>
            </tr>
            <tr>
                <td width="60px">
                    <div class="imgBox"><img src="/assets/img/profile.png" alt="Customer Photo"></div>
                </td>
                <td>
                    <h4>Pedro<br><span>Philippines</span></h4>
                </td>
            </tr>
            <tr>
                <td width="60px">
                    <div class="imgBox"><img src="/assets/img/profile.png" alt="Customer Photo"></div>
                </td>
                <td>
                    <h4>Pedro<br><span>Philippines</span></h4>
                </td>
            </tr>
            <tr>
                <td width="60px">
                    <div class="imgBox"><img src="/assets/img/profile.png" alt="Customer Photo"></div>
                </td>
                <td>
                    <h4>Pedro<br><span>Philippines</span></h4>
                </td>
            </tr>
        </table>
    </div>
</div>
</div>
</div>