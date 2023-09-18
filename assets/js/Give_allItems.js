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
  
 function AllItems(){
      try{
        $.ajax({
          url: '/controllers/get_productsInfo.php',
          type: 'GET',
          beforeSend: function() {
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