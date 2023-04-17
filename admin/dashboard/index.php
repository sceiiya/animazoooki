<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <title>Animazooki Dashboard</title>

</head>

<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
                        <span class="title">Animazooki Admin</span>
                    </a>
                </li>
                <li>
                    <a id="adminDashboard">
                        <span class="icon"><ion-icon name="speedometer-outline"></ion-icon></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a id="adminProducts">
                        <span class="icon"><ion-icon name="layers-outline"></ion-icon></span>
                        <span class="title">Products</span>
                    </a>
                </li>
                <li>
                    <a id="adminCustomers">
                        <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                        <span class="title">Customers</span>
                    </a>
                </li>
                <li>
                    <a id="adminOrders">
                        <span class="icon"><ion-icon name="cube-outline"></ion-icon></span>
                        <span class="title">Orders</span>
                    </a>
                </li>
                <li>
                    <a id="adminUsers">
                        <span class="icon"><ion-icon name="people-circle-outline"></ion-icon></span>
                        <span class="title">Admin Users</span>
                    </a>
                </li>
                <li>
                    <a id="adminAccess">
                        <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                        <span class="title">Access</span>
                    </a>
                </li>
                <li>
                    <a id="adminSignout">
                        <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>

        </div>

        <!-- main -->
        <div class="mainAdmin">
            <div class="topbar">
                <div class="toggle">
                    <!-- <ion-icon name="menu-outline"></ion-icon> -->
                    <p>Admin</p>
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
                        <div class="cardName">Number of Sales</div>
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
                        <div class="cardName">Total Earnings</div>
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
                        <h2>Recent Buyers</h2>
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


    <!-- MODALS -->
    <!-- Spinner Modal -->
    <div id="adminSpinner" class="spinner-border text-danger" style="display: none;"></div>

    <!-- Sign out Modal -->
    <div class="modal" id="signoutModal">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">


                <div class="modal-header">
                    <h4 class="modal-title">SIGN OUT</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>


                <div class="modal-body">
                    Are you sure you want to sign out?
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-bs-dismiss="modal">YES</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">NO</button>
                </div>

            </div>
        </div>
    </div>

    <!-- PRODUCTS MODAL -->

    <div class="modal" id="addProductModal">
        <div class="modal-dialog">
            <div id="modalbg" class="modal-content p-4 border-0">

                <div class="add-list-cont">
                    <h3 class="txtc mb-4">Product Info</h3>

                    <div class="form-outline mb-3">
                        <label for="">Product Code</label>
                        <input type="text" id="adminProdCode" class="form-control" />
                    </div>

                    <div class="form-outline mb-3">
                        <label for="">Product Name</label>
                        <input type="text" id="adminProdName" class="form-control" />
                    </div>

                    <div class="form-outline mb-3">
                        <label for="">Product Price</label>
                        <input type="number" id="adminProdPrice" class="form-control" />
                    </div>

                    <div class="form-outline mb-3">
                        <label for="">Product Quantity</label>
                        <input type="number" id="adminProdQty" class="form-control" />
                    </div>

                    <div class="form-outline mb-3">
                        <label for="">Product Description</label>
                        <textarea type="text" id="adminProdDesc" rows="10" cols="50" class="form-control pDescription"></textarea>
                    </div>

                    <div class="form-outline mb-2">
                        <label for="">Product Image</label>
                        <input type="file" id="adminProdImage" class="form-control" accept="image/*" />
                    </div>

                    <!-- 2 column grid layout for inline styling -->
                    <div class="row mb-1">
                    </div>

                    <button type="button" id="saveProduct" class="btn btn-info btn-block mb-1 mt-3">Add Product</button>

                    <!-- Register buttons -->
                    <div class="text-center">
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="/assets/js/jquery-3.6.3.min.js"></script>
<script src="/assets/js/adminscripts.js"></script>