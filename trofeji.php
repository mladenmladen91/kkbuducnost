<!-- header including -->
<?php include "includes/header.php" ?>

<title>Trofeji</title>

<?php 
  $connection = mysqli_connect('localhost','root','','kkbuducnost');

  if(!$connection){
  	die('error '.mysqli_error($connection));
  }

?>

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
                <div class="col-lg-12 p-0 my-4">
                  <div class="col-lg-2 px-4"> 
                      <div class="league_category mx-4 my-4">
                        <span><?php echo $lang['title'] ?></span>
                      </div>
                  </div>    
                </div>
                <?php
                    $query = "SELECT * FROM trofeji";
                    $result = mysqli_query($connection, $query);
                    if(!$query){
                        die(mysqli_error($connection));
                    }
                
                    while($row = mysqli_fetch_assoc($result)){
                ?>
                <div class="col-lg-12 p-0 mt-4 trophey_container">
                    <div class="row justify-content-center">
                        <div class="col-xs-3 col-lg-4 text-center">
                            <img src="admin/images/trofeji/<?php echo $row['broj']; ?>" alt="trofej1" class="img-responsive trophey_container_image">
                        </div>
                        <div class="col-xs-3 col-lg-4">
                            <div class="row justify-content-center">
                                <div class="col-lg-10 trophey_container_title text-center">
                                    <span class="trophey_container_title_name float-left"><?php echo $row['naziv']; ?></span><br>
                                    <span class="trophey_container_title_season"><?php echo $lang['sezone'] ?></span><br>
                                    <span class="trophey_container_title_season"><?php echo $row['sezone']; ?></span><br>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-3 col-lg-4 text-center">
                            <img src="admin/images/trofeji/<?php echo $row['trofej']; ?>" alt="trofej1" class="img-responsive trophey_container_image">
                        </div>
                        
                    </div>
                </div>
               <?php } ?>    
            </div>
            </div>
          
                  
                </div>
        </div>

    
<?php $pageName = basename(__FILE__); ?>
<!-- scripts including -->
<?php include "scripts.php"; ?>
   
    
<!-- footer including -->
<?php include "includes/footer.php"; ?>

    
