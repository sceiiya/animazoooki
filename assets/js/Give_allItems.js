$(document).ready(()=>{
  AllItems(); 
  AllItems(); 
  AllItems(); 
  });
  
  
  $(window).scroll( () => {
    if($(window).scrollTop() + $(window).height() == $(document).height()) {
       AllItems();
    }
  });

  // window.onscroll = function() {
  //   var scrollTop = (document.documentElement.scrollTop || document.body.scrollTop);
  //   var scrollHeight = (document.documentElement.scrollHeight || document.body.scrollHeight);
  //   var clientHeight = document.documentElement.clientHeight;
  
  //   if (scrollTop + clientHeight >= scrollHeight) {
  //     AllItems();
  //   }
  // };
  
 function AllItems(){
      try{
        $.ajax({
          url: '/controllers/get_productsInfo.php',
          type: 'GET',
          beforeSend: function() {
            // show spinner before sending AJAX request
            $('.main').append('<div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div>');
          },
          success: function(data, status) {
            if (status === "success"){
              $('.main').append(data);
            }
          },
          complete: function() {
            $('.spinner-border').remove();
          }
        });
      }catch(error){
        ERROR_logger(error);
      }
      }