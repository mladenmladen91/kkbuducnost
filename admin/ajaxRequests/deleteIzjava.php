<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

if(isset($_GET['delete'])){
    
    $id = $_POST['id'];
    
   
    
     
    
    $stmtTagovi = mysqli_prepare($connection, "DELETE FROM mediji WHERE id = ?");
    $stmtTagovi->bind_param('i', $id);
    
    $albumResult = mysqli_query($connection, "SELECT * FROM mediji WHERE id={$id}");
    testQuery($albumResult);
    $row = mysqli_fetch_assoc($albumResult);
    $fotografija = $row['izjava'];
    unlink("../izjave/{$fotografija}");
    
    $stmtTagovi->execute();
    
    if(!$stmtTagovi){
        die(mysqli_error($connection));
    }else{
        
        echo "Success";
    }
}
?>
            
            