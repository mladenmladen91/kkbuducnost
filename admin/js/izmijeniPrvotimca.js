$(document).ready(function(){
      loadPlayer($(".player_id").val());
});

function loadPlayer(id){
      $.ajax({
          url: 'ajaxRequests/loadPrvotimca.php',
          type: 'POST',
          data: 'id='+id,
          success: function (data) {
              $(".player_container").html(data);
          }
      });
}

function savePlayer(formData, id){
     
         swal("Jeste li sigurni da želite da izmijenite podatke?", {
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
                url: 'ajaxRequests/changePrvotimca.php',
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
                        swal("Podaci Izmijenjeni!", "Uspješno ste izmijenili podatke!", "success").then(function(){
                           loadPlayer(id);
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