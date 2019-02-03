<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

      $tekst = mysqli_real_escape_string($connection, $_POST['tekst']);
      $datum = mysqli_real_escape_string($connection, $_POST['datum']);
     
      
      
      $stmtAdd = mysqli_prepare($connection, "INSERT INTO newsfeed VALUES(null, ?, ?)");
       $stmtAdd->bind_param('ss', $datum, $tekst);
       $stmtAdd->execute();
       testQuery($stmtAdd);
       $stmtAdd->close();

       $query = "SELECT * FROM newsfeed_emails";
       $result = mysqli_query($connection, $query);
       testQuery($result);
    
       while($row = mysqli_fetch_assoc($result)){
             $to = $row['email'];
             $body = $tekst;
             $subject = "KK Budućnost newsfeed";
             $header = "From: office@kkbuducnost.me";
           
             mail($to, $subject, $body, $header);
       }

        echo 'Success'; 

    
?>
            
            