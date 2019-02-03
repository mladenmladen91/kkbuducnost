<?php include "includes/adminHeader.php";?>



<title>Dodaj tim</title>

<?php
$pageName = basename(__FILE__); 
redirect();
?>



</head>

<body>
    <!-- nav including -->   
    <?php include "includes/adminNav.php";?>
    <div class="container">
        <input type="hidden" class="tableName" value="euroleague">
        <input type="hidden" class="pageName" value="sacuvajTimTabela">
        <div class="row justify-content-center">    
            <div class="col-sm-8 col-12 add_news_container my-4">
                <div class="col-sm-12 col-12 my-4">
                    <span class="add_news_title">DODAJ TIM (euroleague)</span>
                </div>
                <form  class="add_news_form">
                    <input type="hidden" name="table" value="euroleague">
                    <div class="col-sm-12 col-12 form-group my-4" id="tagsSelect">
                        <div class="row">
                            <div class="col-sm-12 col-12">
                                <label class="news_form_label">Tim</label> 
                            </div>   
                            <div class="col-sm-4 col-8" id="selectTagovi">
                                <select class="form-control form-control-lg add_news_form_select" name="klub_id">
                                 <option disabled selected>Odaberi tim</option>
                           <?php 
                               $stmtTim = mysqli_prepare($connection, "SELECT id, naziv FROM timovi");
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
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="broj_utakmica">Broj utakmica</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <input required type="number" name="broj_utakmica" id="broj_utakmica" class="add_news_form_text form-control form-control-lg">
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="dobijene">Dobijene utakmice</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <input required type="number" name="dobijene" id="dobijene" class="add_news_form_text form-control form-control-lg">
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="izgubljene">Izgubljene utakmice</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <input required type="number" name="izgubljene" id="izgubljene" class="add_news_form_text form-control form-control-lg">
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="krajnja_razlika">Krajnja razlika</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <input required type="number" name="krajnja_razlika" id="krajnja_razlika" class="add_news_form_text form-control form-control-lg">
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-4 col-12 pl-0">
                            <button class="add_news_btn" type="submit"><i class="far fa-save"></i>&ensp;Sačuvaj tim</button>
                        </div>
                     </div>   
                </form>
            </div>
        </div>
    </div>


    <?php include "scripts.php"; ?>
  
    <!-- footer including -->
    <?php include "includes/adminFooter.php";?>
