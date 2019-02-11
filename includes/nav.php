<?php
  
   $stranica = str_replace('.php','',basename(__FILE__));
  
   include "config.php";
?>
<div class="container-fluid" id="navbar" style="z-index:3000">
<div class="row justify-content-center">    
<nav class="col-xl-10 col-lg-10 navbar navbar-expand-xl nav_container" >
    <div class="brand_holder" style="position:relative; display:none">  
    <a class="navbar-brand" href="index.php"><img class="img-responsive" src="images/buducnostvoli.svg" height="80" width="80" alt="kk budućnost"></a>
    <a href="<?php echo $_SERVER["PHP_SELF"] ?>?lang=me" class="language_link language_link_me <?php echo ($_SESSION['lang']=== 'me')? 'language_link_active':'' ?>" style="position:absolute; left:3; top:80;padding: 1px !important">ME</a>
    <a href="<?php echo $_SERVER["PHP_SELF"] ?>?lang=en" class="language_link language_link_en <?php echo ($_SESSION['lang']=== 'en')? 'language_link_active':'' ?> language_link_en" style="position:absolute; left:52; top:80;padding: 1px !important">EN</a>    
    </div>    
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="ham2"></span>
      </button>
      <div class="col-lg-12 collapse navbar-collapse justify-content-center nav_collapse_container" id="navbarsExample01">
        <ul class="navbar-nav nav_container_links text-center">
          <li class="nav-item">
            <a class="nav-link nav-link_active index" href="index.php"><?php echo $lang['NASLOVNA'] ?></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $lang['EKIPA'] ?></a>
            <div class="dropdown-menu nav_dropdown-menu text-center p-0" aria-labelledby="dropdown01">
                <a class="dropdown-item f-s-10 strucni_stab" href="strucni_stab.php"><span><?php echo $lang['strucni_stab'] ?></span></a>
                <a class="dropdown-item prvi_tim" href="prvi_tim.php"><span><?php echo $lang['prvi_tim'] ?></span></a>
                <a class="dropdown-item staff" href="staff.php"><span><?php echo $lang['osoblje'] ?></span></a>
                <a class="dropdown-item selekcije" href="selekcije.php"><span><?php echo $lang['mladje_selekcije'] ?></span></a>
                <a class="dropdown-item juniori" href="juniori.php"><span><?php echo $lang['juniori'] ?></span></a> 
                <a class="dropdown-item kadeti" href="kadeti.php"><span><?php echo $lang['kadeti'] ?></span></a>   
                <a class="dropdown-item pioniri" href="pioniri.php"><span><?php echo $lang['pioniri'] ?></span></a>
                <a class="dropdown-item rezultati" href="rezultati.php"><span><?php echo $lang['rezultati'] ?></span></a>  
                <a class="dropdown-item tabele" href="tabele.php"><span><?php echo $lang['tabele'] ?></span></a>
                <a class="dropdown-item kalendar" href="kalendar.php"><span><?php echo $lang['kalendar'] ?></span></a>      
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $lang['VIJESTI'] ?></a>
            <div class="dropdown-menu nav_dropdown-menu text-center p-0" aria-labelledby="dropdown01">
                <a class="dropdown-item f-s-10 klub" href="klub.php"><span><?php echo $lang['klub'] ?></span></a>
                <a class="dropdown-item aba" href="aba.php"><span><?php echo $lang['aba'] ?></span></a>
                <a class="dropdown-item euroleague" href="euroleague.php"><span>Euroleague</span></a>
                <a class="dropdown-item eurocup" href="eurocup.php"><span>EuroCup</span></a>
                <a class="dropdown-item prvaliga" href="prvaliga.php"><span><?php echo $lang['prva_liga'] ?></span></a>
                <a class="dropdown-item ostalo" href="ostalo.php"><span><?php echo $lang['ostalo'] ?></span></a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $lang['MULTIMEDIJA'] ?></a>
            <div class="dropdown-menu nav_dropdown-menu text-center p-0" aria-labelledby="dropdown01">
                <a class="dropdown-item f-s-10 video" href="video.php"><span><?php echo $lang['video'] ?></span></a>
                <a class="dropdown-item fotografije_takmicenja" href="fotografije_takmicenja.php"><span><?php echo $lang['foto_takmicenja'] ?></span></a>
                <a class="dropdown-item fotografije_ostalo" href="fotografije_ostalo.php"><span><?php echo $lang['foto_ostalo'] ?></span></a>
             </div>
          </li>
          <li class="nav-item logo_holder" style="padding-top: 1px !important; position:relative; padding:0 40px;">
            <a class="navbar-brand logo_sign" href="index.php"><img style="position:absolute; top:-42; left:20; z-index: 1000" class="img-responsive" src="images/buducnostvoli.svg" height="80" width="80" alt="kk budućnost"></a>
            <a href="<?php echo $_SERVER["PHP_SELF"] ?>?lang=me" class="language_link <?php echo ($_SESSION['lang']=== 'me')? 'language_link_active':'' ?>" style="position:absolute; left:5; bottom:-13">ME</a>
            <a href="<?php echo $_SERVER["PHP_SELF"] ?>?lang=en" class="language_link <?php echo ($_SESSION['lang']=== 'en')? 'language_link_active':'' ?>" style="position:absolute; right:5; bottom:-13">EN</a>
          </li>    
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $lang['UPRAVA'] ?></a>
            <div class="dropdown-menu nav_dropdown-menu text-center p-0" aria-labelledby="dropdown01">
                <a class="dropdown-item upravni_odbor" href="upravni_odbor.php"><span><?php echo $lang['upravni_odbor'] ?></span></a>
                <a class="dropdown-item menadzment" href="menadzment.php"><span><?php echo $lang['menadzment'] ?></span></a>
             </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $lang['KLUB'] ?></a>
            <div class="dropdown-menu nav_dropdown-menu text-center p-0" aria-labelledby="dropdown01">
                <a class="dropdown-item istorijat" href="istorijat.php"><span><?php echo $lang['istorija'] ?></span></a>
                <a class="dropdown-item prostorije" href="prostorije.php"><span><?php echo $lang['prostorije'] ?></span></a>
                <a class="dropdown-item trofeji" href="trofeji.php"><span><?php echo $lang['trofeji'] ?></span></a>    
             </div>
          </li>
          <li class="nav-item">
            <a class="nav-link medija_kutak" href="medija_kutak.php"><?php echo $lang['MEDIJA'] ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link karte" href="karte.php"><?php echo $lang['KARTE'] ?></a>
          </li>    
        </ul>
       </div>
   </nav>
