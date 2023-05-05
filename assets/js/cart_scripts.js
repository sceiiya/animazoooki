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

function getSubNTotal(){
    var subtotal = 0;
    // product row
    $("table#admin_prod_tbl tr").not(":first").each(function() {
      if ($(this).find("input[type='checkbox']").is(":checked")) {
        // get quantity and price
        var quantity = parseInt($(this).find("input[name='quantity']").val());
        // console.log(quantity);
        var price = parseInt($(this).find(".priceee").text().replace("$ ", ""));
        // console.log(price);
        // calculate total price add subtotal
        var total = quantity * price;
        subtotal += total;
      }
    });
    // $("#cartsubTotal").text("$ " + subtotal.toFixed(2));
    var total = subtotal;
    $("#cartTotal").text("$ " + total.toFixed(2));
  }
  