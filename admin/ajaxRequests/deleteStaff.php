<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

if(isset($_GET['delete'])){
    
    $id = $_POST['id'];
    $table = $_POST['table'];
   
    
    switch($table){
    
        case "menadzment":
            $query = "DELETE FROM menadzment WHERE id = ?";
            $fotografijaUpit = "SELECT fotografija FROM menadzment WHERE id = {$id}";
            break;
        case "mladje_selekcije":
            $query = "DELETE FROM mladje_selekcije WHERE id = ?";
            $fotografijaUpit = "SELECT fotografija FROM mladje_selekcije WHERE id = {$id}";
            break;
        case "osoblje":
            $query = "DELETE FROM osoblje WHERE id = ?";
            $fotografijaUpit = "SELECT fotografija FROM osoblje WHERE id = {$id}";
            break; 
        case "strucni_stab":
            $query = "DELETE FROM strucni_stab WHERE id = ?";
            $fotografijaUpit = "SELECT fotografija FROM strucni_stab WHERE id = {$id}";
            break; 
        case "upravni_odbor":
            $query = "DELETE FROM upravni_odbor WHERE id = ?";
            $fotografijaUpit = "SELECT fotografija FROM upravni_odbor WHERE id = {$id}";
            break;
            
                
            
    }
    
     
    
    $stmtTagovi = mysqli_prepare($connection, $query);
    $stmtTagovi->bind_param('i', $id);
    
    $result = mysqli_query($connection, $fotografijaUpit);
    testQuery($result);
    $row = mysqli_fetch_assoc($result);
    $fotografija = $row['fotografija'];
    unlink("../images/staff/{$fotografija}");
    
    $stmtTagovi->execute();
    
    if(!$stmtTagovi){
        die(mysqli_error($connection));
    }else{
        echo "Success";
    }
}
?>
            
            