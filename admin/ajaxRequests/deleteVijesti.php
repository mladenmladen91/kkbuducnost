<?php
    session_start();

    $connection = mysqli_connect('localhost','root','','kkbuducnost');

    if(!$connection){
  	    die('error '.mysqli_error($connection));
    }

if(isset($_GET['delete'])){
    
    $id = $_POST['id'];
    
    $stmtTagovi = mysqli_prepare($connection, "DELETE FROM vijesti WHERE id = ?");
    $stmtTagovi->bind_param('i', $id);
    
    $albumResult = mysqli_query($connection, "SELECT * FROM vijesti WHERE id={$id}");
    if(!$albumResult){
        die(mysqli_error($connection));
    }
    $row = mysqli_fetch_assoc($albumResult);
    $fotografija = $row['fotografija'];
    unlink("../images/vijesti/{$fotografija}");
    
    $stmtTagovi->execute();
    
    if(!$stmtTagovi){
        die(mysqli_error($connection));
    }else{
        echo "Success";
    }
}
?>
            
            