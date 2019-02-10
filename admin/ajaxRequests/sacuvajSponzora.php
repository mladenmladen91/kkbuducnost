<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

    // redirect if not login
    redirect();

      $link = strip_tags(trim(mysqli_real_escape_string($connection, $_POST['link'])));
      $ranking = mysqli_real_escape_string($connection, $_POST['ranking']);
      
      
      
      // getting images
      $fotografija = time().$_FILES['fotografija']['name'];
      $fotografija_tmp = $_FILES['fotografija']['tmp_name'];       


    if($link === '' || !linkValidate($link)){
         echo "Unesite validan link"; 
    }elseif(!extension($fotografija)){
          echo "Unesite jpg ili png format fotografije";
    }else{
       $stmtAdd = mysqli_prepare($connection, "INSERT INTO sponzori VALUES(null, ?, ?, ?, 'neaktivan')");
       $stmtAdd->bind_param('ssi', $link, $fotografija, $ranking);
       $stmtAdd->execute();
       testQuery($stmtAdd);
       move_uploaded_file($fotografija_tmp,"../images/sponzori/$fotografija");
       $stmtAdd->close();
       
       echo 'Success';

    }
?>
            
            