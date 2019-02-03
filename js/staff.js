$(document).ready(function() {
    // geting players
    loadPlayers($(".staff_table").val());
    
});
// function for loading players
function loadPlayers(category){
     $.ajax({
          url: 'ajaxRequests/loadStaff.php',
          type: 'POST',
          data: 'category='+category,
          success: function (data) {
              $(".player_container").html(data);
          }
      });
}



