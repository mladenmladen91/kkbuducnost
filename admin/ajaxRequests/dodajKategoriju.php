<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

    // redirect if not login
    redirect();

     $naziv = clean(strip_tags(trim($_POST['naziv'])));

    // checking if this club is already written into the database
       $queryExists = "SELECT * FROM kategorija WHERE naziv= '{$naziv}'";
       $result = mysqli_query($connection, $queryExists);
       if(!$result){
         die(mysqli_error($connection));
       }
       $count = mysqli_num_rows($result);

   if($naziv === ''){
       echo "Unesite validan naziv";
   }elseif($count > 0){
       echo "Ova kategorija već postoji";
   }else{

    $stmtTagovi = mysqli_prepare($connection, "INSERT INTO kategorija VALUES(null, ?)");
    $stmtTagovi->bind_param('s', $naziv);
    $stmtTagovi->execute();
    if(!$stmtTagovi){
        die(mysqli_error($connection));
    }else{
        echo "Success";
    }
   }
?>
            
            