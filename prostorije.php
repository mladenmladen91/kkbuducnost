<!-- header including -->
<?php include "includes/header.php" ?>

<title>Prostorije</title>

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
                                    
<!-- carousel -->                
                <div class="col-lg-12 p-0 m-4">
                     
<div id="demo" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner" style="position:relative">
    <div class="carousel-item active">
      <img src="images/kancelarija.jpg" alt="Los Angeles" width="1100" height="500">
     </div>
    <div class="carousel-item">
      <img src="images/teretana.jpg" alt="Chicago" width="1100" height="500">
    </div>
    <div class="carousel-item">
      <img src="images/dvorana.jpg" alt="New York" width="1100" height="500">
    </div>
    <div class="carousel-item">
      <img src="images/dvoriste.jpg" alt="New York" width="1100" height="500">
    </div>
    <div class="carousel-item">
      <img src="images/kafe.jpg" alt="New York" width="1100" height="500">
    </div>
    <div class="carousel-item">
      <img src="images/trofeji.jpg" alt="New York" width="1100" height="500">
    </div>
    <div class="carousel-item">
      <img src="images/teren.jpg" alt="New York" width="1100" height="500">
    </div>
    <div class="carousel-item">
      <img src="images/dvorana2.jpg" alt="New York" width="1100" height="500">
    </div>
    <div class="carousel-item">
      <img src="images/zgrada.jpg" alt="New York" width="1100" height="500">
    </div>
    <div class="carousel-item">
      <img src="images/ulaz.jpg" alt="New York" width="1100" height="500">
    </div>
    <div class="carousel-item">
      <img src="images/igra.jpg" alt="New York" width="1100" height="500">
    </div>  
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
                </div>
<!-- /caroussel -->
                    <div class="col-lg-12" class="article" style="margin:40px 0;">
                       <div class="col-lg-12">
                        <div class="row justify-content-center">   
                        <div class="col-lg-10 p-0 history_container" style="margin-bottom: 40px;">
                            <span class="history_container_title"><?php echo $lang['h1'] ?></span>
                            <p class="history_container_normal"><?php echo $lang['p1'] ?></p>
                            
                            <p class="history_container_normal"><?php echo $lang['p2'] ?></p>
                            
                            <span class="history_container_title"><?php echo $lang['h2'] ?></span>
                            <p class="history_container_normal"><?php echo $lang['p3'] ?></p>
                            
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

    
