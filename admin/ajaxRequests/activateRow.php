<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

    // if user isn't logged redirecting
    redirect();

      $id = mysqli_real_escape_string($connection, $_POST['id']);
      $status = mysqli_real_escape_string($connection, $_POST['status']);
      $table = mysqli_real_escape_string($connection, $_POST['table']); 
    
      switch($table){
          case "album":
             $query = "UPDATE album SET aktivan=? WHERE id=?";
             break;
          case "vijesti":
             $query = "UPDATE vijesti SET aktivno=? WHERE id=?";
             break;
          case "baneri":
             $query = "UPDATE baneri SET aktivno=? WHERE id=?";
             break;
          case "sponzori":
             $query = "UPDATE sponzori SET aktivan=? WHERE id=?";
             break;
          case "lige":
             $query = "UPDATE lige SET status=? WHERE id=?";
             break;      
      }
      
      $stmtUpdate = mysqli_prepare($connection, $query);
      $stmtUpdate->bind_param('si', $status, $id);
      $stmtUpdate->execute();
      testQuery($stmtUpdate);
  
      
       echo 'Success';

       
?>
            
            