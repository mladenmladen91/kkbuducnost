<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

     // redirect if not login
    redirect();

if(isset($_GET['delete'])){
    
    $id = $_POST['id'];
    
   
    
     
    
    $stmtTagovi = mysqli_prepare($connection, "DELETE FROM timovi WHERE id = ?");
    $stmtTagovi->bind_param('i', $id);
    
    $albumResult = mysqli_query($connection, "SELECT * FROM timovi WHERE id={$id}");
    testQuery($albumResult);
    $row = mysqli_fetch_assoc($albumResult);
    $fotografija = $row['logo'];
    unlink("../images/timovi/{$fotografija}");
    
    $stmtTagovi->execute();
    
    if(!$stmtTagovi){
        die(mysqli_error($connection));
    }else{
        
        $query = "DELETE FROM liga_tim WHERE tim_id={$id}";
        $result = mysqli_query($connection, $query);
        if(!$result){
            die(mysqli_error($connection));
        }
        
        echo "Success";
    }
}
?>
            
            