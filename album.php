<!-- header including -->
<?php include "includes/header.php" ?>

<title>Album</title>

<?php

if(!isset($_GET['kategorija_id']) || !isset($_GET['sezona_id']) || !is_numeric($_GET['kategorija_id']) || !is_numeric($_GET['sezona_id'])){
       header('location:javascript://history.go(-1)');
}

$kategorija_id = $_GET['kategorija_id'];
$sezona_id = $_GET['sezona_id'];
    
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
               <div class="row justify-content-center p-4">
                  <div class="col-lg-4 col-sm-8 text-center crew_heading">
                    <span style="font-size:17px; font-weight:300"><i class="fas fa-camera"></i>&ensp;<?php echo $lang['foto'] ?></span>
                  </div>
                  <div class="col-lg-12 mt-4 mx-2">
                      <div class="row">
                        <?php
                           $query = "SELECT * FROM album WHERE aktivan='aktivan' AND sezona_id={$sezona_id} AND kategorija_id={$kategorija_id}";
                           $result = mysqli_query($connection, $query);
                           testQuery($result);
                           
                           $count = mysqli_num_rows($result);
                         
                          
                          if($count > 0){
                          
                             while($row = mysqli_fetch_assoc($result)){
                          
                        ?>  
                          <div class="col-lg-3 col-sm-6 p-0" style="margin-bottom: 30px;">
                              <a href="album_fotografije.php?id=<?php echo $row['id'] ?>">
                                <div class="col-lg-12 photo_league p-2">
                                  <div class="col-lg-12 p-0">
                                      <div class="col-lg-12" style="height:220px;
           background: url(images/shadow.png) center no-repeat, url(admin/images/albumi/<?php echo $row['fotografija'] ?>) center no-repeat;
           background-size: 100%,cover, cover;"></div>
                                  </div>
                                  <div class="col-lg-12">
                                   <div class="row justify-content-center">
                                     <div class="col-lg-12 my-2 photo_league_title py-4">
                                      <div class="row justify-content-center p-0">
                                          <div class="col-lg-9 col-sm-9 p-0">
                                             <div class="col-lg-12 float-left mb-4 ">
                                                <span class="photo_league_title_span"><?php echo $row['naziv'] ?></span>
                                             </div>
                                             <div class="col-lg-12">
                                                 <span class="photo_league_title_date py-4"><?php echo $newDate = date("d.m.Y", strtotime($row['datum'])) ?></span>
                                              </div>    
                                          </div>
                                          <div class="col-lg-3 col-sm-3 mb-4" style="position:relative">
                                              <img class="img-responsive" src="images/basketball.svg" style="max-height: 30px; position:absolute; top:50%; left:50%; transform:translate(-50%, -50%)">
                                          </div>
                                      </div>  
                                    </div>
                                    <div class="col-lg-10 photo_league_title_border"></div>   
                                    </div>       
                                 </div>       
                                </div>
                              </a>      
                          </div>
                       <?php
                          }
                          }else{
                       ?>
                          <div class="col-lg-12 text-center" style="margin-top: 50px; color:gray; font-size: 22px;margin-bottom:50px" >NEMA ALBUMA U OVOJ KATEGORIJI</div>
                      <?php } ?>
                      </div>        
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
