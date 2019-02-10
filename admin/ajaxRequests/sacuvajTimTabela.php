<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

    // redirect if not login
    redirect();

      $klub_id = mysqli_real_escape_string($connection, $_POST['klub_id']);
      $broj_utakmica = mysqli_real_escape_string($connection, $_POST['broj_utakmica']);
      $dobijene = mysqli_real_escape_string($connection, $_POST['dobijene']);
      $izgubljene = mysqli_real_escape_string($connection, $_POST['izgubljene']);
      $krajnja_razlika = mysqli_real_escape_string($connection, $_POST['krajnja_razlika']);
      $bodovi = $izgubljene * 1 + $dobijene * 2;
      $table = $_POST['table'];
       
       // checking if this club is already written into the database
       $queryExists = "SELECT * FROM {$table} WHERE klub_id={$klub_id}";
       $result = mysqli_query($connection, $queryExists);
       testQuery($result);
       $count = mysqli_num_rows($result);

   if($count > 0){
        echo "Već ste unijeli ovaj klub u tabelu";
   }elseif($broj_utakmica != $dobijene + $izgubljene){
        echo "Broj utakmica mora biti jednak zbiru dobijenih i izgubljenih";
   }else{
    
    switch($table){
    
       case "aba":
            $query = "INSERT INTO aba VALUES(null, ?, ?, ?, ?, ?, ?)";
            break;
              
        case "euroleague":
            $query = "INSERT INTO euroleague VALUES(null, ?, ?, ?, ?, ?, ?)";
            break;        
              
        case "eurocup":
            $query = "INSERT INTO eurocup VALUES(null, ?, ?, ?, ?, ?, ?)";
            break;
        case "cg":
            $query = "INSERT INTO cg VALUES(null, ?, ?, ?, ?, ?, ?)";
            break;    
              
       } 

     
    
     
      
       $stmtAdd = mysqli_prepare($connection, $query);
       $stmtAdd->bind_param('isssss', $klub_id, $broj_utakmica, $dobijene, $izgubljene, $krajnja_razlika, $bodovi);
       $stmtAdd->execute();
       testQuery($stmtAdd);
       $stmtAdd->close();
       
      
        echo 'Success';

       }
?>
            
            