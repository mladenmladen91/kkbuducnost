<?php
session_start();

include "../../includes/db.php";
    
include "../../includes/functions.php";

// redirect if not login
redirect();

                $id = $_POST['id'];
                
                $query = "SELECT naziv from album where id={$id}";
                $result = mysqli_query($connection, $query);
                $row = mysqli_fetch_assoc($result);
                
?>
            <div class="col-sm-10 col-12 add_news_container my-4">
                <div class="col-sm-12 col-12 my-4">
                    <span class="add_news_title"><?php echo $row['naziv'] ?></span>
                </div>
                
                <div class="col-lg-12 mt-4">
                     <ul class="col-lg-12 photo_league_gallery p-0 m-0 text-center" id="lightgallery">
                       <?php     
                         $stmtSezone = mysqli_prepare($connection, "SELECT id, naziv FROM fotografije WHERE album_id = ?");
                         $stmtSezone->bind_param('i', $id);
                         $stmtSezone->execute();
                         testQuery($stmtSezone);
                         $stmtSezone->bind_result($id, $naziv);
                                     
                         while($stmtSezone->fetch()){
                       ?>
                         <li class="col-lg-2 text-center p-2 m-0 photo_league_gallery_picture photoRow" data-src="images/fotografije/<?php echo $naziv ?>">
                            <img src="images/fotografije/<?php echo $naziv ?>" class="img-responsive my-2" style="width:100%;">
                            <input type="hidden" class="rowId" value="<?php echo $id ?>">
                            <span class="delete_btn my-2">IZBRIŠI</span>
                            <input type="hidden" class="photoName" value="<?php echo $naziv ?>"> 
                          </li>
                        <?php } ?>  
                      </ul>        
                  </div>
                 <div class="col-lg-4 text-center my-4">
                     <button class="add_news_btn" data-toggle="modal" data-target="#fotografija"><i class="fas fa-plus"></i>&ensp;DODAJ FOTOGRAFIJU</button>     
                 </div>  
                
            </div>
   <!-- popup za dodavanje slika -->
    <div class="modal fade" id="fotografija">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header popup_header">
                    <h4 class="modal-title new_tag_title">NOVA FOTOGRAFIJA</h4>
                    <button type="button" class="close close_new_tag" data-dismiss="modal">&times;</button>
                </div>
                <form id="modalAddPhotography">
                    <!-- Modal body -->
                    <div class="modal-body">
                        <input type="hidden" name="album_id" value="<?php echo $_POST['id'] ?>">
                        <input type="file" name="fotografija" required>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer justify-content-center">
                        <button class="add_news_btn save_tag" id="saveTag" style="width:30%; margin:auto; display:block"><i class="fas fa-plus"></i>&ensp;Dodaj fotografiju</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- /popup za dodavanje slike -->
 <script>
    $(document).ready(function(){
        // saving photo
        $("#modalAddPhotography").submit(function(e){
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            
            savePhoto(formData, <?php echo $_POST['id'] ?>);
            
        });
        
        $(".delete_btn").click(function(){
              deleteSection($(this));
        });
        
        // loading lightgallery
        $("#lightgallery").lightGallery();
        
    });
  </script>