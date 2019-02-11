<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

    // redirect if not login
    redirect();

      $ime = clean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['ime']))));
      $prezime = clean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['prezime']))));
      $broj = mysqli_real_escape_string($connection, $_POST['broj']);
      
      // getting images
      $fotografija = time().$_FILES['fotografija']['name'];
      $fotografija_tmp = $_FILES['fotografija']['tmp_name'];

      $table = mysqli_real_escape_string($connection, $_POST['table']);
    
      switch($table){
    
        case "juniori":
            $query = "INSERT INTO juniori  VALUES(null, ?, ?, ?, ?)";
            break;
        case "pioniri":
            $query = "INSERT INTO pioniri  VALUES(null, ?, ?, ?, ?)";
            break;
        case "kadeti":
            $query = "INSERT INTO kadeti  VALUES(null, ?, ?, ?, ?)";
            break;
       }

     if($ime === '' || $prezime === ''){
        echo "Morate popuniti sva polja validnim tekstom";
      }else if(!extension($fotografija)){
        echo "Unesite jpg ili png format fotografije";
      }else{
      
       $stmtAdd = mysqli_prepare($connection, $query);
       $stmtAdd->bind_param('sssi', $ime, $prezime,  $fotografija, $broj);
       $stmtAdd->execute();
       testQuery($stmtAdd);
       move_uploaded_file($fotografija_tmp,"../images/igraci/$fotografija");
       $stmtAdd->close();
       
      
        echo 'Success';

     }
?>