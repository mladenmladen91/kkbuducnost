$(document).ready(function() {
    //loading album
    loadAlbum($(".player_id").val());

});

// loading photoa with this album's id's
function loadAlbum(id){
      $.ajax({
          url: 'ajaxRequests/loadAlbum.php',
          type: 'POST',
          data: 'id='+id,
          success: function (data) {
              $(".player_container").html(data);
          }
      });
}

// saving photo
function savePhoto(formData, id){
     
         swal("Jeste li sigurni da želite da dodate fotografiju?", {
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
                url: 'ajaxRequests/sacuvajFotografiju.php',
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (returndata) {
                    if(returndata !== "Success"){
                        swal(returndata);
                        
                    }else{
                        swal("Fotografija dodata!", "Uspješno ste dodali fotografiju!", "success").then(function(){
                           window.location = "pregledFotografija.php?id="+id;
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
// photo deleting
function deleteSection(izbrisi){
        var id = izbrisi.prev(".rowId").val();
        var photo = izbrisi.next(".photoName").val();
        swal("Jeste li sigurni da želite da obrišete?", {
                buttons: {
                    cancel: "Ne",
                    catch: {
                        text: "Obriši?",
                        value: "catch",
                    },

                },
            })
                .then((value) => {
                switch (value) {
                    case "catch":
              $.ajax({
                url: 'ajaxRequests/deletePhoto.php',
                type: 'POST',
                data: "id="+id+"&photo="+photo,
                success: function (returndata) {
                    returndata = returndata.replace(" ", "");
                    returndata = returndata.trim();
                    if(returndata !== "Success"){
                        swal(returndata);
                    }else{
                        swal("Obrisano!", "Uspješno ste obrisali sekciju!", "success");
                        izbrisi.closest(".photoRow").remove();
                        
                    }
                }
            });
            
             break;
                    default:
                        swal("Podaci su nepromijenjeni.");
                }
            }); 
}