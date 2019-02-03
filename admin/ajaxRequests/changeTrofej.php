<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

      $id = mysqli_real_escape_string($connection, $_POST['id']);
      $naziv = mysqli_real_escape_string($connection, $_POST['naziv']);
      $sezone = mysqli_real_escape_string($connection, $_POST['sezone']);
      
      $stari_broj = mysqli_real_escape_string($connection, $_POST['stari_broj']);
      $stari_trofej = mysqli_real_escape_string($connection, $_POST['stari_trofej']);    
    
      // getting images
      $broj = time().$_FILES['broj']['name'];
      $broj_tmp = $_FILES['broj']['tmp_name'];

      $trofej = time().$_FILES['trofej']['name'];
      $trofej_tmp = $_FILES['trofej']['tmp_name'];
    
      if($_FILES['broj']['name'] === '' && $_FILES['trofej']['name'] === ''){
           $stmtUpdate = mysqli_prepare($connection, "UPDATE trofeji SET naziv=?, sezone=? WHERE id=?");
           $stmtUpdate->bind_param('ssi', $naziv, $sezone, $id);
           $stmtUpdate->execute();
           testQuery($stmtUpdate);
      }elseif($_FILES['broj']['name'] === ''){
           $stmtUpdate = mysqli_prepare($connection, "UPDATE trofeji SET naziv=?, sezone=?, trofej=? WHERE id=?");
           $stmtUpdate->bind_param('sssi', $naziv, $sezone, $trofej, $id);
           $stmtUpdate->execute();
           testQuery($stmtUpdate);
           move_uploaded_file($trofej_tmp,"../images/trofeji/$trofej");
           unlink("../images/trofeji/$stari_trofej");
           
      }elseif($_FILES['trofej']['name'] === ''){
           $stmtUpdate = mysqli_prepare($connection, "UPDATE trofeji SET naziv=?, broj=?, sezone=? WHERE id=?");
           $stmtUpdate->bind_param('sssi', $naziv, $broj, $sezone, $id);
           $stmtUpdate->execute();
           testQuery($stmtUpdate);
           move_uploaded_file($broj_tmp,"../images/trofeji/$broj");
           unlink("../images/trofeji/$stari_broj");
      }else{
           $stmtUpdate = mysqli_prepare($connection, "UPDATE trofeji SET naziv=?, broj=?, sezone=?, trofej=? WHERE id=?");
           $stmtUpdate->bind_param('ssssi', $naziv, $broj, $sezone, $trofej, $id);
           $stmtUpdate->execute();
           testQuery($stmtUpdate);
           move_uploaded_file($broj_tmp,"../images/trofeji/$broj");
           unlink("../images/trofeji/$stari_broj");
          
           move_uploaded_file($trofej_tmp,"../images/trofeji/$trofej");
           unlink("../images/trofeji/$stari_trofej");
      }

  
      
     echo 'Success';

    
?>
            
            