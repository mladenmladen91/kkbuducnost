<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

if(isset($_GET['delete'])){
    
    $id = $_POST['id'];
    
   
    
     
    
    $stmtTagovi = mysqli_prepare($connection, "DELETE FROM baneri WHERE id = ?");
    $stmtTagovi->bind_param('i', $id);
    
    $albumResult = mysqli_query($connection, "SELECT * FROM baneri WHERE id={$id}");
    testQuery($albumResult);
    $row = mysqli_fetch_assoc($albumResult);
    $fotografija = $row['fotografija'];
    unlink("../images/baneri/{$fotografija}");
    
    $stmtTagovi->execute();
    
    if(!$stmtTagovi){
        die(mysqli_error($connection));
    }else{
        
        echo "Success";
    }
}
?>
            
            