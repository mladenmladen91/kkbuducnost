<?php
session_start();

include "../../includes/db.php";
    
include "../../includes/functions.php";

// redirect if not login
    redirect();

                $id = $_POST['id'];

                $stmt = mysqli_prepare($connection, "SELECT fotografija, link FROM baneri WHERE id=?");
                 $stmt->bind_param('i', $id);
                 $stmt->execute();
                 testQuery($stmt);
                 $stmt->bind_result($fotografija, $link);
                 $stmt->fetch();
                 $stmt->close();
            ?>
            <div class="col-sm-8 col-12 add_news_container my-4">
                <div class="col-sm-12 col-12 my-4">
                    <span class="add_news_title">IZMIJENI BANER</span>
                </div>
                <form id="editBanerForm" class="add_news_form">
                    <input type="hidden" name="id" value="<?php echo $id; ?>"> 
                    <div class="col-md-12 mb-2">
                        <img src="images/baneri/<?php echo $fotografija; ?>" alt="slika" style="max-width: 100px;">
                    </div>
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="fotografija">Fotografija</label>
                        </div>
                        <input type="hidden" name="stara_fotografija" value="<?php echo $fotografija  ?>">
                        <input type="file" id="fotografija" name="fotografija" >
                    </div>
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="link">Link</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <input required type="text" name="link" id="link" class="add_news_form_text form-control form-control-lg" value="<?php echo $link  ?>" maxlength="90">
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-4 col-12 pl-0">
                            <button class="add_news_btn" type="submit"><i class="far fa-save"></i>&ensp;Sačuvaj Baner</button>
                        </div>


                    </div>   
                </form>
            </div>
 <script>
    $(document).ready(function(){
        $("#editBanerForm").submit(function(e){
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            
            saveBaner(formData, <?php echo $_POST['id'] ?>);
            
        });
        
        
        
    });
  </script>