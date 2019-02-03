<?php ob_start(); ?>
<?php session_start(); ?>
<!-- including database file -->
<?php include "../includes/db.php" ?>
<!-- importovanje funkcija -->
<?php 
    
    include "../includes/functions.php"; 
   

?>



        

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">



<!-- style importing -->    
<link rel="stylesheet" href="../css/style.min.css">    
<link rel="stylesheet" href="../css/style.css">
    
<!-- font importing -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,600" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
   
    
<!-- font awesome including -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">    

<!-- tab icon including -->    
<link rel="shortcut icon" type="image/png" href="../../../kkbuducnost/images/buducnostpng.png">

<!-- sweet alert including -->    
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <?php
        $pageName = basename(__FILE__);
       
        include "scripts.php";
    ?>

    
