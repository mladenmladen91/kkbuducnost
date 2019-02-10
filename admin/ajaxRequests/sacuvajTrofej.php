<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

    // redirect if not login
    redirect();

      $naziv = clean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['naziv']))));
      $sezone = strip_tags(trim(mysqli_real_escape_string($connection, $_POST['sezone'])));
       
      $table = $_POST['table'];
       
      // getting images
      $broj = time().$_FILES['broj']['name'];
      $broj_tmp = $_FILES['broj']['tmp_name']; 
                                                 
      $trofej = time().$_FILES['trofej']['name'];
      $trofej_tmp = $_FILES['trofej']['tmp_name'];                                   
if($naziv === '' || $sezone === ''){
    echo "Morate popuniti polja validnim tekstom";
}elseif(!extension($broj)){
          echo "Unesite jpg ili png format fotografije";
}elseif(!extension($trofej)){
          echo "Unesite jpg ili png format fotografije";
     }else{

       $stmtAdd = mysqli_prepare($connection, "INSERT INTO trofeji VALUES(null, ?, ?, ?, ?)");
       $stmtAdd->bind_param('ssss', $naziv, $broj, $sezone, $trofej);
       $stmtAdd->execute();
       testQuery($stmtAdd);
       move_uploaded_file($trofej_tmp,"../images/trofeji/$trofej");
       move_uploaded_file($broj_tmp,"../images/trofeji/$broj");
       $stmtAdd->close();
       
      
        echo 'Success';

}
?>
            
            