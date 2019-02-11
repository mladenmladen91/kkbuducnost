<!-- header including -->
<?php include "includes/header.php" ?>

<!-- light gallery including --> 
<link href="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/css/lightgallery.css" rel="stylesheet">

<title>Medija</title>

</head>
<body>
<div class="section" style="color:transparent; font-size:1px; padding:0; margin:0; height:0.5px">a</div>     
<!-- navigation including -->
<?php include "includes/nav.php"; ?>
    
<?php
  
   $stranica = str_replace('.php','',basename(__FILE__));
  
   include "config.php";
?>    
    
<div class="section content_containter p-4">
    <div class="container">    
        <div class="row justify-content-center">
            
            <div class="col-lg-12 media text-center my-4">
                <span class="media_title text-center mx-auto d-block"><?php echo $lang['title'] ?></span>
            </div>
            
            <div class="col-lg-8 game_navigation">
                   <div class="row">
                       <div class="col-lg-6 text-center px-4 game_navigation_next" style="border-right: 2px solid rgb(40, 57, 71)">
                           <span class="game_navigation_dir game_navigation_dir_active float-right" id="izjave" onclick="getStatements($(this))"><?php echo $lang['h1'] ?></span>
                       </div>
                       <div class="col-lg-6 text-center px-4">
                          <span class="game_navigation_dir float-left" onclick="getPhotos($(this))"><?php echo $lang['h2'] ?></span>
                       </div>       
                    </div>       
            </div>
            
            <div class="col-lg-12">
                <div class="row">
                     <div class="col-lg-9 p-4" id="media_container">
                         
                     </div>
                    
                    <div class="col-lg-3 p-4">
                        <div class="col-lg-12 media_contact p-4 mb-4">
                            <div class="col-lg-12">
                                <span class="media_contact_title"><?php echo $lang['h3'] ?></span>
                            </div>
                            <div class="col-lg-12 mt-4">
                                <span class="media_contact_info"><img src="images/tel.svg" class="img-responsive" style="width:20px">&ensp;+382 20 664 225</span>
                            </div>
                            <div class="col-lg-12 mt-4">
                                <span class="media_contact_info"><img src="images/email.svg" class="img-responsive" style="width:20px">&ensp;office@kkbuducnost.me</span>
                            </div>
                        </div>
                        
                        <div class="col-lg-12 media_contact p-4 mb-4">
                            <div class="col-lg-12 text-center mb-4">
                                <span class="media_logo_title">Logo KK BUDUĆNOST</span>
                            </div>
                            <div class="col-lg-12 text-center mb-4">
                                <img src="images/buducnostvoli.svg" class="img-responsive" width="130">
                            </div>
                            <div class="col-lg-12 text-center mb-4">
                                <span style="font-size: 18px; font-weight:600"><?php echo $lang['preuzmi'] ?>:</span>
                            </div>
                            <div class="col-lg-12 text-center mb-4">
                              <div class="row justify-content-center">   
                                <a class="col-xs-3 media_link p-2" href="images/medijabuducnost.png" target="_blank" title="png logo">
                                     <div class="col-xs-12 col-lg-12 media_icon">
                                      <div class="col-xs-12 text-center py-2">
                                            <img src="images/download.svg" width="16px" class="img-responsive">   
                                        </div>
                                         <div class="col-xs-12 text-center pb-2">
                                            <span style="color:white">.png</span>   
                                        </div>  
                                     </div>
                                </a>
                                <a class="col-xs-3 media_link p-2" href="images/medijakutakbuducnost.jpg" target="_blank" title="jpg logo">
                                     <div class="col-xs-12 col-lg-12 media_icon">
                                      <div class="col-xs-12 text-center py-2">
                                            <img src="images/download.svg" width="16px" class="img-responsive">   
                                        </div>
                                         <div class="col-xs-12 text-center pb-2">
                                            <span style="color:white">.jpg</span>   
                                        </div>  
                                     </div>
                                </a>
                                <a class="col-xs-3 media_link p-2" href="images/medijakutakbuducnost.pdf" target="_blank" title="pdf logo">
                                     <div class="col-xs-12 col-lg-12 media_icon">
                                      <div class="col-xs-12 text-center py-2">
                                            <img src="images/download.svg" width="16px" class="img-responsive">   
                                        </div>
                                         <div class="col-xs-12 text-center pb-2">
                                            <span style="color:white">.pdf</span>   
                                        </div>  
                                              
                                     </div>
                                </a>
                              </div>       
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
     </div>
</div>

    
<?php $pageName = basename(__FILE__); ?>
<!-- scripts including -->
<?php include "scripts.php"; ?>
   
    
<!-- footer including -->
<?php include "includes/footer.php"; ?>

    
