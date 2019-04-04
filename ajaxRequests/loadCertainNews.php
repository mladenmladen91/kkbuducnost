<?php
session_start();

 include "../includes/db.php";

  if(!$connection){
  	die('error '.mysqli_error($connection));
  }
    



    $newsArray = []; 

    $category = $_POST['category'];
    $word = $_POST['word'];
 
if($_SESSION['lang'] === 'en'){
    $query = "SELECT a.id, a.naslov, a.naslov_en, a.tekst, a.datum, a.fotografija, b.naziv FROM vijesti a JOIN kategorija b ON a.kategorija_id = b.id WHERE aktivno='aktivan' AND b.naziv='{$category}' AND a.tekst_en LIKE '%{$word}%' ORDER BY datum DESC";
}else{
    $query = "SELECT a.id, a.naslov, a.naslov_en, a.tekst, a.datum, a.fotografija, b.naziv FROM vijesti a JOIN kategorija b ON a.kategorija_id = b.id WHERE aktivno='aktivan' AND b.naziv='{$category}' AND a.tekst LIKE '%{$word}%' ORDER BY datum DESC";
}
    $stmtKalendar = mysqli_query($connection, $query);
    if(!$stmtKalendar){
        die(mysqli_error($connection));
    }
    
    while($row = mysqli_fetch_assoc($stmtKalendar)){
        array_push($newsArray, $row);
    }
      
     if(sizeof($newsArray) > 0){
?>
                <div class="col-lg-12 my-4" style="margin: 50px 0 !important">
                    <div class="row">
                    <?php for($i = 0; $i < sizeof($newsArray); $i++){ ?>    
                       <div class="col-lg-4 col-md-6 col-sm-6 m-0" style="margin-bottom: 20px !important">
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
<?php }else{ ?>
         <div class="col-lg-12 my-4 text-center" style="margin: 50px 0 !important">
           <span style="font-size: 30px; color: gray">NEMA VIJESTI U OVOJ KATEGORIJI</span>
        </div>
<?php } ?>


