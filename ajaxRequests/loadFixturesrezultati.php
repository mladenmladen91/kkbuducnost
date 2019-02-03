<?php
session_start();

include "../includes/db.php";
    
include "../includes/functions.php";

$category = $_POST['category'];


    $stmtKalendar = mysqli_prepare($connection,"SELECT domacin, gost, domacin_kosevi, gost_kosevi, datum, vrijeme, domacin_logo, gost_logo, dvorana FROM rezultati ORDER BY datum DESC LIMIT 1 ");
    $stmtKalendar->execute();
    testQuery($stmtKalendar);
    $stmtKalendar->bind_result($domacin, $gost, $domacin_kosevi, $gost_kosevi, $datum, $vrijeme, $domacin_logo, $gost_logo, $dvorana);
    $stmtKalendar->fetch();
  
?>
 <div class="col-lg-12 game_container_info">
                        <div class="row">
                         <div class="col-lg-4 col-sm-4 text-center px-2 py-2">
                             <span class="game_container_info_text game_container_info_date float-right"><i class="fas fa-calendar-alt"></i>&ensp;<?php echo $newDate = date("d.m.Y", strtotime($datum)) ?></span>
                         </div>
                         <div class="col-lg-4 col-sm-4 text-center py-2">
                             <span class="game_container_info_text game_container_info_time text-center"><i class="far fa-clock"></i>&ensp;<?php echo $newDate = date("H:m", strtotime($vrijeme)) ?></span>
                         </div>
                         <div class="col-lg-4 col-sm-4  text-center px-2 py-2">
                             <span class="game_container_info_text game_container_info_location float-left"><i class="fas fa-map-marker"></i>&ensp;<?php echo $dvorana ?></span>
                         </div>    
                        </div>
                    </div>
                    <div class="col-lg-12 teams">
                        <div class="row">
                            <div class="col-lg-5 col-md-4 col-sm-4 text-center px-2 py-4 team">
                              <div class="row">
                                <div class="col-lg-8 text-center">     
                                    <span class="team_name team_name_home float-right"><?php echo $domacin ?></span>
                                </div>    
                                <div class="col-lg-4 text-center p-0">   
                                    <img class="img-responsive" src="admin/images/timovi/<?php echo $domacin_logo ?>" style="height: 60px">
                                </div>    
                               </div>    
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-4 text-center py-4">
                                <span class="team_versus text-center"><?php echo $domacin_kosevi ?>:<?php echo $gost_kosevi ?></span>
                            </div>
                            <div class="col-lg-5 col-md-4 col-sm-4 text-center px-2 py-4 team">
                               <div class="row">
                                <div class="col-lg-4 p-0">   
                                    <img class="img-responsive" src="admin/images/timovi/<?php echo $gost_logo ?>" style="height: 60px !important">
                                </div>    
                                <div class="col-lg-8 text-center">   
                                   <span class="team_name team_name_guest float-left"><?php echo $gost ?></span>
                                </div>    
                               </div>       
                            </div>
                        </div>
                    </div>

