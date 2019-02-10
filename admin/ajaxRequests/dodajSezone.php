<?php
    session_start();

    
    $connection = mysqli_connect('localhost','root','','kkbuducnost');

     if(!$connection){
  	   die('error '.mysqli_error($connection));
     }

    include "../../includes/functions.php";

    // redirect if not login
    redirect();

    $broj = clean(strip_tags(trim($_POST['broj'])));
    $kategorije = $_POST['kategorije'];
    
   // checking if this club is already written into the database
       $queryExists = "SELECT * FROM sezone WHERE broj= '{$broj}'";
       $result = mysqli_query($connection, $queryExists);
       if(!$result){
         die(mysqli_error($connection));
       }
       $count = mysqli_num_rows($result);

   if($broj === ''){
       echo "Unesite validan broj";
   }elseif($count > 0){
       echo "Ova sezona već postoji";
   }else{

    $stmtTagovi = mysqli_prepare($connection, "INSERT INTO sezone VALUES(null, ?)");
    $stmtTagovi->bind_param('s', $broj);
    $stmtTagovi->execute();
    if(!$stmtTagovi){
        die(mysqli_error($connection));
    }else{
        $stmtKategorija = mysqli_prepare($connection, "SELECT id FROM sezone WHERE broj = ?");
        $stmtKategorija->bind_param('i', $broj);
        $stmtKategorija->execute();
        if(!$stmtKategorija){
                die(mysqli_error($connection));
        }
        $stmtKategorija->bind_result($id);
        $stmtKategorija->fetch();
        $stmtKategorija->close();
        
        
        foreach($kategorije as $kategorija){
           $query = "INSERT INTO sezona_kategorija(sezona_id, kategorija_id) VALUES({$id}, {$kategorija})";
           $result = mysqli_query($connection, $query);    
           if(!$result){
                die(mysqli_error($connection));
            }
        }
        
        echo "Success";
     }
   }
?>
            
            