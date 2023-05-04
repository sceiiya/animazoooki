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
            // Get the input element and its current value
            var inputEl = $(this).closest('.d-flex').find('input');
            var currentValue = parseFloat(inputEl.val());

            // Increment the value and update the input element
            if (!isNaN(currentValue)) {
                inputEl.val(currentValue + 1);
            }
        });

        // Arrow down button click event
        $('body').on('click', '.fa-arrow-down', function() {
            // Get the input element and its current value
            var inputEl = $(this).closest('.d-flex').find('input');
            var currentValue = parseFloat(inputEl.val());

            // Decrement the value and update the input element
            if (!isNaN(currentValue) && currentValue > 0) {
                inputEl.val(currentValue - 1);
            }
        });
    });