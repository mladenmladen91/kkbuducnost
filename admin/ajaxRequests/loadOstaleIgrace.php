<?php
session_start();

include "../../includes/db.php";
    
include "../../includes/functions.php";

// redirect if not login
    redirect();

                $id = $_POST['id'];
                $table = $_POST['table'];
                 

                 switch($table){
                     case "juniori":
                        $stmt = mysqli_prepare($connection, "SELECT ime, prezime, 
                fotografija, broj FROM juniori WHERE id=?");
                         break;
                         
                    case "pioniri":
                        $stmt = mysqli_prepare($connection, "SELECT ime, prezime, 
                fotografija, broj FROM pioniri WHERE id=?");
                         break;
                    case "kadeti":
                        $stmt = mysqli_prepare($connection, "SELECT ime, prezime, 
                fotografija, broj FROM kadeti WHERE id=?");
                         break;     
               }

                $stmt->bind_param('i', $id);
                 $stmt->execute();
                 testQuery($stmt);
                 $stmt->bind_result($ime, $prezime, $fotografija, $broj);
                 $stmt->fetch();
            ?>
            <div class="col-sm-8 col-12 add_news_container my-4">
                <div class="col-sm-12 col-12 my-4">
                    <span class="add_news_title">IZMIJENI IGRAČA</span>
                </div>
                <form  class="add_news_form">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <div class="col-md-12 mb-2">
                        
                        <img src="images/igraci/<?php echo $fotografija ?>" alt="slika" style="max-width: 100px;">
                    </div>
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="image">Fotografija</label>
                        </div>
                        <input type="hidden" name="stara_fotografija" value="<?php echo $fotografija ?>">
                        <input type="file" name="fotografija" id="image">
                    </div>
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="ime">Ime</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <input required type="text" name="ime" id="ime" class="add_news_form_text form-control form-control-lg" value="<?php echo $ime ?>">
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="prezime">Prezime</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <input required type="text" name="prezime" id="prezime" class="add_news_form_text form-control form-control-lg" value="<?php echo $prezime ?>">
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="broj">Broj</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <input required type="number" name="broj" id="prezime" class="add_news_form_text form-control form-control-lg" value="<?php echo $broj ?>" min="1" max="99">
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-4 col-12 pl-0">
                            <button class="add_news_btn" type="submit"><i class="far fa-save"></i>&ensp;Sačuvaj izmjene</button>
                        </div>


                    </div>   
                </form>
            </div>
 <script>
    $(document).ready(function(){
        $("form").submit(function(e){
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            
            savePlayer(formData, <?php echo $id ?>, '<?php echo $table ?>');
            
        });
    });
  </script>