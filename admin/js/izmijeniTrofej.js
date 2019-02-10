$(document).ready(function(){
      loadTrophy($(".player_id").val());
});

function loadTrophy(id){
      $.ajax({
          url: 'ajaxRequests/loadTrofej.php',
          type: 'POST',
          data: 'id='+id,
          success: function (data) {
              $(".player_container").html(data);
          }
      });
}

function saveTrophy(formData, id){
     
         swal("Jeste li sigurni da želite da izmijenite trofej?", {
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
                url: 'ajaxRequests/changeTrofej.php',
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (returndata) {
                    console.log(returndata.length);
                    if(returndata !== "Success"){
                        swal(returndata);
                        
                    }else{
                        swal("Trofej Izmijenjen!", "Uspješno ste izmijenili trofej!", "success").then(function(){
                           loadTrophy(id);
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