<!-- header including -->
<?php include "includes/header.php" ?>

<title>Mlađe selekcije</title>

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
            <div class="col-lg-4 col-sm-8 text-center crew_heading">
                <span><?php echo $lang['selekcije'] ?></span>
            </div>
            <input type="hidden" class="staff_table" value="mladje_selekcije">
            <div class="col-lg-9 my-4 player_container">
                    
            </div>
        </div>
     </div>
</div>

    
<?php $pageName = basename(__FILE__); ?>
<!-- scripts including -->
<?php include "scripts.php"; ?>

    
    
<!-- footer including -->
<?php include "includes/footer.php"; ?>

    
