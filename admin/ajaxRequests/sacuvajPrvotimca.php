<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

      $ime = mysqli_real_escape_string($connection, $_POST['ime']);
      $prezime = mysqli_real_escape_string($connection, $_POST['prezime']);
      $pozicija = mysqli_real_escape_string($connection, $_POST['pozicija']);
      $nacionalnost = mysqli_real_escape_string($connection, $_POST['nacionalnost']);
      $broj = mysqli_real_escape_string($connection, $_POST['broj']);
      $visina = mysqli_real_escape_string($connection, $_POST['visina']);
      $datumRodjenja= mysqli_real_escape_string($connection, $_POST['datum_rodjenja']);
      $karijera = mysqli_real_escape_string($connection, $_POST['karijera']);
      
        
    
      // getting images
      $fotografija = time().$_FILES['fotografija']['name'];
      $fotografija_tmp = $_FILES['fotografija']['tmp_name'];
    
      
     
      
       $stmtAdd = mysqli_prepare($connection, "INSERT INTO prvi_tim  VALUES(null, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
       $stmtAdd->bind_param('sssisssis', $ime, $prezime, $nacionalnost, $visina, $fotografija, $karijera, $pozicija, $broj, $datumRodjenja);
       $stmtAdd->execute();
       testQuery($stmtAdd);
       move_uploaded_file($fotografija_tmp,"../images/igraci/$fotografija");
       $stmtAdd->close();
       
      
        echo 'Success';

    
?>
            
            