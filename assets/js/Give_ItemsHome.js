$(document).ready(async()=>{
    HomeItems();
    NewItems();
    DailyItems();
    Series1Items();
    Series2Items();
});
  
  
async function HomeItems(){
    try{
        $.ajax({
          url: '/controllers/get_ItemsHome.php',
          type: 'GET',
          beforeSend: function() {
            $('.firsttopprods').append('<div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div>');
          },
          success: function(data, status) {
            if (status === "success"){
              $('.firsttopprods').append(data);
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

async function DailyItems(){
    try{
        $.ajax({
            url: '/controllers/get_ItemsHome.php',
            type: 'GET',
            beforeSend: function() {
              $('.dailies').append('<div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div>');
            },
            success: function(data, status) {
              if (status === "success"){
                $('.dailies').append(data);
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

async function NewItems(){
    try{
        $.ajax({
            url: '/controllers/get_ItemsNew.php',
            type: 'GET',
            beforeSend: function() {
              $('.newarrive').append('<div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div>');
            },
            success: function(data, status) {
              if (status === "success"){
                $('.newarrive').append(data);
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

async function Series1Items(){
    try{
        $.ajax({
            url: '/controllers/get_Series1Items.php',
            type: 'GET',
            beforeSend: function() {
              $('.firstseries').append('<div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div>');
            },
            success: function(data, status) {
              if (status === "success"){
                $('.firstseries').append(data);
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

async function Series2Items(){
    try{
        $.ajax({
            url: '/controllers/get_Series2Items.php',
            type: 'GET',
            beforeSend: function() {
              $('.secseries').append('<div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div>');
            },
            success: function(data, status) {
              if (status === "success"){
                $('.secseries').append(data);
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