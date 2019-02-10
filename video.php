<!-- header including -->
<?php include "includes/header.php" ?>

<title>Video galerija</title>

</head>
<body>
<div class="section" style="color:transparent; font-size:1px; padding:0; margin:0; height:0.5px">a</div>    
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
               <div class="row justify-content-center p-4">
                <div class="col-lg-4 col-sm-8 text-center crew_heading">
                    <span style="font-size:17px; font-weight:300"><i class="fas fa-play"></i>&ensp;<?php echo $lang['video'] ?></span>
                </div>
                <?php
                     $array = [];
                     $query = "SELECT * FROM video ORDER BY datum DESC LIMIT 6";
                     $result = mysqli_query($connection, $query);
                     testQuery($result);
                     
                     while($row = mysqli_fetch_assoc($result)){
                           array_push($array, $row);
                     }
                    
                    
                    
                     if(sizeof($array) > 0){
                 ?>    
                <div class="col-lg-12 mt-4 p-0">
                    
                   <div class="row justify-content-center p-0">
                         
                    <div class="col-lg-12 text-center p-4">
                        <iframe height="500" width="100%" <?php echo $array[0]['link'] ?>></iframe>
                    </div>
                    <div class="col-lg-12 article text-center" style="margin:10px 0;">
                        <span class="article_title"><?php echo $array[0]['naslov'] ?></span><br>
                        <div class="col-lg-12 p-0 mt-4" style="margin-bottom: 50px;">
                           <span class="article_video_title mt-4"><i class="fas fa-calendar-alt"></i>&ensp;<?php echo $newDate = date("d.m.Y", strtotime($array[0]['datum'])); ?></span>
                        </div>
                    </div>
                    </div>       
                </div>
                   
                <div class="col-lg-12 my-4">
                    <div class="row">
                      <div class="col-lg-12 mb-4">
                       <div class="row justify-content-center">
                      <?php
                         if(sizeof($array) > 1){
                         for($i = 1; $i < 3; $i++){ ?>       
                        <div class="col-lg-6 m-0">
                          <div class="col-lg-12 other_news_container p-0">
                                 <div class="col-lg-12 other_news_container_image p-2" style="height: 250px !important">
                                   <iframe width="100%" height="100%" <?php echo $array[$i]['link'] ?> ></iframe>
                                 </div>
                                 <div class="col-lg-12 other_news_container_heading">
                                     <span><?php echo $array[$i]['naslov'] ?></span>
                                 </div>
                                 <div class="col-lg-12 other_news_container_date">
                                     <span><i class="fas fa-calendar-alt"></i>&ensp;<?php echo $newDate = date("d.m.Y", strtotime($array[$i]['datum'])) ?></span>
                                 </div>
                            </div>
                         </div>
                       <?php } } ?>   
                          
                        </div>   
                       </div>
                        <?php 
                             if(sizeof($array) > 1){
                              for($i = 3; $i < sizeof($array); $i++){ ?> 
                        <div class="col-lg-4 col-md-6 m-0 mb-4">
                          <div class="col-lg-12 other_news_container p-0">
                                 <div class="col-lg-12 other_news_container_image p-2" style="overflow:hidden !important; height:200px!important">
                                  <iframe height="100%" width="100%" <?php echo $array[$i]['link'] ?>  ></iframe>
                                 </div>
                                 <div class="col-lg-12 other_news_container_heading">
                                     <span><?php echo $array[$i]['naslov'] ?></span>
                                 </div>
                                 <div class="col-lg-12 other_news_container_date">
                                     <span><i class="fas fa-calendar-alt"></i>&ensp;<?php echo $newDate = date("d.m.Y", strtotime($array[$i]['datum'])) ?></span>
                                 </div>
                            </div>
                        </div>
                      <?php } } ?>  
                        
                    </div>
                </div>
                <?php }else{ ?>
                   <div class="col-lg-12 text-center" style="margin-top: 50px; color:gray; font-size: 22px;margin-bottom:50px" >NEMA VIDEO MATERIJALA</div>
                <?php } ?>   
             </div>
            </div>    
            <!-- sidebar including -->
            <div class="col-lg-3 col-md-3 p-4">
                <?php include "includes/sidebar.php" ?>
            </div>
            <!-- /sidebar including -->
       
            </div>
          </div>
        </div>
    </div>
  
</div>
    
<?php $pageName = basename(__FILE__); ?>
<!-- scripts including -->
<?php include "scripts.php"; ?>
   
<!-- footer including -->
<?php include "includes/footer.php"; ?>    
