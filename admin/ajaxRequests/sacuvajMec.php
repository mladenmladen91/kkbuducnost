<?php
   
    
  include "../../includes/db.php";

  if(!$connection){
  	die('error '.mysqli_error($connection));
  }
    
    

      $domacin = mysqli_real_escape_string($connection, $_POST['domacin']);
      $gost = mysqli_real_escape_string($connection, $_POST['gost']);
      $datum = mysqli_real_escape_string($connection, $_POST['datum']);
      $vrijeme = mysqli_real_escape_string($connection, $_POST['vrijeme']);
      $liga_id = mysqli_real_escape_string($connection, $_POST['liga_id']);

      

     if($domacin == $gost){
         echo 'Ne možete odabrati isti tim';
     }elseif($datum < date('Y-m-d')){
         echo 'Ne možete odabrati prošlo vrijeme';
     }else{
         
        // getting logo from home team 
        $homeLogoQuery = "SELECT logo FROM timovi WHERE naziv = '{$domacin}'";
        $homeLogoResult = mysqli_query($connection, $homeLogoQuery);
        if(!$homeLogoResult){
           die(mysqli_error($connection));
        } 
        $homeRow = mysqli_fetch_assoc($homeLogoResult);
        $domacin_logo = $homeRow['logo']; 
         
        // getting logo from guest team 
        $guestLogoQuery = "SELECT logo FROM timovi WHERE naziv = '{$gost}'";
        $guestLogoResult = mysqli_query($connection, $guestLogoQuery);
        if(!$guestLogoResult){
           die(mysqli_error($connection));
        } 
        $guestRow = mysqli_fetch_assoc($guestLogoResult);
        $gost_logo = $guestRow['logo'];
         
        // getting arena from home team 
        $homeLogoQuery = "SELECT dvorana FROM timovi WHERE naziv = '{$domacin}'";
        $homeLogoResult = mysqli_query($connection, $homeLogoQuery);
        if(!$homeLogoResult){
           die(mysqli_error($connection));
        } 
        $homeRow = mysqli_fetch_assoc($homeLogoResult);
        $dvorana = $homeRow['dvorana']; 
          
      
       $stmtAdd = mysqli_prepare($connection, "INSERT INTO kalendar VALUES(null, ?, ?, ?, ?, ?, ?, ?, ?)");
       $stmtAdd->bind_param('ssssisss', $domacin, $gost, $datum, $vrijeme, $liga_id, $domacin_logo, $gost_logo, $dvorana);
       $stmtAdd->execute();
       if(!$stmtAdd){
           die(mysqli_error($connection));
        }
       $stmtAdd->close();
       

        echo 'Success';
     }
    
?>
            
            