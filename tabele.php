<!-- header including -->
<?php include "includes/header.php" ?>

<title>Tabele</title>

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
            
            <div class="col-lg-9 col-md-9">
               <div class="row justify-content-center p-4">
                <div class="col-lg-4 col-sm-8 text-center crew_heading" style="font-weight:400 !important">
                    <span><i class="fas fa-table"></i>&ensp;<?php echo $lang['tabele'] ?></span>
                </div>
             <div id="table_container" class="col-lg-12">       
             
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
