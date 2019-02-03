<?php include "includes/adminHeader.php";?>

<title>Pregled vijesti</title>

<?php
        $pageName = basename(__FILE__);
    
        if(!isset($_GET['id'])){
          header('location:javascript://history.go(-1)');
        }

       $id = $_GET['id'];

       redirect();

        $stmt = mysqli_prepare($connection, "SELECT a.naslov, a.tekst, a.datum, a.fotografija, b.naziv FROM vijesti a JOIN kategorija b ON a.kategorija_id = b.id  WHERE a.id=?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        testQuery($stmt);
        $stmt->bind_result($naslov, $tekst, $datum, $fotografija, $kategorija);
        $stmt->fetch();
        
 ?>



</head>

<body>
    <!-- nav including -->
    <?php include "includes/adminNav.php";?>
    <div class="container">
        <div class="row justify-content-center">

            <!-- KORISNIK -->
            <div class="col-12 col-md-10 mt-4" style="margin-bottom:150px">
                <div class="show_border">
                    <div class="col-md-12 pt-1 py-3">
                        <span class="show_title"><?php echo $naslov ?></span>
                    </div>
                    
                    
                    <div class="col-md-12 mb-2">
                        <p class="show_paragraph mb-0">Fotografija</p>
                        <img src="images/vijesti/<?php echo $fotografija ?>" alt="slika" style="max-width: 100px;">
                    </div>
                    
                    <div class="col-md-12 mb-2">
                        <p class="show_paragraph mb-0">Tekst objave</p>
                        <span class="show_span"><?php echo $tekst ?></span>
                    </div>
                    <div class="col-md-12 mb-2">
                        <p class="show_paragraph mb-0">Datum</p>
                        <span class="show_span"><?php echo $datum ?></span>
                    </div>
                    
                    <div class="col-md-12 text-center py-3">
                        <div class="col-md-6 offset-md-3">
                            <a href="izmijeniVijest.php?id=<?php echo $id; ?>" class="btn btn-lg dodajTalenat" style="background-color:#13A89E;">
                                <i class="far fa-edit"></i>&ensp;Izmijeni vijest
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "scripts.php"; ?>
    
    <!-- footer including -->
    <?php include "includes/adminFooter.php";?>
