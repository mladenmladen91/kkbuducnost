<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

     // redirect if not login
    redirect();

      $naslov = clean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['naslov']))));
      $naslov_en = clean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['naslov_en']))));
      $tekst = mysqli_real_escape_string($connection, $_POST['tekst']);
      $tekst_en = mysqli_real_escape_string($connection, $_POST['tekst_en']);
      $datum = mysqli_real_escape_string($connection, $_POST['datum']);
      $kategorija_id = mysqli_real_escape_string($connection, $_POST['kategorija_id']);
      
      
      // getting images
      $fotografija = time().$_FILES['fotografija']['name'];
      $fotografija_tmp = $_FILES['fotografija']['tmp_name'];       

     if(clearSpace($tekst) || clearSpace($tekst_en) || $naslov === '' || $naslov_en === ''){ 
         echo "Popunite polja validnim tekstom";
     }elseif(!extension($fotografija)){
          echo "Unesite jpg ili png format fotografije";
     }else{

       $stmtAdd = mysqli_prepare($connection, "INSERT INTO vijesti VALUES(null, ?, ?, ?, ?, ?, 'neaktivan', ?, ?)");
       $stmtAdd->bind_param('ssssiss', $naslov, $tekst, $datum, $fotografija, $kategorija_id, $naslov_en, $tekst_en);
       $stmtAdd->execute();
       testQuery($stmtAdd);
       move_uploaded_file($fotografija_tmp,"../images/vijesti/$fotografija");
       $stmtAdd->close();

       $vijest_id = mysqli_insert_id($connection);

       $tagovi = $_POST['tagovi'];
       
       foreach($tagovi as $tag){
           $stmtAdd = mysqli_prepare($connection, "INSERT INTO tag_vijest VALUES(?, ?)");
           $stmtAdd->bind_param('ii', $tag, $vijest_id);
           $stmtAdd->execute();
           testQuery($stmtAdd);
       }
      
        echo 'Success'; 

     }
?>
            
            