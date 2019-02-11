<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

    // redirect if not login
    redirect();

      $link = clearify(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['link']))));
      $naslov = clean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['naslov']))));
      $datum = mysqli_real_escape_string($connection, $_POST['datum']);
   if($link === '' || $naslov === ''){
       echo "Morate popuniti sva polja validnim tekstom"; 
   }elseif($datum > date('Y-m-d')){
    echo "Ne možete odabratti datum u budućnosti";
   }else{
       $stmtAdd = mysqli_prepare($connection, "INSERT INTO video VALUES(null, ?, ?, ?)");
       $stmtAdd->bind_param('sss', $link, $naslov, $datum);
       $stmtAdd->execute();
       testQuery($stmtAdd);
       $stmtAdd->close();
       

        echo 'Success';
   }
    
?>
            
            