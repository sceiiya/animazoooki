$(document).ready(async()=>{
    getCART();
  });

  async function getCART(){
    try{
    $.get('/controllers/get_cart.php', (data, status)=>{
      if (status === "success"){
        $('.cartmain').append(data);
      }
    });
  }catch(error){
      ERROR_logger(error);
  }
  };