<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

      $id = mysqli_real_escape_string($connection, $_POST['id']);
      $ime = mysqli_real_escape_string($connection, $_POST['ime']);
      $prezime = mysqli_real_escape_string($connection, $_POST['prezime']);
      $pozicija = mysqli_real_escape_string($connection, $_POST['pozicija']);
      $nacionalnost = mysqli_real_escape_string($connection, $_POST['nacionalnost']);
      $broj = mysqli_real_escape_string($connection, $_POST['broj']);
      $visina = mysqli_real_escape_string($connection, $_POST['visina']);
      $datum_rodjenja= mysqli_real_escape_string($connection, $_POST['datum_rodjenja']);
      $karijera = mysqli_real_escape_string($connection, $_POST['karijera']);
      $stara_fotografija = mysqli_real_escape_string($connection, $_POST['stara_fotografija']);
        
    
      // getting images
      $fotografija = time().$_FILES['fotografija']['name'];
      $fotografija_tmp = $_FILES['fotografija']['tmp_name'];
    
      if($_FILES['fotografija']['name'] === ''){
           $stmtUpdate = mysqli_prepare($connection, "UPDATE prvi_tim SET ime=?, prezime=?, nacionalnost=?, visina=?, karijera=?, pozicija=?, broj=?, datum_rodjenja=? WHERE id=?");
           $stmtUpdate->bind_param('sssissisi', $ime, $prezime, $nacionalnost, $visina, $karijera, $pozicija, $broj, $datum_rodjenja, $id);
           $stmtUpdate->execute();
           testQuery($stmtUpdate);
           
      }else{
           $stmtUpdate = mysqli_prepare($connection, "UPDATE prvi_tim SET ime=?, prezime=?, nacionalnost=?, visina=?, fotografija=?, karijera=?, pozicija=?, broj=?, datum_rodjenja=? WHERE id=?");
           $stmtUpdate->bind_param('sssisssisi', $ime, $prezime, $nacionalnost, $visina, $fotografija, $karijera, $pozicija, $broj, $datum_rodjenja, $id);
           $stmtUpdate->execute();
           testQuery($stmtUpdate);
           move_uploaded_file($fotografija_tmp,"../images/igraci/$fotografija");
           unlink("../images/igraci/$stara_fotografija");
      }
      
     echo 'Success';

    
?>
            
            