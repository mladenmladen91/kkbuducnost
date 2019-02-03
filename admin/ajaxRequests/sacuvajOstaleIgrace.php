<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

      $ime = mysqli_real_escape_string($connection, $_POST['ime']);
      $prezime = mysqli_real_escape_string($connection, $_POST['prezime']);
      $broj = mysqli_real_escape_string($connection, $_POST['broj']);
      
      // getting images
      $fotografija = time().$_FILES['fotografija']['name'];
      $fotografija_tmp = $_FILES['fotografija']['tmp_name'];

      $table = mysqli_real_escape_string($connection, $_POST['table']);
    
      switch($table){
    
        case "juniori":
            $query = "INSERT INTO juniori  VALUES(null, ?, ?, ?, ?)";
            break;
        case "pioniri":
            $query = "INSERT INTO pioniri  VALUES(null, ?, ?, ?, ?)";
            break;
        case "kadeti":
            $query = "INSERT INTO kadeti  VALUES(null, ?, ?, ?, ?)";
            break;
       }
    
     
      
       $stmtAdd = mysqli_prepare($connection, $query);
       $stmtAdd->bind_param('sssi', $ime, $prezime,  $fotografija, $broj);
       $stmtAdd->execute();
       testQuery($stmtAdd);
       move_uploaded_file($fotografija_tmp,"../images/igraci/$fotografija");
       $stmtAdd->close();
       
      
        echo 'Success';

    
?>
            
            