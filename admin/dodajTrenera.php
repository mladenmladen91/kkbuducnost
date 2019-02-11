

<?php include "includes/adminHeader.php";?>



<title>Dodaj člana stručnog štaba</title>

<?php
$pageName = basename(__FILE__); 
redirect();
?>

<?php 
$query = "SELECT * from vijesti_savjeti ORDER BY id DESC limit 1";
$result = mysqli_query($connection, $query);
while($row = $result->fetch_assoc()){
    $id = $row['id'];
}
?>

</head>

<body>
    <!-- nav including -->   
    <?php include "includes/adminNav.php";?>
    <div class="container">
        <div class="row justify-content-center">    
            <div class="col-sm-8 col-12 add_news_container my-4">
                <div class="col-sm-12 col-12 my-4">
                    <span class="add_news_title">DODAJ ČLANA (mlađe selekcije)</span>
                </div>
                <form  class="add_news_form">
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="ime">Ime</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <input required type="text" name="ime" id="ime" class="add_news_form_text form-control form-control-lg" maxlength="40">
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="prezime">Prezime</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <input required type="text" name="prezime" id="prezime" class="add_news_form_text form-control form-control-lg" maxlength="40">
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="image">Fotografija</label>
                        </div>
                        <input type="hidden" name="stara_fotografija">
                        <input type="file" required name="fotografija" id="image">
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="pozicija">Pozicija</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <input required type="text" name="pozicija" id="pozicija" class="add_news_form_text form-control form-control-lg" maxlength="50">
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-4 col-12 pl-0">
                            <button class="add_news_btn" type="submit"><i class="far fa-save"></i>&ensp;Sačuvaj trenera</button>
                        </div>
                    </div>   
                </form>
            </div>
        </div>
    </div>


    <?php include "scripts.php"; ?>
  
    <!-- footer including -->
    <?php include "includes/adminFooter.php";?>
