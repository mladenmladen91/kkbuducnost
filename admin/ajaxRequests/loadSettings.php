<?php
    session_start();

    include "../../includes/db.php";
    
    include "../../includes/functions.php";
?>
<!-- / lige container -->
            
          <!-- liga container -->  
            <div class="col-lg-6">
             <div class="col-lg-12 section_holder mx-2 my-4" >
                 <div class="col-lg-12">
                   <div class="row justify-content-center">    
                    <div class="col-lg-6 col-8 text-center section_header" >
                        <span class="m-0 p-0">LIGE</span>
                    </div>
                          
                    <div class="col-lg-12 p-2 text-center mx-4" style="overflow-x: auto; margin-top: 100px">
                       <div class="row">
                        <div class="col-sm-6 col-md-5 col-lg-3">
                <a href="#" class="btn dodaj_btn mb-3" data-toggle="modal" data-target="#dodajLigu">
                    <i class="fas fa-plus"></i>&ensp;DODAJ LIGU</a>
            </div>   
                        <div class="col-lg-12">      
                        <table class="tableLiga table-hover my-2">
                                  <thead>
                                      <th>ID</th>
                                      <th>NAZIV</th>
                                      <th>AKTIVNO</th>
                                      <th></th>
                                 </thead>
                                  <tbody>
                                <?php
                                     $stmtSezone = mysqli_prepare($connection, "SELECT id, naziv, status FROM lige");
                                     $stmtSezone->execute();
                                     testQuery($stmtSezone);
                                     $stmtSezone->bind_result($id, $naziv, $aktivan);
                                     
                                     while($stmtSezone->fetch()){  
                                 ?>   
                                     <tr class="tableRow">
                                      <td><?php echo $id; ?></td>     
                                      <td><?php echo $naziv; ?></td>
                                      <td>
                                          <?php $status = ($aktivan === 'aktivan')? 'neaktivan': 'aktivan'  ?>
                                          <label class="switch" onclick="status('<?php echo $status ?>', 'lige', <?php echo $id ?>)">
                                            <input class="input" type="checkbox" <?php echo ($aktivan === 'aktivan')? 'checked': '' ?> >
                                            <span class="slider round"></span>
                                          </label>
                                      </td>     
                                      <td>
                                          <input type="hidden" class="rowId" value="<?php echo $id ?>">
                                          <span class="delete_btn">IZBRIŠI</span>
                                          <input type="hidden" class="tableName" value="lige">
                                      </td>
                                           
                                     </tr>     
                                 <?php } ?>      
                                  </tbody>     
                          </table>
                          </div>     
                        </div>   
                       </div>
                    
                   </div>
               </div>
                 
 <!-- popup za dodavanje liga -->
    <div class="modal fade" id="dodajLigu">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header popup_header">
                    <h4 class="modal-title new_tag_title">NOVA LIGA</h4>
                    <button type="button" class="close close_new_tag" data-dismiss="modal">&times;</button>
                </div>
                <form id="formLiga">
                    <!-- Modal body -->
                    <div class="modal-body text-center">
                      <div class="row justify-content-center">
                        <div class="col-lg-8">  
                        <input type="text" placeholder="Unesite naziv lige" name="naziv" class="form-control form-control-lg" id="sezona" required>
                        
                       </div>        
                      </div>      
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer justify-content-center">
                        <button class="add_news_btn save_tag" id="saveTag" style="width:30%; margin:auto; display:block"><i class="fas fa-plus"></i>&ensp;Dodaj ligu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 <!-- / popup za dodavanje lige -->                 
                 
            </div>
       </div>
  <!-- / lige container -->

            
    <!-- kategorija container -->  
            <div class="col-lg-6">
             <div class="col-lg-12 section_holder mx-2 my-4" >
                 <div class="col-lg-12">
                   <div class="row justify-content-center">    
                    <div class="col-lg-10 col-8 text-center section_header" >
                        <span class="m-0 p-0">KATEGORIJE</span>
                    </div>
                          
                    <div class="col-lg-12 p-2 text-center mx-4" style="overflow-x: auto; margin-top: 100px">
                       <div class="row">
                        <div class="col-sm-6 col-md-5 col-lg-3">
                <a href="#" class="btn dodaj_btn mb-3" data-toggle="modal" data-target="#dodajKategoriju">
                    <i class="fas fa-plus"></i>&ensp;DODAJ KATEGORIJU</a>
            </div>   
                        <div class="col-lg-12">      
                        <table class="tableLiga table-hover my-2">
                                  <thead>
                                      <th>ID</th>
                                      <th>NAZIV</th>
                                      <th></th>
                                 </thead>
                                  <tbody>
                                  <?php
                                     $stmtKategorija = mysqli_prepare($connection, "SELECT id, naziv FROM kategorija");
                                     $stmtKategorija->execute();
                                     testQuery($stmtKategorija);
                                     $stmtKategorija->bind_result($id, $naziv);
                                     
                                     while($stmtKategorija->fetch()){  
                                 ?>      
                                     <tr class="tableRow">
                                      <td><?php echo $id ?></td>     
                                      <td><?php echo $naziv; ?></td>
                                      <td>
                                          <input type="hidden" class="rowId" value="<?php echo $id ?>">
                                          <span class="delete_btn">IZBRIŠI</span>
                                          <input type="hidden" class="tableName" value="kategorija">
                                      </td>
                                     </tr>     
                                  <?php } ?>     
                                  </tbody>     
                          </table>
                          </div>     
                        </div>   
                       </div>
                    
                   </div>
               </div>
                 
 <!-- popup za dodavanje kategorija -->
    <div class="modal fade" id="dodajKategoriju">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header popup_header">
                    <h4 class="modal-title new_tag_title">NOVA KATEGORIJA</h4>
                    <button type="button" class="close close_new_tag" data-dismiss="modal">&times;</button>
                </div>
                <form id="formKategorija">
                    <!-- Modal body -->
                    <div class="modal-body">
                        <input type="text" placeholder="Unesite kategoriju" name="naziv" id="kategorija" class="new_tag_name" style="background-color: #e9e9e9;" required>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer justify-content-center">
                        <button class="add_news_btn save_tag" id="saveTag" style="width:30%; margin:auto; display:block"><i class="fas fa-plus"></i>&ensp;Dodaj kategoriju</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 <!-- / popup za dodavanje kategorija -->                 
                 
            </div>
       </div>
  <!-- / sezona container -->
            
          <!-- tag container -->  
            <div class="col-lg-6">
             <div class="col-lg-12 section_holder mx-2 my-4" >
                 <div class="col-lg-12">
                   <div class="row justify-content-center">    
                    <div class="col-lg-6 col-8 text-center section_header" >
                        <span class="m-0 p-0">SEZONE</span>
                    </div>
                          
                    <div class="col-lg-12 p-2 text-center mx-4" style="overflow-x: auto; margin-top: 100px">
                       <div class="row">
                        <div class="col-sm-6 col-md-5 col-lg-3">
                <a href="#" class="btn dodaj_btn mb-3" data-toggle="modal" data-target="#dodajSezonu">
                    <i class="fas fa-plus"></i>&ensp;DODAJ SEZONU</a>
            </div>   
                        <div class="col-lg-12">      
                        <table class="tableLiga table-hover my-2">
                                  <thead>
                                      <th>ID</th>
                                      <th>BROJ</th>
                                      <th></th>
                                 </thead>
                                  <tbody>
                                <?php
                                     $stmtSezone = mysqli_prepare($connection, "SELECT id, broj FROM sezone");
                                     $stmtSezone->execute();
                                     testQuery($stmtSezone);
                                     $stmtSezone->bind_result($id, $broj);
                                     
                                     while($stmtSezone->fetch()){  
                                 ?>   
                                     <tr class="tableRow">
                                      <td><?php echo $id; ?></td>     
                                      <td><?php echo $broj; ?></td>
                                      <td>
                                          <input type="hidden" class="rowId" value="<?php echo $id ?>">
                                          <span class="delete_btn">IZBRIŠI</span>
                                          <input type="hidden" class="tableName" value="sezone">
                                      </td>
                                     </tr>     
                                 <?php } ?>      
                                  </tbody>     
                          </table>
                          </div>     
                        </div>   
                       </div>
                    
                   </div>
               </div>
                 
 <!-- popup za dodavanje sezona -->
    <div class="modal fade" id="dodajSezonu">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header popup_header">
                    <h4 class="modal-title new_tag_title">NOVA SEZONA</h4>
                    <button type="button" class="close close_new_tag" data-dismiss="modal">&times;</button>
                </div>
                <form id="formSezona">
                    <!-- Modal body -->
                    <div class="modal-body text-center">
                      <div class="row justify-content-center">
                        <div class="col-lg-8">  
                        <input type="text" placeholder="Unesite sezonu" name="broj" class="form-control form-control-lg" id="sezona" required>
                        <select class="form-control form-control-lg my-2" name="kategorije[]" required multiple>
                            <option disabled selected>Odaberite kategoriju</option>
                          <?php 
                               $stmtKategorije = mysqli_prepare($connection, "SELECT id, naziv FROM kategorija");
                               $stmtKategorije->execute();
                               testQuery($stmtKategorije);
                               $stmtKategorije->bind_result($id, $naziv);
                                     
                               while($stmtKategorije->fetch()){
                           ?>    
                               <option value="<?php echo $id ?>"><?php echo $naziv ?></option>
                           <?php } ?>    
                        </select>
                       </div>        
                      </div>      
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer justify-content-center">
                        <button class="add_news_btn save_tag" id="saveTag" style="width:30%; margin:auto; display:block"><i class="fas fa-plus"></i>&ensp;Dodaj sezonu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 <!-- / popup za dodavanje sezona -->                 
                 
            </div>
       </div>
  <!-- / sezona container -->  
