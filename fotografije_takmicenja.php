<!-- header including -->
<?php include "includes/header.php" ?>

<title>Foto galerija</title>

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
            
            <div class="col-lg-12">
               <div class="row justify-content-center p-4">
                  <div class="col-lg-4 col-sm-8 text-center crew_heading">
                    <span style="font-size:17px; font-weight:300"><i class="fas fa-camera"></i>&ensp;<?php echo $lang['foto'] ?></span>
                  </div>
                  <div class="col-lg-10 game_navigation" style="margin-bottom:40px;">
                   <div class="row justify-content-center">
                    <?php 
                         $query = "SELECT * FROM sezone ORDER BY id ASC LIMIT 4";
                         $result = mysqli_query($connection, $query);
                          
                         $i=0;
                         while($row = mysqli_fetch_assoc($result)){
                    ?>   
                       <div class="game_navigation_container col-lg-3 col-sm-6 text-center p-0">
                           <span onclick="getCategories($(this).attr('id'), $(this))" class="game_navigation_league game_navigation_league_active <?php echo ($i=== 0)? 'prvi': '' ?>" id="<?php echo $row['id'] ?>" ><?php echo strtoupper($row['broj']) ?></span>
                       </div>
                    <?php 
                        $i++;     
                         } 
                    ?>             
                   </div>       
                </div>   
                  <div class="col-lg-12 mt-4 mx-2" id="albums_container">
                              
                  </div>
                </div>
            </div>    
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
