<?php
  
   $stranica = str_replace('.php','',basename(__FILE__));
  
   include "config.php";
?>
<div class="container-fluid">
<div class="row justify-content-center">    
<nav class="col-xl-10 col-lg-10 navbar navbar-expand-xl mb-3 nav_container">
    <div class="brand_holder" style="padding-bottom: 40px" style="position:relative; display:none">  
    <a class="navbar-brand" href="index.php"><img class="img-responsive" src="images/buducnostvoli.svg" height="100" width="100" alt="kk budućnost"></a>
    <a href="<?php echo basename($_SERVER["PHP_SELF"]) ?>?lang=me" class="language_link <?php echo ($_SESSION['lang']=== 'me')? 'language_link_active':'' ?>" style="position:absolute; left:5; top:110;padding: 3px !important">ME</a>
    <a href="<?php echo basename($_SERVER["PHP_SELF"]) ?>?lang=en" class="language_link <?php echo ($_SESSION['lang']=== 'en')? 'language_link_active':'' ?>" style="position:absolute; left:81; top:110;padding: 3px !important">EN</a>    
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
              <a class="dropdown-item f-s-10 strucni_stab" href="strucni_stab.php"><?php echo $lang['strucni_stab'] ?></a>
              <a class="dropdown-item prvi_tim" href="prvi_tim.php"><?php echo $lang['prvi_tim'] ?></a>
              <a class="dropdown-item staff" href="staff.php"><?php echo $lang['osoblje'] ?></a>
              <a class="dropdown-item selekcije" href="selekcije.php"><?php echo $lang['mladje_selekcije'] ?></a>
              <a class="dropdown-item juniori" href="juniori.php"><?php echo $lang['juniori'] ?></a> 
              <a class="dropdown-item kadeti" href="kadeti.php"><?php echo $lang['kadeti'] ?></a>   
              <a class="dropdown-item pioniri" href="pioniri.php"><?php echo $lang['pioniri'] ?></a>
              <a class="dropdown-item rezultati" href="rezultati.php"><?php echo $lang['rezultati'] ?></a>  
              <a class="dropdown-item tabele" href="tabele.php"><?php echo $lang['tabele'] ?></a>
              <a class="dropdown-item kalendar" href="kalendar.php"><?php echo $lang['kalendar'] ?></a>      
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $lang['VIJESTI'] ?></a>
            <div class="dropdown-menu nav_dropdown-menu text-center p-0" aria-labelledby="dropdown01">
              <a class="dropdown-item f-s-10" href="klub.php"><?php echo $lang['klub'] ?></a>
              <a class="dropdown-item aba" href="aba.php"><?php echo $lang['aba'] ?></a>
              <a class="dropdown-item euroleague" href="euroleague.php">Euroleague</a>
              <a class="dropdown-item eurocup" href="eurocup.php">EuroCup</a>
              <a class="dropdown-item prvaliga" href="prvaliga.php"><?php echo $lang['prva_liga'] ?></a>
              <a class="dropdown-item ostalo" href="ostalo.php"><?php echo $lang['ostalo'] ?></a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $lang['MULTIMEDIJA'] ?></a>
            <div class="dropdown-menu nav_dropdown-menu text-center p-0" aria-labelledby="dropdown01">
              <a class="dropdown-item f-s-10 video" href="video.php"><?php echo $lang['video'] ?></a>
              <a class="dropdown-item fotografije_takmicenja" href="fotografije_takmicenja.php"><?php echo $lang['foto_takmicenja'] ?></a>
              <a class="dropdown-item fotografije_ostalo" href="fotografije_ostalo.php"><?php echo $lang['foto_ostalo'] ?></a>
             </div>
          </li>
          <li class="nav-item logo_holder" style="padding-top: 1px !important; position:relative; padding:0 40px;">
            <a class="navbar-brand" href="index.php"><img style="position:absolute; top:-42; left:20; z-index: 1000" class="img-responsive" src="images/buducnostvoli.svg" height="80" width="80" alt="kk budućnost"></a>
            <a href="<?php echo basename($_SERVER["PHP_SELF"]) ?>?lang=me" class="language_link <?php echo ($_SESSION['lang']=== 'me')? 'language_link_active':'' ?>" style="position:absolute; left:5; bottom:-13">ME</a>
            <a href="<?php echo basename($_SERVER["PHP_SELF"]) ?>?lang=en" class="language_link <?php echo ($_SESSION['lang']=== 'en')? 'language_link_active':'' ?>" style="position:absolute; right:5; bottom:-13">EN</a>
          </li>    
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $lang['UPRAVA'] ?></a>
            <div class="dropdown-menu nav_dropdown-menu text-center p-0" aria-labelledby="dropdown01">
              <a class="dropdown-item upravni_odbor" href="upravni_odbor.php"><?php echo $lang['upravni_odbor'] ?></a>
              <a class="dropdown-item menadzment" href="menadzment.php"><?php echo $lang['menadzment'] ?></a>
             </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $lang['KLUB'] ?></a>
            <div class="dropdown-menu nav_dropdown-menu text-center p-0" aria-labelledby="dropdown01">
              <a class="dropdown-item istorijat" href="istorijat.php"><?php echo $lang['istorija'] ?></a>
              <a class="dropdown-item prostorije" href="prostorije.php"><?php echo $lang['prostorije'] ?></a>
              <a class="dropdown-item trofeji" href="trofeji.php"><?php echo $lang['trofeji'] ?></a>    
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

</script>