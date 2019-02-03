

<?php include "includes/adminHeader.php";?>



<title>Dodaj trofej</title>

<?php
$pageName = basename(__FILE__); 
redirect();
?>


</head>

<body>
    <!-- nav including -->   
    <?php include "includes/adminNav.php";?>
    <div class="container">
        <input type="hidden" class="tableName" value="trofeji">
        <input type="hidden" class="pageName" value="sacuvajTrofej">
        <div class="row justify-content-center">    
            <div class="col-sm-8 col-12 add_news_container my-4">
                <div class="col-sm-12 col-12 my-4">
                    <span class="add_news_title">DODAJ TROFEJ</span>
                </div>
                <form  class="add_news_form">
                    <input type="hidden" name="table" value="trofeji">
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="fotografija">Broj trofeja (fotografija)</label>
                        </div>
                        <input type="file" required name="broj" >
                    </div>
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
                            <label class="news_form_label" for="fotografija">Fotografija trofeja</label>
                        </div>
                        <input type="file" required name="trofej" >
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="sezone">Sezone</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <textarea required type="text" name="sezone" id="sezone" class="add_news_form_textarea form-control form-control-lg"></textarea>
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-4 col-12 pl-0">
                            <button class="add_news_btn" type="submit"><i class="fas fa-plus"></i>&ensp;Dodaj trofej</button>
                        </div>


                    </div>   
                </form>
            </div>
        </div>
    </div>


    <?php include "scripts.php"; ?>
  
    <!-- footer including -->
    <?php include "includes/adminFooter.php";?>
