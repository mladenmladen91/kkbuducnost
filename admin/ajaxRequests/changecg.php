<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

    // redirect if not login
    redirect();

      $id = mysqli_real_escape_string($connection, $_POST['id']);
      $broj_utakmica = mysqli_real_escape_string($connection, $_POST['broj_utakmica']);
      $dobijene = mysqli_real_escape_string($connection, $_POST['dobijene']);
      $izgubljene = mysqli_real_escape_string($connection, $_POST['izgubljene']);
      $krajnja_razlika = mysqli_real_escape_string($connection, $_POST['krajnja_razlika']);
      $bodovi = $izgubljene * 1 + $dobijene * 2;
       
       if($broj_utakmica != $dobijene + $izgubljene){
           echo "Broj utakmica mora biti jednak zbiru dobijenih i izgubljenih";
       }else{
    
           $stmtUpdate = mysqli_prepare($connection, "UPDATE cg SET broj_utakmica=?, dobijene=?, izgubljene=?, krajnja_razlika=?, bodovi=? WHERE id=?");
           $stmtUpdate->bind_param('iiiiii', $broj_utakmica, $dobijene, $izgubljene, $krajnja_razlika, $bodovi, $id);
           $stmtUpdate->execute();
           testQuery($stmtUpdate);
  
      
           echo 'Success';

       }
?>
            
            