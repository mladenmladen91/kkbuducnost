<!-- header including -->
<?php 

include "includes/header.php";

$connection = mysqli_connect('localhost','root','','kkbuducnost');

  if(!$connection){
  	die('error '.mysqli_error($connection));
  }

if(!isset($_GET['id'])){
       header('location:javascript://history.go(-1)');
}

$id = $_GET['id'];

$stmt = mysqli_prepare($connection, "SELECT a.naslov, a.naslov_en, a.tekst, a.tekst_en, a.datum, a.fotografija, b.id, b.naziv FROM vijesti a JOIN kategorija b ON a.kategorija_id = b.id WHERE a.id=? AND a.aktivno='aktivan'");
$stmt->bind_param('i', $id);
$stmt->execute();
testQuery($stmt);
$stmt->bind_result($naslov, $naslov_en, $tekst, $tekst_en, $datum, $fotografija, $kategorija_id, $kategorija);
mysqli_stmt_store_result($stmt);
$rows = mysqli_stmt_num_rows($stmt);
$stmt->fetch();
$stmt->close();

//redirecting if id not found
if($rows <= 0){
    header("location: 404.php");
}
?>

<title>Članak</title>

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
            <div class="col-lg-9">
                <div class="col-lg-12 px-2 mt-4 px-4">
                    <div class="col-lg-12">
                         <img class="img-responsive" src="admin/images/vijesti/<?php echo $fotografija ?>" style="width:100%; max-height: 400px; object-fit:cover; object-position:top">
                    </div>
                    <div class="col-lg-12" class="article" style="margin:40px 0;">
                        <span class="article_title"><?php echo ($_SESSION['lang'] === 'en')? $naslov_en :$naslov ?></span><br>
                        <div class="col-lg-12 p-0 mt-4" style="margin-bottom: 50px;">
                           <span class="article_date"><i class="fas fa-calendar-alt"></i>&ensp;<?php echo $newDate = date("d.m.Y", strtotime($datum)) ?></span>
                        </div>
                        <div class="col-lg-12 p-0 article_container" style="margin-bottom: 40px;">
                            <?php echo ($_SESSION['lang'] === 'en')? $tekst_en :$tekst ?>
                        </div>
                        <div class="col-lg-12 p-0">
                            <span style="font-weight:600; font-size:1.8rem;"><?php echo $lang['tagovi'] ?>:</span>
                        </div>
                        <div class="col-lg-12 p-0 my-4">
                            <?php
                             $stmtTagovi = mysqli_prepare($connection, "SELECT a.id, a.naziv FROM tagovi a JOIN tag_vijest b ON a.id=b.tag_id WHERE b.vijest_id=?");
                             $stmtTagovi->bind_param('i', $_GET['id']);
                             $stmtTagovi->execute();
                             testQuery($stmtTagovi);
                             $stmtTagovi->bind_result($tagid, $tagNaziv);  
                             
                             while($stmtTagovi->fetch()){  
                          ?>
                            <a href="tagovi.php?id=<?php echo $tagid ?>"><span class="article_tag"><?php echo $tagNaziv ?></span>
                         <?php }
                            $stmtTagovi->close();    
                         ?>      
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 my-4">
                    <div class="row">
                       <div class="col-lg-12 mb-4">
                          <span class="article_similar"><?php echo $lang['clanci'] ?></span> 
                       </div>
                       <div class="col-lg-12 p-0">
                        <div class="row p-0">
                     <?php
                         $stmt = "SELECT a.id, a.naslov, a.naslov_en, a.datum, a.fotografija, b.naziv FROM vijesti a JOIN kategorija b ON a.kategorija_id = b.id WHERE NOT a.id={$_GET['id']} AND a.aktivno='aktivan' AND b.naziv= '{$kategorija}' ORDER BY a.datum DESC LIMIT 3";
                         $result = mysqli_query($connection, $stmt);
                         testQuery($result);
                         
                         while($row = mysqli_fetch_assoc($result)){
  
                     ?>        
                        <div class="col-lg-4 col-md-6 m-0 mb-4">
                          <a href="clanak.php?id=<?php echo $row['id'] ?>" title="<?php echo ($_SESSION['lang'] === 'en')? $row['naslov_en'] :$row['naslov'] ?>">    
                            <div class="col-lg-12 other_news_container other_news_container_hover p-0 mx-2">
                                 <div class="col-lg-12 other_news_container_image p-2">
                                     <img class="img-responsive" src="admin/images/vijesti/<?php echo $row['fotografija'] ?>" alt="image">
                                 </div>
                                 <div class="col-lg-12 other_news_container_heading" style="height:90px !important">
                                     <span><?php echo ($_SESSION['lang'] === 'en')? $row['naslov_en'] :$row['naslov'] ?></span>
                                 </div>
                                 <div class="col-lg-12 other_news_container_date">
                                     <span><i class="fas fa-calendar-alt"></i>&ensp;<?php echo $newDate = date("d.m.Y", strtotime($row['datum'])); ?></span>
                                 </div>
                            </div>
                           </a>      
                        </div>
                    <?php } ?>        
                       </div>        
                       </div>  
                        
                    </div>
                </div>
                
                  
            </div>
            <!-- sidebar including -->
            <div class="col-lg-3 p-2">
                <?php include "includes/sidebar.php" ?>
            </div>
            <!-- /sidebar including -->
 
            </div>
          
                  
                </div>
        </div>

    
<?php $pageName = basename(__FILE__); ?>
<!-- scripts including -->
<?php include "scripts.php"; ?>

<!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5bb23db80f2abc3e"></script>    
    
<!-- footer including -->
<?php include "includes/footer.php"; ?>

    
