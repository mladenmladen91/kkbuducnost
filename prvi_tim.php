<!-- header including -->
<?php include "includes/header.php" ?>

<title>Prvi tim</title>

</head>
<body>
    
<!-- navigation including -->
<?php include "includes/nav.php"; ?>
    
<?php
  
   $stranica = str_replace('.php','',basename(__FILE__));
  
   include "config.php";
?>     
    
<div class="section content_containter p-4">
    <div class="container">    
        <div class="row justify-content-center">
            <div class="col-lg-4 col-sm-8 text-center crew_heading">
                <span><i class="fas fa-basketball-ball"></i>&ensp;<?php echo $lang['prvi_tim'] ?></span>
            </div>
            <div class="col-lg-9 my-4">
                    <div class="row justify-content-center">
                <?php
                                     $stmtSezone = mysqli_prepare($connection, "SELECT id, ime, prezime, nacionalnost, visina, fotografija, karijera, pozicija, broj, datum_rodjenja FROM prvi_tim");
                                     $stmtSezone->execute();
                                     testQuery($stmtSezone);
                                     $stmtSezone->bind_result($id, $ime, $prezime, $nacionalnost, $visina, $fotografija, $karijera, $pozicija, $broj, $datum_rodjenja);
                                     
                                      while($stmtSezone->fetch()){  
                 ?>        
                       <div class="col-lg-4 col-md-6 m-0 mb-4">
                          <div class="col-lg-12 other_news_container p-0 mx-2" >
                                 <div class="col-lg-12 other_news_container_image p-2" style="position:relative" >
                                     <img class="img-responsive" src="admin/images/igraci/<?php echo $fotografija; ?>" style="max-width:100% !important;" alt="image">
                                     <div class="other_news_container_image_profile" data-toggle="modal" data-target="#igrac<?php echo $id ?>">
                                         <span class="other_news_container_image_profile_span"><?php echo $lang['profil'] ?></span>
                                     </div>
                                 </div>
                                 <div class="col-lg-12 other_news_container_heading p-2" style="height:30px !important">
                                     <span><?php echo $ime; ?>&ensp;<?php echo $prezime; ?></span>
                                 </div>
                                 <div class="col-lg-12 other_news_container_position p-2" style="margin-bottom: 10px;position:relative;">
                                     <span><?php echo strtoupper($pozicija); ?></span><span class="other_news_container_number p-0"><?php echo $broj; ?></span>
                                 </div>
                            </div>
 <!-- POPUP igrac -->

<div class="container">
    <div class="modal fade" id="igrac<?php echo $id ?>">
        <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center py-0">
                       <span class="close" data-dismiss="modal" aria-label="Close">&times;</span>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-4 text-center mb-4">
                                    <img class="img-responsive" src="admin/images/igraci/<?php echo $fotografija; ?>" alt="igrac" style="width:100%; max-height: 200px">
                                </div>
                                <div class="col-8 mb-4 player_info">
                                    <div class="col-lg-12 player_info_header">
                                        <span class="float-left player_info_header_name"><?php echo $ime; ?>&ensp;<?php echo $prezime; ?></span><span class="float-right player_info_header_number"><?php echo $broj; ?></span>
                                    </div>
                                    <div class="col-lg-12 player_info_content">
                                        <span><?php echo $lang['pozicija'] ?>:&ensp;<b><?php echo strtoupper($pozicija); ?></b></span>
                                    </div>
                                    <div class="col-lg-12 player_info_content">
                                        <span><?php echo $lang['datum'] ?>:&ensp;<b><?php echo $newDate = date("d.m.Y", strtotime($datum_rodjenja)) ?></b></span>
                                    </div>
                                    <div class="col-lg-12 player_info_content">
                                        <span><?php echo $lang['nacionalnost'] ?>:&ensp;<b><?php echo strtoupper($nacionalnost); ?></b></span>
                                    </div>
                                    <div class="col-lg-12 player_info_content">
                                        <span><?php echo $lang['visina'] ?>:&ensp;<b><?php echo $visina; ?>cm</b></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
<!-- / poup igrac -->   
                     </div>      
                   <?php } ?>        
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

    
