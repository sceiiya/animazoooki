$(document).ready(async()=>{
    getCART();
  });

  async function getCART(){
    try{
      var x = document.querySelector('#LoadingSpinner');
      if (x.style.display === "none") {
          x.style.display = "block";
      } else {
          x.style.display = "none";
      }
    $.get('/controllers/get_cart.php', (data, status)=>{
      if (status === "success"){
        $('.cartmain').append(data);
        retheme();
        getSubNTotal();
        // setTimeout(getSubNTotal(), 8000)
        var x = document.querySelector('#LoadingSpinner');
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
      }
    });
  }catch(error){
      ERROR_logger(error);
      var x = document.querySelector('#LoadingSpinner');
      if (x.style.display === "none") {
          x.style.display = "block";
      } else {
          x.style.display = "none";
      }
  }
  };

      $(document).ready(function() {
        // Arrow up button click event
        $('body').on('click', '.fa-arrow-up', function() {
            //  get current value
            var inputEl = $(this).closest('.d-flex').find('input');
            var currentValue = parseFloat(inputEl.val());

            // plsu
            if (!isNaN(currentValue)) {
                inputEl.val(currentValue + 1);
            }
            getSubNTotal();
        });

        // Arrow down button click event
        $('body').on('click', '.fa-arrow-down', function() {
            // get current value
            var inputEl = $(this).closest('.d-flex').find('input');
            var currentValue = parseFloat(inputEl.val());

            // minus
            if (!isNaN(currentValue) && currentValue > 0) {
                inputEl.val(currentValue - 1);
            }
            getSubNTotal();
        });
    });

// $(document).ready(function() {
// $(".meqty").on("change", function() {
//         //   calculateCart();
//     getSubNTotal();
// });
// });
const shipfee = 3.75;   
let OsubTotal = '';
let OshipFee ='';
let Ototal ='';
function getSubNTotal(){
    let subtotal = 0;
    let totshipfee = 0;
    // product row
    $("table#admin_prod_tbl tr").not(":first").each(function() {
      if ($(this).find("input[type='checkbox']").is(":checked")) {
        // get quantity and price
        let quantity = parseInt($(this).find("input[name='quantity']").val());
        // console.log(quantity);
        let price = parseInt($(this).find(".priceee").text().replace("$ ", ""));
        // console.log(price);
        // calculate total price add subtotal
        let total = quantity * price;
        totshipfee += quantity * shipfee;
        subtotal += total;
      }
    });
    // $("#cartsubTotal").text("$ " + subtotal.toFixed(2));
    // $("#cartshipTotal").text("$ " + totshipfee.toFixed(2));

    let total = subtotal + totshipfee;
    // $("#cartTotal").text("$ " + total.toFixed(2));
    OsubTotal = subtotal.toFixed(2);
    OshipFee =  totshipfee.toFixed(2);
    Ototal =    total.toFixed(2);

    $("#cartsubTotal").text("$ " + OsubTotal);
    $("#cartshipTotal").text("$ " + OshipFee);
    $("#cartTotal").text("$ " + Ototal);
  }