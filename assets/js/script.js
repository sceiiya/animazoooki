// gumagana na to ng maayos.. need lang iset ng condition from database ayusing ko rin
//for testing purpose muna ngayon.. activate once.. tapos after mavisit sa localhost browser..
//paki comment out yung line na nasa baba.. save then shift refresh sa browser.. gumagana sya even maglipat ng pages
// localStorage.setItem(
//   "user", JSON.stringify(
//     { 
//       username: "guest",
//       email: "guest",
//       theme: "light"
//     }));
//for logging out this one should be included 
// localStorage.clear();



// get data from LocaleStorage
    // const userCred = JSON.parse(localStorage.getItem("user"));
    // userCred.theme;

$(document).ready(function(){
  const userCred = JSON.parse(localStorage.getItem("user"));
  if (userCred.theme == "dark") {
    AzsettingDarkTheme();
  } else {
    AzsettingLightTheme();
}
});
 
  // localStorage.setItem('theme', 'light')
  $('#Az_theme').click(function() {
    // JSON.stringify(localStorage.setItem(user.theme = "dark"));
    // UsetT.theme = "dark";

    const userCred = JSON.parse(localStorage.getItem("user"));
    // userCred.theme = "dark";
    // localStorage.setItem("user", JSON.stringify(userCred));
    // const themecheck = userCred.theme;
    if (userCred.theme == "dark") {
      AzsetLightTheme();
    } else {
      AzsetDarkTheme();
  }
  });
  // // localStorage.setItem('theme', 'light')
  // $('#Az_theme').click(function() {
  //   // JSON.stringify(localStorage.setItem(user.theme = "dark"));
  //   // UsetT.theme = "dark";

  //   // const userCred = JSON.parse(localStorage.getItem("user"));

  //   // const userCred = JSON.parse(localStorage.getItem("user"));
  //   // userCred.theme = "dark";
  //   // localStorage.setItem("user", JSON.stringify(userCred));
  //   // const themecheck = userCred.theme;
  //   if ((JSON.parse(localStorage.getItem("user"))).theme = "dark") {
  //     $('.bg-dark').removeClass('bg-dark').addClass('bg-light');
  //     $('.bg-dark-in').removeClass('bg-dark-in').addClass('bg-light-in');
  //     $('.bg-dark-inv').removeClass('bg-dark-inv').addClass('bg-light-inv');
  //     $('.fa-sun').removeClass('fa-sun').addClass('fa-moon');
  //     $('.card_dark').removeClass('card_dark').addClass('card_light');
  //     $('.txt-dark-inv').removeClass('txt-dark-inv').addClass('txt-light-inv');
  //     (JSON.parse(localStorage.getItem("user"))).theme = "light";
  //     localStorage.setItem("user", JSON.stringify(JSON.parse(localStorage.getItem("user"))));
  //   } else {
      
  //   $('.bg-light').removeClass('bg-light').addClass('bg-dark');
  //   $('.bg-light-in').removeClass('bg-light-in').addClass('bg-dark-in');
  //   $('.bg-light-inv').removeClass('bg-light-inv').addClass('bg-dark-inv');
  //   $('.fa-moon').removeClass('fa-moon').addClass('fa-sun');
  //   $('.card_light').removeClass('card_light').addClass('card_dark');
  //   $('.txt-light-inv').removeClass('txt-light-inv').addClass('txt-dark-inv');
  //   (JSON.parse(localStorage.getItem("user"))).theme = "dark";
  //   localStorage.setItem("user", JSON.stringify(JSON.parse(localStorage.getItem("user"))));
  // }
  // });



// });
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
function AzsetLightTheme(){
  AzsettingLightTheme();
  const userCred = JSON.parse(localStorage.getItem("user"));
  userCred.theme = "light";
  localStorage.setItem("user", JSON.stringify(userCred));
}

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
function AzsetDarkTheme(){
  AzsettingDarkTheme();
  const userCred = JSON.parse(localStorage.getItem("user"));
  userCred.theme = "dark";
  localStorage.setItem("user", JSON.stringify(userCred));
}

// script of ongoing deevelopment message
function popdev(){
  alert("This feature is currently on development                                                                                                                                                                                                                                                                                        -the developer");
}


const toastTrigger = document.getElementById('liveToastBtn')
const toastLiveExample = document.getElementById('liveToast')
if (toastTrigger) {
toastTrigger.addEventListener('click', () => {
  const toast = new bootstrap.Toast(toastLiveExample)

  toast.show()
})
}
// script of ongoing deevelopment message


//Function for login modal
$('.btn-login').on('click', () => {
  $('#mySignupModal').modal('hide');
  $('#myLoginModal').modal('show');

  $('#login').on('click', (e) => {
    e.preventDefault();
    var sEmail = document.getElementById("form2Example1").value;
    var sPassword = document.getElementById("form2Example2").value;

    var sJsonData = {
        email: sEmail,
        password: sPassword,
    };

    $.ajax({
        type: 'POST',
        url: "controllers/login.php",
        data: sJsonData,
        success: (result) => {
                if( result == "Login Success") {
                  $('#myLoginModal').modal('hide');
                } else {
                    console.log(result);
                }   
        }
    });

  });

})

//Function for signup modal
$('.btn-signup').on('click', () => { 
  $('#myLoginModal').modal('hide');
  $('#mySignupModal').modal('show');

  $('#createAcc').on('click', (e) => {
    e.preventDefault();
    var sName = document.getElementById("form3Example1cg").value;
    var sEmail = document.getElementById("form3Example3cg").value;
    var sPassword = document.getElementById("form3Example4cg").value;
    var sConfirmPass= document.getElementById("form3Example4cdg").value;

    var sJsonData = {
        name: sName,
        email: sEmail,
        password: sPassword,
        confirmpassword: sConfirmPass
    };

    $.ajax({
        type: 'POST',
        url: "controllers/signup.php",
        data: sJsonData,
        success: (result) => {
                if( result == "Sign-up Success") {
                  $('#mySignupModal').modal('hide');
                  $('#myLoginModal').modal('show');
                } else {
                    console.log(result);
                }   
        }
    });

  });

});

//Function for signup modal
$('#btn-search').on('click', () => {
  $('#searchModal').modal('show');
});

$('#futsign').on('click', () => {
  $('#mySignupModal').modal('show');
});
// ============== js footer collapse ==============
//  txt-light collapsed
// const cs_list = document.querySelectorAll('.footer_cs_list_i')

// cs_list.forEach(panel => {
//   footer_cs_list_i.addEventListener('click', () => {
//         removeActiveClasses()
//         footer_cs_list_i.attr("aria-expanded","true");
//         // footer_cs_list_i.classList.add('collapsed')
//         $("button").attr("aria-expanded","true");
//     })
// })

// function removeActiveClasses() {
//   cs_list.forEach(footer_cs_list_i => {
//     footer_cs_list_i.attr("aria-expanded","false");
//       // footer_cs_list_i.classList.remove('collapsed')
//     })
// }

