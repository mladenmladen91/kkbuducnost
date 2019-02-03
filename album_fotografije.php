<!-- header including -->
<?php include "includes/header.php" ?>

<!-- light gallery including --> 
<link href="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/css/lightgallery.css" rel="stylesheet">

<title>Fotografije</title>

<?php

if(!isset($_GET['id'])){
       header('location:javascript://history.go(-1)');
}

$id = $_GET['id'];


    
?>

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
            
            <div class="col-lg-12">
               <div class="row justify-content-center p-4">
                  <div class="col-lg-4 col-sm-8 text-center crew_heading">
                    <span style="font-size:17px; font-weight:300"><i class="fas fa-camera"></i>&ensp;<?php echo $lang['foto'] ?></span>
                  </div>
                  <div class="col-lg-12 mt-4">
                    <?php  
                            $query = "SELECT naziv FROM fotografije WHERE album_id={$id}";
                            $result = mysqli_query($connection, $query);
                            testQuery($result);
                           
                            $count = mysqli_num_rows($result);
                           
                            if($count > 0){
                    ?>  
                     <ul class="col-lg-12 photo_league_gallery p-0 m-0 text-center" id="lightgallery">
                      <?php    
                            while($row = mysqli_fetch_assoc($result)){
                      ?>     
                         <li class="col-lg-2 text-center p-2 m-0 photo_league_gallery_picture" data-src="admin/images/fotografije/<?php echo $row['naziv'] ?>">
                            <img src="admin/images/fotografije/<?php echo $row['naziv'] ?>" class="img-responsive mt-0" style="width:100%;"> 
                          </li>
                       <?php } ?>   
                      </ul>
                    <?php }else{ ?>
                      <div class="col-lg-12 text-center" style="margin-top: 50px; color:gray; font-size: 22px; margin-bottom:50px" >NEMA FOTOGRAFIJA U OVOM ALBUMU</div>
                    <?php } ?>  
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
