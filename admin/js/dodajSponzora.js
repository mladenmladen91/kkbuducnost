$(document).ready(function(){
    
    $("form").submit(function(e){
            e.preventDefault();
            
            var tableName = $(".tableName").val();
            var page = $(".pageName").val();
            var formData = new FormData($(this)[0]);
            
            saveSponsor(formData, tableName, page);
    });
    
    
});

function saveSponsor(formData, tableName, page){
        
        swal("Jeste li sigurni da želite da dodate sponzora?", {
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
                    returndata = returndata.trim();
                    if(returndata !== "Success"){
                        swal(returndata);
                    }else{
                        swal("Sponzor dodat!", "Uspješno ste dodali sponzora!", "success").then(function(){
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