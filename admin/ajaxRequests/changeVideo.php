<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

    // redirect if not login
    redirect();

      $id = mysqli_real_escape_string($connection, $_POST['id']);
      $link = clearify(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['link']))));
      $naslov = clean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['naslov']))));
      $datum = mysqli_real_escape_string($connection, $_POST['datum']);
      
   if($link === '' || $naslov === ''){
       echo "Morate popuniti sva polja validnim tekstom"; 
   }elseif($datum > date('Y-m-d')){
    echo "Ne možete odabratti datum u budućnosti";
   }else{
      $stmtUpdate = mysqli_prepare($connection, "UPDATE video SET link=?, naslov=?, datum=? WHERE id=?");
      $stmtUpdate->bind_param('sssi', $link, $naslov, $datum, $id);
      $stmtUpdate->execute();
      testQuery($stmtUpdate);
           
     
      
     echo 'Success';

   }
?>
            
            