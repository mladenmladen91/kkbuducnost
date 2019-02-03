<?php
session_start();

include "../includes/db.php";
    
include "../includes/functions.php";




    $section = $_POST['section'];

    $stmt = mysqli_prepare($connection, "SELECT a.id, a.naziv FROM kategorija a JOIN sezona_kategorija b ON a.id = b.kategorija_id  WHERE b.sezona_id = ? ");
    $stmt->bind_param('i', $section);
    $stmt->execute();
    testQuery($stmt);
    $stmt->bind_result($kategorijaId, $kategorijaNaziv);
     
  
?>

<div class="row justify-content-center">
                    <?php
                        while($stmt->fetch()){
                    ?>
                          <div class="col-lg-3 col-sm-6 p-0" style="margin-bottom: 30px">
                              <a href="album.php?sezona_id=<?php echo $section ?>&kategorija_id=<?php echo $kategorijaId ?>">
                                <div class="col-lg-12 photo_league p-2">
                                  <div class="col-lg-12 photo_league_container_<?php echo ($kategorijaNaziv === 'prva liga')? 'prva':$kategorijaNaziv ?>">
                                  </div>
                                  <div class="col-lg-12">
                                   <div class="row justify-content-center">
                                     <div class="col-lg-12 my-2 photo_league_title py-4">
                                      <div class="row justify-content-center" style="height: 55px !important">
                                          <div class="col-lg-6 text-center">
                                              <span class="photo_league_title_span"><?php echo strtoupper($kategorijaNaziv) ?></span>
                                          </div>
                                          <div class="col-lg-6">
                                              <img class="img-responsive" src="images/basketball.svg" style="max-height: 30px">
                                          </div>
                                      </div>  
                                    </div>
                                    <div class="col-lg-10 photo_league_title_border"></div>   
                                    </div>       
                                 </div>       
                                </div>
                              </a>      
                          </div>
                     <?php } ?>
</div>
