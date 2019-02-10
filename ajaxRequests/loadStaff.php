<?php

include "../includes/db.php";
    
include "../includes/functions.php";

$category = $_POST['category'];

       switch($category){
           case "menadzment":
               $query = "SELECT * FROM menadzment";
               break;
           case "mladje_selekcije":
               $query = "SELECT * FROM mladje_selekcije";
               break;
           case "osoblje":
               $query = "SELECT * FROM osoblje";
               break;
          case "upravni_odbor":
               $query = "SELECT * FROM upravni_odbor";
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
                          <div class="col-lg-12 other_news_container p-0 mx-2" style="min-height: 325px;">
                                 <div class="col-lg-12 other_news_container_image p-0 other_news_container_image_staff" style="overflow:hidden !important;">
                                     <img class="img-scale" src="admin/images/staff/<?php echo $row['fotografija'] ?>" style="width:100% !important;" alt="image">
                                 </div>
                                 <div class="col-lg-12 other_news_container_heading px-2" style="height:35px !important">
                                     <span><?php echo $row['ime'] ?>&ensp;<?php echo $row['prezime'] ?></span>
                                 </div>
                                 <div class="col-lg-12 other_news_container_position p-2" style="margin-bottom: 40px; height: 50px;">
                                     <span><?php echo $row['pozicija'] ?></span>
                                 </div>
                            </div>
                        </div>
                      <?php } ?>  
                    </div>           