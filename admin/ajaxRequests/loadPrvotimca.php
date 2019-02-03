<?php
session_start();

include "../../includes/db.php";
    
include "../../includes/functions.php";

                $id = $_POST['id'];

                $stmt = mysqli_prepare($connection, "SELECT ime, prezime, nacionalnost, visina, fotografija, karijera, pozicija, broj, datum_rodjenja FROM prvi_tim WHERE id=?");
                 $stmt->bind_param('i', $id);
                 $stmt->execute();
                 testQuery($stmt);
                 $stmt->bind_result($ime, $prezime, $nacionalnost, $visina, $fotografija, $karijera, $pozicija, $broj, $datum_rodjenja);
                 $stmt->fetch();
            ?>
            <div class="col-sm-8 col-12 add_news_container my-4">
                <div class="col-sm-12 col-12 my-4">
                    <span class="add_news_title">IZMIJENI IGRAČA</span>
                </div>
                
                
                <form id="editPLayerForm" class="add_news_form">
                    <div class="col-md-12 mb-2">
                       <input type="hidden" name="id" value="<?php echo $id; ?>"> 
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
                            <input required type="number" name="broj" id="prezime" class="add_news_form_text form-control form-control-lg" value="<?php echo $broj ?>">
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="nacionalnost">Nacionalnost</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <input required type="text" name="nacionalnost" id="nacionalnost" class="add_news_form_text form-control form-control-lg" value="<?php echo $nacionalnost ?>">
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="pozicija">Pozicija</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <input required type="text" name="pozicija" id="pozicija" class="add_news_form_text form-control form-control-lg" value="<?php echo $pozicija ?>">
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="visina">Visina (cm)</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <input required type="number" name="visina" id="visina" class="add_news_form_text form-control form-control-lg" value="<?php echo $visina ?>">
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="text1">Karijera</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <textarea name="karijera" id="text1" class="add_news_form_textarea" ><?php echo $karijera ?></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="row">
                            <div class="col-sm-12 col-12">
                                <label class="news_form_label">Datum rođenja</label> 
                            </div>   
                            <div class="col-sm-6 col-6">
                                <input type="date" name="datum_rodjenja" id="datum" class="add_news_form_text form-control form-control-lg" value="<?php echo $datum_rodjenja ?>">
                            </div>
                            <div class="col-sm-2 col-2 pl-0">
                                <label class="news_form_label" for="datum"><i style="font-size:35px" class="fas fa-calendar-alt"></i></label>
                            </div>
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
        $("#editPLayerForm").submit(function(e){
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            
            savePlayer(formData, <?php echo $id ?>);
            
        });
    });
  </script>