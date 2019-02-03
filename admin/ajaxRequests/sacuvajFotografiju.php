<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

      $album_id = mysqli_real_escape_string($connection, $_POST['album_id']);
      // getting images
      $fotografija = time().$_FILES['fotografija']['name'];
      $fotografija_tmp = $_FILES['fotografija']['tmp_name'];       

       $stmtAdd = mysqli_prepare($connection, "INSERT INTO fotografije VALUES(null, ?, ?)");
       $stmtAdd->bind_param('si', $fotografija, $album_id);
       $stmtAdd->execute();
       testQuery($stmtAdd);
       move_uploaded_file($fotografija_tmp,"../images/fotografije/$fotografija");
       $stmtAdd->close();
       
      
        echo 'Success';
            
    
?>
            
            