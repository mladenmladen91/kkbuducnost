$(document).ready(function() {
    // getting fixtures
    loadLatestFixture('kalendar', $(".game_navigation_dir_active"));
    
    // geting latest news
    loadIndexVijesti();
    
    // loading tables
    loadIndexTables('aba', $("#prvi"));
    
    // loading kalendar
    loadIndexKalendar();
    
    
    
    $(".swiperIgrac").click(function(){
     //  $('#igrac').modal('show');
       
       $("#modal_fotografija").attr("src", $(this).find(".swiper_fotografija").val());
       
       $("#modal_ime").text($(this).find(".swiper_ime").val());
       $("#modal_datum").text($(this).find(".swiper_datum").val()); 
       $("#modal_broj").text($(this).find(".swiper_broj").val()); 
       $("#modal_nacionalnost").text($(this).find(".swiper_nacionalnost").val());
       $("#modal_visina").text($(this).find(".swiper_visina").val());
       $("#modal_pozicija").text($(this).find(".swiper_pozicija").val());    
       
   });
    
});
// function for loading fixtures
function loadLatestFixture(category, span){
     $(".game_navigation_dir_active").removeClass("game_navigation_dir_active");
     span.addClass('game_navigation_dir_active');
    
      $.ajax({
          url: 'ajaxRequests/loadFixtures'+category+'.php',
          type: 'POST',
          data: 'category='+category,
          success: function (data) {
              $("#game_container").html(data);
          }
      });
}

// function for loading latest news
function loadIndexVijesti(){
    
     $.ajax({
          url: 'ajaxRequests/loadIndexVijesti.php',
          type: 'POST',
          success: function (data) {
              $("#latestNews").html(data);
          }
      });
}

// function for loading tables 
function loadIndexTables(category, span){
     $(".game_navigation_dir_actual").removeClass("game_navigation_dir_actual");
     span.addClass('game_navigation_dir_actual');
    
      $.ajax({
          url: 'ajaxRequests/loadIndexTables.php',
          type: 'POST',
          data: 'category='+category,
          success: function (data) {
              $("#indexTableContainer").html(data);
          }
      });
}

// function for loading calendar
function loadIndexKalendar(){
     $.ajax({
          url: 'ajaxRequests/loadIndexKalendar.php',
          type: 'POST',
          success: function (data) {
              $("#indexKalendarContainer").html(data);
          }
      });
}