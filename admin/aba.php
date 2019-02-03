
<?php include "includes/adminHeader.php";?>

<title>Admin - ABA liga</title>

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
                <a href="dodajTimAba.php" class="btn dodaj_btn  mb-3">
                    <i class="fas fa-plus"></i>&ensp;DODAJ TIM</a>
            </div>
        </div>
        <div class="col-lg-12 p-0 text-center" style="overflow-x: auto;">
            <table class="tableLiga table-hover my-2">
                                  <thead>
                                      <th>ID</th>
                                      <th>KLUB</th>
                                      <th>BROJ UTAKMICA</th>
                                      <th>DOBIJENE</th>
                                      <th>IZGUBLJENE</th>
                                      <th>KRAJNJA RAZLIKA</th>
                                      <th>BODOVI</th>
                                      <th></th>
                                      <th></th>
                                 </thead>
                                  <tbody>
                                     <?php
                                     $stmtSezone = mysqli_prepare($connection, "SELECT a.id, b.naziv, b.logo, a.broj_utakmica, a.dobijene, a.izgubljene, a.krajnja_razlika, a.bodovi FROM aba a JOIN timovi b ON a.klub_id = b.id ORDER BY a.bodovi DESC");
                                     $stmtSezone->execute();
                                     testQuery($stmtSezone);
                                     $stmtSezone->bind_result($id, $naziv, $logo, $broj_utakmica, $dobijene, $izgubljene, $krajnja_razlika, $bodovi);
                                     
                                      while($stmtSezone->fetch()){  
                                   ?>  
                                     <tr class="tableRow">
                                      <td><?php echo $id ?></td>     
                                      <td><a href="images/timovi/<?php echo $logo ?>" target="_blank"><img class="img-resposnive" src="images/timovi/<?php echo $logo ?>" style="max-height: 30px"></a>&ensp;<?php echo $naziv ?></td>
                                      <td><?php echo $broj_utakmica ?></td>
                                      <td><?php echo $dobijene ?></td>
                                      <td><?php echo $izgubljene ?></td>     
                                      <td><?php echo $krajnja_razlika ?></td>
                                      <td><?php echo $bodovi ?></td>
                                      <td>
                                          <a href="izmijeniTimAba.php?id=<?php echo $id ?>" class="edit_btn">IZMIJENI</a>
                                      </td>     
                                      <td>
                                          <input type="hidden" class="rowId" value="<?php echo $id ?>">
                                          <span class="delete_btn">IZBRIŠI</span>
                                          <input type="hidden" class="tableName" value="aba">
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