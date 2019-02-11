<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

    // redirect if not login
    redirect();

      $ime = clean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['ime']))));
      $prezime = clean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['prezime']))));
      $pozicija = clean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['pozicija']))));
      $nacionalnost = clean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['nacionalnost']))));
      $broj = mysqli_real_escape_string($connection, $_POST['broj']);
      $visina = mysqli_real_escape_string($connection, $_POST['visina']);
      $datumRodjenja= mysqli_real_escape_string($connection, $_POST['datum_rodjenja']);
      $karijera = strip_tags(trim(mysqli_real_escape_string($connection, $_POST['karijera'])));
      
        
    
      // getting images
      $fotografija = time().$_FILES['fotografija']['name'];
      $fotografija_tmp = $_FILES['fotografija']['tmp_name'];

     if($datumRodjenja >= date("Y-m-d")){
         echo "Datum rođenja mora biti u prošlosti"; 
      }elseif($ime === '' || $prezime === '' || $nacionalnost === '' || $pozicija === ''){
        echo "Morate popuniti sva polja validnim tekstom";
      }else if(!extension($fotografija)){
        echo "Unesite jpg ili png format fotografije";
      }else{
      
       $stmtAdd = mysqli_prepare($connection, "INSERT INTO prvi_tim  VALUES(null, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
       $stmtAdd->bind_param('sssisssis', $ime, $prezime, $nacionalnost, $visina, $fotografija, $karijera, $pozicija, $broj, $datumRodjenja);
       $stmtAdd->execute();
       testQuery($stmtAdd);
       move_uploaded_file($fotografija_tmp,"../images/igraci/$fotografija");
       $stmtAdd->close();
       
      
        echo 'Success';

     }
?>
            
            