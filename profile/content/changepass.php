<?php session_start();?>
<div class="container pt-5 w-75 bg-light-in">
    <h2>Change Password</h2>

    <div id="changePassContainer">
        <div class="modal-dialog w-50">
            <div class="modal-content p-4 modalbg cpborder">

                <div class="add-list-cont">
                    <div class="form-outline mb-3 w-75 ms-5">
                        <label for="">Current Password</label>
                        <input type="password" id="userOldPass" class="form-control" />
                    </div>

                    <div class="form-outline mb-3 w-75 ms-5">
                        <label for="">New Password</label>
                        <input type="password" id="userNewPass" class="form-control" />
                    </div>

                    <div class="form-outline mb-3 w-75 ms-5">
                        <label for="">Confim Password</label>
                        <input type="password" id="userConfirmPass" class="form-control mb-2" />
                        <input type="checkbox" onclick="userPassViewer()"> Show Passwords
                        <br>
                        <span id='userPassMessage'></span>
                    </div>
                    <div class="flex-row d-flex justify-content-center">
                        <button type="button" onclick="userSaveNewPass()" class="btn redbgwhitec mb-1 mt-3">Save</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

<script>
    $('#userNewPass, #userConfirmPass').on('keyup', function() {
        if ($('#userNewPass').val() == $('#userConfirmPass').val()) {
            $('#userPassMessage').html('Passwords match').css('color', 'green');
        } else
            $('#userPassMessage').html('Passwords does not match').css('color', 'red');
    });

    function userPassViewer() {
        var x = document.getElementById('userOldPass');
        var y = document.getElementById('userNewPass');
        var z = document.getElementById('userConfirmPass');

        if(x.type === 'password' && y.type === 'password' && z.type === 'password') {
            x.type = 'text';
            y.type = 'text';
            z.type = 'text';
        } else {
            x.type = 'password';
            y.type = 'password';
            z.type = 'password';
        }
    }
</script>