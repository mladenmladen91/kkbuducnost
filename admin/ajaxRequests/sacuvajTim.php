<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

    // redirect if not login
    redirect();

      $naziv = clean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['naziv']))));
      $dvorana = clean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['dvorana']))));
      
      
      // getting images
      $fotografija = time().$_FILES['logo']['name'];
      $fotografija_tmp = $_FILES['logo']['tmp_name'];

    if($naziv === '' || $dvorana === ''){
        echo "Morate popuniti sva polja validnim tekstom";
    }else if(!extension($fotografija)){
        echo "Unesite  jpg ili png format fotografije";
    }else{

       $stmtAdd = mysqli_prepare($connection, "INSERT INTO timovi VALUES(null, ?, ?, ?)");
       $stmtAdd->bind_param('sss', $naziv, $fotografija, $dvorana);
       $stmtAdd->execute();
       testQuery($stmtAdd);
       move_uploaded_file($fotografija_tmp,"../images/timovi/$fotografija");
       $stmtAdd->close();
       
       $id = mysqli_insert_id($connection);
   
       $lige = $_POST['liga'];
      
       foreach($lige as $liga){
           $stmtAdd = mysqli_prepare($connection, "INSERT INTO liga_tim VALUES(?, ?)");
           $stmtAdd->bind_param('ii', $liga, $id);
           $stmtAdd->execute();
           testQuery($stmtAdd);
       }

        echo 'Success';
    }
    
?>
            
            