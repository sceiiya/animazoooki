<?php session_start();?>
<div class="container pt-5 w-75 bg-light-in">
    <h2>Change Password</h2>
    <br>
    <br>

        <form>

            <div class="form-outline mb-5">
                <input type="text" id="oldPass" class="form-control w-50" />
                <label class="form-label position-absolute start-0" for="form2Example1">Current Password</label>
            </div>


            <div class="form-outline mb-5">
                <input type="text" id="newPass" class="form-control w-50" />
                <label class="form-label position-absolute start-0" for="form2Example2">New Password</label>
            </div>

            <div class="form-outline mb-5">
                <input type="text" id="confirmPass" class="form-control w-50" />
                <label class="form-label position-absolute start-0" for="form2Example3">Confirm New Password</label> </br>
                <span id='message'></span>
            </div>

        </form>

        <div>
            <button type="button" class="profileButton" id="saveNewPass" class="btn btn-primary">Save changes</button>
        </div>

</div>