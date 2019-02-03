<!-- header including -->
<?php include "includes/header.php" ?>

<title>Istorijat</title>

</head>
<body>
    
<!-- navigation including -->
<?php include "includes/nav.php"; ?>
    
<?php
  
   $stranica = str_replace('.php','',basename(__FILE__));
  
   include "config.php";
?>    
    
<div class="section content_containter p-4">
    <div class="container">    
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="col-lg-12 p-0 my-4">
                  <div class="col-lg-2 px-4"> 
                      <div class="league_category mx-4 my-4">
                        <span><?php echo $lang['title'] ?></span>
                      </div>
                      </div>    
                </div>
                <div class="col-lg-12 px-2 mt-4 px-4">
                    <div class="col-lg-12">
                         <img class="img-responsive" src="images/istorijat.jpg" style="width:100%; max-height: 400px">
                    </div>
                    <div class="col-lg-12" class="article" style="margin:40px 0;">
                       <div class="col-lg-12">
                        <div class="row justify-content-center">   
                        <div class="col-lg-10 p-0 history_container" style="margin-bottom: 40px;">
                            <p class="history_container_italic"><?php echo $lang['p1'] ?></p>
                            
                            <p class="history_container_normal"><?php echo $lang['p2'] ?></p>
                            
                            <p class="history_container_normal"><?php echo $lang['p3'] ?></p>
                            
                            <p class="history_container_normal"><?php echo $lang['p4'] ?></p>
                            
                            <p class="history_container_normal"><?php echo $lang['p5'] ?></p>
                            
                            <p class="history_container_normal"><?php echo $lang['p6'] ?></p>
                            
                            <p class="history_container_normal"><?php echo $lang['p7'] ?></p>
                            
                            <p class="history_container_normal"><?php echo $lang['p8'] ?></p>
                            
                            <p class="history_container_normal"><?php echo $lang['p9'] ?></p>
                            
                            <p class="history_container_normal"><?php echo $lang['p10'] ?></p>
                            
                            <p class="history_container_normal"><?php echo $lang['p11'] ?>.</p>
                            
                            <p class="history_container_normal"><?php echo $lang['p12'] ?></p>
                            
                            <p class="history_container_normal"><?php echo $lang['p13'] ?></p>
                            
                            <p class="history_container_normal"><?php echo $lang['p14'] ?></p>
                            
                            <p class="history_container_normal"><?php echo $lang['p15'] ?></p>
                            
                            <p class="history_container_normal"><?php echo $lang['p16'] ?></p>
                            
                            <p class="history_container_normal"><?php echo $lang['p17'] ?></p>
                            
                            <p class="history_container_normal"><?php echo $lang['p18'] ?>.</p>
                            
                            <p class="history_container_normal"><?php echo $lang['p19'] ?></p>
                            
                            <p class="history_container_normal"><?php echo $lang['p20'] ?></p>
                            
                            <p class="history_container_normal"><?php echo $lang['p21'] ?></p>
                            
                            <p class="history_container_normal"><?php echo $lang['p22'] ?></p>
                            
                            <p class="history_container_normal"><?php echo $lang['p23'] ?></p>
                            
                            <p class="history_container_normal"><?php echo $lang['p24'] ?></p>
                            
                        </div>
                       </div>    
                      </div> 
                    </div>
                </div>
               
            </div>
            <!-- sidebar including -->
            <div class="col-lg-3 p-4">
                <?php include "includes/sidebar.php" ?>
            </div>
            <!-- /sidebar including -->
 
            </div>
          
                  
                </div>
        </div>

    
<?php $pageName = basename(__FILE__); ?>
<!-- scripts including -->
<?php include "scripts.php"; ?>
   
    
<!-- footer including -->
<?php include "includes/footer.php"; ?>

    
