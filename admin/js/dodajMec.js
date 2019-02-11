$(document).ready(function(){
    
    $(".selectTim").select2();
    
    $("#selectGost").select2();
    
    $("form").submit(function(e){
            e.preventDefault();
            
            var tableName = $(".tableName").val();
            var page = $(".pageName").val();
            var formData = new FormData($(this)[0]);
            
            savePlayer(formData, tableName, page);
    });
    
    
});

function savePlayer(formData, tableName, page){
        
        swal("Jeste li sigurni da želite da dodate meč?", {
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
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function (returndata) {
                    returndata = returndata.replace(" ", "");
                    returndata = returndata.trim();
                    if(returndata !== "Success"){
                        swal(returndata);
                    }else{
                        swal("Meč dodat!", "Uspješno ste dodali meč!", "success").then(function(){
                                       window.location= tableName+'.php';
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