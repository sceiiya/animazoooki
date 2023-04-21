<?php session_start();?>
<div class="container pt-5 w-75 bg-light-in" id="dataField">
    <h2>My Account</h2>
    <form action="">
        <div class="mb-3 mt-3 w-75 profile-data">
            <label>Username</label>
            <input type="text" class="form-control" id="userName" value="<?php echo $_SESSION['username'];?>" readonly>
        </div>
        <div class="mb-3 w-75 profile-data">
            <label>Name</label>
            <input type="text" class="form-control" id="Name" value="<?php echo $_SESSION['fullname'];?>" readonly>
        </div>
        <div class="mb-3 w-75 profile-data">
            <label>Email Address</label>
            <input type="email" class="form-control" id="emailAdd" value="<?php echo $_SESSION['email'];?>" readonly>
        </div>
        <div class="mb-3 w-75 profile-data">
            <label>Contact Number</label>
            <input type="text" class="form-control" id="contactNo" value="<?php echo $_SESSION['cellno'];?>" readonly>
        </div>
        <div class="mb-3 w-75 profile-data">
            <label>Shipping Address</label>
            <input type="text" class="form-control" id="shippingAdd" value="<?php echo $_SESSION['billing_add'];?>" readonly>
        </div>
        <div class="mb-3 w-75 profile-data">
            <label>Billing Address</label>
            <input type="text" class="form-control" id="billingAdd" value="<?php echo $_SESSION['billing_add'];?>" readonly>
        </div>

    </form>

</div>
<br>
<br>
<span><button class="profileButton" id="editBtn">EDIT</button></span>
