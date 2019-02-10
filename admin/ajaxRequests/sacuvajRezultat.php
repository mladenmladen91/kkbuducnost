<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

    // redirect if not login
    redirect();

      $domacin = mysqli_real_escape_string($connection, $_POST['domacin']);
      $gost = mysqli_real_escape_string($connection, $_POST['gost']);
      $domacin_kosevi = mysqli_real_escape_string($connection, $_POST['domacin_kosevi']);
      $gost_kosevi = mysqli_real_escape_string($connection, $_POST['gost_kosevi']);
      $datum = mysqli_real_escape_string($connection, $_POST['datum']);
      $vrijeme = mysqli_real_escape_string($connection, $_POST['vrijeme']);
      $liga_id = mysqli_real_escape_string($connection, $_POST['liga_id']);

     if($domacin_kosevi < 0 || $gost_kosevi < 0){
         echo 'Broj koševa ne može biti negativan broj';
     }elseif($datum > date('Y-m-d')){
         echo 'Ne možete odabrati buduće vrijeme';
     }elseif($domacin == $gost){
         echo 'Ne možete odabrati isti tim';
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
         
         
      
       $stmtAdd = mysqli_prepare($connection, "INSERT INTO rezultati VALUES(null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
       $stmtAdd->bind_param('ssiississs', $domacin, $gost, $domacin_kosevi, $gost_kosevi, $datum, $vrijeme, $liga_id, $domacin_logo, $gost_logo, $dvorana);
       $stmtAdd->execute();
       testQuery($stmtAdd);
       $stmtAdd->close();
       

        echo 'Success';
     }
    
?>
            
            