</div>
</div>
<?php $basename = str_replace('.php', '', basename($_SERVER["PHP_SELF"])) ?>
<script>
    $(document).ready(function(){
        var pageName = "<?php echo $basename; ?>";
        
        $(".nav-link_active").removeClass("nav-link_active");
        $("."+pageName).addClass("nav-link_active");
        $("."+pageName).closest(".dropdown").find('.dropdown-toggle').addClass("nav-link_active");
        
        $('.navbar-toggler').click(function(e){
             e.preventDefault();
  	         $(this).toggleClass("transX");
 
         });
        
       });
       window.onscroll = function() {myFunction()};

       var navbar = document.getElementById("navbar");
       var sticky = navbar.offsetTop;

       function myFunction() {
          if (window.pageYOffset >= sticky) {
                navbar.classList.add("sticky");
              if($(window).width() > 451){
                $(".language_link_en").css({
                    "top": 35,
                    "left": 130
                });
                $(".language_link_me").css({
                    "top": 35,
                    "left": 90
                });
                $(".brand_holder").css({"padding-bottom": 0});  
              }
          } else {
               navbar.classList.remove("sticky");
               $(".language_link_en").css({
                    "top": 80,
                    "left": 52
                });
                $(".language_link_me").css({
                    "top": 80,
                    "left": 3
                });
              $(".brand_holder").css({"padding-bottom": 20});
          }
} 
    
</script>