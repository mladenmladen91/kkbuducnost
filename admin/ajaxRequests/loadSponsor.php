<?php
session_start();

include "../../includes/db.php";
    
include "../../includes/functions.php";

                $id = $_POST['id'];

                $stmt = mysqli_prepare($connection, "SELECT link, fotografija, ranking FROM sponzori WHERE id=?");
                 $stmt->bind_param('i', $id);
                 $stmt->execute();
                 testQuery($stmt);
                 $stmt->bind_result($link, $fotografija, $ranking);
                 $stmt->fetch();
                 $stmt->close();
            ?>
            <div class="col-sm-8 col-12 add_news_container my-4">
                <div class="col-sm-12 col-12 my-4">
                    <span class="add_news_title">IZMIJENI SPONZORA</span>
                </div>
                <form id="editSponsorForm" class="add_news_form">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="col-md-12 mb-2">
                        <img src="images/sponzori/<?php echo $fotografija; ?>" alt="slika" style="max-width: 100px;">
                    </div>
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="fotografija">Fotografija</label>
                        </div>
                        <input type="hidden" name="stara_fotografija" value="<?php echo $fotografija; ?>">
                        <input type="file" id="fotografija" name="fotografija" >
                    </div>
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="link">Link</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <input required type="text" name="link" id="link" class="add_news_form_text form-control form-control-lg" value="<?php echo $link; ?>">
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="row">
                            <div class="col-sm-12 col-12">
                                <label class="news_form_label">Rang</label> 
                            </div>   
                            <div class="col-sm-4 col-8" >
                                <select class="form-control form-control-lg add_news_form_select" name="ranking">
                                    <?php if($ranking === 1) { ?>
                                    <option value="1" selected>1</option>
                                    <option value="3">3</option>
                                    <option value="5">5</option>
                                    <?php }elseif($ranking === 3){ ?>
                                    <option value="1">1</option>
                                    <option value="3" selected>3</option>
                                    <option value="5">5</option>
                                    <?php }else{ ?>
                                    <option value="1">1</option>
                                    <option value="3">3</option>
                                    <option value="5" selected>5</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>       
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-4 col-12 pl-0">
                            <button class="add_news_btn" type="submit"><i class="far fa-save"></i>&ensp;Sačuvaj sponzora</button>
                        </div>


                    </div>   
                </form>
            </div>
 <script>
    $(document).ready(function(){
        $("#editSponsorForm").submit(function(e){
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            
            saveSponsor(formData, <?php echo $_POST['id'] ?>);
            
        });
        
        
        
    });
  </script>