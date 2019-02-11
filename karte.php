<!-- header including -->
<?php include "includes/header.php" ?>

<script src='https://www.google.com/recaptcha/api.js'></script>

<title>Karte</title>

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
            
            <div class="col-lg-12 ticket text-center my-4">
                <span class="ticket_title text-center mx-auto d-block"><?php echo $lang['h1'] ?> </span>
            </div>
            <div class="col-lg-8 ticket_span text-center">
                <?php echo $lang['p1'] ?><a href="mailto:office@kkbuducnost.me" style=" color: rgb(0, 75, 147); text-decoration:none;">vuk.pejovic@kkbuducnost.me</a>
            </div>
            <div class="col-lg-12 ticket text-center mt-4" style="margin-bottom: 50px;">
                <span class="ticket_title text-center mx-auto d-block"><?php echo $lang['h2'] ?></span>
            </div>
            <div class="col-lg-10 px-4" style="margin-bottom: 70px">
             <div class="row p-0">
                  
              <div class="col-lg-6">
              <form id="ticketForm">      
                <div class="row justify-content-center">
                    
                    <div class="col-lg-6 px-2">
                        <input class="ticket_input ticket_input_text" type="text" placeholder="<?php echo $lang['ime'] ?>" name="name">
                    </div>
                    <div class="col-lg-6 px-2">
                        <input class="ticket_input ticket_input_text" type="email" placeholder="<?php echo $lang['email'] ?>" name="email">
                    </div>
                    <div class="col-lg-12 text-center px-2">
                        <textarea rows="6" cols="50" class="ticket_input ticket_input_area" name="message" placeholder="<?php echo $lang['message'] ?>"></textarea>
                    </div>
                    <div class="col-lg-12 text-center px-2">
                        <div class="g-recaptcha" data-sitekey="6LfdGoUUAAAAABoxR9nCn3_-06cj_5qwyT-94ZCp"></div>
                    </div>
                    <div class="col-lg-12 text-center">
                        <span id="result_message" style="font-size:14px; color: red"></span>
                    </div>
                    <div class="col-lg-12 text-center">
                        <button class="ticket_input_button sponsor_hover" type="submit"><?php echo $lang['send'] ?></button>
                    </div>
                       
                </div>
                </form>  
              </div>
            
              <div class="col-lg-6">
                 <div class="col-lg-12 ticket_info_title">
                 KK BUDUĆNOST VOLI  
                 </div>
                 <div class="col-lg-12 ticket_info my-4">
                    <div class="col-lg-12 p-0 mb-4"> 
                     <div class="row">
                         <div class="col-lg-2 py-2">
                          <img src="images/tel.svg" class="img-responsive" width="33px;">
                         </div>
                         <div class="col-lg-6" style="text-align:left">
                             <span class="ticket_info_text">+382 20 664 225</span><br>
                             <span class="ticket_info_text">+382 20 664 226</span>
                         </div>
                     </div>
                    </div>
                     
                    <div class="col-lg-12 p-0 mb-4"> 
                     <div class="row">
                         <div class="col-lg-2">
                          <img src="images/fax.svg" class="img-responsive" width="33px;">
                         </div>
                         <div class="col-lg-6" style="text-align:left">
                             <span class="ticket_info_text">+382 20 664 226</span>
                        </div>
                     </div>
                    </div> 
                     
                    <div class="col-lg-12 p-0 mb-4"> 
                     <div class="row">
                         <div class="col-lg-2 py-2">
                          <img src="images/location.svg" class="img-responsive" width="33px;">
                         </div>
                         <div class="col-lg-6" style="text-align:left">
                             <span class="ticket_info_text">Njegošev Park BB, Podgorica, Crna Gora</span>
                        </div>
                     </div>
                    </div>
                     
                    <div class="col-lg-12 p-0 mb-4"> 
                     <div class="row">
                         <div class="col-lg-2">
                          <img src="images/email.svg" class="img-responsive" width="33px;">
                         </div>
                         <div class="col-lg-6" style="text-align:left">
                             <span class="ticket_info_text">office@kkbuducnost.me</span>
                        </div>
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
    
<script>
 $("#ticketForm").submit(function(e){
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            
            $.ajax({
                url: 'ajaxRequests/getTickets.php',
                type: 'POST',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function (returndata) {
                       $("#result_message").text(returndata);
                }
                
            });
    });      
    
    
</script>    
   
    
<!-- footer including -->
<?php include "includes/footer.php"; ?>

    
