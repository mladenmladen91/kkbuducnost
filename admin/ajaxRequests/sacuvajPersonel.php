<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

    // redirect if not login
    redirect();

      $ime = clean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['ime']))));
      $prezime = clean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['prezime']))));
      $pozicija = clean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['pozicija']))));
      
      // getting images
      $fotografija = time().$_FILES['fotografija']['name'];
      $fotografija_tmp = $_FILES['fotografija']['tmp_name'];

      $table = $_POST['table'];
    
     switch($table){
    
       case "osoblje":
            $query = "INSERT INTO osoblje VALUES(null, ?, ?, ?, ?)";
            break;
              
        case "menadzment":
            $query = "INSERT INTO menadzment VALUES(null, ?, ?, ?, ?)";
            break;        
              
        case "strucni_stab":
            $query = "INSERT INTO strucni_stab VALUES(null, ?, ?, ?, ?)";
            break;
              
        case "upravni_odbor":
            $query = "INSERT INTO upravni_odbor  VALUES(null, ?, ?, ?, ?)";
            break;
              
        case "mladje_selekcije":
            $query = "INSERT INTO mladje_selekcije  VALUES(null, ?, ?, ?, ?)";
            break;      
       } 

      
     
      if($ime === '' || $prezime === '' || $pozicija === ''){
        echo "Morate popuniti sva polja validnim tekstom";
      }else if(!extension($fotografija)){
        echo "Unesite jpg ili png format fotografije";
      }else{
       $stmtAdd = mysqli_prepare($connection, $query);
       $stmtAdd->bind_param('ssss', $ime, $prezime, $pozicija, $fotografija);
       $stmtAdd->execute();
       testQuery($stmtAdd);
       move_uploaded_file($fotografija_tmp,"../images/staff/$fotografija");
       $stmtAdd->close();
       
      
        echo 'Success';
      }
    
?>
            
            