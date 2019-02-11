<?php

include "../includes/db.php";
    
include "../includes/functions.php";

          $query = "SELECT * FROM mediji ORDER BY datum DESC";
          $result = mysqli_query($connection, $query);

          $count = mysqli_num_rows($result);

          if($count > 0){
               while($row = mysqli_fetch_assoc($result)){
?>
                    <div class="col-lg-12 media_container mb-2 table_show">
                             <div class="row">
                                 <div class="col-lg-9 p-4">
                                     <a target="_blank" href="admin/izjave/<?php echo $row['izjava'] ?>" title="<?php echo $row['naslov'] ?>"><span class="media_container_span"><img src="images/pdf.svg" class="img-responsive" style="width:20px"><span class="media_container_span_title"><?php echo $row['naslov'] ?></span></span></a>
                                 </div>
                                 <div class="col-lg-3 p-4 text-center">
                                     <span class="media_container_span_date"><i class="fas fa-calendar-alt"></i>&ensp;<?php echo $newDate = date("d.m.Y", strtotime($row['datum'])) ?></span>
                                 </div>
                             </div>
                         </div>
           <?php
                }
               }else{ 
           ?>
              <div class="col-lg-12 text-center" style="margin-top: 50px; color:gray; font-size: 22px;margin-bottom:50px" >NEMA IZJAVA</div>
            <?php } ?>