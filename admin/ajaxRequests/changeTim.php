<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

    // redirect if not login
    redirect();

      $id = mysqli_real_escape_string($connection, $_POST['id']);
      $naziv = clean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['naziv']))));
      $dvorana = clean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['dvorana']))));
      
      $stara_fotografija = mysqli_real_escape_string($connection, $_POST['stara_fotografija']);
        
    
      // getting images
      $fotografija = time().$_FILES['logo']['name'];
      $fotografija_tmp = $_FILES['logo']['tmp_name'];

     if($naziv === '' || $dvorana === ''){
        echo "Morate popuniti sva polja";
     }elseif($_FILES['logo']['name'] === ''){
           $stmtUpdate = mysqli_prepare($connection, "UPDATE timovi SET naziv=?, dvorana=? WHERE id=?");
           $stmtUpdate->bind_param('ssi', $naziv, $dvorana, $id);
           $stmtUpdate->execute();
           testQuery($stmtUpdate);
         
           if(isset($_POST['liga'])){
               $lige = $_POST['liga'];
        
               $query = "DELETE FROM liga_tim WHERE tim_id={$id}";
               $result = mysqli_query($connection, $query);
               testQuery($result);    
       
               foreach($lige as $liga){
                    $stmtAdd = mysqli_prepare($connection, "INSERT INTO liga_tim VALUES(?, ?)");
                    $stmtAdd->bind_param('ii', $liga, $id);
                    $stmtAdd->execute();
                    testQuery($stmtAdd);
               }
           }
      
              echo 'Success';
           
      }else{
         if(!extension($fotografija)){
             echo "Unesite jpg ili png format fotografije";
         }else{
           $stmtUpdate = mysqli_prepare($connection, "UPDATE timovi SET naziv=?, logo=?, dvorana=? WHERE id=?");
           $stmtUpdate->bind_param('sssi', $naziv, $fotografija, $dvorana, $id);
           $stmtUpdate->execute();
           testQuery($stmtUpdate);
           move_uploaded_file($fotografija_tmp,"../images/timovi/$fotografija");
           unlink("../images/timovi/$stara_fotografija");
             
           if(isset($_POST['liga'])){
               $lige = $_POST['liga'];
        
               $query = "DELETE FROM liga_tim WHERE tim_id={$id}";
               $result = mysqli_query($connection, $query);
               testQuery($result);    
       
               foreach($lige as $liga){
                    $stmtAdd = mysqli_prepare($connection, "INSERT INTO liga_tim VALUES(?, ?)");
                    $stmtAdd->bind_param('ii', $liga, $id);
                    $stmtAdd->execute();
                    testQuery($stmtAdd);
       }
   }
      
     echo 'Success';     
         }
      }


?>
            
            