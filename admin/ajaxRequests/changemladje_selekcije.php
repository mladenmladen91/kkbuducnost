<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

    // redirect if not login
    redirect();

      $id = mysqli_real_escape_string($connection, $_POST['id']);
      $ime = strip_tags(trim(mysqli_real_escape_string($connection, $_POST['ime'])));
      $prezime = strip_tags(trim(mysqli_real_escape_string($connection, $_POST['prezime'])));
      $pozicija = strip_tags(trim(mysqli_real_escape_string($connection, $_POST['pozicija'])));
      $stara_fotografija = mysqli_real_escape_string($connection, $_POST['stara_fotografija']);
        
    
      // getting images
      $fotografija = time().$_FILES['fotografija']['name'];
      $fotografija_tmp = $_FILES['fotografija']['tmp_name'];
    
       if($ime === '' || $prezime === '' || $pozicija === ''){
           echo "Morate popuniti sva polja";
       }elseif($_FILES['fotografija']['name'] === ''){
           $stmtUpdate = mysqli_prepare($connection, "UPDATE mladje_selekcije SET ime=?, prezime=?, pozicija=? WHERE id=?");
           $stmtUpdate->bind_param('sssi', $ime, $prezime, $pozicija, $id);
           $stmtUpdate->execute();
           testQuery($stmtUpdate);
           echo 'Success';
      }else{
         if(!extension($fotografija)){
             echo "Unesite jpg ili png format fotografije";
         }else{
           $stmtUpdate = mysqli_prepare($connection, "UPDATE mladje_selekcije SET ime=?, prezime=?, pozicija=?, fotografija=? WHERE id=?");
           $stmtUpdate->bind_param('ssssi', $ime, $prezime, $pozicija, $fotografija, $id);
           $stmtUpdate->execute();
           testQuery($stmtUpdate);
           unlink("../images/staff/$stara_fotografija");
           move_uploaded_file($fotografija_tmp,"../images/staff/$fotografija");
           echo 'Success';
         }
      }
      
     

    
?>
            
            