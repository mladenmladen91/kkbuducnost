$(document).ready(function(){
      loadVideo($(".player_id").val());
});

function loadVideo(id){
      $.ajax({
          url: 'ajaxRequests/loadVideo.php',
          type: 'POST',
          data: 'id='+id,
          success: function (data) {
              $(".player_container").html(data);
          }
      });
}

function saveVideo(formData, id){
     
         swal("Jeste li sigurni da želite da izmijenite video?", {
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
                url: 'ajaxRequests/changeVideo.php',
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
                        swal("Video Izmijenjen!", "Uspješno ste izmijenili video!", "success").then(function(){
                           loadVideo(id);
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