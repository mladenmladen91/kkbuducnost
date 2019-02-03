<?php
session_start();

include "../includes/db.php";
    
include "../includes/functions.php";

$mail = mysqli_real_escape_string($connection, $_POST['mail']);


// checking if this email is already subscribed
$query = "SELECT * FROM newsfeed_emails WHERE email='{$mail}'";
$result = mysqli_query($connection, $query);
$count = mysqli_num_rows($result);


$mail = filter_var($mail, FILTER_SANITIZE_EMAIL);

if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
    echo ($_SESSION['lang'] === 'en')? "* Enter valid e-mail address":"* Unesite validnu e-mail adresu";    
}elseif($count > 0){
    echo ($_SESSION['lang'] === 'en')? "* E-mail address already exists":"* Ova email adresa je već prijavljena";
}else{
    $stmt = mysqli_prepare($connection, "INSERT INTO newsfeed_emails VALUES(null, ?)");
    $stmt->bind_param('s', $mail);
    $stmt->execute();
    testQuery($stmt);
    
    echo ($_SESSION['lang'] === 'en')? "* You have successfully applied for the newsfeed list":"* Uspješno ste se prijavili na našu newsfeed listu";
    
}

