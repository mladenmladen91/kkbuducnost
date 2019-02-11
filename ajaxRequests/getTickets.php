<?php
session_start();

include "../includes/db.php";
    
include "../includes/functions.php";

if(empty($_POST['email']) || empty($_POST['name']) || empty($_POST['message'])){
     echo ($_SESSION['lang'] === 'en')? "* Complete all fields":"* Popunite sva polja!";
}else{

$mail = mysqli_real_escape_string($connection, $_POST['email']);
$name = mysqli_real_escape_string($connection, $_POST['name']);
$message = mysqli_real_escape_string($connection, $_POST['message']);

if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
  {
        $secret = '6LfdGoUUAAAAAN58g4e39LIhYV6symVIDWiBtCNm';
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if($responseData->success)
        {
            $to = "office@kkbuducnost.me";
            $subject = $name.", karte";
            $header = "From:".$mail;
            if(mail($to, $subject, $message, $header)){
               echo ($_SESSION['lang'] === 'en')? "* Mail successfully sent":"* Uspješno ste poslali mail!";
            }else{
               echo ($_SESSION['lang'] === 'en')? "* Mail unsuccessfully sent":"* Nespješno ste poslali mail!"; 
            }
        }
        else
        {
            echo "* Verifikacija neuspješna";
        }
   }else{
    echo ($_SESSION['lang'] === 'en')? "* Verify your message":"* Verifikujte Vašu poruku";
   }

}

