<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

if(isset($_GET['delete'])){
    
    $id = $_POST['id'];
    
   
    
     
    
    $stmtTagovi = mysqli_prepare($connection, "DELETE FROM rezultati WHERE id = ?");
    $stmtTagovi->bind_param('i', $id);
    
    $stmtTagovi->execute();
    
    if(!$stmtTagovi){
        die(mysqli_error($connection));
    }else{
        
        echo "Success";
    }
}
?>
            
            