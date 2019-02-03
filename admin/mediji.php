<?php 

include "includes/adminHeader.php";

redirect();

?>

<title>Mediji</title>

</head>

<body>
    
<!-- navigation including -->
<?php include "includes/adminNav.php";?>

<div class="container  px-3 py-3">
        <div class="row">
            <div class="col-sm-6 col-md-5 col-lg-3">
                <a href="dodajIzjavu.php" class="btn dodaj_btn  mb-3">
                    <i class="fas fa-plus"></i>&ensp;DODAJ IZJAVU</a>
            </div>
        </div>
        <div class="col-lg-12 p-0 text-center" style="overflow-x: auto; margin-bottom: 227px">
            <table class="tableLiga table-hover my-2">
                                  <thead>
                                      <th>ID</th>
                                      <th>NASLOV</th>
                                      <th>IZJAVA</th>
                                      <th>DATUM</th>
                                      <th></th>
                                 </thead>
                                  <tbody>
                                   <?php
                                     $stmtSezone = mysqli_prepare($connection, "SELECT id, naslov, izjava, datum FROM mediji");
                                     $stmtSezone->execute();
                                     testQuery($stmtSezone);
                                     $stmtSezone->bind_result($id, $naslov, $izjava, $datum);
                                     
                                      while($stmtSezone->fetch()){  
                                   ?>       
                                     <tr class="tableRow">
                                      <td><?php echo $id; ?></td>     
                                      <td><?php echo $naslov; ?></td>
                                      <td><a href="izjave/<?php echo $izjava; ?>" target="_blank"><img class="img-resposnive" src="images/pdf.svg" style="max-height: 30px"></a></td>
                                      <td><?php echo $datum; ?></td>     
                                      <td>
                                          <input type="hidden" class="rowId" value="<?php echo $id ?>">
                                          <span class="delete_btn">IZBRIŠI</span>
                                          <input type="hidden" class="tableName" value="mediji">
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