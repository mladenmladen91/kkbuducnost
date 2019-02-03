$(document).ready(function(){
    
    $("form").submit(function(e){
            e.preventDefault();
            
            var tableName = $(".tableName").val();
            var page = $(".pageName").val();
            var formData = new FormData($(this)[0]);
            
            saveVideo(formData, tableName, page);
    });
    
    
});

function saveVideo(formData, tableName, page){
        
        swal("Jeste li sigurni da želite da dodate video?", {
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
                    if(returndata.length != 33){
                        swal(returndata);
                    }else{
                        swal("Video dodat!", "Uspješno ste dodali video!", "success").then(function(){
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