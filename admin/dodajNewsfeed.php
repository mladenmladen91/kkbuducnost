<?php include "includes/adminHeader.php";?>

<script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/classic/ckeditor.js"></script>

<title>Dodaj newsfeed</title>

<?php
$pageName = basename(__FILE__); 
redirect();
?>



</head>

<body>
    <!-- nav including -->   
    <?php include "includes/adminNav.php";?>
    <div class="container">
        <input type="hidden" class="tableName" value="newsfeed">
        <input type="hidden" class="pageName" value="sacuvajNewsfeed">
        <div class="row justify-content-center">    
            <div class="col-sm-10 col-12 add_news_container my-4">
                <div class="col-sm-12 col-12 my-4">
                    <span class="add_news_title">DODAJ NEWSFEED</span>
                </div>
                <form  class="add_news_form">
                    <input type="hidden" name="table" value="newsfeed">
                   <div class="col-sm-12 col-12 form-group my-4">
                        <div class="row">
                            <div class="col-sm-12 col-12">
                                <label class="news_form_label">Datum</label> 
                            </div>   
                            <div class="col-sm-3 col-6">
                                <input type="date" name="datum" id="datum" class="add_news_form_text form-control form-control-lg" required>
                            </div>
                            <div class="col-sm-2 col-2 pl-0">
                                <label class="news_form_label" for="datum"><i style="font-size:35px" class="fas fa-calendar-alt"></i></label>
                            </div>
                        </div>       
                    </div>
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-6 col-12 pl-0">
                            <label class="news_form_label" for="tekst">Tekst objave</label>
                        </div>
                        <div class="col-sm-12 col-12 pl-0">
                            <textarea name="tekst" id="text1" class="add_news_form_textarea" ></textarea>
                        </div>
                    </div>
                    
                
                    
                    <div class="col-sm-12 col-12 form-group my-4">
                        <div class="col-sm-4 col-12 pl-0">
                            <button class="add_news_btn" type="submit"><i class="far fa-save"></i>&ensp;Sačuvaj newsfeed</button>
                        </div>


                    </div>   
                </form>
            </div>
        </div>
    </div>


   <script>
			ClassicEditor
				.create( document.querySelector( '#text1' ) )
				.then( editor => {
					console.log( editor );
				} )
				.catch( error => {
					console.error( error );
				} );
       
		</script>
   


    <?php include "scripts.php"; ?>
  
    <!-- footer including -->
    <?php include "includes/adminFooter.php";?>
