$(document).ready(function() {
    // geting lactive tables
    getStatements($("#izjave"));
    
});
// function for loading albms
function getStatements(button){
    $(".game_navigation_dir_active").removeClass("game_navigation_dir_active");
    
    button.addClass("game_navigation_dir_active");
    
    $.ajax({
        type: 'POST',
        url: 'ajaxRequests/loadStatements.php',
        success:function(data){
            $("#media_container").html(data);
        }
    });
}

function getPhotos(button){
    $(".game_navigation_dir_active").removeClass("game_navigation_dir_active");
    
    button.addClass("game_navigation_dir_active");
    
    $.ajax({
        type: 'POST',
        url: 'ajaxRequests/loadClubPhotos.php',
        success:function(data){
            $("#media_container").html(data);
        }
    });
}



