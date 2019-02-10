<?php
session_start();

include "../../includes/db.php";
    
include "../../includes/functions.php";

// redirect if not login
    redirect();

                $id = $_POST['id'];

                $stmtSezone = mysqli_prepare($connection, "SELECT id, naziv, logo, dvorana FROM timovi WHERE id=?");
                $stmtSezone->bind_param('i', $id);
                $stmtSezone->execute();
                testQuery($stmtSezone);
                $stmtSezone->bind_result($id, $naziv, $logo, $dvorana);
                $stmtSezone->fetch();
                $stmtSezone->close();
            ?>
             <div class="col-sm-8 col-12 add_news_container my-4">
                <div class="col-sm-12 col-12 my-4">
                    <span class="add_news_title">IZMIJENI TIM</span>
                </div>
                <form id="editTimForm"  class="add_news_form">
                    <input type="hidden" name="id" value="<?php echo $id; ?>"> 
                    <div class="col-md-12 mb-2">
                        <img src="images/timovi/<?php echo $logo ?>" alt="slika" style="max-width: 100px;">
                    </div>
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="logo">Logo</label>
                        </div>
                        <input type="hidden" value="<?php echo $logo ?>" name="stara_fotografija">
                        <input type="file" name="logo" >
                    </div>
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="naziv">Naziv</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <input required type="text" name="naziv" id="naziv" class="add_news_form_text form-control form-control-lg" value="<?php echo $naziv ?>" maxlength="30">
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="dvorana">Dvorana</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <input required type="text" name="dvorana" id="dvorana" class="add_news_form_text form-control form-control-lg" value="<?php echo $dvorana ?>" maxlength="30">
                        </div>
                    </div>
                    
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="row">
                            <div class="col-sm-12 col-12">
                                <label class="news_form_label">Liga</label> 
                            </div>   
                            <div class="col-sm-4 col-8" id="selectTagovi">
                                <select class="form-control form-control-lg add_news_form_select" name="liga[]" multiple>
                                   <?php
                                     $timLige = [];                         
                                     $stmt = mysqli_prepare($connection, "SELECT c.id FROM timovi a JOIN liga_tim b ON a.id =b.tim_id JOIN lige c ON b.liga_id = c.id WHERE a.id=?");
                                     $stmt->bind_param('i', $_POST['id']);
                                     $stmt->execute();
                                     testQuery($stmt);
                                     $stmt->bind_result($liga_id);
                                  while($stmt->fetch()){
                                       array_push($timLige, $liga_id); 
                                   }
                                       
                                       $stmtTim = mysqli_prepare($connection, "SELECT id, naziv FROM lige");
                                        $stmtTim->execute();
                                        testQuery($stmtTim);
                                        $stmtTim->bind_result($liga_id, $naziv);
                                     
                                         while($stmtTim->fetch()){ 
                                    ?>    
                                         <option value="<?php echo $liga_id ?>"
                                           <?php 
                                               foreach($timLige as $liga){
                                                   if($liga === $liga_id){
                                                       echo 'selected';
                                                   }
                                               }      
                                           ?>      
                                         ><?php echo $naziv ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>       
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-4 col-12 pl-0">
                            <button class="add_news_btn" type="submit"><i class="far fa-save"></i>&ensp;Sačuvaj tim</button>
                        </div>


                    </div>   
                </form>
            </div>
 <script>
    $(document).ready(function(){
        $("#editTimForm").submit(function(e){
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            
            savePlayer(formData, <?php echo $id ?>);
            
        });
    });
  </script>