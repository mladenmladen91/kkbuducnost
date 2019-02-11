<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

     // redirect if not login
    redirect();

      $naziv = clean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['naziv']))));
      $datum = mysqli_real_escape_string($connection, $_POST['datum']);
      $kategorija_id = mysqli_real_escape_string($connection, $_POST['kategorija_id']);
      $sezona_id = mysqli_real_escape_string($connection, $_POST['sezona_id']);
      
      $table = $_POST['table'];
       
      // getting images
      $fotografija = time().$_FILES['fotografija']['name'];
      $fotografija_tmp = $_FILES['fotografija']['tmp_name'];       
    
     if($datum > date('Y-m-d')){
         echo "Datum ne može biti u budućnosti"; 
      }elseif($naziv === ''){
         echo "Morate popuniti sva polja validnim tekstom"; 
      }elseif(!extension($fotografija)){
          echo "Unesite jpg ili png format fotografije";
      }else{
       $stmtAdd = mysqli_prepare($connection, "INSERT INTO album VALUES(null, ?, ?, ?, ?, ?, 'neaktivan')");
       $stmtAdd->bind_param('sissi', $naziv, $kategorija_id, $datum, $fotografija, $sezona_id);
       $stmtAdd->execute();
       testQuery($stmtAdd);
       move_uploaded_file($fotografija_tmp,"../images/albumi/$fotografija");
       $stmtAdd->close();
       
      
        echo 'Success';

     }
?>
            
            