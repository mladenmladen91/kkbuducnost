

<?php include "includes/adminHeader.php";?>



<title>Dodaj video</title>

<?php
$pageName = basename(__FILE__); 
redirect();
?>


</head>

<body>
    <!-- nav including -->   
    <?php include "includes/adminNav.php";?>
    <div class="container">
        <input type="hidden" class="tableName" value="video">
        <input type="hidden" class="pageName" value="sacuvajVideo">
        <div class="row justify-content-center">    
            <div class="col-sm-8 col-12 add_news_container my-4">
                <div class="col-sm-12 col-12 my-4">
                    <span class="add_news_title">DODAJ VIDEO</span>
                </div>
                <form  class="add_news_form">
                    <input type="hidden" name="table" value="rezultati">
                     <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="link">Link(* U dijelu share opcija embed kopirajte sadržaj unutar iframe elementa)</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <textarea required name="link" id="link" class="add_news_form_text form-control form-control-lg" maxlength="400"></textarea>
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="naslov">Naslov</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <input required type="text" name="naslov" id="naslov" class="add_news_form_text form-control form-control-lg" maxlength="40">
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
                        <div class="col-sm-4 col-12 pl-0">
                            <button class="add_news_btn" type="submit"><i class="fas fa-plus"></i>&ensp;Dodaj video</button>
                        </div>


                    </div>   
                </form>
            </div>
        </div>
    </div>


    <?php include "scripts.php"; ?>
    
 
  
    <!-- footer including -->
    <?php include "includes/adminFooter.php";?>
