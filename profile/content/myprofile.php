<?php session_start();?>
<div class="container pt-5 w-75 bg-light-in" id="dataField">
    <h2>My Account</h2>
    <form action="">
        <div class="mb-3 mt-3 w-75 profile-data">
            <label>Username</label>
            <input type="text" class="form-control" id="userName" value="<?php echo $_SESSION['username'];?>" readonly="true">
        </div>
        <div class="mb-3 w-75 profile-data">
            <label>Name</label>
            <input type="text" class="form-control" id="Name" value="<?php echo $_SESSION['fullname'];?>" readonly="true">
        </div>
        <div class="mb-3 w-75 profile-data">
            <label>Email Address</label>
            <input type="email" class="form-control" id="emailAdd" value="<?php echo $_SESSION['email'];?>" readonly="true">
        </div>
        <div class="mb-3 w-75 profile-data">
            <label>Contact Number</label>
            <input type="number" class="form-control" id="contactNo" value="<?php echo $_SESSION['cellno'];?>" readonly="true">
        </div>
        <div class="mb-3 w-75 profile-data">
            <label>Shipping Address</label>
            <input type="text" class="form-control" id="shippingAdd" value="<?php echo $_SESSION['billing_add'];?>" readonly="true">
        </div>
        <div class="mb-3 w-75 profile-data">
            <label>Billing Address</label>
            <input type="text" class="form-control" id="billingAdd" value="<?php echo $_SESSION['billing_add'];?>" readonly="true">
        </div>

    </form>

</div>
<br>
<br>
<span><button class="profileButton" id="editBtn">EDIT</button><button class="profileButton" id="saveBtn" style="display: none">SAVE</button></span>