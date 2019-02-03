<?php
session_start();

include "../../includes/db.php";
    
include "../../includes/functions.php";

                $id = $_POST['id'];

                $stmt = mysqli_prepare($connection, "SELECT link, naslov, datum FROM video WHERE id=?");
                 $stmt->bind_param('i', $id);
                 $stmt->execute();
                 testQuery($stmt);
                 $stmt->bind_result($link, $naslov, $datum);
                 $stmt->fetch();
                 $stmt->close();
            ?>
             <div class="col-sm-8 col-12 add_news_container my-4">
                <div class="col-sm-12 col-12 my-4">
                    <span class="add_news_title">IZMIJENI VIDEO</span>
                </div>
                <form id="editVideoForm" class="add_news_form">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                     <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="link">Link</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <textarea required type="text" name="link" id="link" class="add_news_form_text form-control form-control-lg"><?php echo $link ?></textarea>
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="naslov">Naslov</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <input required type="text" name="naslov" id="naslov" class="add_news_form_text form-control form-control-lg" value="<?php echo $naslov ?>">
                        </div>
                    </div>
                    
                     <div class="col-sm-12 col-12 form-group my-4">
                        <div class="row">
                            <div class="col-sm-12 col-12">
                                <label class="news_form_label">Datum</label> 
                            </div>   
                            <div class="col-sm-6 col-6">
                                <input type="date" name="datum" id="datum" class="add_news_form_text form-control form-control-lg" value="<?php echo $datum ?>">
                            </div>
                            <div class="col-sm-2 col-2 pl-0">
                                <label class="news_form_label" for="datum"><i style="font-size:35px" class="fas fa-calendar-alt"></i></label>
                            </div>
                        </div>       
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-4 col-12 pl-0">
                            <button class="add_news_btn" type="submit"><i class="far fa-save"></i>&ensp;Sačuvaj video</button>
                        </div>


                    </div>   
                </form>
            </div>
 <script>
    $(document).ready(function(){
        $("#editVideoForm").submit(function(e){
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            
            saveVideo(formData, <?php echo $_POST['id'] ?>);
            
        });
        
    
    });
  </script>