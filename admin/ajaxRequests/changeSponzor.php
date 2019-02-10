<?php
session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

    // redirect if not login
    redirect();

      $id = mysqli_real_escape_string($connection, $_POST['id']);
      $link = strip_tags(trim(mysqli_real_escape_string($connection, $_POST['link'])));
      $ranking = mysqli_real_escape_string($connection, $_POST['ranking']);
      
      $stara_fotografija = mysqli_real_escape_string($connection, $_POST['stara_fotografija']);
        
    
      // getting images
      $fotografija = time().$_FILES['fotografija']['name'];
      $fotografija_tmp = $_FILES['fotografija']['tmp_name'];
    
      
   if($link === '' || !linkValidate($link)){
         echo "Unesite validan link"; 
    }elseif($_FILES['fotografija']['name'] === ''){
           $stmtUpdate = mysqli_prepare($connection, "UPDATE sponzori SET link=?, ranking=?  WHERE id=?");
           $stmtUpdate->bind_param('sii', $link, $ranking, $id);
           $stmtUpdate->execute();
           testQuery($stmtUpdate);
           echo 'Success';
      }else{
          if(!extension($fotografija)){
             echo "Unesite jpg ili png format fotografije";
          }else{
           $stmtUpdate = mysqli_prepare($connection, "UPDATE sponzori SET link=?, fotografija=?, ranking=?  WHERE id=?");
           $stmtUpdate->bind_param('ssii', $link, $fotografija, $ranking, $id);
           $stmtUpdate->execute();
           testQuery($stmtUpdate);
           unlink("../images/sponzori/$stara_fotografija");
           move_uploaded_file($fotografija_tmp,"../images/sponzori/$fotografija");
           echo 'Success';
      }
   }
      
     
   
?>
            
            