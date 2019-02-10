<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

    // redirect if not login
    redirect();

      $id = mysqli_real_escape_string($connection, $_POST['id']);
      $naziv = clean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['naziv']))));
      $sezone = strip_tags(trim(mysqli_real_escape_string($connection, $_POST['sezone'])));
      
      $stari_broj = mysqli_real_escape_string($connection, $_POST['stari_broj']);
      $stari_trofej = mysqli_real_escape_string($connection, $_POST['stari_trofej']);    
    
      // getting images
      $broj = time().$_FILES['broj']['name'];
      $broj_tmp = $_FILES['broj']['tmp_name'];

      $trofej = time().$_FILES['trofej']['name'];
      $trofej_tmp = $_FILES['trofej']['tmp_name'];
    
      if($naziv === '' || $sezone === ''){
           echo "Morate popuniti polja validnim tekstom";
    }elseif($_FILES['broj']['name'] === '' && $_FILES['trofej']['name'] === ''){
           $stmtUpdate = mysqli_prepare($connection, "UPDATE trofeji SET naziv=?, sezone=? WHERE id=?");
           $stmtUpdate->bind_param('ssi', $naziv, $sezone, $id);
           $stmtUpdate->execute();
           testQuery($stmtUpdate);
           echo "Success";
      }elseif($_FILES['broj']['name'] === ''){
           if(!extension($trofej)){
             echo "Unesite jpg ili png format fotografije";
         }else{
           $stmtUpdate = mysqli_prepare($connection, "UPDATE trofeji SET naziv=?, sezone=?, trofej=? WHERE id=?");
           $stmtUpdate->bind_param('sssi', $naziv, $sezone, $trofej, $id);
           $stmtUpdate->execute();
           testQuery($stmtUpdate);
           move_uploaded_file($trofej_tmp,"../images/trofeji/$trofej");
           unlink("../images/trofeji/$stari_trofej");
           echo 'Success';
        }
           
      }elseif($_FILES['trofej']['name'] === ''){
          if(!extension($broj)){
             echo "Unesite jpg ili png format fotografije";
         }else{
           $stmtUpdate = mysqli_prepare($connection, "UPDATE trofeji SET naziv=?, broj=?, sezone=? WHERE id=?");
           $stmtUpdate->bind_param('sssi', $naziv, $broj, $sezone, $id);
           $stmtUpdate->execute();
           testQuery($stmtUpdate);
           move_uploaded_file($broj_tmp,"../images/trofeji/$broj");
           unlink("../images/trofeji/$stari_broj");
           echo 'Success';
          }
      }else{
           if(!extension($broj)){
             echo "Unesite jpg ili png format fotografije";
         }elseif(!extension($trofej)){
             echo "Unesite jpg ili png format fotografije";
         }else{
           $stmtUpdate = mysqli_prepare($connection, "UPDATE trofeji SET naziv=?, broj=?, sezone=?, trofej=? WHERE id=?");
           $stmtUpdate->bind_param('ssssi', $naziv, $broj, $sezone, $trofej, $id);
           $stmtUpdate->execute();
           testQuery($stmtUpdate);
           move_uploaded_file($broj_tmp,"../images/trofeji/$broj");
           unlink("../images/trofeji/$stari_broj");
          
           move_uploaded_file($trofej_tmp,"../images/trofeji/$trofej");
           unlink("../images/trofeji/$stari_trofej");
           echo 'Success';
      }

      }
      
     

    
?>
            
            