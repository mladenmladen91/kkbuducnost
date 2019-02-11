$(document).ready(function(){
    // loading tags
    loadTags();
    
    
    // submiting form for adding news
    $(".add_news_form").submit(function(e){
            e.preventDefault();
            
            var tableName = $(".tableName").val();
            var page = $(".pageName").val();
            var formData = new FormData($(this)[0]);
            
            saveData(formData, tableName, page);
    });
    
    // submitting form for adding tags
    $("#dodajTagForm").submit(function(e){
            e.preventDefault();
         
            var formData = new FormData($(this)[0]);
            var page = "dodajTag";
            
            saveTag(formData, page);
            
     });
});


function loadTags(){
    console.log("ucitano");
    $.ajax({
          url: 'ajaxRequests/loadTags.php',
          type: 'POST',
          cache: false,
          contentType: false,
          processData: false,
          success: function (data) {
              $("#tagovi").html(data);
          }
      });
}
// saving news
function saveData(formData, tableName, page){
        
        swal("Jeste li sigurni da želite da dodate vijest?", {
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
                        swal("Vijest dodata!", "Uspješno ste dodali vijest!", "success").then(function(){
                                     if(tableName === 'tagovi'){
                                         loadTagovi();
                                     }else{
                                       window.location= tableName+'.php';
                                     }
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

// saving tags
function saveTag(formData, page){
     $.ajax({
                url: 'ajaxRequests/'+page+'.php',
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (returndata) {
                      loadTags();
                      
                      
                 }
            
            });
            
}