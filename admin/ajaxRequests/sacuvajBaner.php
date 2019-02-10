<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

    // redirect if not login
    redirect();

      $link = strip_tags(trim(mysqli_real_escape_string($connection, $_POST['link'])));
      
      
      
      // getting images
      $fotografija = time().$_FILES['fotografija']['name'];
      $fotografija_tmp = $_FILES['fotografija']['tmp_name'];       


    if($link === '' || !linkValidate($link)){
         echo "Unesite validan link"; 
    }elseif(!extension($fotografija)){
          echo "Unesite jpg ili png format fotografije";
    }else{
       $stmtAdd = mysqli_prepare($connection, "INSERT INTO baneri VALUES(null, ?, ?, 'neaktivan')");
       $stmtAdd->bind_param('ss', $fotografija, $link);
       $stmtAdd->execute();
       testQuery($stmtAdd);
       move_uploaded_file($fotografija_tmp,"../images/baneri/$fotografija");
       $stmtAdd->close();
       
       echo 'Success';
    }
    
?>
            
            