<!-- tag container -->  
            <div class="col-lg-6">
             <div class="col-lg-12 section_holder mx-2 my-4" >
                 <div class="col-lg-12">
                   <div class="row justify-content-center">    
                    <div class="col-lg-4 col-8 text-center section_header" >
                        <span class="m-0 p-0">TAGOVI</span>
                    </div>
                          
                    <div class="col-lg-12 p-2 text-center mx-4" style="overflow-x: auto; margin-top: 100px">
                       <div class="row">
                        <div class="col-sm-6 col-md-5 col-lg-3">
                <a href="#" class="btn dodaj_btn mb-3" data-toggle="modal" data-target="#dodajTag">
                    <i class="fas fa-plus"></i>&ensp;DODAJ TAG</a>
            </div>   
                        <div class="col-lg-12">      
                        <table class="tableLiga table-hover my-2">
                                  <thead>
                                      <th>ID</th>
                                      <th>NAZIV</th>
                                      <th></th>
                                 </thead>
                                  <tbody>
                                 <?php
                                     $stmtTag = mysqli_prepare($connection, "SELECT id, naziv FROM tagovi");
                                     $stmtTag->execute();
                                     testQuery($stmtTag);
                                     $stmtTag->bind_result($id, $naziv);
                                     
                                     while($stmtTag->fetch()){  
                                 ?>      
                                     <tr class="tableRow">
                                      <td><?php echo $id; ?></td>     
                                      <td><?php echo $naziv; ?></td>
                                      <td>
                                          <input type="hidden" class="rowId" value="<?php echo $id ?>">
                                          <span class="delete_btn">IZBRIŠI</span>
                                          <input type="hidden" class="tableName" value="tagovi">
                                      </td>
                                     </tr>     
                                 <?php } ?>      
                                  </tbody>     
                          </table>
                          </div>     
                        </div>   
                       </div>
                    
                   </div>
               </div>
                 
 <!-- popup za dodavanje tagova -->
    <div class="modal fade" id="dodajTag">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header popup_header">
                    <h4 class="modal-title new_tag_title">NOVI TAG</h4>
                    <button type="button" class="close close_new_tag" data-dismiss="modal">&times;</button>
                </div>
                <form id="formTag">
                    <!-- Modal body -->
                    <div class="modal-body">
                        <input type="text" placeholder="Unesite tag" name="naziv" id="tag" class="new_tag_name" style="background-color: #e9e9e9;" required>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="add_news_btn save_tag" id="saveTag" style="width:30%; margin:auto; display:block"><i class="fas fa-plus"></i>&ensp;Dodaj tag</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 <!-- / popup za dodavanje tagova -->                 
                 
            </div>
       </div>
  <!-- / tag container --> 

 <script>
    $(document).ready(function(){
        // dodavanje novog taga
        $("form#formTag").submit(function(e){
            e.preventDefault();
         
            var formData = new FormData($(this)[0]);
            var page = "dodajTag"
            
            saveData(formData, page);
            
        });
        
        // dodavanje nove kategorije
        $("form#formKategorija").submit(function(e){
            e.preventDefault();
         
            var formData = new FormData($(this)[0]);
            var page = "dodajKategoriju";
            
            saveData(formData, page);
            
        });
        
        // dodavanje nove kategorije
        $("#formLiga").submit(function(e){
            e.preventDefault();
         
            var formData = new FormData($(this)[0]);
            var page = "dodajLigu";
            
            saveData(formData, page);
            
        });
        
        // dodavanje nove kategorije
        $("form#formSezona").submit(function(e){
            e.preventDefault();
         
            var formData = new FormData($(this)[0]);
            var page = "dodajSezone";
            
            saveData(formData, page);
            
        });
        
        // brisanje elemenata
        $(".delete_btn").click(function(){
            
           deleteSection($(this));
        });
    });
     
  

 </script>           