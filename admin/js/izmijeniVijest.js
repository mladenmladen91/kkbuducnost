$(document).ready(function(){
      loadNews($(".player_id").val());
});

function loadNews(id){
      $.ajax({
          url: 'ajaxRequests/loadVijest.php',
          type: 'POST',
          data: 'id='+id,
          success: function (data) {
              $(".player_container").html(data);
          }
      });
}

function saveNews(formData, id){
     
         swal("Jeste li sigurni da želite da izmijenite vijest?", {
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
                url: 'ajaxRequests/changeVijest.php',
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
                        swal("Vijest Izmijenjena!", "Uspješno ste izmijenili vijest!", "success").then(function(){
                           loadNews(id);
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