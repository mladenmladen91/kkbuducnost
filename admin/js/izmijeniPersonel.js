$(document).ready(function(){
    loadPlayer($(".player_id").val(), $(".tableName").val());
});

function loadPlayer(id, table){
    $.ajax({
          url: 'ajaxRequests/loadPersonel.php',
          type: 'POST',
          data: 'id='+id+'&table='+table,
          success: function (data) {
              $(".player_container").html(data);
          }
      });
}

function savePlayer(formData, id, location){
     
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
                url: 'ajaxRequests/change'+location+'.php',
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
                        swal("Podaci Izmijenjeni!", "Uspješno ste izmijenili podatke!", "success").then(function(){
                           loadPlayer($(".player_id").val(), $(".tableName").val());
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