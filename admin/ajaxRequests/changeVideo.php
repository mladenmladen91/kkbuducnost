<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

      $id = mysqli_real_escape_string($connection, $_POST['id']);
      $naslov = mysqli_real_escape_string($connection, $_POST['naslov']);
      $link = mysqli_real_escape_string($connection, $_POST['link']);
      $datum = mysqli_real_escape_string($connection, $_POST['datum']);
      

      $stmtUpdate = mysqli_prepare($connection, "UPDATE video SET link=?, naslov=?, datum=? WHERE id=?");
      $stmtUpdate->bind_param('sssi', $link, $naslov, $datum, $id);
      $stmtUpdate->execute();
      testQuery($stmtUpdate);
           
     
      
     echo 'Success';


?>
            
            