<?php 
session_start();

include "../includes/db.php";
    
include "../includes/functions.php";

// getting the request parameters
	$criteria = $_POST['criteria'];
	$pageNumber = $_POST['pageNumber'];


// getting the number of posts
	$queryAll = "SELECT * FROM kalendar a JOIN lige b ON a.liga_id = b.id WHERE b.naziv='{$criteria}' AND a.datum > CURDATE()";
	$resultAll = mysqli_query($connection, $queryAll);

	$countAll = mysqli_num_rows($resultAll);

// limiting number of results per page
	$per_page = 10;



	$page_1 = ($pageNumber * $per_page) - $per_page;

	$count = ceil($countAll / $per_page) ;


	$query = "SELECT a.domacin, a.gost, a.datum, a.vrijeme, b.naziv, a.domacin_logo, a.gost_logo, a.dvorana FROM kalendar a JOIN lige b WHERE a.liga_id= b.id AND b.naziv='{$criteria}' AND a.datum > CURDATE() ORDER BY a.datum ASC LIMIT $page_1, $per_page";

	$result = mysqli_query($connection, $query);
    $countAll = mysqli_num_rows($result);
	if(!$result){
		die(mysqli_error($connection));
	}

	?>
<div class="col-lg-12">
  <div class="row justify-content-center">
 <?php
     if($countAll > 0){  
       while($row = mysqli_fetch_assoc($result)){   
 ?>      
	<div class="col-lg-12 game_container p-0 mb-4">
                    <div class="col-lg-12 game_container_info">
                        <div class="row">
                         <div class="col-lg-4 col-sm-4 text-center px-2 py-2">
                             <span class="game_container_info_text game_container_info_date float-right"><i class="fas fa-calendar-alt"></i>&ensp;<?php echo $newDate = date("d.m.Y", strtotime($row['datum'])) ?></span>
                         </div>
                         <div class="col-lg-4 col-sm-4 text-center py-2">
                             <span class="game_container_info_text game_container_info_time text-center"><i class="far fa-clock"></i>&ensp;<?php echo $newDate = date("H:m", strtotime($row['vrijeme'])) ?></span>
                         </div>
                         <div class="col-lg-4 col-sm-4  text-center px-2 py-2">
                             <span class="game_container_info_text game_container_info_location float-left"><i class="fas fa-map-marker"></i>&ensp;<?php echo $row['dvorana'] ?></span>
                         </div>    
                        </div>
                    </div>
                    <div class="col-lg-12 teams">
                        <div class="row">
                            <div class="col-lg-5 col-md-4 col-sm-4 text-center px-2 py-4 team">
                              <div class="row">
                                <div class="col-lg-8 text-center">     
                                    <span class="team_name team_name_home float-right"><?php echo $row['domacin'] ?></span>
                                </div>    
                                <div class="col-lg-4 text-center p-0">   
                                    <img class="img-responsive" src="admin/images/timovi/<?php echo $row['domacin_logo'] ?>" style="height: 60px !important">
                                </div>    
                               </div>    
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-4 text-center py-4">
                                <span class="team_versus text-center">VS</span>
                            </div>
                            <div class="col-lg-5 col-md-4 col-sm-4 text-center px-2 py-4 team">
                               <div class="row">
                                <div class="col-lg-4 p-0">   
                                    <img class="img-responsive" src="admin/images/timovi/<?php echo $row['gost_logo'] ?>" style="height: 60px">
                                </div>    
                                <div class="col-lg-8 text-center">   
                                   <span class="team_name team_name_guest float-left"><?php echo $row['gost'] ?></span>
                                </div>    
                               </div>       
                            </div>
                        </div>
                    </div>
                    
                </div>
      <?php } ?>
                 <div class="col-lg-6 text-center results_navigation">
                <?php
					if($pageNumber > 1){
				?>     
                  <span  id="prevPage" class="results_navigation_button"><i class="fas fa-angle-double-left" style="cursor:pointer"></i></span>
                <?php } ?>     
                  <span class="results_navigation_button"><?php echo $pageNumber; ?></span>
                <?php
				   if($pageNumber < $count){
				?>     
                  <span id="nextPage" class="results_navigation_button"><i class="fas fa-angle-double-right" style="cursor:pointer"></i></span>
                <?php } ?>     
              </div>
       <?php }else{ ?>
         <div class="col-lg-12 text-center" style="font-size: 22px; color:gray; margin-top:50px; font-weight:600">NEMA MEČEVA U TOM TAKMIČENJU</div>
      <?php } ?>
      </div>
</div>	


	<script>
		$(document).ready(function(){

			$("#nextPage").click(function(e){
				e.preventDefault();

				getPages('<?php echo $criteria ?>', <?php echo $pageNumber+1; ?>);
			});

			$("#prevPage").click(function(e){
				e.preventDefault();

				getPages('<?php echo $criteria ?>', <?php echo $pageNumber-1; ?>);
			});

		});
	</script>

