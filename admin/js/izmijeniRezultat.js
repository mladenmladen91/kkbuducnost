$(document).ready(function(){
      loadResult($(".player_id").val());
});

function loadResult(id){
      $.ajax({
          url: 'ajaxRequests/loadRezultat.php',
          type: 'POST',
          data: 'id='+id,
          success: function (data) {
              $(".player_container").html(data);
          }
      });
}

function savePlayer(formData, id){
     
         swal("Jeste li sigurni da želite da izmijenite rezultat?", {
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
                url: 'ajaxRequests/changeRezultat.php',
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
                        swal("Rezultat Izmijenjen!", "Uspješno ste izmijenili rezultat!", "success").then(function(){
                           loadResult(id);
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