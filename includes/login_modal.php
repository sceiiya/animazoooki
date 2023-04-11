<div class="modal" id="myLoginModal">
  <div class="modal-dialog position-absolute top-50 start-50 translate-middle">
    <div class="modal-content bg-transparent">

      <form class="animazooki-log-cont txtc bg-light-in ">

        <h3 class="txtc mb-4">Log in</h3>
        <!-- Email input -->
        <div class="form-outline mb-4">
          <input type="email" id="form2Example1" class="form-control" placeholder="Email" />
        </div>

        <!-- Password input -->
        <div class="form-outline mb-0">
          <input type="password" id="form2Example2" class="form-control" placeholder="Password" />
        </div>

        <!-- 2 column grid layout for inline styling -->
        <div class="row mb-1">
          <div class="col d-flex justify-content-center">
            <!-- Checkbox -->
            <div class="form-check">
              <input class="form-check-input inbg-red" type="checkbox" value="" id="form2Example31" checked />
              <label class="form-check-label cb-sgn-txt mt-0" for="form2Example31"> Remember me </label>
            </div>
          </div>

          <div class="col">
            <!-- Simple link -->
            <a href="#!" class="txtred cb-sgn-txt mt-0" onclick="popdev()">Forgot password?</a>
          </div>
        </div>

        <!-- Submit button -->
        <button type="button" id="login" class="btn btn-primary btn-block mb-4 inbg-red rwflx txtc"><a
            class="txt-light">Log in</a></button>

        <!-- Register buttons -->
        <div class="text-center">
          <p>Not a member? <a class="txtred btn-signup">Create account</a></p>
          <p>or sign up with:</p>
          <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-facebook-f txtred" onclick="popdev()"></i>
          </button>

          <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-google txtred" onclick="popdev()"></i>
          </button>

          <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-twitter txtred" onclick="popdev()"></i>
          </button>
        </div>
      </form>

    </div>
  </div>
</div>