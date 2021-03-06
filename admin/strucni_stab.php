
<?php 

include "includes/adminHeader.php";

redirect();

?>

<title>Admin - stručni štab</title>

<?php



?>


</head>

<body>
    
<!-- navigation including -->
<?php include "includes/adminNav.php";?>

<div class="container  px-3 py-3">
        <div class="row">
            <div class="col-sm-6 col-md-5 col-lg-3">
                <a href="dodajClanaStaba.php" class="btn dodaj_btn  mb-3">
                    <i class="fas fa-plus"></i>&ensp;DODAJ ČLANA</a>
            </div>
        </div>
        <div class="col-lg-12 p-0 text-center" style="overflow-x: auto;min-height:61.5vh;">
            <table class="tableLiga table-hover my-2">
                                  <thead>
                                      <th>ID</th>
                                      <th>IME</th>
                                      <th>PREZIME</th>
                                      <th>POZICIJA</th>
                                      <th>FOTOGRAFIJA</th>
                                      <th></th>
                                      <th></th>
                                 </thead>
                                  <tbody>
                                    <?php
                                     $stmtSezone = mysqli_prepare($connection, "SELECT id, ime, prezime, pozicija, fotografija FROM strucni_stab");
                                     $stmtSezone->execute();
                                     testQuery($stmtSezone);
                                     $stmtSezone->bind_result($id, $ime, $prezime, $pozicija, $fotografija);
                                     
                                      while($stmtSezone->fetch()){  
                                   ?>   
                                     <tr class="tableRow">
                                      <td><?php echo $id ?></td>     
                                      <td><?php echo $ime ?></td>
                                      <td><?php echo $prezime ?></td>
                                      <td><?php echo $pozicija ?></td>
                                      <td><a href="images/staff/<?php echo $fotografija ?>" target="_blank"><img class="img-resposnive" src="images/staff/<?php echo $fotografija ?>" style="max-height: 60px"></a></td>     
                                      <td>
                                          <a href="izmijeniClanaStaba.php?id=<?php echo $id ?>" class="edit_btn">IZMIJENI</a>
                                      </td>
                                      <td>
                                           <input type="hidden" class="rowId" value="<?php echo $id ?>">
                                          <span class="delete_btn">IZBRIŠI</span>
                                          <input type="hidden" class="tableName" value="strucni_stab">
                                      </td>
                                      </tr>     
                                   <?php } ?>    
                                  </tbody>     
                                 </table>
        </div>
</div>
<?php 
    $pageName = basename(__FILE__);
    include "scripts.php";
?>
    
<!--  footer including  -->
<?php include "includes/adminFooter.php";?>