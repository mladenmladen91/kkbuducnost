<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

      $link = mysqli_real_escape_string($connection, $_POST['link']);
      
      
      
      // getting images
      $fotografija = time().$_FILES['fotografija']['name'];
      $fotografija_tmp = $_FILES['fotografija']['tmp_name'];       

       $stmtAdd = mysqli_prepare($connection, "INSERT INTO baneri VALUES(null, ?, ?, 'neaktivan')");
       $stmtAdd->bind_param('ss', $fotografija, $link);
       $stmtAdd->execute();
       testQuery($stmtAdd);
       move_uploaded_file($fotografija_tmp,"../images/baneri/$fotografija");
       $stmtAdd->close();
       
       
      
       
        echo 'Success';

    
?>
            
            