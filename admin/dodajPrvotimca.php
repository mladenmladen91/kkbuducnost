

<?php include "includes/adminHeader.php";?>



<title>Dodaj igrača</title>

<?php
$pageName = basename(__FILE__); 
redirect();
?>


</head>

<body>
    <!-- nav including -->   
    <?php include "includes/adminNav.php";?>
    <div class="container">
        <div class="row justify-content-center">    
            <div class="col-sm-8 col-12 add_news_container my-4">
                <div class="col-sm-12 col-12 my-4">
                    <span class="add_news_title">DODAJ IGRAČA (prvi tim)</span>
                </div>
                <form class="add_news_form">
                    <input type="hidden" class="tableName" value="prvi_tim">
                    <input type="hidden" class="pageName" value="sacuvajPrvotimca">
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="ime">Ime</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <input required type="text" name="ime" id="ime" class="add_news_form_text form-control form-control-lg" maxlength="25">
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="prezime">Prezime</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <input required type="text" name="prezime" id="prezime" class="add_news_form_text form-control form-control-lg" maxlength="25">
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
                            <label class="news_form_label" for="image">Fotografija</label>
                        </div>
                        <input type="file" required name="fotografija" id="image">
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="nacionalnost">Nacionalnost</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <input required type="text" name="nacionalnost" id="nacionalnost" class="add_news_form_text form-control form-control-lg" maxlength="10">
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="pozicija">Pozicija</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <input required type="text" name="pozicija" id="pozicija" class="add_news_form_text form-control form-control-lg" maxlength="15">
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="visina">Visina (cm)</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <input type="number" name="visina" id="visina" class="add_news_form_text form-control form-control-lg" min="1" max="300" required>
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="text1">Karijera</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <textarea name="karijera" id="text1" class="add_news_form_textarea" required></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="row">
                            <div class="col-sm-12 col-12">
                                <label class="news_form_label">Datum rođenja</label> 
                            </div>   
                            <div class="col-sm-6 col-6">
                                <input type="date" name="datum_rodjenja" id="datum" class="add_news_form_text form-control form-control-lg" required>
                            </div>
                            <div class="col-sm-2 col-2 pl-0">
                                <label class="news_form_label" for="datum"><i style="font-size:35px" class="fas fa-calendar-alt"></i></label>
                            </div>
                        </div>       
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-4 col-12 pl-0">
                            <button class="add_news_btn" type="submit"><i class="far fa-save"></i>&ensp;Sačuvaj člana</button>
                        </div>


                    </div>   
                </form>
            </div>
        </div>
    </div>

<!-- scripts including -->
<?php include "scripts.php"; ?>

  
<!-- footer including -->
<?php include "includes/adminFooter.php";?>
