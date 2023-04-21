// gumagana na to ng maayos.. need lang iset ng condition from database ayusing ko rin
//for testing purpose muna ngayon.. activate once.. tapos after mavisit sa localhost browser..
//paki comment out yung line na nasa baba.. save then shift refresh sa browser.. gumagana sya even maglipat ng pages

//for logging out this one should be included 
// sessionStorage.clear();

toastr.options.progressBar = true;
toastr.options.timeOut = 3000; // How long the toast will display without user interaction
toastr.options.extendedTimeOut = 2000; // How long the toast will display after a user hovers over it
toastr.options.closeButton = true;
toastr.options.closeMethod = 'fadeOut';
// toastr.options.closeDuration = 350;
toastr.options.closeEasing = 'swing';
toastr.options.newestOnTop = false;
toastr.options.showEasing = 'swing';
toastr.options.hideEasing = 'linear';
toastr.options.closeEasing = 'linear';

function ModalLoader(){
  // $('#LoadingSpinner').modal('show');
  var x = document.querySelector('#LoadingSpinner');
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
 
 // sessionStorage.setItem('theme', 'light')
$('#Az_theme').click(function() {
  const userCred = JSON.parse(sessionStorage.getItem("user"));
  if (userCred.theme == "dark") {
    AzsetLightTheme();
  } else {
    AzsetDarkTheme();
}
});

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
  const userCred = JSON.parse(sessionStorage.getItem("user"));
  userCred.theme = "light";
  sessionStorage.setItem("user", JSON.stringify(userCred));
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
  const userCred = JSON.parse(sessionStorage.getItem("user"));
  userCred.theme = "dark";
  sessionStorage.setItem("user", JSON.stringify(userCred));
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
// script of ongoing deevelopment message


//generate guest creds
function newguest(){
  console.log('deving');
  $.get('/controllers/newGuestCred.php', (data, status)=>{
    if (status === "success"){
      const guestCred = JSON.parse(data);
        sessionStorage.setItem(
          "user", JSON.stringify(
            { 
              username: guestCred.username,
              fullname: guestCred.name,
              email: guestCred.email,
              theme: guestCred.theme,
              status: guestCred.status,
              log: "new"
            }));
            // console.log(JSON.parse(sessionStorage.getItem('user')));
    }
  });
  // window.location.reload();
}

//Function for login modal
$('.btn-login').on('click', () => {
  $('#mySignupModal').modal('hide');
  $('#myLoginModal').modal('show');

});

//fucntion for login
$('#login__btn').on('click', (e) => {
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
                    }
                  }
                })
              }else if(result == "login failed" || result == "user does not exist" || result == "wrong password" || result == "wrong username"){
                toastr.error("Please check your user credentials", "Log in Failed");
                ModalLoader;
              // }else if(result == "wrong username"){
              //   toastr.error("Kindly check your input", "Incorrect Username");
              // }else if(result == "wrong password"){
              //   toastr.error("Kindly check your input", "Incorrect Password");
              // }else if(result == "user does not exist"){
              //   toastr.error("Please create an account!", "User not Found");
              }else{
                  console.log(result);
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

});

function GETUserinfo(){
$.get('/controllers/fetch_userCreds.php', (data, status)=>{
  if (status === "success"){
    const guestCred = JSON.parse(data);
      sessionStorage.setItem(
        "user", JSON.stringify(
          { 
            username: guestCred.username,
            fullname: guestCred.name,
            email: guestCred.email,
            theme: guestCred.theme,
            status: guestCred.status,
            log: guestCred.log
          }));
          // console.log(JSON.parse(sessionStorage.getItem('user')));
  }
});
}
//logg reload function
function loginReload(){
  const userCred = JSON.parse(sessionStorage.getItem("user"));
  userCred.log = "logging";
  sessionStorage.setItem("user", JSON.stringify(userCred));
  reloadLog();
  // window.location.reload();

}

//function for specific reloading after login
// $(document).ready(()=>
function reloadLog(){
  const UserCred = JSON.parse(sessionStorage.getItem("user"));
  if (UserCred.log == "logging"){
    $.get('/controllers/fetch_userCreds.php', (data, status)=>{
      if (status === "success"){
        const userCred = JSON.parse(data);                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
        sessionStorage.setItem("user", JSON.stringify({ username: userCred.username,}));
        const UserrCred = JSON.parse(sessionStorage.getItem("user"));
        setTimeout(toastr.success(`Welcome aboard ${UserrCred.username}!`,"Logged In!"), 2000);
      }
    });
    UserCred.log = "logged";
    sessionStorage.setItem("user", JSON.stringify(UserCred));
  }
};
// );

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
            console.log(result);
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
  $.ajax({
    type: 'POST',
    url: '/controllers/logout.php',
    beforeSend: ModalLoader,
    success: (result) =>{
      if(result == "logged out success"){
        sessionStorage.clear();
        // defaultUserLS();
        window.location = "/index.php";
      }
    },
    complete: ModalLoader
  })
});


//script for email list
$('#SubmitEmail').on('click', ()=>{
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
          if(result == " added"){
            toastr.success("Joined Newsletter Successfully","Congrats!");
          }else if(result == " subcribed"){
            toastr.warning("You are Already Subscribed", "Notice");
          }else if(result == " failed"){
            toastr.warning("Failed joining newsletter");
          }else{
            console.log(result);
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

// window.location.reload();

//script for profile
// function profileURL(){
//   const userCred = JSON.parse(sessionStorage.getItem("user"));
//   const userName = userCred.username;
//   if ((userName.search(/guest/i) == 1)) {
//     toastr.info("You have to log in first!");
//   } else {
//     window.location = "/profile/";x
// }
// }

function profileURL() {
  const userCred = JSON.parse(sessionStorage.getItem("user"));
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
  const userCred = JSON.parse(sessionStorage.getItem("user"));
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

// fetching the theme and updating depends on the user preference
// $(document).ready(function(){
//   const userCred = JSON.parse(sessionStorage.getItem("user"));
//   if (userCred.theme == "dark") {
//     AzsettingDarkTheme();
//   } else {
//     AzsettingLightTheme();
// }
// });

// const userCred = JSON.parse(sessionStorage.getItem("user"));
// userCred.username = "guest_test986";
// sessionStorage.setItem("user", JSON.stringify(userCred));


// const userName = userCred.username;
// const bli = userName.search(/guest/i); //return 0 if wala
// console.log("ucred = "+userCred);
// console.log("uname = "+userName);
// console.log("bli"+bli);

// Display an toasterz
// toastr.info('Are you the 6 fingered man?');
// toastr.success('We do have the Kapua suite available.', 'Turtle Bay Resort', {timeOut: 5000});
// toastr.warning('My name is Inigo Montoya. You killed my father, prepare to die!');
// toastr.error('I do not think that word means what you think it means.', 'Inconceivable!');