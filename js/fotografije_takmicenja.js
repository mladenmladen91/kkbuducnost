$(document).ready(function() {
    // geting lactive tables
    getCategories($(".prvi").attr("id"), $(".prvi"));
    
});
// function for loading albms
function getCategories(section, button){
    $(".game_navigation_league_active").removeClass("game_navigation_league_active");
    
    button.addClass("game_navigation_league_active");
    
    $.ajax({
        type: 'POST',
        url: 'ajaxRequests/loadAlbumCategories.php',
        data: 'section='+section,
        success:function(data){
            $("#albums_container").html(data);
        }
    });
}



