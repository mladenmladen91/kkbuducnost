<?php

include "../includes/db.php";
    
include "../includes/functions.php";



?>
<div class="col-lg-12 mt-4 p-0 m-0">
                    <?php  
                            $query = "SELECT a.naziv FROM fotografije a JOIN album b ON a.album_id=b.id JOIN kategorija c ON b.kategorija_id=c.id WHERE c.naziv='klub'";
                            $result = mysqli_query($connection, $query);
                            testQuery($result);
                           
                            $count = mysqli_num_rows($result);
                           
                            if($count > 0){
                    ?>  
                     <ul class="col-lg-12 photo_league_gallery p-0 m-0 text-center" id="lightgallery">
                      <?php    
                            while($row = mysqli_fetch_assoc($result)){
                      ?>     
                         <li class="col-lg-3 text-center p-2 m-0 photo_league_gallery_picture" data-src="admin/images/fotografije/<?php echo $row['naziv'] ?>">
                            <img src="admin/images/fotografije/<?php echo $row['naziv'] ?>" class="img-responsive mt-0" style="width:100%;"> 
                          </li>
                       <?php } ?>   
                      </ul>
                    <?php }else{ ?>
                      <div class="col-lg-12 text-center" style="margin-top: 50px; color:gray; font-size: 22px; margin-bottom:50px" >NEMA FOTOGRAFIJA U OVOM ALBUMU</div>
                    <?php } ?>  
                  </div>


<script>
$(document).ready(function() {
    // activating plugin for picture gallery
    $("#lightgallery").lightGallery();

});

</script>
                                  