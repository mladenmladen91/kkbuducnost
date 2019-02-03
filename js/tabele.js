$(document).ready(function() {
    // geting lactive tables
    loadTables();
    
});
// function for loading tables
function loadTables(){
    console.log("test"); 
    $.ajax({
          url: 'ajaxRequests/loadTabele.php',
          type: 'POST',
          success: function (data) {
              $("#table_container").html(data);
          }
      });
}




