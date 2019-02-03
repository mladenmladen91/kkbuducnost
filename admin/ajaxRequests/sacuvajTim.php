<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

      $naziv = mysqli_real_escape_string($connection, $_POST['naziv']);
      $dvorana = mysqli_real_escape_string($connection, $_POST['dvorana']);
      
      
      // getting images
      $fotografija = time().$_FILES['logo']['name'];
      $fotografija_tmp = $_FILES['logo']['tmp_name'];       

       $stmtAdd = mysqli_prepare($connection, "INSERT INTO timovi VALUES(null, ?, ?, ?)");
       $stmtAdd->bind_param('sss', $naziv, $fotografija, $dvorana);
       $stmtAdd->execute();
       testQuery($stmtAdd);
       move_uploaded_file($fotografija_tmp,"../images/timovi/$fotografija");
       $stmtAdd->close();
       
       $id = mysqli_insert_id($connection);
   
       $lige = $_POST['liga'];
      
       foreach($lige as $liga){
           $stmtAdd = mysqli_prepare($connection, "INSERT INTO liga_tim VALUES(?, ?)");
           $stmtAdd->bind_param('ii', $liga, $id);
           $stmtAdd->execute();
           testQuery($stmtAdd);
       }

        echo 'Success';

    
?>
            
            