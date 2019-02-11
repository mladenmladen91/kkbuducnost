

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
        <input type="hidden" class="tableName" value="timovi">
        <input type="hidden" class="pageName" value="sacuvajTim">
        <div class="row justify-content-center">    
            <div class="col-sm-8 col-12 add_news_container my-4">
                <div class="col-sm-12 col-12 my-4">
                    <span class="add_news_title">DODAJ TIM</span>
                </div>
                <form  class="add_news_form">
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="naziv">Naziv</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <input required type="text" name="naziv" id="naziv" class="add_news_form_text form-control form-control-lg" maxlength="50">
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="dvorana">Dvorana</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <input required type="text" name="dvorana" id="dvorana" class="add_news_form_text form-control form-control-lg" maxlength="40">
                        </div>
                    </div>
                    
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="logo">Logo</label>
                        </div>
                        <input type="file" required name="logo" >
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="row">
                            <div class="col-sm-12 col-12">
                                <label class="news_form_label">Liga(* Tim može da bude učesnik više liga)</label> 
                            </div>   
                            <div class="col-sm-4 col-8" id="selectTagovi">
                                <select class="form-control form-control-lg add_news_form_select" name="liga[]" multiple required>
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
                            <button class="add_news_btn" type="submit"><i class="fas fa-plus"></i>&ensp;Dodaj tim</button>
                        </div>


                    </div>   
                </form>
            </div>
        </div>
    </div>


    <?php include "scripts.php"; ?>
  
    <!-- footer including -->
    <?php include "includes/adminFooter.php";?>
