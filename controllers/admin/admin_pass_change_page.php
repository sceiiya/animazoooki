<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>

<body>

    <div id="changePassContainer">
        <div class="modal-dialog w-50">
            <div class="modal-content p-4 modalbg cpborder">

                <div class="add-list-cont">
                    <h3 class="txtc mb-4">CHANGE PASSWORD</h3>

                    <div class="form-outline mb-3 w-75 ms-5">
                        <label for="">Current Password</label>
                        <input type="password" id="admOldPass" class="form-control" />
                    </div>

                    <div class="form-outline mb-3 w-75 ms-5">
                        <label for="">New Password</label>
                        <input type="password" id="admNewPass" class="form-control" />
                    </div>

                    <div class="form-outline mb-3 w-75 ms-5">
                        <label for="">Confim Password</label>
                        <input type="password" id="admConfirmPass" class="form-control mb-2" />
                        <span id='admPassMessage'></span>
                    </div>
                    <div class="flex-row d-flex justify-content-center">
                        <button type="button" id="admSaveNewPass" onclick="admSaveNewPass()" class="btn btn-info mb-1 mt-3">Save</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>
<script>
    $('#admNewPass, #admConfirmPass').on('keyup', function() {
        if ($('#admNewPass').val() == $('#admConfirmPass').val()) {
            $('#admPassMessage').html('Passwords match').css('color', 'green');
        } else
            $('#admPassMessage').html('Passwords does not match').css('color', 'red');
    });
</script>