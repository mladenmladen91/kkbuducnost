<?php include "includes/adminHeader.php";?>



<title>Dodaj rezultat</title>

<?php
$pageName = basename(__FILE__); 
redirect();
?>


</head>

<body>
    <!-- nav including -->   
    <?php include "includes/adminNav.php";?>
    <div class="container">
        <input type="hidden" class="tableName" value="rezultati">
        <input type="hidden" class="pageName" value="sacuvajRezultat">
        <div class="row justify-content-center">    
            <div class="col-sm-8 col-12 add_news_container my-4">
                <div class="col-sm-12 col-12 my-4">
                    <span class="add_news_title">DODAJ REZULTAT</span>
                </div>
                <form  class="add_news_form">
                  <input type="hidden" name="table" value="rezultati">    
                  <div class="row">    
                    <div class="col-sm-6 col-lg-6 form-group" id="tagsSelect">
                        <div class="row">
                            <div class="col-sm-12 col-12">
                                <label class="news_form_label">Domaći Tim</label> 
                            </div>   
                            <div class="col-sm-12 col-8" id="selectTim">
                                <select class="form-control form-control-lg add_news_form_select selectTim" name="domacin" required>
                            <?php 
                               $stmtTim = mysqli_prepare($connection, "SELECT naziv FROM timovi");
                               $stmtTim->execute();
                               testQuery($stmtTim);
                               $stmtTim->bind_result($naziv);
                                     
                               while($stmtTim->fetch()){
                           ?>    
                               <option value="<?php echo $naziv ?>"><?php echo $naziv ?></option>
                           <?php } ?>
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
                                <input required type="number" name="domacin_kosevi" id="datum" class="add_news_form_text form-control form-control-lg" min="0" max="200">
                            </div>
                        </div>       
                    </div>
                    
                    <div class="col-sm-6 col-lg-6 form-group my-4" >
                        <div class="row">
                            <div class="col-sm-12 col-12">
                                <label class="news_form_label">Gostujući Tim</label> 
                            </div>   
                            <div class="col-sm-12 col-8" >
                                <select class="form-control form-control-lg add_news_form_select select_tim" id="selectGost" name="gost" required>
                            <?php 
                               $stmtTim = mysqli_prepare($connection, "SELECT naziv FROM timovi");
                               $stmtTim->execute();
                               testQuery($stmtTim);
                               $stmtTim->bind_result($naziv);
                                     
                               while($stmtTim->fetch()){
                           ?>    
                               <option value="<?php echo $naziv ?>"><?php echo $naziv ?></option>
                           <?php } ?>
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
                                <input required type="number" name="gost_kosevi" id="datum" class="add_news_form_text form-control form-control-lg" min="0" max="200">
                            </div>
                        </div>       
                    </div>
                    
                   
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="row">
                            <div class="col-sm-12 col-12">
                                <label class="news_form_label">Datum</label> 
                            </div>   
                            <div class="col-sm-6 col-6">
                                <input type="date" name="datum" id="datum" class="add_news_form_text form-control form-control-lg" required>
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
                                <input type="time" name="vrijeme" id="vrijeme"  class="add_news_form_text form-control form-control-lg" required>
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
                            <div class="col-sm-4 col-8" id="selectTagovi">
                                <select class="form-control form-control-lg add_news_form_select" name="liga_id" required>
                            <?php 
                               $stmtTim = mysqli_prepare($connection, "SELECT id, naziv FROM lige");
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
                        <div class="col-sm-4 col-12 pl-0">
                            <button class="add_news_btn" type="submit"><i class="fas fa-plus"></i>&ensp;Dodaj meč</button>
                        </div>


                    </div>
                  </div>      
                </form>
            </div>
        </div>
    </div>


    <?php include "scripts.php"; ?>
  
    <!-- footer including -->
    <?php include "includes/adminFooter.php";?>
