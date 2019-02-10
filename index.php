<!-- header including -->
<?php include "includes/header.php" ?>



<title>Početna</title>

</head>
<body>
<div class="section">
<div class="row">   
<div class="col-lg-12">    
<iframe id="euroleague-topbar" src="https://hub.euroleague.net/topbarpublic/euroleague/BUD" style="border:none; border-bottom:2px solid red"></iframe>
</div>
<div class="col-lg-12"><img class="img-responsive" src="images/tim.png" style="width:100%" alt="buducnost_logo"></div>    
</div>    
</div>    
<!-- navigation including -->
<?php include "includes/nav.php"; ?>
    
<?php
  
   $stranica = str_replace('.php','',basename(__FILE__));
  
   include "config.php";
?>    
<div class="section content_containter p-4">
    <div class="container">    
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-9">
                <div class="col-lg-12 game_navigation">
                   <div class="row">
                       <div class="col-lg-6 text-center px-4 game_navigation_next" style="border-right: 2px solid rgb(40, 57, 71)">
                           <span class="game_navigation_dir game_navigation_dir_active float-right" onclick="loadLatestFixture('kalendar',$(this))"><?php echo $lang['next'] ?></span>
                       </div>
                       <div class="col-lg-6 text-center px-4">
                          <span class="game_navigation_dir float-left" onclick="loadLatestFixture('rezultati', $(this))"><?php echo $lang['prev'] ?></span>
                       </div>       
                    </div>       
                </div>
                 <div class="col-lg-12 m-2 game_container p-0" id="game_container">
                    
                </div>

            <div class="col-lg-12 p-0" id="latestNews">                

            </div>                
                <!-- first team -->
                <div class="col-lg-12 section_holder  my-4">
                   <div class="row justify-content-center">    
                    <div class="col-lg-4 col-8 text-center section_header">
                        <span><i class="fas fa-basketball-ball"></i>&ensp;<?php echo $lang['tim'] ?></span>
                    </div>
                    <div class="col-lg-12">
                          <!-- Swiper -->
                          <div class="swiper-container">
                              <div class="swiper-wrapper">
                                  
                              <?php
                                 $stmtTeam = mysqli_prepare($connection, "SELECT ime, prezime, nacionalnost, visina, fotografija, pozicija, broj, datum_rodjenja FROM prvi_tim"); 
                                 $stmtTeam->execute();
                                 testQuery($stmtTeam);
                                 $stmtTeam->bind_result($ime, $prezime, $nacionalnost, $visina, $fotografija, $pozicija, $broj, $datum_rodjenja); 
                                  
                                 while($stmtTeam->fetch()){  
                              ?>      
                                <div class="swiper-slide">
                                   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" data-toggle="modal" data-target="#igrac" style="cursor:pointer">
                                       <div class="row justify-content-center">
                                        <div class="col-lg-12 p-0 m-0 swiperIgrac">
                                         <input type="hidden" class="swiper_ime" name="swiper_ime" value="<?php echo $ime ?> <?php echo $prezime ?>">
                                        <input type="hidden" class="swiper_broj" name="swiper_broj" value="<?php echo $broj ?>">    
                                        <input class="swiper_fotografija" type="hidden" name="swiper_fotografija" value="admin/images/igraci/<?php echo $fotografija ?>">
                                        <input class="swiper_nacionalnost" type="hidden" name="swiper_nacionalnost" value="<?php echo $nacionalnost ?>">
                                        <input class="swiper_visina" type="hidden" name="swiper_visina" value="<?php echo $visina ?> cm">
                                        <input class="swiper_pozicija" type="hidden" name="swiper_pozicija" value="<?php echo $pozicija ?>">
                                        <input class="swiper_datum" type="hidden" name="swiper_datum" value="<?php echo $newDate = date("d.m.Y", strtotime($datum_rodjenja)) ?>">    
                                         <img src="admin/images/igraci/<?php echo $fotografija ?>" class="img-responsive mx-auto d-block" height="100" width="100" style="object-fit:cover; object-position:top">
                                         </div>
                                         <div class="col-lg-12 p-0 m-0 text-center">     
                                             <span class="player_name text-center"><?php echo $ime ?></span><br>
                                             <span  class="player_name text-center"><?php echo $prezime ?></span>
                                         </div>
                                     </div>
                                  </div>
                                 </div>
                               <?php } ?>
                            </div>
                          <!-- Add Arrows -->
                          <div class="swiper-button-next"></div>
                          <div class="swiper-button-prev"></div>
                         </div> 
                        <!-- /swiper -->
                        
                    </div>   
                   </div>       
                </div>
            <!-- /team -->    
            </div>
            <!-- sidebar including -->
            <div class="col-lg-3 col-md-3 p-4">
                <?php include "includes/sidebar.php" ?>
            </div>
            <!-- /sidebar including -->
            <!-- tables and calendar -->
            <div class="calendar_holder col-lg-12 m-2">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 game_navigation mb-4">
                                 <div class="row">
                                     <?php  
                                          $stmtTables = mysqli_prepare($connection, "SELECT naziv FROM lige WHERE status='aktivan' LIMIT 2");
                                          $stmtTables->execute();
                                          testQuery($stmtTables);
                                          $stmtTables->bind_result($naziv);
                                    
                                          $i = 0; 
                                         
                                          while($stmtTables->fetch()){
                                                
                                     ?>
                                     <div class="col-lg-6 text-center px-4 <?php echo ($i === 0)?'game_navigation_next': '' ?>" >
                                         <span id="<?php echo ($i === 0)? 'prvi': '' ?>" class="game_navigation_dir <?php echo ($i === 0)?'game_navigation_dir_actual float-right': 'float-left' ?>" onclick="loadIndexTables('<?php echo $naziv ?>', $(this))"><?php echo strtoupper($naziv) ?></span>
                                     </div>
                                     <?php
                                         $i++;
                                          } 
                                     ?> 
                                           
                                  </div>       
                             </div>
                             <div class="col-lg-12">
                                <div class="row justify-content-center align-items-center"> 
                                <div class="col-lg-12 text-center mb-4" style="overflow:auto !important" id="indexTableContainer"> 
                                 
                                </div>
                                </div>    
                             </div>
                          </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="row justify-content-center">
                            <div class="col-lg-8 game_navigation mb-4">
                                 <div class="row">
                                     <div class="col-lg-12 text-center">
                                         <span class="game_navigation_dir game_navigation_dir_kalendar" style=""><?php echo $lang['kalendar'] ?></span>
                                     </div>
                                  </div>       
                             </div>
                             <div class="col-lg-12">
                                <div class="row justify-content-center align-items-center"> 
                                <div class="col-lg-12 text-center mb-4" style="overflow:auto !important" id="indexKalendarContainer"> 
                                 
                                </div>
                                </div>    
                             </div>
                          </div>
                        
                    </div>
                    <!-- /tables and calendar -->
                    <div class="col-lg-12 section_holder p-0 mx-2" style="margin-top:100px!important">
                   <div class="row justify-content-center">    
                    <div class="col-lg-6 col-12 text-center section_header">
                        <span><i class="fas fa-sign-language"></i>&ensp;<?php echo $lang['sponzori'] ?></span>
                    </div>
                    <div class="col-lg-12">
                        <?php
                            $rank5= [];
                            $rank3= [];
                            $rank1= [];
                        
                            $query = "SELECT * FROM sponzori WHERE aktivan='aktivan'";
                            $result = mysqli_query($connection, $query);
                            testQuery($result);
                            
                            while($row = mysqli_fetch_assoc($result)){
                                
                                if($row['ranking'] == 5){
                                     array_push($rank5, $row);
                                     
                                 }elseif($row['ranking'] == 3){
                                     array_push($rank3, $row);
                                 }else{
                                     array_push($rank1, $row);
                                 }
                            }
                        
                        ?>
                        <div class="row justify-content-center">
                         <?php for($i = 0; $i < sizeof($rank5); $i++){ ?>    
                            <div class="col-lg-6 text-center" style="margin-top:80px;margin-bottom:40px">
                                <a target="_blank" href="<?php echo $rank5[$i]['link'] ?>"><img class="img-responsive" alt="image" src="admin/images/sponzori/<?php echo $rank5[$i]['fotografija'] ?>" style="max-height: 100px"></a>
                            </div>
                            <?php } ?>
                            <div class="col-lg-10" style="margin-bottom: 40px;">
                               <div class="row justify-content-center">
                                  <?php for($i = 0; $i < sizeof($rank3); $i++){ ?>  <div class="col-lg-3 text-center" style="margin-bottom:30px">
                                       <a target="_blank" href="<?php echo $rank3[$i]['link'] ?>"><img class="img-responsive" alt="image" src="admin/images/sponzori/<?php echo $rank3[$i]['fotografija'] ?>" style="max-height: 50px"></a>
                                   </div>
                                  <?php } ?> 
                                   </div> 
                               </div>
                               <div class="col-lg-12 m-4">
                                    <div class="row justify-content-center">
                                     <?php for($i = 0; $i < sizeof($rank1); $i++){ ?>     
                                        <div class="col-sm-1 col-md-2 col-lg-1 text-center justify-content-center" style="position:relative; padding: 20px !important; margin-bottom: 40px">
                                            <a target="_blank" href="<?php echo $rank1[$i]['link'] ?>" ><img class="small_sponsors_images img-responsive" alt="image" src="admin/images/sponzori/<?php echo $rank1[$i]['fotografija'] ?>" style="max-width:70%; position:absolute; left:50%, top:50%; transform: translate(-50%, -50%)">
                                            </a>
                                        </div>
                                     <?php } ?>   
                                    </div>    
                               </div>
                        </div>
                    </div>   
                   </div> 
                </div>
            </div>
          
                  
                </div>
        </div>
    </div>
                              <!-- POPUP igrac -->

