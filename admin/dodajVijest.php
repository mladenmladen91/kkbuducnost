<?php include "includes/adminHeader.php";?>

<script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/classic/ckeditor.js"></script>

<title>Dodaj objavu</title>

<?php
$pageName = basename(__FILE__); 
redirect();
?>



</head>

<body>
    <!-- nav including -->   
    <?php include "includes/adminNav.php";?>
    <div class="container">
        <input type="hidden" class="tableName" value="vijesti">
        <input type="hidden" class="pageName" value="sacuvajVijest">
        <div class="row justify-content-center">    
            <div class="col-sm-10 col-12 add_news_container my-4">
                <div class="col-sm-12 col-12 my-4">
                    <span class="add_news_title">DODAJ VIJEST</span>
                </div>
                <form  class="add_news_form">
                    <input type="hidden" name="table" value="vijest">
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="naslov">Naslov</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <input required type="text" name="naslov" id="naslov" class="add_news_form_text form-control form-control-lg" maxlength="60">
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="naslov_en">Naslov-engleski</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <input required type="text" name="naslov_en" id="naslov_en" class="add_news_form_text form-control form-control-lg" maxlength="60">
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="image">Slika</label>
                        </div>
                        <input type="file" name="fotografija" id="image" required>
                    </div>
                    
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="tekst">Tekst objave</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <textarea name="tekst" id="text1" class="add_news_form_textarea"></textarea>
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="tekst2">Tekst objave-engleski</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <textarea name="tekst_en" id="text2" class="add_news_form_textarea" ></textarea>
                        </div>
                    </div>
                    
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="row">
                            <div class="col-sm-12 col-12">
                                <label class="news_form_label">Kategorija</label> 
                            </div>   
                            <div class="col-sm-4 col-8" id="tagovi_container">
                                <select class="form-control form-control-lg add_news_form_select" name="kategorija_id" required>
                           <?php 
                               $stmtTim = mysqli_prepare($connection, "SELECT id, naziv FROM kategorija");
                               $stmtTim->execute();
                               testQuery($stmtTim);
                               $stmtTim->bind_result($id, $naziv);
                                     
                               while($stmtTim->fetch()){
                           ?>    
                               <option value="<?php echo $id ?>"><?php echo $naziv ?></option>
                           <?php } ?>
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
                                <input type="date" name="datum" id="datum" class="add_news_form_text form-control form-control-lg" required>
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
                            <div class="col-sm-4 col-8" id="tagovi">
                                      
                            </div>
                            <div class="col-sm-2 col-2 pl-0 mt-2">
                                <a href="#" title="Dodaj tag" style="text-decoration: none; color:inherit" id="addTagBtn" data-toggle="modal" data-target="#dodajTag"><i style="font-size: 20px" class="fas fa-plus-circle"></i></a>
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
                <form id="dodajTagForm">
                    <!-- Modal body -->
                    <div class="modal-body">
                        <input type="text" placeholder="Unesite tag" name="naziv" id="tag" class="new_tag_name" style="background-color: #e9e9e9;" required>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer justify-content-center">
                        <button class="add_news_btn save_tag" id="saveTag" style="width:30%; margin:auto; display:block"><i class="fas fa-plus"></i>&ensp;Dodaj tag</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 <!-- / popup za dodavanje tagova -->

   <script>
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
   


    <?php include "scripts.php"; ?>
  
    <!-- footer including -->
    <?php include "includes/adminFooter.php";?>
