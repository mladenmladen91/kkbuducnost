<?php
session_start();

include "../includes/db.php";
    
include "../includes/functions.php";


    $newsArray = []; 

    $query = "SELECT a.id, a.naslov, a.naslov_en, a.tekst, a.datum, a.fotografija, b.naziv FROM vijesti a JOIN kategorija b ON a.kategorija_id = b.id WHERE aktivno='aktivan' ORDER BY datum DESC LIMIT 6 ";
    $stmtKalendar = mysqli_query($connection, $query);
    testQuery($stmtKalendar);
    
    while($row = mysqli_fetch_assoc($stmtKalendar)){
        array_push($newsArray, $row);
    }
  
?>

<!-- carousel --> 
<div class="col-lg-12 p-0 m-2">
                     
<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner" style="position:relative">
    <?php        
        for($i = 0; $i < 3; $i++){
    ?>
      <div class="carousel-item <?php echo ($i === 0)? 'active':'' ?>" >
      <a href="clanak.php?id=<?php echo $newsArray[$i]['id'] ?>">     
      <img src="admin/images/vijesti/<?php echo $newsArray[$i]['fotografija'] ?>" alt="Los Angeles" class="img-responsive"  title="<?php echo ($_SESSION['lang'] === 'en')? $newsArray[$i]['naslov_en'] :$newsArray[$i]['naslov'] ?>">
      <div class="carousel-caption col-xs-9" style="position:absolute; left:-17">
          <div class="col-lg-12 p-0">
              <a href="clanak.php?id=<?php echo $newsArray[$i]['id'] ?>" style=" display: table;"  title="<?php echo ($_SESSION['lang'] === 'en')? $newsArray[$i]['naslov_en'] :$newsArray[$i]['naslov'] ?>">
                  <span class="datum_slajd"><?php echo $newDate = date("d.m.Y", strtotime($newsArray[$i]['datum'])) ?></span>
              </a>
          </div>
              <a style="text-decoration: none;" href="clanak.php?id=<?php echo $newsArray[$i]['id'] ?>"  title="<?php echo ($_SESSION['lang'] === 'en')? $newsArray[$i]['naslov_en'] :$newsArray[$i]['naslov'] ?>">
                  <div class="col-lg-6 naslov_slajd">
                      <?php echo ($_SESSION['lang'] === 'en')? $newsArray[$i]['naslov_en'] :$newsArray[$i]['naslov'] ?>
                  </div>
              </a>
      </div>
      <div class="col-lg-12 p-0" style="position:absolute; top:10; left:-17">
              <a href="#" style=" display: table;">
                  <span class="datum_slajd"><b><?php echo strtoupper($newsArray[$i]['naziv']) ?></b></span>
              </a>
      </div>
          </a>      
    </div>
  <?php } ?>      
    
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
                <div class="col-lg-12 my-4" style="margin: 20px 0 !important">
                    <div class="row">
                    <?php for($i = 3; $i < sizeof($newsArray); $i++){ ?>    
                       <div class="col-lg-4 col-md-6 col-sm-6 m-0" style="margin-bottom: 10px !important">
                          <a href="clanak.php?id=<?php echo $newsArray[$i]['id'] ?>" title="<?php echo ($_SESSION['lang'] === 'en')? $newsArray[$i]['naslov_en'] :$newsArray[$i]['naslov'] ?>">    
                            <div class="col-lg-12 other_news_container other_news_container_hover p-0 mx-2">
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