<div class="container">
    <div class="modal" id="igrac">
        <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center py-0">
                       <span class="close" data-dismiss="modal" aria-label="Close">&times;</span>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-4 text-center mb-4 pr-0">
                                    <img id="modal_fotografija" class="img-responsive" src="" alt="igrac" style="width:100%; height: 150px">
                                </div>
                                <div class="col-8 mb-4 player_info">
                                    <div class="col-lg-12 player_info_header pb-0" >
                                        <span id="modal_ime" class="float-left player_info_header_name">NIKOLA IVANOVIĆ</span><span id="modal_broj" class="float-right player_info_header_number">24</span>
                                    </div>
                                    <div class="col-lg-12 player_info_content mt-0">
                                        <span><?php echo $lang['pozicija'] ?>:&ensp;<b id="modal_pozicija">BEK</b></span>
                                    </div>
                                    <div class="col-lg-12 player_info_content">
                                        <span><?php echo $lang['datum'] ?>:&ensp;<b id="modal_datum">06.09.1991</b></span>
                                    </div>
                                    <div class="col-lg-12 player_info_content">
                                        <span><?php echo $lang['nacionalnost'] ?>:&ensp;<b id="modal_nacionalnost">MNE</b></span>
                                    </div>
                                    <div class="col-lg-12 player_info_content">
                                        <span><?php echo $lang['visina'] ?>:&ensp;<b id="modal_visina">193cm</b></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
<!-- / poup igrac -->  
</div>
    
<?php $pageName = basename(__FILE__); ?>
<!-- scripts including -->
<?php include "scripts.php"; ?>
<script>
    var screen = window.innerWidth;
    var slide = 0;
    if(screen >= 1006){
        slide = 4;
    }else{
         slide = 2;
    }
       
       
    var swiper = new Swiper('.swiper-container', {
      slidesPerView: slide,
      spaceBetween: 30,
      slidesPerGroup: 1,
      loop: true,
      loopFillGroupWithBlank: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },    
      
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
    
</script>    
<!-- footer including -->
<?php include "includes/footer.php"; ?>    
