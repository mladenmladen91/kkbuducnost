<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

      $naslov = mysqli_real_escape_string($connection, $_POST['naslov']);
      $datum = mysqli_real_escape_string($connection, $_POST['datum']);
      
      
      
      // getting statement
      $izjava = time().$_FILES['izjava']['name'];
      $izjava_tmp = $_FILES['izjava']['tmp_name'];       

       $stmtAdd = mysqli_prepare($connection, "INSERT INTO mediji VALUES(null, ?, ?, ?)");
       $stmtAdd->bind_param('sss', $naslov, $izjava, $datum);
       $stmtAdd->execute();
       testQuery($stmtAdd);
       move_uploaded_file($izjava_tmp,"../izjave/$izjava");
       $stmtAdd->close();
       
       
      
       
        echo 'Success';

    
?>
            
            