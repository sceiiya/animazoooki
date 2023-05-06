<!-- <div id="login-container">
        <div id="login-wrapper">
            <h5>A One Time Password was sent to your email.
                Please verify here.
            </h5>

            <form class="position-relative">
                <div class="form-outline mb-4">
                    <input type="number" id="OTP" class="form-control" />
                    <label class="form-label" for="form2Example1">Enter OTP</label>
                </div>

            </form>
            <button type="button" id="verifyOTP" class="btn btn-primary btn-block mb-4">Verify</button>

            <div class="text-center">
                <p>Send new OTP? <a href="#!" id="resendOTP">Resend</a></p>
            </div>
        </div>

    </div> -->

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

        <!-- 2 column grid layout for inline styling -->
        <!-- <div class="row mb-1">
          <div class="col d-flex justify-content-center">

            <div class="form-check">
              <input class="form-check-input inbg-red" type="checkbox" value="" id="form2Example31" checked />
              <label class="form-check-label cb-sgn-txt mt-0" for="form2Example31"> Remember me </label>
            </div>
          </div> -->

          <!-- <div class="col">
            <a href="#!" class="txtred cb-sgn-txt mt-0" onclick="popdev()">Forgot password?</a>
          </div>
        </div> -->

        <!-- Submit button -->
        <button type="button" id="login__btn" class="btn btn-primary btn-block mb-4 inbg-red rwflx txtc"><a
            class="txt-light">Log in</a></button>

        <!-- Register buttons -->
        <div class="text-center">
          <p>Not a member? <a class="txtred btn-signup">Create account</a></p>
          <!-- <p>or sign up with:</p>
          <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-facebook-f txtred" onclick="popdev()"></i>
          </button>

          <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-google txtred" onclick="popdev()"></i>
          </button>

          <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-twitter txtred" onclick="popdev()"></i>
          </button> -->
        </div>
      </form>

    </div>
  </div>
</div>