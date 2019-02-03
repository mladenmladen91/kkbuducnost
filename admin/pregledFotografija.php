<?php include "includes/adminHeader.php";?>


<title>Pregled fotografija</title>

<?php
    $pageName = basename(__FILE__);

    if(!isset($_GET['id'])){
       header('location:javascript://history.go(-1)');
     }

   $id = $_GET['id'];

   redirect();

?>

<!-- light gallery including --> 
<link href="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/css/lightgallery.css" rel="stylesheet">

</head>

<body>
    <!-- nav including -->   
    <?php include "includes/adminNav.php";?>
    <div class="container">
        <input type="hidden" class="player_id" value="<?php echo $id ?>">
        <div class="row justify-content-center player_container">    
            
        </div>
    </div>
 

 

    <?php include "scripts.php"; ?>
  
    <!-- footer including -->
    <?php include "includes/adminFooter.php";?>



