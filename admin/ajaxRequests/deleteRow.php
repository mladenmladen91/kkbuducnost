<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

    // redirect if not login
    redirect();

if(isset($_GET['delete'])){
    
    $id = $_POST['id'];
    $table = $_POST['table'];
   
    
    switch($table){
    
        case "tagovi":
            $query = "DELETE FROM tagovi where id = ?";
            break;
        case "kategorija":
            $query = "DELETE FROM kategorija where id = ?";
            break;
        case "sezone":
            $query = "DELETE FROM sezone where id = ?";
            break;
        case "prvi_tim":
            $query = "DELETE FROM prvi_tim where id = ?";
            break;
        case "aba":
            $query = "DELETE FROM aba where id = ?";
            break;
        case "euroleague":
            $query = "DELETE FROM euroleague where id = ?";
            break;
        case "cg":
            $query = "DELETE FROM cg where id = ?";
            break;
        case "eurocup":
            $query = "DELETE FROM eurocup where id = ?";
            break; 
        case "lige":
            $query = "DELETE FROM lige where id = ?";
            break;    
            
   }
    
     
    
    $stmtTagovi = mysqli_prepare($connection, $query);
    $stmtTagovi->bind_param('i', $id);
    $stmtTagovi->execute();
    if(!$stmtTagovi){
        die(mysqli_error($connection));
    }else{
        echo "Success";
    }
}
?>
            
            