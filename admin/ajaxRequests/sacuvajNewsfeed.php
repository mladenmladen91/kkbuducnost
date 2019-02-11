<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

    // redirect if not login
    redirect();

      $tekst = mysqli_real_escape_string($connection, $_POST['tekst']);
      $datum = mysqli_real_escape_string($connection, $_POST['datum']);
     
     
      
     if($datum !== date('Y-m-d')){
         echo "Datum mora biti sadašnji";
     }elseif(clearSpace($tekst)){ 
         echo "Popunite polje validnim tekstom";
     }elseif(strlen($tekst) > 2000){ 
         echo "Tekst ne smije biti duži od 2000 karaktera";
     }else{
        
       $query = "SELECT * FROM newsfeed_emails";
       $result = mysqli_query($connection, $query);
       testQuery($result);
       mysqli_close($connection);
    
       while($row = mysqli_fetch_assoc($result)){
             $to = $row['email'];
             $body = $tekst;
             $subject = "KK Budućnost newsfeed";
             $header = "From: office@kkbuducnost.me";
           
             mail($to, $subject, $body, $header);
       }

       $stmtAdd = mysqli_prepare($connection, "INSERT INTO newsfeed VALUES(null, ?, ?)");
       $stmtAdd->bind_param('ss', $datum, $tekst);
       $stmtAdd->execute();
       testQuery($stmtAdd);
       $stmtAdd->close();

        echo 'Success'; 
     }
    
?>
            
            