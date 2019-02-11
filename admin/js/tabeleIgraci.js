$(document).ready(function(){
    $(".delete_btn").click(function(){
        deleteSection($(this));
    });
});

// delete function
function deleteSection(izbrisi){
        var id = izbrisi.prev(".rowId").val();
        var table = izbrisi.next(".tableName").val();
    console.log(id);
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
                url: 'ajaxRequests/deletePlayer.php?delete=true',
                type: 'POST',
                data: "id="+id+"&table="+table,
                success: function (returndata) {
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