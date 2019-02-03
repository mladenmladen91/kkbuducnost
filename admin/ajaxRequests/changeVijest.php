<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

      $id = mysqli_real_escape_string($connection, $_POST['id']);
      $naslov = mysqli_real_escape_string($connection, $_POST['naslov']);
      $naslov_en = mysqli_real_escape_string($connection, $_POST['naslov_en']);
      $tekst = mysqli_real_escape_string($connection, $_POST['tekst']);
      $tekst_en = mysqli_real_escape_string($connection, $_POST['tekst_en']);
      $kategorija_id = mysqli_real_escape_string($connection, $_POST['kategorija_id']);
      $datum= mysqli_real_escape_string($connection, $_POST['datum']);
      
      $stara_fotografija = mysqli_real_escape_string($connection, $_POST['stara_fotografija']);
        
    
      // getting images
      $fotografija = time().$_FILES['fotografija']['name'];
      $fotografija_tmp = $_FILES['fotografija']['tmp_name'];
    
      if($_FILES['fotografija']['name'] === ''){
           $stmtUpdate = mysqli_prepare($connection, "UPDATE vijesti SET naslov=?, tekst=?, datum=?, kategorija_id=?, naslov_en=?, tekst_en=? WHERE id=?");
           $stmtUpdate->bind_param('sssissi', $naslov, $tekst, $datum, $kategorija_id, $naslov_en, $tekst_en, $id);
           $stmtUpdate->execute();
           testQuery($stmtUpdate);
           
      }else{
           $stmtUpdate = mysqli_prepare($connection, "UPDATE vijesti SET naslov=?, tekst=?, datum=?, fotografija=?, naslov_en=?, tekst_en=? kategorija_id=? WHERE id=?");
           $stmtUpdate->bind_param('ssssissi', $naslov, $tekst, $datum, $fotografija, $kategorija_id, $naslov_en, $tekst_en, $id);
           $stmtUpdate->execute();
           testQuery($stmtUpdate);
           move_uploaded_file($fotografija_tmp,"../images/vijesti/$fotografija");
           unlink("../images/vijesti/$stara_fotografija");
      }

     

    if(isset($_POST['tagovi'])){
     $tagovi = $_POST['tagovi'];
        
     $query = "DELETE FROM tag_vijest WHERE vijest_id={$id}";
     $result = mysqli_query($connection, $query);
     testQuery($result);    
       
       foreach($tagovi as $tag){
           $stmtAdd = mysqli_prepare($connection, "INSERT INTO tag_vijest VALUES(?, ?)");
           $stmtAdd->bind_param('ii', $tag, $id);
           $stmtAdd->execute();
           testQuery($stmtAdd);
       }
    }
     echo 'Success';

    
?>
            
            