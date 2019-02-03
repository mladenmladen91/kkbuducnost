
<?php include "includes/adminHeader.php";?>

<title>Timovi</title>

<?php

redirect();

?>


</head>

<body>
    
<!-- navigation including -->
<?php include "includes/adminNav.php";?>

<div class="container  px-3 py-3">
        <div class="row">
            <div class="col-sm-6 col-md-5 col-lg-3">
                <a href="dodajTim.php" class="btn dodaj_btn  mb-3">
                    <i class="fas fa-plus"></i>&ensp;DODAJ TIM</a>
            </div>
        </div>
        <div class="col-lg-12 p-0 text-center" style="overflow-x: auto;min-height:61.5vh;">
            <table class="tableLiga table-hover my-2">
                                  <thead>
                                      <th>ID</th>
                                      <th>NAZIV</th>
                                      <th>LOGO</th>
                                      <th>DVORANA</th>
                                      <th></th>
                                      <th></th>
                                 </thead>
                                  <tbody>
                                   <?php
                                     $stmtSezone = mysqli_prepare($connection, "SELECT id, naziv, logo, dvorana FROM timovi");
                                     $stmtSezone->execute();
                                     testQuery($stmtSezone);
                                     $stmtSezone->bind_result($id, $naziv, $logo, $dvorana);
                                     
                                      while($stmtSezone->fetch()){  
                                   ?>  
                                     <tr class="tableRow">
                                      <td><?php echo $id ?></td>     
                                      <td><?php echo $naziv ?></td>
                                      <td><a href="images/timovi/<?php echo $logo ?>" target="_blank"><img class="img-resposnive" src="images/timovi/<?php echo $logo ?>" style="max-height: 30px"></a></td>
                                      <td><?php echo $dvorana ?></td>     
                                      <td>
                                          <a href="izmijeniTim.php?id=<?php echo $id ?>" class="edit_btn">IZMIJENI</a>
                                      </td>
                                      <td>
                                          <input type="hidden" class="rowId" value="<?php echo $id ?>">
                                          <span class="delete_btn">IZBRIŠI</span>
                                          <input type="hidden" class="tableName" value="timovi">
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