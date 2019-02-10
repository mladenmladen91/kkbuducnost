<!-- header including -->
<?php include "includes/header.php" ?>

<title>Rezultati</title>

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
                    <span><i class="fas fa-basketball-ball"></i>&ensp;<?php echo $lang['rezultati'] ?></span>
                </div>   
                <div class="col-lg-12 game_navigation" style="margin-bottom:40px;">
                   <div class="row justify-content-center">
                       <div class="game_navigation_container col-lg-3 col-md-6 col-sm-6 text-center p-0 mb-0 mx-0">
                           <span class="game_navigation_league game_navigation_league_active text-center" id="aba" onclick="getResults('aba', 1, $(this))">ABA LIGA</span>
                       </div>
                       <div class="game_navigation_container col-lg-3 col-md-6 col-sm-6 text-center p-0 mb-0 mx-0">
                           <span class="game_navigation_league text-center" id="euroleague" onclick="getResults('euroleague', 1, $(this))">EUROLEAGUE</span>
                       </div>
                       <div class="game_navigation_container col-lg-3 col-md-6 col-sm-6 text-center p-0 mb-0 mx-0">
                           <span class="game_navigation_league" id="eurocup" onclick="getResults('eurocup', 1, $(this))">EUROCUP</span>
                       </div>
                       <div class="game_navigation_container col-lg-3 col-md-6 col-sm-6 p-0 mb-0 text-center">
                           <span class="game_navigation_league m-0"  id="cg" onclick="getResults('cg', 1, $(this))">ERSTE PRVA LIGA</span>
                       </div>
                    </div>       
                </div>
                   <div class="col-lg-12" id="results_container">   
                 
                   </div>           
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
