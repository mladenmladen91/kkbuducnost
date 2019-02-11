<?php
session_start();

include "../../includes/db.php";
    
include "../../includes/functions.php";

// redirect if not login
    redirect();

                $id = $_POST['id'];

                $stmt = mysqli_prepare($connection, "SELECT a.naslov, a.tekst, a.datum, a.fotografija, b.id, b.naziv, a.naslov_en, a.tekst_en FROM vijesti a JOIN kategorija b ON a.kategorija_id = b.id WHERE a.id=?");
                $stmt->bind_param('i', $id);
                $stmt->execute();
                testQuery($stmt);
                $stmt->bind_result($naslov, $tekst, $datum, $fotografija, $kategorija_id, $kategorija, $naslov_en, $tekst_en);
                $stmt->fetch();
                $stmt->close();
            ?>
            <div class="col-sm-10 col-12 add_news_container my-4">
                <div class="col-sm-12 col-12 my-4">
                    <span class="add_news_title">IZMIJENI VIJEST</span>
                </div>
                <form id="editNewsForm"  class="add_news_form">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="col-md-12 mb-2">
                        <img src="images/vijesti/<?php echo $fotografija ?>" alt="slika" style="max-width: 100px;">
                    </div>
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="image">Slika</label>
                        </div>
                        <input type="hidden" name="stara_fotografija" value="<?php echo $fotografija ?>">
                        <input type="file" name="fotografija" id="image">
                    </div>
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="naslov">Naslov</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <input required type="text" name="naslov" id="naslov" class="add_news_form_text form-control form-control-lg" value="<?php echo $naslov; ?>" maxlength="70">
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="naslov_en">Naslov-engleski</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <input required type="text" name="naslov_en" id="naslov_en" class="add_news_form_text form-control form-control-lg" value="<?php echo $naslov_en; ?>" maxlength="70">
                        </div>
                    </div>
                    
                    
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="tekst">Tekst objave(* Maksimalna dužina teksta je 2000 karaktera)</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <textarea required name="tekst" id="text1" class="add_news_form_textarea" ><?php echo $tekst; ?></textarea>
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="tekst2">Tekst objave-engleski(* Maksimalna dužina teksta je 2000 karaktera)</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <textarea name="tekst_en" id="text2" class="add_news_form_textarea" ><?php echo $tekst_en; ?></textarea>
                        </div>
                    </div>
                    
                    
                   <div class="col-sm-12 col-12 form-group my-4" id="tagsSelect">
                        <div class="row">
                            <div class="col-sm-12 col-12">
                                <label class="news_form_label">Kategorija</label> 
                            </div>   
                            <div class="col-sm-4 col-8" id="selectTagovi">
                                  <select class="form-control form-control-lg add_news_form_select" name="kategorija_id" required>
                                   
                             <?php 
                               $stmtTim = mysqli_prepare($connection, "SELECT id, naziv FROM kategorija");
                               $stmtTim->execute();
                               testQuery($stmtTim);
                               $stmtTim->bind_result($id, $naziv);
                                     
                               while($stmtTim->fetch()){
                           ?>    
                               <option value="<?php echo $id ?>" <?php echo ($id === $kategorija_id) ? 'selected': '' ?> ><?php echo $naziv ?></option>
                           <?php 
                               } 
                              $stmtTim->close();     
                           ?>
                                </select>
                            </div>
                        </div>       
                    </div>
                    
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="row">
                            <div class="col-sm-12 col-12">
                                <label class="news_form_label">Datum</label> 
                            </div>   
                            <div class="col-sm-3 col-6">
                                <input type="date" name="datum" id="datum" class="add_news_form_text form-control form-control-lg" value="<?php echo $datum; ?>" required>
                            </div>
                            <div class="col-sm-2 col-2 pl-0">
                                <label class="news_form_label" for="datum"><i style="font-size:35px" class="fas fa-calendar-alt"></i></label>
                            </div>
                        </div>       
                    </div>
                    
                     
                    <div class="col-sm-12 col-12 form-group my-4" id="tagsSelect">
                        <div class="row">
                            <div class="col-sm-12 col-12">
                                <label class="news_form_label">Tagovi</label> 
                            </div>   
                            <div class="col-sm-4 col-8" id="selectTagovi">
                                <select class="form-control form-control-lg add_news_form_select" name="tagovi[]" id="tagSelect"  multiple required>
                                    <?php
                                     $vijestTagovi = [];                         $stmt = mysqli_prepare($connection, "SELECT c.id FROM vijesti a JOIN tag_vijest b ON a.id =b.vijest_id JOIN tagovi c ON b.tag_id = c.id WHERE a.id=?");
                                     $stmt->bind_param('i', $_POST['id']);
                                     $stmt->execute();
                                     testQuery($stmt);
                                     $stmt->bind_result($news_id);
                                  while($stmt->fetch()){
                                       array_push($vijestTagovi, $news_id); 
                                   }
                                       
                                       $stmtTim = mysqli_prepare($connection, "SELECT id, naziv FROM tagovi");
                                        $stmtTim->execute();
                                        testQuery($stmtTim);
                                        $stmtTim->bind_result($tag_id, $naziv);
                                     
                                         while($stmtTim->fetch()){ 
                                    ?>    
                                         <option value="<?php echo $tag_id ?>"
                                           <?php 
                                               foreach($vijestTagovi as $tag){
                                                   if($tag === $tag_id){
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
                            <button class="add_news_btn" type="submit"><i class="far fa-save"></i>&ensp;Sačuvaj objavu</button>
                        </div>

                    </div>   
                </form>
            </div>
 <script>
    $(document).ready(function(){
        $("#editNewsForm").submit(function(e){
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            
            saveNews(formData, <?php echo $_POST['id'] ?>);
            
        });
        
        $("#tagSelect").select2();
    }); 
     
     
     
    ClassicEditor
				.create( document.querySelector( '#text1' ) )
				.then( editor => {
					console.log( editor );
				} )
				.catch( error => {
					console.error( error );
				} ); 
     
     ClassicEditor
				.create( document.querySelector( '#text2' ) )
				.then( editor => {
					console.log( editor );
				} )
				.catch( error => {
					console.error( error );
				} ); 
     
     
    
  </script>