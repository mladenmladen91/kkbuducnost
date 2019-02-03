

<?php include "includes/adminHeader.php";?>



<title>Dodaj sponzora</title>

<?php
$pageName = basename(__FILE__); 
redirect();
?>


</head>

<body>
    <!-- nav including -->   
    <?php include "includes/adminNav.php";?>
    <div class="container">
        <input type="hidden" class="tableName" value="sponzori">
        <input type="hidden" class="pageName" value="sacuvajSponzora">
        <div class="row justify-content-center">    
            <div class="col-sm-8 col-12 add_news_container my-4">
                <div class="col-sm-12 col-12 my-4">
                    <span class="add_news_title">DODAJ SPONZORA</span>
                </div>
                <form  class="add_news_form">
                    <input type="hidden" name="table" value="sponzori">
                     <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="link">Link</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <input required type="text" name="link" id="link" class="add_news_form_text form-control form-control-lg">
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="fotografija">Fotografija</label>
                        </div>
                        <input type="file" id="fotografija" required name="fotografija" >
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="row">
                            <div class="col-sm-12 col-12">
                                <label class="news_form_label">Rang</label> 
                            </div>   
                            <div class="col-sm-4 col-8" >
                                <select class="form-control form-control-lg add_news_form_select" name="ranking" required>
                                    <option value="1">1</option>
                                    <option value="3">3</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>       
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-4 col-12 pl-0">
                            <button class="add_news_btn" type="submit"><i class="fas fa-plus"></i>&ensp;Dodaj sponzora</button>
                        </div>


                    </div>   
                </form>
            </div>
        </div>
    </div>


    <?php include "scripts.php"; ?>
  
    <!-- footer including -->
    <?php include "includes/adminFooter.php";?>
