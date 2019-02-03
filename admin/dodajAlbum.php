<?php include "includes/adminHeader.php";?>

<script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/classic/ckeditor.js"></script>

<title>Dodaj album</title>

<?php
$pageName = basename(__FILE__); 

redirect();

?>



</head>

<body>
    <!-- nav including -->   
    <?php include "includes/adminNav.php";?>
    <div class="container">
        <input type="hidden" class="tableName" value="album">
        <input type="hidden" class="pageName" value="sacuvajAlbum">
        <div class="row justify-content-center">    
            <div class="col-sm-10 col-12 add_news_container my-4">
                <div class="col-sm-12 col-12 my-4">
                    <span class="add_news_title">DODAJ ALBUM</span>
                </div>
                <form  class="add_news_form">
                    <input type="hidden" name="table" value="album">
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="naziv">Naziv</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <input required type="text" name="naziv" id="naziv" class="add_news_form_text form-control form-control-lg">
                        </div>
                    </div>
                    
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="fotografija">Poster</label>
                        </div>
                        <input type="file" required name="fotografija" id="fotografija">
                    </div>
                    
                    
                    
                    <div class="col-sm-12 col-12 form-group my-4" id="tagsSelect">
                        <div class="row">
                            <div class="col-sm-12 col-12">
                                <label class="news_form_label">Sezona</label> 
                            </div>   
                            <div class="col-sm-4 col-8" id="selectTagovi">
                                <select class="form-control form-control-lg add_news_form_select" name="sezona_id" required>
                                    <option selected disabled>Odaberite sezonu</option>
                            <?php 
                               $stmtTim = mysqli_prepare($connection, "SELECT id, broj FROM sezone");
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
                    
                    <div class="col-sm-12 col-12 form-group my-4" id="tagsSelect">
                        <div class="row">
                            <div class="col-sm-12 col-12">
                                <label class="news_form_label">Kategorija</label> 
                            </div>   
                            <div class="col-sm-4 col-8" id="selectTagovi">
                                <select class="form-control form-control-lg add_news_form_select" name="kategorija_id" required >
                                    <option selected disabled>Odaberite kategoiju</option>
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
                            <div class="col-sm-4 col-6">
                                <input type="date" name="datum" id="datum" class="add_news_form_text form-control form-control-lg" required>
                            </div>
                            <div class="col-sm-2 col-2 pl-0">
                                <label class="news_form_label" for="datum"><i style="font-size:35px" class="fas fa-calendar-alt"></i></label>
                            </div>
                        </div>       
                    </div>
                    
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-4 col-12 pl-0">
                            <button class="add_news_btn" type="submit"><i class="far fa-save"></i>&ensp;Sačuvaj album</button>
                        </div>


                    </div>   
                </form>
            </div>
        </div>
    </div>

 

    <?php include "scripts.php"; ?>
  
    <!-- footer including -->
    <?php include "includes/adminFooter.php";?>
