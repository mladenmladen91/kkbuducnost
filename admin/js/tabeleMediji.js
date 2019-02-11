$(document).ready(function(){
    $(".delete_btn").click(function(){
        deleteSection($(this));
    });
    
    
    
});



// delete function
function deleteSection(izbrisi){
        var id = izbrisi.prev(".rowId").val();
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
                url: 'ajaxRequests/deleteIzjava.php?delete=true',
                type: 'POST',
                data: "id="+id,
                success: function (returndata) {
                    returndata = returndata.replace(" ", "");
                    returndata = returndata.trim();
                    if(returndata !== "Success"){
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

