$(document).ready(function(){
      loadSponsor($(".player_id").val());
});

function loadSponsor(id){
      $.ajax({
          url: 'ajaxRequests/loadSponsor.php',
          type: 'POST',
          data: 'id='+id,
          success: function (data) {
              $(".player_container").html(data);
          }
      });
}

function saveSponsor(formData, id){
     
         swal("Jeste li sigurni da želite da izmijenite sponzora?", {
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
                url: 'ajaxRequests/changeSponzor.php',
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (returndata) {
                    returndata = returndata.trim();
                    if(returndata !== "Success"){
                        swal(returndata);
                        
                    }else{
                        swal("Sponzor Izmijenjen!", "Uspješno ste izmijenili sponzora!", "success").then(function(){
                           loadSponsor(id);
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