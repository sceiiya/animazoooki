$(document).ready(()=>{
    suggestItems(3);
});

async function suggestItems(){
    try{
      $.get('/controllers/get_randSuggestP.php', (data, status)=>{
        if (status === "success"){
            $('#SUGGESTITEMS').append(data);
        }
      });
    }catch(error){
      ERROR_logger(error);
    }
    }