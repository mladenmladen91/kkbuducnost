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
    
        case "prvi_tim":
            $query = "DELETE FROM prvi_tim WHERE id = ?";
            $fotografijaUpit = "SELECT fotografija FROM prvi_tim WHERE id = {$id}";
            break;
        case "juniori":
            $query = "DELETE FROM juniori WHERE id = ?";
            $fotografijaUpit = "SELECT fotografija FROM juniori WHERE id = {$id}";
            break;
        case "kadeti":
            $query = "DELETE FROM kadeti WHERE id = ?";
            $fotografijaUpit = "SELECT fotografija FROM kadeti WHERE id = {$id}";
            break;
        case "pioniri":
            $query = "DELETE FROM pioniri WHERE id = ?";
            $fotografijaUpit = "SELECT fotografija FROM pioniri WHERE id = {$id}";
            break;
        case "menadzment":
            $query = "DELETE FROM menadzment WHERE id = ?";
            $fotografijaUpit = "SELECT fotografija FROM menadzment WHERE id = {$id}";
            break;    
                
            
    }
    
     
    
    $stmtTagovi = mysqli_prepare($connection, $query);
    $stmtTagovi->bind_param('i', $id);
    
    $result = mysqli_query($connection, $fotografijaUpit);
    testQuery($result);
    $row = mysqli_fetch_assoc($result);
    $fotografija = $row['fotografija'];
    unlink("../images/igraci/{$fotografija}");
    
    $stmtTagovi->execute();
    
    if(!$stmtTagovi){
        die(mysqli_error($connection));
    }else{
        echo "Success";
    }
}
?>
            
            