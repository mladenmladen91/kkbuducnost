<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

      $link = mysqli_real_escape_string($connection, $_POST['link']);
      $naslov = mysqli_real_escape_string($connection, $_POST['naslov']);
      $datum = mysqli_real_escape_string($connection, $_POST['datum']);

       $stmtAdd = mysqli_prepare($connection, "INSERT INTO video VALUES(null, ?, ?, ?)");
       $stmtAdd->bind_param('sss', $link, $naslov, $datum);
       $stmtAdd->execute();
       testQuery($stmtAdd);
       $stmtAdd->close();
       

        echo 'Success';
     
    
?>
            
            