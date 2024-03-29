function ERROR_logger(nERROR){
  var errr ={
    error: nERROR
  }
  $.ajax({
    type: 'POST',
    url: "/controllers/error_logger.php",
    data: errr,
  });
}

toastr.options.progressBar = true;
toastr.options.timeOut = 3000;
toastr.options.extendedTimeOut = 2000; 
toastr.options.closeButton = true;
toastr.options.closeMethod = 'fadeOut';
toastr.options.closeEasing = 'swing';
toastr.options.newestOnTop = false;
toastr.options.showEasing = 'swing';
toastr.options.hideEasing = 'linear';
toastr.options.closeEasing = 'linear';

function ModalLoader(){
  var x = document.querySelector('#LoadingSpinner');
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
 
$('#Az_theme').click(function() {
  const userCred = JSON.parse(localStorage.getItem("user"));
  if (userCred.theme == "dark") {
    AzsetLightTheme();
    let theme ={
      theme: 'light'
    }
    $.ajax({
      type: 'POST',
      url: "/controllers/up_theme.php",
      data: theme
    });
  } else {
    AzsetDarkTheme();
    let theme ={
      theme: 'dark'
    }
    $.ajax({
      type: 'POST',
      url: "/controllers/up_theme.php",
      data: theme
    });
}
});

function retheme() {
  const userCred = JSON.parse(localStorage.getItem("user"));
  if (userCred && userCred.theme == "dark") {
    AzsettingDarkTheme();
  } else {
    AzsettingLightTheme();
}
};

//function for replacing class theme to light
function AzsettingLightTheme(){
  $("#headAzlogo").attr("src", "/assets/img/animazooki-b.png");
  $("#headAznlogo").attr("src", "/assets/img/n-logo-b.png");
  $('.header_floater_d').addClass('header_floater_d').addClass('header_floater');
  $('.bg-dark').removeClass('bg-dark').addClass('bg-light');
  $('.bg-dark-in').removeClass('bg-dark-in').addClass('bg-light-in');
  $('.bg-dark-inv').removeClass('bg-dark-inv').addClass('bg-light-inv');
  $('.fa-sun').removeClass('fa-sun').addClass('fa-moon');
  $('.card_dark').removeClass('card_dark').addClass('card_light');
  $('.txt-dark-inv').removeClass('txt-dark-inv').addClass('txt-light-inv');
  $('.txt-dark-invb').removeClass('txt-dark-invb').addClass('txt-light-invb');
  $('.article-item-name').removeClass('txt-dark-inv').addClass('txtred');
}

//function for switching theme to light
function AzsetLightTheme(){
  AzsettingLightTheme();
  const userCred = JSON.parse(localStorage.getItem("user"));
  userCred.theme = "light";
  localStorage.setItem("user", JSON.stringify(userCred));
}

//function for replacing class theme to dark
function AzsettingDarkTheme(){
  $("#headAzlogo").attr("src", "/assets/img/animazooki-w.png");
  $("#headAznlogo").attr("src", "/assets/img/n-logo-w.png");
  $('.header_floater').removeClass('header_floater').addClass('header_floater_d');
  $('.bg-light').removeClass('bg-light').addClass('bg-dark');
  $('.bg-light-in').removeClass('bg-light-in').addClass('bg-dark-in');
  $('.bg-light-inv').removeClass('bg-light-inv').addClass('bg-dark-inv');
  $('.fa-moon').removeClass('fa-moon').addClass('fa-sun');
  $('.card_light').removeClass('card_light').addClass('card_dark');
  $('.txt-light-inv').removeClass('txt-light-inv').addClass('txt-dark-inv');
  $('.txt-light-invb').removeClass('txt-light-invb').addClass('txt-dark-invb');
  $('.article-item-name').removeClass('txtred').addClass('txt-dark-inv');
}

//function for switching theme to dark
function AzsetDarkTheme(){
  AzsettingDarkTheme();
  const userCred = JSON.parse(localStorage.getItem("user"));
  userCred.theme = "dark";
  localStorage.setItem("user", JSON.stringify(userCred));
}

// script of ongoing deevelopment message
function popdev(){
  toastr.info('Development in Progress!');
}

// (needs a rework on toasters.. have to develop our own toasters)
const toastTrigger = document.getElementById('liveToastBtn')
const toastLiveExample = document.getElementById('liveToast')
if (toastTrigger) {
  toastTrigger.addEventListener('click', () => {
    const toast = new bootstrap.Toast(toastLiveExample)
    toast.show()
  })
}

//generate guest creds
function newguest(){
  try{
    $.get('/controllers/newGuestCred.php', (data, status)=>{
      if (status === "success"){
        const guestCred = JSON.parse(data);
          localStorage.setItem(
            "user", JSON.stringify(
              { 
                username: guestCred.username,
                fullname: guestCred.name,
                email: guestCred.email,
                theme: guestCred.theme,
                status: guestCred.status,
                log: "new"
              }));
              hideBTNS();
      }
    });
  }catch(error){
    ERROR_logger(error);
  }
}

$('#resendOTP').on('click', ()=>{
  NewOTP();
})

function NewOTP(){
  $.ajax({
    type: 'POST',
    url: "/controllers/get_otp.php",
    beforeSend: function () {
      var x = document.querySelector('#LoadingSpinner');
      if (x.style.display === "none") {
          x.style.display = "block";
      } else {
          x.style.display = "none";
      }
      },
    success: (result) => {
      console.log(result);
      if (result == "true") {
        toastr.success('Please open your email to get your passcode', 'New OTP Code Sent');
      }else if(result == "false"){
          toastr.warning('Failed to get new OTP code', 'Something went wrong!');
      }else{
        toastr.error('Ask a Tech Support to Resolve', 'Something went wrong');
        ERROR_logger(result);
      }
    },
    complete: function () {
      var x = document.querySelector('#LoadingSpinner');
      if (x.style.display === "none") {
          x.style.display = "block";
      } else {
          x.style.display = "none";
      }
    },
  });
}

  //Function for otp modal
$('#verifOTPBttn').on('click', () => {
  $('#myOTPModal').modal('show');
});

$('#confirmOTP').on('click', ()=>{
  var InOTP = $('#OTPcode');
  var dOTP = {
    otp: InOTP.val()
  };
  $.ajax({
    type: 'POST',
    url: "/controllers/validate_OTP.php",
    data: dOTP,
    beforeSend: function () {
      var x = document.querySelector('#LoadingSpinner');
      if (x.style.display === "none") {
          x.style.display = "block";
      } else {
          x.style.display = "none";
      }
      },
    success: (result) => {
      if (result == "true") {
        const userCred = JSON.parse(localStorage.getItem("user"));
        userCred.status = "Active";
        localStorage.setItem("user", JSON.stringify(userCred));
        $('#myOTPModal').modal('hide');
        toastr.success('You may now purchase without restrictions!', 'Account verified succesfully!');
      } else if(result == "expired"){
          toastr.warning('Please get a new OTP', 'OTP expired!');
      }else if(result == "false"){
          toastr.warning('Please check your Email for accurate passcode', 'Wrong passcode!');
      }else{
        toastr.error('Ask a Tech Support to Resolve', 'Something went wrong');
        ERROR_logger(result);
      }
    },
    complete: function () {
      var x = document.querySelector('#LoadingSpinner');
      if (x.style.display === "none") {
          x.style.display = "block";
      } else {
          x.style.display = "none";
      }
    },
  });
});

//Function for login modal
$('.btn-login').on('click', () => {
  $('#mySignupModal').modal('hide');
  $('#myLoginModal').modal('show');

});

//fucntion for login
$('#login__btn').on('click', (e) => {
  try{
  e.preventDefault();
  var sUsername = document.getElementById("LogUsername").value;
  var sPassword = document.getElementById("LogPass").value;
  if(sUsername != "" && sPassword !=""){
    var sJsonData = {
      username: sUsername,
      password: sPassword,
  };

  $.ajax({
      type: 'POST',
      url: "/controllers/login.php",
      data: sJsonData,
      beforeSend: ModalLoader,
      success: (result) => {
              if( result == "Login Success") {
                $('#myLoginModal').modal('hide');
                // get the userCred after login
                $.ajax({
                  type: 'POST',
                  url: "/controllers/get_userCreds.php",
                  success:(result)=>{
                    if(result == "success" ){
                    loginReload();
                    GETUserinfo();
                    }else{
                      ERROR_logger(result);
                      toastr.error("Something went wrong", "Error Login");
                      ModalLoader;
                    }
                  }
                })
              }else if(result == "login failed" || result == "user does not exist" || result == "wrong password" || result == "wrong username"){
                toastr.error("Please check your user credentials", "Log in Failed");
                ModalLoader;
              }else{
                  console.log(result);
                  ERROR_logger(result);
              }   
      },
      complete: ModalLoader
      
  });

  }else if(sUsername != "" && sPassword ==""){
    toastr.warning("Please input your password!");
  }else if(sUsername == "" && sPassword !=""){
    toastr.warning("Please input your email!");
  }else{
    toastr.error("Please input your credentials!");
  }

  }catch(error){
    ERROR_logger(error);
  }
});

function GETUserinfo(){
try{
$.get('/controllers/fetch_userCreds.php', (data, status)=>{
  if (status === "success"){
    const guestCred = JSON.parse(data);
      localStorage.setItem(
        "user", JSON.stringify(
          { 
            username: guestCred.username,
            fullname: guestCred.name,
            email: guestCred.email,
            theme: guestCred.theme,
            status: guestCred.status,
            log: guestCred.log
          }));
          hideBTNS();
  }
});
// retheme();
}catch(error){
  ERROR_logger(error);
}
}
//logg reload function
function loginReload(){
  try{
  const userCred = JSON.parse(localStorage.getItem("user"));
  userCred.log = "logging";
  localStorage.setItem("user", JSON.stringify(userCred));
  reloadLog();
  // window.location.reload();
  }catch(error){
    ERROR_logger(error);
  }
}

//function for specific reloading after login
function reloadLog(){
  try{
  const UserCred = JSON.parse(localStorage.getItem("user"));
  if (UserCred.log == "logging"){
    $.get('/controllers/fetch_userCreds.php', (data, status)=>{
      if (status === "success"){
        const userCred = JSON.parse(data);                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
        localStorage.setItem("user", JSON.stringify({ username: userCred.username,}));
        const UserrCred = JSON.parse(localStorage.getItem("user"));
        toastr.success(`Welcome aboard ${UserrCred.username}!`,"Logged In!");
      }
    });
    UserCred.log = "logged";
    localStorage.setItem("user", JSON.stringify(UserCred));
  }
}catch(error){
  ERROR_logger(error);
}
};

//Function for signup modal
$('.btn-signup').on('click', () => { 
  $('#myLoginModal').modal('hide');
  $('#mySignupModal').modal('show');
});

$('#NewEmail').on('keyup', function() {
  var email = $('#NewEmail').val();
  var re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  if (!re.test(email)) {
    $('#NewEmail').css('border-color', 'red');
  } else {
    $('#NewEmail').css('border-color', 'green');
  }
});

$('#NewPass').on('keyup', function() {
  var pass = $('#NewPass').val();
  if (pass.length < 8) {
    $('#NewPass').css('border-color', 'red');
  } else {
    $('#NewPass').css('border-color', 'green');
  }
  var passV = $('#NewVPass').val();
  if (passV == pass) {
    $('#NewVPass').css('border-color', 'green');
  } else {
    $('#NewVPass').css('border-color', 'red');
  }
});

$('#NewVPass').on('keyup', function() {
  var pass = $('#NewPass').val();
  var passV = $('#NewVPass').val();
  if (passV == pass) {
    $('#NewVPass').css('border-color', 'green');
  } else {
    $('#NewVPass').css('border-color', 'red');
  }
});

$('#createAcc').on('click', (e) => {
  try{
  e.preventDefault();
  var sName = document.getElementById("NewName").value;
  var sUsername = document.getElementById("NewUsername").value;
  var sEmail = document.getElementById("NewEmail").value;
  var sPassword = document.getElementById("NewPass").value;
  var sConfirmPass= document.getElementById("NewVPass").value;

  var email = $('#NewEmail').val();
  var re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;


  if(sName != "" && sUsername != "" && sEmail != "" && sPassword.length >= 8 &&(sPassword != "" && sConfirmPass != "" && sPassword == sConfirmPass && re.test(email))){
    var sJsonData = {
      name: sName,
      username: sUsername,
      email: sEmail,
      password: sPassword,
      confirmpassword: sConfirmPass
    };

    $.ajax({
      type: 'POST',
      url: "/controllers/signup.php",
      data: sJsonData,
      beforeSend: ModalLoader,
      success: (result) => {
        if( result == "Sign-up Success") {
          $('#mySignupModal').modal('hide');
          $('#myLoginModal').modal('show');
          toastr.success('Please log-in using your credentials!', 'New User Created');
        }else if(result == "Sign-up Failed"){
          toastr.error('Please contact support for info','Storage Error');
          // alert("failed registration");
        }else if(result == "error registering"){
          // alert("register error"); 
          toastr.error('Something went wrong', 'Execution Failed');
        }else if(result == "error validating"){
          // alert("validation error"); 
          toastr.error('Something went wrong','Validation Error');
        }else if(result == "This Email is Already Used"){
          $('#NewEmail').css('border-color', 'red');
          toastr.warning('Please check your account with the same email credentials','Duplicate Found');
          // alert("This Email is Already Used"); 
        }else if(result == "Username Already Used"){
          $('#NewUsername').css('border-color', 'red'); 
          toastr.warning('Please think of another unique Username','Duplicate Found');
          // alert("Choose your Unique Username");
        }else {
            // console.log(result);
            ERROR_logger(result);
        }   
      },
      complete: ModalLoader
    });
  }else if (!re.test(email)) {
    toastr.error("Invalid Email");
  }else if(sName != "" && sUsername != "" && sEmail == "" && (sPassword == sConfirmPass || sPassword =="")){
    toastr.warning("Please input your email!");
  }else if(sName != "" && sUsername == "" && sEmail != "" && (sPassword == sConfirmPass || sPassword =="")){
    toastr.warning("Please input your username!");
  }else if(sName == "" && sUsername != "" && sEmail != "" && (sPassword == sConfirmPass || sPassword =="")){
    toastr.warning("Please input your name!");
  }else if(sName != "" && sUsername != "" && sEmail != "" && (sPassword == sConfirmPass || sPassword =="")){
    toastr.warning("Please input your password!");
  }else if(sName != "" && sUsername != "" && sEmail != "" && sPassword.length < 8 && (sPassword != sConfirmPass || sPassword =="")){
    toastr.error("Create a strong; atleast 8 characters", "Password Too Short");
  }else if(sName != "" && sUsername != "" && sEmail != "" && (sPassword != sConfirmPass)){
    toastr.warning("Please confirm your password!");
  }else{
    toastr.error("Please input your credentials!");
  }

  }catch(error){
    ERROR_logger(error);
  }
});

//Function for signup modal
$('#btn-search').on('click', () => {
  $('#searchModal').modal('show');
});

$('#futsign').on('click', () => {
  $('#mySignupModal').modal('show');
});


//logout function
$('#logoutBttn').on('click', ()=>{
  try{
  $.ajax({
    type: 'POST',
    url: '/controllers/logout.php',
    beforeSend: ModalLoader,
    success: (result) =>{
      if(result == "logged out success"){
        localStorage.clear();
        // defaultUserLS();
        window.location = "/index.php";
      }else{
        ERROR_logger(result);
      }
    },
    complete: ModalLoader
  })
}catch(error){
  ERROR_logger(error);
}
});


//script for email list
$('#SubmitEmail').on('click', ()=>{
  try{
  var Email = $('#Az_join_emaillist').val();
  var joinElist ={
    email: Email
  }
  var re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

  if(Email !="" && re.test(Email)){
    $.ajax({
      type: 'POST',
      url: '/controllers/join_email_list.php',
      data: joinElist,
      beforeSend: ModalLoader,
      success: (result) =>{
          if(result == "added"){
            toastr.success("Joined Newsletter Successfully","Congrats!");
          }else if(result == "subcribed"){
            toastr.warning("You are Already Subscribed", "Notice");
          }else if(result == "failed"){
            toastr.warning("Failed joining newsletter");
          }else{
            ERROR_logger(result);
          }
        },
      complete: ModalLoader
    })
  }else if(Email ==""){
    toastr.warning("Please enter your active email address");
  }else if(!re.test(Email)){
    toastr.error("Please enter a valid email address");
  }else{
    console.log('what is the error?');
  }
}catch(error){
  ERROR_logger(error);
}
});

$('#NewEmail').on('keyup', function() {
  var Email = $('#Az_join_emaillist').val();
  var re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  if (!re.test(Email)) {
    $('#Az_join_emaillist').css('border-color', 'red');
  } else {
    $('#Az_join_emaillist').css('border-color', 'green');
  }
});

function profileURL() {
  const userCred = JSON.parse(localStorage.getItem("user"));
  const userName = userCred.username;
  if (userName.indexOf("guest") !== -1) {
    toastr.info("You have to log in first!");
  } else {
    window.location = "/profile/";
  }
}

$('#myProfileBttn').on('click', ()=>{
  profileURL();
})

//script for cart
function cartURL(){
  const userCred = JSON.parse(localStorage.getItem("user"));
  const userName = userCred.username;
  if ((userName.indexOf("guest") !== -1)) {
    toastr.info("You have to log in first!");
  } else {
    window.location = "/profile/cart/";x
}
}

$('#myCartBttn').on('click', ()=>{
  cartURL();
})

function hideBTNS(){
  const uCred = JSON.parse(localStorage.getItem("user"));
    switch (true) {
      case (uCred.status == 'spectating'):
        $('#OTPBttn').hide();
        $('#lgOutBttn').hide();
        $('#OTPBttn').hide();
        break;
      case (uCred.status == 'Inactive'):
        $('#loginBttn').hide();
        $('#SgUpBttn').hide();
        $('#lgOutBttn').show();

        break;
      case (uCred.status == 'Active'):
        $('#lgInBttn').hide();
        $('#SgUpBttn').hide();
        $('#OTPBttn').hide();
        $('#lgOutBttn').show();

        break;
    }
}

// fetching the theme and updating depends on the user preference
$(document).ready(()=>{
  const userCred = JSON.parse(localStorage.getItem("user"));
  if (userCred) {
    hideBTNS();
  }
})

$(document).ready(function(){
  try{
    const userCred = JSON.parse(localStorage.getItem("user"));
    if (userCred) {
      if (userCred.theme == "dark") {
        AzsettingDarkTheme();
      } else {
        AzsettingLightTheme();
      }
    } else {
      setTimeout(function() {
        const userCred = JSON.parse(localStorage.getItem("user"));
        if (userCred) {
          if (userCred.theme == "dark") {
            AzsettingDarkTheme();
          } else {
            AzsettingLightTheme();
          }
        }
      }, 4000);
    }
  } catch(error) {
    ERROR_logger(error);
  }
});

$(document).ready(() => {
  const otpValue = new URLSearchParams(window.location.search).get('otp');
  if (otpValue) {
    $('#myOTPModal').modal('show');
    $('#confirmOTP').click();
  }
});
