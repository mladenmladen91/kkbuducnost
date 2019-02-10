<!-- header including -->
<?php include "includes/header.php" ?>

<title>EUROCUP</title>

</head>
<body>
<div class="section" style="color:transparent; font-size:1px; padding:0; margin:0; height:0.5px">a</div>     
<!-- navigation including -->
<?php include "includes/nav.php"; ?>
    
<div class="section content_containter p-4">
    <div class="container">    
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="col-lg-12 p-2 mt-4">
                  <div class="row justify-content-center">
                    <div class="col-lg-8 p-0"> 
                      <div class="league_category mx-4 mb-4">
                        <span class="category_name">EUROCUP</span>
                      </div>
                      </div>    
                    <div class="col-lg-4 p-0 text-center mb-4">
                        <input class="league_search" type="text" placeholder="pretraga vijesti">
                    </div>
                  </div>      
                </div>
<div class="category_news_container">                 

</div>       
            </div>
            <!-- sidebar including -->
            <div class="col-lg-3 p-4">
                <?php include "includes/sidebar.php" ?>
            </div>
            <!-- /sidebar including -->
 
            </div>
          
                  
                </div>
        </div>

    
<?php $pageName = basename(__FILE__); ?>
<!-- scripts including -->
<?php include "scripts.php"; ?>
    
<!-- footer including -->
<?php include "includes/footer.php"; ?>    
