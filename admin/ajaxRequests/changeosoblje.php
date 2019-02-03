<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

      $id = mysqli_real_escape_string($connection, $_POST['id']);
      $ime = mysqli_real_escape_string($connection, $_POST['ime']);
      $prezime = mysqli_real_escape_string($connection, $_POST['prezime']);
      $pozicija = mysqli_real_escape_string($connection, $_POST['pozicija']);
      $stara_fotografija = mysqli_real_escape_string($connection, $_POST['stara_fotografija']);
        
    
      // getting images
      $fotografija = time().$_FILES['fotografija']['name'];
      $fotografija_tmp = $_FILES['fotografija']['tmp_name'];
    
      if($_FILES['fotografija']['name'] === ''){
           $stmtUpdate = mysqli_prepare($connection, "UPDATE osoblje SET ime=?, prezime=?, pozicija=? WHERE id=?");
           $stmtUpdate->bind_param('sssi', $ime, $prezime, $pozicija, $id);
           $stmtUpdate->execute();
           testQuery($stmtUpdate);
           
      }else{
           $stmtUpdate = mysqli_prepare($connection, "UPDATE osoblje SET ime=?, prezime=?, pozicija=?, fotografija=? WHERE id=?");
           $stmtUpdate->bind_param('ssssi', $ime, $prezime, $pozicija, $fotografija, $id);
           $stmtUpdate->execute();
           testQuery($stmtUpdate);
           unlink("../images/staff/$stara_fotografija");
           move_uploaded_file($fotografija_tmp,"../images/staff/$fotografija");
           
      }
      
     echo 'Success';

    
?>
            
            