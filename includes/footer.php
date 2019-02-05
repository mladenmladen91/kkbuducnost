<?php
  
   $stranica = str_replace('.php','',basename(__FILE__));
  
   include "config.php";
?>

<div class="container-fluid footer">
    <div class="row justify-content-center">
        <div class="col-lg-10 text-center footer_nav">
         <ul>
             <li><a href="index.php"><?php echo $lang['naslovna'] ?></a></li>
             <li><a href="aba.php">ABA</a></li>
             <li><a href="kalendar.php"><?php echo $lang['kalendar'] ?></a></li>
             <li><a href="rezultati.php"><?php echo $lang['rezultati'] ?></a></li>
             <li><a href="tabele.php"><?php echo $lang['tabele'] ?></a></li>
             <li><a href="prvi_tim.php"><?php echo $lang['prvi_tim'] ?></a></li>
             <li><a href="upravni_odbor.php"><?php echo $lang['upravni_odbor'] ?></a></li>
             <li><a href="fotografije_takmicenja.php"><?php echo $lang['galerija'] ?></a></li> 
         </ul>
        </div>
        <div class="col-lg-8 my-4 footer_newsletter">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-sm-6 text-center my-2">
                    <span class="footer_newsletter_span"><?php echo $lang['newsletter'] ?>:</span>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <input type="email" placeholder="<?php echo $lang['email'] ?>" class="footer_newsletter_form" id="newsfeed_mail"><a href="#" style="width: 15%;" id="mailClick">
						<img style="height:32px;cursor:pointer; margin-bottom:3px" src="images/avioncic.svg">
					</a>
                    <div class="col-lg-12"><span id="newsfeed_span" style="color:red; font-size: 10px; font-weight:600"></span></div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 my-4">
            <div class="row">
                <div class="col-lg-6 text-center p-2 mb-4">
                    <span class="footer_newsletter_span" style="font-size: 14px !important"><?php echo $lang['pratite'] ?>:</span>     
                </div>
                <div class="col-lg-6 text-center">
                    <a target="_blank" href="https://www.facebook.com/KkBuducnostVoli/">
				        <img src="images/fb.svg" class="img-circle circleimg" style="width: 35px;margin-right: 0px;">					
				    </a>
                    <a target="_blank" href="https://www.instagram.com/buducnostvoli/?hl=en">
				        <img src="images/instagram.svg" class="img-circle circleimg" style="width: 35px; margin-left: 10px;">				
				   </a>
                   <a target="_blank" href="https://twitter.com/KKBuducnostVOLI">
							<img src="images/tw.svg" class="img-circle circleimg" style="width: 35px; margin-left: 10px;">				
				  </a>    
                </div>
            </div>
        </div>
        <div class="col-lg-10 text-center mt-4">
            <span class="footer_newsletter_span" style="font-size: 14px !important; text-align:center">&copy;All rights reserved <?php echo date("Y"); ?> Budućnost VOLI, Powered by <b style="font-weight:600">Amplitudo</b></span>
        </div>
    </div>
</div>    

<?php $pageName = basename(__FILE__); ?>
<!-- scripts including -->
<?php include "scripts.php"; ?>

<script>
 $(document).ready(function(){
     // processing newsfeed
    $("#mailClick").click(function(e){
        e.preventDefault();
        console.log("test");
        var mail = $("#newsfeed_mail").val();
        
        $.ajax({
          url: 'ajaxRequests/newsfeed.php',
          type: 'POST',
          data: 'mail='+mail,
          success: function (data) {
              $("#newsfeed_span").html(data);
          }
      });
    });
 });

</script>

</body>    
</html>