<div class="container-fluid nav_holder px-4">
<div class="row justify-content-center">    
<nav class="col-xl-12 col-lg-12 navbar navbar-expand-xl mb-3 nav_admin_container">
      <a class="navbar-brand" href="../index.php"><img class="img-responsive" src="../images/buducnostvoli.svg" height="100" width="100" alt="kk budućnost"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="admin_ham2"></span>
      </button>
      <div class="col-lg-12 collapse navbar-collapse justify-content-center nav_collapse_container" id="navbarsExample01">
        <ul class="navbar-nav nav_admin_container_links text-center">
            <li class="nav-item">
            <a class="nav-link timovi" href="timovi.php">TIMOVI</a>
          </li>   
           <li class="nav-item dropdown admin_dropdown">
            <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">EKIPA</a>
            <div class="dropdown-menu nav_admin_dropdown-menu text-center p-0" aria-labelledby="dropdown01">
              <a class="dropdown-item f-s-10 strucni_stab" href="strucni_stab.php">Stručni štab</a>
              <a class="dropdown-item prvi_tim" href="prvi_tim.php">Prvi tim</a>
              <a class="dropdown-item osoblje" href="osoblje.php">Medicinski tim i osoblje</a>
              <a class="dropdown-item mladje_selekcije" href="mladje_selekcije.php">Mlađe selekcije</a>
              <a class="dropdown-item juniori" href="juniori.php">Juniorska selekcija</a> <a class="dropdown-item kadeti" href="kadeti.php">Kadetska selekcija</a>   <a class="dropdown-item pioniri" href="pioniri.php">Pionirska selekcija</a>
              <a class="dropdown-item rezultati" href="rezultati.php">Rezultati</a>  
              <a class="dropdown-item kalendar" href="kalendar.php">Kalendar</a>   <a class="dropdown-item trofeji" href="trofeji.php">Trofeji</a>   
            </div>
          </li>
          <li class="nav-item dropdown admin_dropdown">
            <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">TABELE</a>
            <div class="dropdown-menu nav_admin_dropdown-menu text-center p-0" aria-labelledby="dropdown01">
              <a class="dropdown-item aba" href="aba.php">ABA liga</a>
              <a class="dropdown-item euroleague" href="euroleague.php">Euroleague</a>
              <a class="dropdown-item eurocup" href="eurocup.php">EuroCup</a>
              <a class="dropdown-item cg" href="cg.php">ERSTE prva liga</a>
            </div>
          </li>
          <li class="nav-item dropdown admin_dropdown">
            <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">MULTIMEDIJA</a>
            <div class="dropdown-menu nav_admin_dropdown-menu text-center p-0" aria-labelledby="dropdown01">
              <a class="dropdown-item f-s-10 video" href="video.php">Video galerija</a>
              <a class="dropdown-item album" href="album.php">Albumi</a>
              
             </div>
          </li>
            
          <li class="nav-item dropdown admin_dropdown">
            <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">MARKETING</a>
            <div class="dropdown-menu nav_admin_dropdown-menu text-center p-0" aria-labelledby="dropdown01">
              <a class="dropdown-item f-s-10 sponzori" href="sponzori.php">SPONZORI</a>
              <a class="dropdown-item baneri" href="baneri.php">BANERI</a>
              <a class="dropdown-item newsfeed" href="newsfeed.php">NEWSFEED</a>
             </div>
          </li>    
            
          <li class="nav-item dropdown admin_dropdown">
            <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">UPRAVA</a>
            <div class="dropdown-menu nav_admin_dropdown-menu text-center p-0" aria-labelledby="dropdown01">
              <a class="dropdown-item upravni_odbor" href="upravni_odbor.php">Upravni odbor</a>
              <a class="dropdown-item menadzment" href="menadzment.php">Menadžment</a>
             </div>
          </li>
          
          <li class="nav-item">
            <a class="nav-link mediji" href="mediji.php">MEDIJA KUTAK</a>
          </li>
          <li class="nav-item">
            <a class="nav-link vijesti" href="vijesti.php">VIJESTI</a>
          </li>
            
          <li class="nav-item">
            <a class="nav-link podesavanje" href="podesavanje.php">PODEŠAVANJE</a>
          </li>     
            
          <li class="nav-item" >
            <a class="nav-link signout_btn" href="index.php?signout=izloguj">ODJAVI SE</a>
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
        
        $(".nav-admin_link_active").removeClass("nav-admin_link_active");
        $("."+pageName).addClass("nav-admin_link_active");
        $("."+pageName).closest(".dropdown").find('.dropdown-toggle').addClass("nav-admin_link_active");
    });

</script>