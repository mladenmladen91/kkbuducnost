<?php

// function for testing queries
function testQuery($query){
    if(!$query){
        die(mysqli_error($connection));
    }
}
// function for redirecting when user is not logged
function redirect(){
    if(!isset($_SESSION['username'])){
        header('location: index.php');
    }
}