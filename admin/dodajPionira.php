<?php include "includes/adminHeader.php";?>


<title>Dodaj pionira</title>

<?php
$pageName = basename(__FILE__); 
redirect();
?>


</head>

<body>
    <!-- nav including -->   
    <?php include "includes/adminNav.php";?>
    <div class="container">
        <input type="hidden" class="tableName" value="pioniri">
        <input type="hidden" class="pageName" value="sacuvajOstaleIgrace">
        <div class="row justify-content-center">    
            <div class="col-sm-8 col-12 add_news_container my-4">
                <div class="col-sm-12 col-12 my-4">
                    <span class="add_news_title">DODAJ IGRAČA (pioniri)</span>
                </div>
                <form  class="add_news_form">
                    <input type="hidden" name="table" value="pioniri">
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="ime">Ime</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <input required type="text" name="ime" id="ime" class="add_news_form_text form-control form-control-lg" maxlength="20">
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="prezime">Prezime</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <input required type="text" name="prezime" id="prezime" class="add_news_form_text form-control form-control-lg" maxlength="20">
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="broj">Broj</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <input required type="number" name="broj" id="prezime" class="add_news_form_text form-control form-control-lg" min="1" max="99">
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="image">Slika</label>
                        </div>
                        <input type="file" required name="fotografija" id="image">
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-4 col-12 pl-0">
                            <button class="add_news_btn" type="submit"><i class="far fa-save"></i>&ensp;Sačuvaj igrača</button>
                        </div>


                    </div>   
                </form>
            </div>
        </div>
    </div>


    <?php include "scripts.php"; ?>
  
    <!-- footer including -->
    <?php include "includes/adminFooter.php";?>
