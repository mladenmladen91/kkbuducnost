<?php
session_start();

include "../../includes/db.php";
    
include "../../includes/functions.php";

                $id = $_POST['id'];

                $stmt = mysqli_prepare($connection, "SELECT naziv, broj, sezone, trofej FROM trofeji WHERE id=?");
                 $stmt->bind_param('i', $id);
                 $stmt->execute();
                 testQuery($stmt);
                 $stmt->bind_result($naziv, $broj, $sezone, $trofej);
                 $stmt->fetch();
                 $stmt->close();
            ?>
            <div class="col-sm-8 col-12 add_news_container my-4">
                <div class="col-sm-12 col-12 my-4">
                    <span class="add_news_title">IZMIJENI TROFEJ</span>
                </div>
                <form id="editTrophyForm" class="add_news_form">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="col-md-12 mb-2">
                        <img src="images/trofeji/<?php echo $broj ?>" alt="slika" style="max-width: 100px;">
                    </div>
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" >Broj trofeja</label>
                        </div>
                        <input type="hidden" value="<?php echo $broj ?>" name="stari_broj">
                        <input type="file" name="broj" >
                    </div>
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="naziv">Naziv</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <input required type="text" name="naziv" id="naziv" class="add_news_form_text form-control form-control-lg" value="<?php echo $naziv ?>">
                        </div>
                    </div>
                    
                    <div class="col-md-12 mb-2">
                        <img src="images/trofeji/<?php echo $trofej ?>" alt="slika" style="max-width: 100px;">
                    </div>
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" >Fotografija trofeja</label>
                        </div>
                        <input type="hidden" value="<?php echo $trofej ?>" name="stari_trofej">
                        <input type="file" name="trofej" >
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="sezone">Sezone</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <textarea required type="text" name="sezone" id="sezone" class="add_news_form_textarea form-control form-control-lg"><?php echo $sezone ?></textarea>
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-4 col-12 pl-0">
                            <button class="add_news_btn" type="submit"><i class="far fa-save"></i>&ensp;Sačuvaj trofej</button>
                        </div>


                    </div>   
                </form>
            </div>
 <script>
    $(document).ready(function(){
        $("#editTrophyForm").submit(function(e){
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            
            saveTrophy(formData, <?php echo $_POST['id'] ?>);
            
        });
        
        
        
    });
  </script>