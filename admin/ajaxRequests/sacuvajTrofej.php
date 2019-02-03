<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

      $naziv = mysqli_real_escape_string($connection, $_POST['naziv']);
      $sezone = mysqli_real_escape_string($connection, $_POST['sezone']);
       
      $table = $_POST['table'];
       
      // getting images
      $broj = time().$_FILES['broj']['name'];
      $broj_tmp = $_FILES['broj']['tmp_name']; 
                                                 
      $trofej = time().$_FILES['trofej']['name'];
      $trofej_tmp = $_FILES['trofej']['tmp_name'];                                                 

       $stmtAdd = mysqli_prepare($connection, "INSERT INTO trofeji VALUES(null, ?, ?, ?, ?)");
       $stmtAdd->bind_param('ssss', $naziv, $broj, $sezone, $trofej);
       $stmtAdd->execute();
       testQuery($stmtAdd);
       move_uploaded_file($trofej_tmp,"../images/trofeji/$trofej");
       move_uploaded_file($broj_tmp,"../images/trofeji/$broj");
       $stmtAdd->close();
       
      
        echo 'Success';

    
?>
            
            