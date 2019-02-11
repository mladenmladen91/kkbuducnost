<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

     // redirect if not login
    redirect();

      $naslov = clean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['naslov']))));
      $datum = mysqli_real_escape_string($connection, $_POST['datum']);
      
      
      
      // getting statement
      $izjava = time().$_FILES['izjava']['name'];
      $izjava_tmp = $_FILES['izjava']['tmp_name'];       

     if($datum > date('Y-m-d')){
         echo "Datum ne može biti u budućnosti"; 
      }elseif($naslov === ''){
         echo "Popunite prazno polje";
     }elseif(!documentRecognizer($izjava)){
         echo "Unesite fajl formata pdf, doc ili docx";
     }else{
       $stmtAdd = mysqli_prepare($connection, "INSERT INTO mediji VALUES(null, ?, ?, ?)");
       $stmtAdd->bind_param('sss', $naslov, $izjava, $datum);
       $stmtAdd->execute();
       testQuery($stmtAdd);
       move_uploaded_file($izjava_tmp,"../izjave/$izjava");
       $stmtAdd->close();
       
       
      
       
        echo 'Success';
     }
    
?>
            
            