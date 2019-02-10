<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

    // redirect if not login
    redirect();

      $id = mysqli_real_escape_string($connection, $_POST['id']);
      $ime = clean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['ime']))));
      $prezime = clean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['prezime']))));
      $broj = mysqli_real_escape_string($connection, $_POST['broj']);
      $stara_fotografija = mysqli_real_escape_string($connection, $_POST['stara_fotografija']);
        
    
      // getting images
      $fotografija = time().$_FILES['fotografija']['name'];
      $fotografija_tmp = $_FILES['fotografija']['tmp_name'];
    
      if($broj < 1 || $broj > 99){
         echo "Broj mora biti u rangu od 1 do 99"; 
      }elseif($ime === '' || $prezime === ''){
        echo "Morate popuniti sva polja";
      }elseif($_FILES['fotografija']['name'] === ''){
           $stmtUpdate = mysqli_prepare($connection, "UPDATE juniori SET ime=?, prezime=?, broj=? WHERE id=?");
           $stmtUpdate->bind_param('ssii', $ime, $prezime, $broj, $id);
           $stmtUpdate->execute();
           testQuery($stmtUpdate);
           echo 'Success';

      }else{
          if(!extension($fotografija)){
             echo "Unesite jpg ili png format fotografije";
          }else{
           $stmtUpdate = mysqli_prepare($connection, "UPDATE juniori SET ime=?, prezime=?, fotografija=?, broj=? WHERE id=?");
           $stmtUpdate->bind_param('sssii', $ime, $prezime, $fotografija, $broj, $id);
           $stmtUpdate->execute();
           testQuery($stmtUpdate);
           unlink("../images/igraci/$stara_fotografija");
           move_uploaded_file($fotografija_tmp,"../images/igraci/$fotografija");
           echo 'Success';
          }
           
      }
      
     
    
?>
            
            