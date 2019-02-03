<?php
session_start();

include "../../includes/db.php";
    
include "../../includes/functions.php";

                $id = $_POST['id'];

                $stmt = mysqli_prepare($connection, "SELECT domacin, gost, domacin_kosevi, gost_kosevi, datum, vrijeme, liga_id FROM rezultati WHERE id=? ORDER BY datum DESC");
                 $stmt->bind_param('i', $id);
                 $stmt->execute();
                 testQuery($stmt);
                 $stmt->bind_result($domacin, $gost, $domacin_kosevi, $gost_kosevi, $datum, $vrijeme, $liga_id);
                 $stmt->fetch();
                 $stmt->close();
            ?>
            <div class="col-sm-8 col-12 add_news_container my-4">
                <div class="col-sm-12 col-12 my-4">
                    <span class="add_news_title">IZMIJENI REZULTAT</span>
                </div>
                <form id="editResultForm" class="add_news_form">
                  <input type="hidden" name="id" value="<?php echo $id; ?>">    
                  <div class="row">    
                    <div class="col-sm-6 col-lg-6 form-group" id="tagsSelect">
                        <div class="row">
                            <div class="col-sm-12 col-12">
                                <label class="news_form_label">Domaći Tim</label> 
                            </div>   
                            <div class="col-sm-12 col-8" id="selectTagovi">
                                <select class="form-control form-control-lg add_news_form_select" id="select_tim" name="domacin">
                            <?php 
                               $stmtTim = mysqli_prepare($connection, "SELECT naziv FROM timovi");
                               $stmtTim->execute();
                               testQuery($stmtTim);
                               $stmtTim->bind_result($naziv);
                                     
                               while($stmtTim->fetch()){
                           ?>    
                               <option value="<?php echo $naziv ?>"
                                  <?php echo ($domacin === $naziv)? 'selected': '' ?>       
                                ><?php echo $naziv ?></option>
                           <?php } ?>>
                                </select>
                            </div>
                        </div>       
                    </div>
                    
                    <div class="col-sm-6 col-lg-6 form-group">
                        <div class="row">
                            <div class="col-sm-12 col-12">
                                <label class="news_form_label">Domaćin- poeni</label> 
                            </div>   
                            <div class="col-sm-12 col-8">
                                <input required type="number" name="domacin_kosevi" id="datum" class="add_news_form_text form-control form-control-lg" value="<?php echo $domacin_kosevi ?>">
                            </div>
                        </div>       
                    </div>
                    
                    <div class="col-sm-6 col-lg-6 form-group my-4" >
                        <div class="row">
                            <div class="col-sm-12 col-12">
                                <label class="news_form_label">Gostujući Tim</label> 
                            </div>   
                            <div class="col-sm-12 col-8" >
                                <select class="form-control form-control-lg add_news_form_select" id="selectGost" name="gost">
                                    <?php 
                               $stmtTim = mysqli_prepare($connection, "SELECT naziv FROM timovi");
                               $stmtTim->execute();
                               testQuery($stmtTim);
                               $stmtTim->bind_result($naziv);
                                     
                               while($stmtTim->fetch()){
                           ?>    
                               <option value="<?php echo $naziv ?>"
                                  <?php echo ($gost === $naziv)? 'selected': '' ?>       
                                ><?php echo $naziv ?></option>
                           <?php } ?>>
                                </select>
                            </div>
                        </div>       
                    </div>
                    
                    <div class="col-sm-6 col-lg-6 form-group my-4">
                        <div class="row">
                            <div class="col-sm-12 col-12">
                                <label class="news_form_label">Gost- poeni</label> 
                            </div>   
                            <div class="col-sm-12 col-8">
                                <input required type="number" name="gost_kosevi" id="datum" class="add_news_form_text form-control form-control-lg" value="<?php echo $gost_kosevi ?>">
                            </div>
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
                        <div class="row">
                            <div class="col-sm-12 col-12">
                                <label class="news_form_label">Vrijeme</label> 
                            </div>   
                            <div class="col-sm-6 col-6">
                                <input type="time" name="vrijeme" id="vrijeme" class="add_news_form_text form-control form-control-lg" value="<?php echo $vrijeme ?>" >
                            </div>
                            <div class="col-sm-2 col-2 pl-0">
                                <label class="news_form_label" for="vrijeme"><i class="fas fa-clock"></i></label>
                            </div>
                        </div>       
                    </div>  
                   
                   <div class="col-sm-12 col-12 form-group my-4">
                        <div class="row">
                            <div class="col-sm-12 col-12">
                                <label class="news_form_label">Liga</label> 
                            </div>   
                            <div class="col-sm-4 col-8">
                                <select class="form-control form-control-lg add_news_form_select" name="liga_id" required>
                                      <option selected disabled>Odaberi ligu</option>
                            <?php 
                               $stmtTim = mysqli_prepare($connection, "SELECT id, naziv FROM lige");
                               $stmtTim->execute();
                               testQuery($stmtTim);
                               $stmtTim->bind_result($id, $naziv);
                                     
                               while($stmtTim->fetch()){
                           ?>    
                               <option value="<?php echo $id ?>"
                                   <?php echo ($liga_id === $id)? 'selected': '' ?>       
                                ><?php echo $naziv ?></option>
                           <?php } ?>
                                    
                                </select>
                            </div>
                        </div>       
                    </div>
                   
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-4 col-12 pl-0">
                            <button class="add_news_btn" type="submit"><i class="far fa-save"></i>&ensp;Izmijeni meč</button>
                        </div>


                    </div>
                  </div>      
                </form>
            </div>
 <script>
    $(document).ready(function(){
        $("#editResultForm").submit(function(e){
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            
            savePlayer(formData, <?php echo $_POST['id'] ?>);
            
        });
        
        $("#select_tim").select2();
    
       $("#selectGost").select2();
        
    });
  </script>