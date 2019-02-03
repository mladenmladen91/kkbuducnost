<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

    $id = $_POST['id'];
    $fotografija = $_POST['photo'];
    
    $stmtTagovi = mysqli_prepare($connection, "DELETE FROM fotografije WHERE id = ?");
    $stmtTagovi->bind_param('i', $id);
    unlink("../images/fotografije/{$fotografija}");
    $stmtTagovi->execute();
    testQuery($stmtTagovi);
    
    echo "Success";
    

?>
            
            