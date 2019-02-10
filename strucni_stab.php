<!-- header including -->
<?php include "includes/header.php" ?>

<title>Stručni štab</title>

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
                <span><?php echo $lang['strucni_stab'] ?></span>
            </div>
            <input type="hidden" class="staff_table">
            <div class="col-lg-9 my-4">
                                  <div class="row justify-content-center">
                    <?php
           
                       $query = "SELECT * FROM strucni_stab";
                       $result = mysqli_query($connection, $query);
                       testQuery($result);
                       while($row = mysqli_fetch_assoc($result)){
                    ?>  
                       <div class="col-lg-4 col-md-6 m-0 mb-4">
                          <div class="col-lg-12 other_news_container p-0 mx-2" style="min-height: 325px;">
                                 <div class="col-lg-12 other_news_container_image p-2">
                                     <img class="img-responsive img-scale" src="admin/images/staff/<?php echo $row['fotografija'] ?>" style="max-width:100% !important;" alt="image">
                                 </div>
                                 <div class="col-lg-12 other_news_container_heading px-2" style="height:35px !important">
                                     <span><?php echo $row['ime'] ?>&ensp;<?php echo $row['prezime'] ?></span>
                                 </div>
                                 <div class="col-lg-12 other_news_container_position p-2" style="margin-bottom: 40px; height: 50px;">
                                     <span><?php echo $row['pozicija'] ?></span>
                                 </div>
                            </div>
                        </div>
                      <?php } ?>  
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

    
