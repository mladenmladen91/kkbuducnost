<?php

include "../includes/db.php";
    
include "../includes/functions.php";

$category = $_POST['category'];

       switch($category){
           case "juniori":
               $query = "SELECT * FROM juniori";
               break;
           case "kadeti":
               $query = "SELECT * FROM kadeti";
               break;
           case "pioniri":
               $query = "SELECT * FROM pioniri";
               break;   
       }
  
       $result = mysqli_query($connection, $query);
       testQuery($result);


?>
                  <div class="row justify-content-center">
                    <?php
                        while($row = mysqli_fetch_assoc($result)){
                    ?>  
                       <div class="col-lg-4 col-md-4 col-sm-6 m-0 mb-4">
                          <div class="col-lg-12 other_news_container p-0 mx-0" >
                                 <div class="col-lg-12 other_news_container_image p-2  other_news_container_image_staff" style="position:relative; overflow:hidden !important;" >
                                     <img class="img-scale" src="admin/images/igraci/<?php echo $row['fotografija'] ?>"  style="width:100% !important;" alt="image">
                                 </div>
                                 <div class="col-lg-12 other_news_container_heading p-2">
                                     <span><?php echo $row['ime'] ?>&ensp;<?php echo $row['prezime'] ?></span>
                                 </div>
                                 <div class="col-lg-12 other_news_container_date p-2" style="margin-bottom: 40px;position:relative;">
                                     <span class="other_news_container_number p-0"><?php echo $row['broj'] ?></span>
                                 </div>
                            </div>
                         </div>
                      <?php } ?>  
                    </div>            