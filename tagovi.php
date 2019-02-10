<!-- header including -->
<?php include "includes/header.php" ?>

<title>Tagovi</title>

<?php
    $newsArray = []; 

if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
          header('location:javascript://history.go(-1)');
}

    $tagId = $_GET['id'];

   

    $query = "SELECT a.id, a.naslov, a.naslov_en, a.datum, a.fotografija FROM vijesti a JOIN tag_vijest b ON a.id = b.vijest_id WHERE aktivno='aktivan' AND b.tag_id={$tagId} ORDER BY datum DESC";
    $stmtKalendar = mysqli_query($connection, $query);
    $rows = mysqli_num_rows($stmtKalendar);
    
    if(!$stmtKalendar){
        die(mysqli_error($connection));
    }
    
    while($row = mysqli_fetch_assoc($stmtKalendar)){
        array_push($newsArray, $row);
    }

   //redirecting if id not found
if($rows <= 0){
    header("location: 404.php");
}
    
?>    

</head>
<body>
<div class="section" style="color:transparent; font-size:1px; padding:0; margin:0; height:0.5px">a</div>     
<!-- navigation including -->
<?php include "includes/nav.php"; ?>
    
<div class="section content_containter p-4">
    <div class="container">    
        <div class="row justify-content-center">
            <div class="col-lg-9">
              <div class="category_news_container">                
                  <?php
      
                  
     if(sizeof($newsArray) > 0){
?>
                <div class="col-lg-12 my-4" style="margin: 50px 0 !important">
                    <div class="row">
                    <?php for($i = 0; $i < sizeof($newsArray); $i++){ ?>    
                       <div class="col-lg-4 col-md-6 col-sm-6 m-0" style="margin-bottom: 20px !important">
                          <a href="clanak.php?id=<?php echo $newsArray[$i]['id'] ?>">    
                            <div class="col-lg-12 other_news_container p-0 mx-2">
                                 <div class="col-lg-12 other_news_container_image p-2">
                                     <img class="img-responsive" src="admin/images/vijesti/<?php echo $newsArray[$i]['fotografija'] ?>" alt="image">
                                 </div>
                                 <div class="col-lg-12 other_news_container_heading" style="height: 100px !important">
                                     <span><?php echo ($_SESSION['lang'] === 'en')? $newsArray[$i]['naslov_en'] :$newsArray[$i]['naslov'] ?></span>
                                 </div>
                                 <div class="col-lg-12 other_news_container_date">
                                     <span><i class="fas fa-calendar-alt"></i>&ensp;<?php echo $newDate = date("d.m.Y", strtotime($newsArray[$i]['datum'])) ?></span>
                                 </div>
                            </div>
                           </a>      
                        </div>
                      <?php } ?>  
                        
                    </div>
                </div>
<?php }else{ ?>
         <div class="col-lg-12 my-4 text-center" style="margin: 50px 0 !important">
           <span style="font-size: 30px; color: gray">NEMA VIJESTI U OVOJ KATEGORIJI</span>
        </div>
<?php } ?>
  
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
