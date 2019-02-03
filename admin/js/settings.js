$(document).ready(function(){
    // loading tables and options for settings
    loadTables(); 
    
    
    
    
    
});

function loadTables(){
    
    $.ajax({
          url: 'ajaxRequests/loadSettings.php',
          type: 'POST',
          cache: false,
          contentType: false,
          processData: false,
          success: function (data) {
              $("#table_container").html(data);
          }
      });
}

function saveData(formData, page){
     
         swal("Jeste li sigurni da želite da dodate podatke?", {
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
                url: 'ajaxRequests/'+page+'.php',
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
                        swal("Podaci dodati!", "Uspješno ste dodali podatke!", "success").then(function(){
                           window.location = 'podesavanje.php';
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

// delete function
function deleteSection(izbrisi){
        var id = izbrisi.prev(".rowId").val();
        var table = izbrisi.next(".tableName").val();
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
                url: 'ajaxRequests/deleteRow.php?delete=true',
                type: 'POST',
                data: "id="+id+"&table="+table,
                success: function (returndata) {
                    if(returndata.length != 33){
                        swal(returndata);
                    }else{
                        swal("Obrisano!", "Uspješno ste obrisali sekciju!", "success");
                        izbrisi.closest(".tableRow").remove();
                        
                    }
                }
            });
            
             break;
                    default:
                        swal("Podaci su nepromijenjeni.");
                }
            }); 
}

function status(status, table, id){
     $.ajax({
                url: 'ajaxRequests/activateRow.php',
                type: 'POST',
                data: "status="+status+"&table="+table+"&id="+id,
                
      });
}