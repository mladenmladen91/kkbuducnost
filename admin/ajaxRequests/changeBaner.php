<?php
session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";
 
   // redirect if not login
    redirect();

      $id = mysqli_real_escape_string($connection, $_POST['id']);
      $link = strip_tags(trim(mysqli_real_escape_string($connection, $_POST['link'])));
      
      $stara_fotografija = mysqli_real_escape_string($connection, $_POST['stara_fotografija']);
        
    
      // getting images
      $fotografija = time().$_FILES['fotografija']['name'];
      $fotografija_tmp = $_FILES['fotografija']['tmp_name'];
    
      if($link === '' || !linkValidate($link)){
         echo "Unesite validan link"; 
      }elseif($_FILES['fotografija']['name'] === ''){
           $stmtUpdate = mysqli_prepare($connection, "UPDATE baneri SET link=?  WHERE id=?");
           $stmtUpdate->bind_param('si', $link, $id);
           $stmtUpdate->execute();
           testQuery($stmtUpdate);
           echo 'Success';
           
      }else{
          if(!extension($fotografija)){
             echo "Unesite jpg ili png format fotografije";
          }else{
           $stmtUpdate = mysqli_prepare($connection, "UPDATE baneri SET link=?, fotografija=?  WHERE id=?");
           $stmtUpdate->bind_param('ssi', $link, $fotografija, $id);
           $stmtUpdate->execute();
           testQuery($stmtUpdate);
           unlink("../images/baneri/$stara_fotografija");
           move_uploaded_file($fotografija_tmp,"../images/baneri/$fotografija");
           echo 'Success';
         }
      }
      
     
?>
            
            