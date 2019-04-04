<?php
    session_start();

    include "../../includes/db.php";

    if(!$connection){
  	    die('error '.mysqli_error($connection));
    }

if(isset($_GET['delete'])){
    
    $id = $_POST['id'];
    
    
    // deleting photos first
    $albumResult = mysqli_query($connection, "SELECT * FROM trofeji WHERE id={$id}");
    if(!$albumResult){
        die(mysqli_error($connection));
    }
    $row = mysqli_fetch_assoc($albumResult);
    $broj = $row['broj'];
    $trofej = $row['trofej'];
    unlink("../images/trofeji/{$broj}");
    unlink("../images/trofeji/{$trofej}");
    
    $stmtTagovi = mysqli_prepare($connection, "DELETE FROM trofeji WHERE id = ?");
    $stmtTagovi->bind_param('i', $id);
    
    $stmtTagovi->execute();
    
    if(!$stmtTagovi){
        die(mysqli_error($connection));
    }else{
        echo "Success";
    }
}
?>
            
            