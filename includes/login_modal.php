<div class="modal" id="myOTPModal">
  <div class="modal-dialog position-absolute top-50 start-50 translate-middle">
    <div class="modal-content bg-transparent">

      <div class="animazooki-log-cont txtc bg-light-in">

        <div class="form-outline mb-0">
          <input type="number" id="OTPcode" class="form-control" min="100000" max="999999" value="<?php echo isset($_GET['otp']) ? $_GET['otp'] : '' ?>"/>
        </div>

        <div class="row mb-1">
          <div class="col d-flex justify-content-center">
            <div class="text-center pt-2">
                <p>Send new OTP? <a href="#!" id="resendOTP">get otp</a></p>
            </div>
          </div>
        </div>

        <!-- Submit button -->
        <button type="button" id="confirmOTP" class="btn btn-primary btn-block mb-4 inbg-red rwflx txtc"><a
            class="txt-light">Verify</a>
        </button>

      </div>

    </div>
  </div>
</div>

<div class="modal" id="myLoginModal">
  <div class="modal-dialog position-absolute top-50 start-50 translate-middle">
    <div class="modal-content bg-transparent">

      <form class="animazooki-log-cont txtc bg-light-in">

        <h3 class="txtc mb-4 txt-light-in">Log in</h3>
        <!-- Email input -->
        <div class="form-outline mb-4">
          <input type="username" id="LogUsername" class="form-control" placeholder="Username" />
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
          <input type="password" id="LogPass" class="form-control" placeholder="Password" />
        </div>

        <!-- Submit button -->
        <button type="button" id="login__btn" class="btn btn-primary btn-block mb-4 inbg-red rwflx txtc"><a
            class="txt-light">Log in</a></button>

        <!-- Register buttons -->
        <div class="text-center">
          <p>Not a member? <a class="txtred btn-signup">Create account</a></p>
        </div>
      </form>

    </div>
  </div>
</div>