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


// new Chart(document.getElementById("horizontalBar"), {
//   "type": "horizontalBar",
//   "data": {
//     "labels": ["January", "February", "April", "May", "June", "July", "August"],
//     "datasets": [{
//       "label": "Sales Summary within the Year 2023",
//       "data": [14, 31, 46, 49, 77, 28, 34],
//       "fill": false,
//       "backgroundColor": ["rgba(165, 1, 19, 0.5)", "rgba(165, 1, 19, 0.5)",
//         "rgba(165, 1, 19, 0.5)", "rgba(165, 1, 19, 0.5)", "rgba(165, 1, 19, 0.5)",
//         "rgba(165, 1, 19, 0.5)", "rgba(165, 1, 19, 0.5)"
//       ],
//       "borderColor": ["rgb(165, 1, 19,)", "rgb(165, 1, 19,)", "rgb(165, 1, 19,)",
//       "rgb(165, 1, 19,)", "rgb(165, 1, 19,)", "rgb(165, 1, 19,)", "rgb(165, 1, 19,)"
//       ],
//       "borderWidth": 1
//     }]
//   },
//   "options": {
//     "scales": {
//       "xAxes": [{
//         "ticks": {
//           "beginAtZero": true
//         }
//       }]
//     }
//   }
// });

// function toggleMode() {
//     var element = document.getElementsByTagName("i");
//     element.classList.toggle("fa-sun");
//   }

// function toggleMode() {
//     var elements = document.getElementsByTagName("*");
//     for (var i = 0; i < elements.length; i++) {
//       var classes = elements[i].className.split(" ");
//       if (classes.indexOf("fa-moon") >= 0) {
//         classes.splice(classes.indexOf("fa-moon"), 1);
//         classes.push("fa-sun");
//       } else if (classes.indexOf("fa-sun") >= 0) {
//         classes.splice(classes.indexOf("fa-sun"), 1);
//         classes.push("fa-moon");
//       }
//       elements[i].className = classes.join(" ");
//     }
//   }

//   var button = document.getElementById("mode-toggle");
// button.addEventListener("click", toggleMode);


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

})

//Function for signup modal
$('#btn-search').on('click', () => {
  $('#searchModal').modal('show');
})

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

// Customer Profile

var container = $('.profile-cont-r');
var linkAccount = document.querySelector('#myAccount');
var linkPurchases = document.querySelector('#myPurchases');
var linkCart = document.querySelector('#mycart');
var linkVouchers = document.querySelector('#myVouchers');
var linkPassword = document.querySelector('#changePass');
var linkSettings = document.querySelector('#mySettings');

function loadContent(content) {
    // AJAX request in Javascript
    var xhr = new XMLHttpRequest();
    xhr.open('POST', content, true);
    xhr.onload = function() {
      var el = document.createElement('div');
      el.innerHTML = this.response;
      container.empty();
      container.prepend(el);
    }
    xhr.send();
}

linkAccount.addEventListener('click', function(e){
  loadContent('/profile/content/myprofile.php');
  e.preventDefault() ;
});
linkPurchases.addEventListener('click', function(e){
  loadContent('/profile/content/mypurchases.php');
  e.preventDefault() ;
});
linkCart.addEventListener('click', function(e){
  loadContent('/profile/content/mycart.php');
  e.preventDefault() ;
});
linkVouchers.addEventListener('click', function(e){
  loadContent('/profile/content/myvouchers.php');
  e.preventDefault() ;
});
linkPassword.addEventListener('click', function(e){
  loadContent('/profile/content/changepass.php');
  e.preventDefault() ;
});
linkSettings.addEventListener('click', function(e){
  loadContent('/profile/content/mysettings.php');
  e.preventDefault() ;
});

let list = document.querySelectorAll('.profile-label-cont li');
function activelink() {
    list.forEach((item) =>
    item.classList.remove('hovered'));
    this.classList.add('hovered');
}
list.forEach((item) =>
item.addEventListener('mouseover', activelink));