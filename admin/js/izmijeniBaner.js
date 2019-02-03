$(document).ready(function(){
      loadBaner($(".player_id").val());
});

function loadBaner(id){
      $.ajax({
          url: 'ajaxRequests/loadBaner.php',
          type: 'POST',
          data: 'id='+id,
          success: function (data) {
              $(".player_container").html(data);
          }
      });
}

function saveBaner(formData, id){
     
         swal("Jeste li sigurni da želite da izmijenite baner?", {
                buttons: {
                    cancel: "Ne",
                    catch: {
                        text: "Sačuvaj izmjene",
                        value: "catch",
                    },

                },
            })
                .then((value) => {
                switch (value) {
                    case "catch":
              $.ajax({
                url: 'ajaxRequests/changeBaner.php',
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (returndata) {
                    console.log(returndata.length);
                    if(returndata.length != 33){
                        swal(returndata);
                        
                    }else{
                        swal("Trofej Izmijenjen!", "Uspješno ste izmijenili baner!", "success").then(function(){
                           loadBaner(id);
                        });
                      
                    }
                }
            });
            
             break;
                    default:
                        swal("Podaci su nepromijenjeni.");
                       
                }
             
            });
                
            return false;
            
}