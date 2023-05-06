$(document).ready(()=>{
    getCART();
  });

  function itemRemove(id){
    let of = {
      cID: id
    }
    $.ajax({
      url: "/controllers/remove_cart.php",
      type: "POST",
      data: of,
      success: (result) =>{
        console.log(result);
        if(result == 'updated'){
          getCART();
        }
      },
    });
  }

   function getCART(){
    try{
      var x = document.querySelector('#LoadingSpinner');
      if (x.style.display === "none") {
          x.style.display = "block";
      } else {
          x.style.display = "none";
      }
    $.get('/controllers/get_cart.php', (data, status)=>{
      if (status === "success"){
        $('.cartmain').empty();
        $('.cartmain').append(data);
        retheme();
        getSubNTotal();
        readyCheck();
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
    $("table#check_prod_tbl tr").not(":first").each(function() {
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


  function readyCheck() {
    $("#AddOrderBttn").click(function() {
      // Check if any checkboxes are checked
      if ($("input[type='checkbox']:checked").length === 0) {
        toastr.warning('Please select a product first to checkout.');
        return;
      }else{
  
      let checking =[];
  
      $("input[type='checkbox']:checked").each(function() {
        var cart_id = $(this).closest("tr").find(".CARTsessID").text();
        var prod_id = $(this).closest("tr").find(".CARTprodID").text();
        var quantity = $(this).closest("tr").find("input[name='quantity']").val();
  
        checking.push({
          "cart_id": cart_id,
          "prod_id": prod_id,
          "quantity": quantity
        });
      });
  
      let cchecking ={
          checking: JSON.stringify(checking),
          subtotal: OsubTotal,
          shiptotal: OshipFee,
          total: Ototal
      };
  
      $.ajax({
        url: "/controllers/get_checkout.php",
        type: "POST",
        data: cchecking,
        success: (items) =>{
          $('#previewOrder').empty();
          $('#previewOrder').append(items);
        },
      });
      $('#checkoutModal').modal('show');
    }
    });
    
  };
  


$('#PurchaseOrderBttn').on('click', ()=>{
  const userCred = JSON.parse(localStorage.getItem("user"));
  if (userCred && userCred.status == "Inactive") {
    toastr.warning('Please Verify your Account First!', 'Unverified Account!')
  } else {
    $('#confirmOrder').modal('show');
}
})

$("#yes-ORDER").on('click',() =>{
  confirmOrder();
});

function confirmOrder(){
      var allFieldsFilled = true;
      $('#checkout-container input').each(function() {
        if ($(this).val() === '') {
          allFieldsFilled = false;
          return false;
        }
      });
      if (!$("input[name='optradio']:checked").val()) {
        allFieldsFilled = false;
      }
      if (!allFieldsFilled) {
        toastr.warning('Please complete all fields to proceed.');
        return false;
      }
      var Name = $('#checkName').val();
      var Address = $('#checkaddress').val();
      var Number = $('#checkNumber').val();
      var Email = $('#checkEmail').val();
      var pMethod = $("input[name='optradio']:checked").val();
      // console.log(contactName, contactAddress, contactNumber, contactEmail, paymentMethod);

  let checking =[];

    $("input[type='checkbox']:checked").each(function() {
      var cart_id = $(this).closest("tr").find(".CARTsessID").text();
      var prod_id = $(this).closest("tr").find(".CARTprodID").text();
      var quantity = $(this).closest("tr").find("input[name='quantity']").val();

      checking.push({
        "cart_id": cart_id,
        "prod_id": prod_id,
        "quantity": quantity
      });
    });

    let order ={
        checking: JSON.stringify(checking),
        subtotal: OsubTotal,
        shiptotal: OshipFee,
        total: Ototal,
        name: Name,
        address: Address,
        cellno: Number,
        email: Email,
        paymeth: pMethod
    };
  $.ajax({
    url: "/controllers/add_order.php",
    type: "POST",
    data: order,
    beforeSend: ()=>{
      var x = document.querySelector('#LoadingSpinner');
      if (x.style.display === "none") {
          x.style.display = "block";
      } else {
          x.style.display = "none";
      }
    },
    success: (status) =>{
      if(status == 'true'){
        getCART();
        $('#confirmOrder').modal('hide');
        $('#checkoutModal').modal('hide');
        toastr.info('We have sent the details to your email', 'Placed Order')
      }else{
        ERROR_logger(status);
        console.log(status);
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