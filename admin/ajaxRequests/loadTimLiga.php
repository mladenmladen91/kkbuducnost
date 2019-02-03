<?php
session_start();

include "../../includes/db.php";
    
include "../../includes/functions.php";

                $id = $_POST['id'];
                $table = $_POST['table'];
                 


                 switch($table){
                     case "aba":
                        $stmt = mysqli_prepare($connection, "SELECT b.naziv, b.logo, a.broj_utakmica, a.dobijene, a.izgubljene, a.krajnja_razlika, a.bodovi FROM aba a JOIN timovi b on a.klub_id = b.id  WHERE a.id=?");
                         break;
                         
                    case "euroleague":
                        $stmt = mysqli_prepare($connection, "SELECT b.naziv, b.logo, a.broj_utakmica, a.dobijene, a.izgubljene, a.krajnja_razlika, a.bodovi FROM euroleague a JOIN timovi b on a.klub_id = b.id  WHERE a.id=?");
                         break;
                         
                    case "eurocup":
                        $stmt = mysqli_prepare($connection, "SELECT b.naziv, b.logo, a.broj_utakmica, a.dobijene, a.izgubljene, a.krajnja_razlika, a.bodovi FROM eurocup a JOIN timovi b on a.klub_id = b.id  WHERE a.id=?");
                         break;
                    case "cg":
                        $stmt = mysqli_prepare($connection, "SELECT b.naziv, b.logo, a.broj_utakmica, a.dobijene, a.izgubljene, a.krajnja_razlika, a.bodovi FROM cg a JOIN timovi b on a.klub_id = b.id  WHERE a.id=?");
                         break;
                         
               }

                 $stmt->bind_param('i', $id);
                 $stmt->execute();
                 testQuery($stmt);
                 $stmt->bind_result($naziv, $logo, $broj_utakmica, $dobijene, $izgubljene, $krajnja_razlika, $bodovi);
                 $stmt->fetch();
            ?>
            <div class="col-sm-8 col-12 add_news_container my-4">
                <div class="col-sm-12 col-12 my-4">
                    <span class="add_news_title">IZMIJENI TIM </span>
                </div>
                <form  class="add_news_form">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="col-md-12 mb-2">
                        
                        <img src="images/timovi/<?php echo $logo ?>" alt="slika" style="max-width: 100px;">
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="broj_utakmica">Broj utakmica</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <input required type="number" name="broj_utakmica" id="broj_utakmica" class="add_news_form_text form-control form-control-lg" value="<?php echo $broj_utakmica ?>">
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="dobijene">Dobijene utakmice</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <input required type="number" name="dobijene" id="dobijene" class="add_news_form_text form-control form-control-lg" value="<?php echo $dobijene ?>">
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="izgubljene">Izgubljene utakmice</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <input required type="number" name="izgubljene" id="izgubljene" class="add_news_form_text form-control form-control-lg" value="<?php echo $izgubljene ?>">
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="krajnja_razlika">Krajnja razlika</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <input required type="number" name="krajnja_razlika" id="krajnja_razlika" class="add_news_form_text form-control form-control-lg" value="<?php echo $krajnja_razlika ?>">
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