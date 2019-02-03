$(document).ready(function() {
    // geting lactive tables
    getResults('aba', 1, $("#aba"));
    
});
// function for sending requests and pagination
function getResults(section, pageNumber, button){
    $(".game_navigation_league_active").removeClass("game_navigation_league_active");
    
    button.addClass("game_navigation_league_active");
    
    $.ajax({
        type: 'POST',
        url: 'ajaxRequests/loadCalendar.php',
        data: 'criteria='+section+'&pageNumber='+pageNumber,
        success:function(data){
            $("#calendar_container").html(data);
        }
    });
}

// function for getting previous and next pages
function getPages(section, pageNumber){
   $.ajax({
        type: 'POST',
        url: 'ajaxRequests/loadCalendar.php',
        data: 'criteria='+section+'&pageNumber='+pageNumber,
        success:function(data){
            $("#calendar_container").html(data);
        }
    });
}

