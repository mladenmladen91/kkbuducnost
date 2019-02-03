
<?php include "includes/adminHeader.php";?>

<title>Admin vijesti</title>

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
                <a href="dodajVijest.php" class="btn dodaj_btn  mb-3">
                    <i class="fas fa-plus"></i>&ensp;DODAJ VIJEST</a>
            </div>
        </div>
        <div class="col-lg-12 p-0 text-center" style="overflow-x: auto;min-height:61.5vh;">
            <table class="tableLiga table-hover my-2">
                                  <thead>
                                      <th>ID</th>
                                      <th>NASLOV</th>
                                      <th>TEKST</th>
                                      <th>FOTOGRAFIJA</th>
                                      <th>DATUM</th>
                                      <th>KATEGORIJA</th>
                                      <th>AKTIVNO</th>
                                      <th></th>
                                      <th></th>
                                 </thead>
                                  <tbody>
                                    <?php
                                     $stmtSezone = mysqli_prepare($connection, "SELECT a.id, a.naslov, a.tekst, a.datum, a.fotografija, b.naziv, a.aktivno FROM vijesti a JOIN kategorija b ON a.kategorija_id = b.id ORDER BY id DESC");
                                     $stmtSezone->execute();
                                     testQuery($stmtSezone);
                                     $stmtSezone->bind_result($id, $naslov, $tekst, $datum, $fotografija, $kategorija, $aktivan);
                                     
                                      while($stmtSezone->fetch()){  
                                   ?>  
                                     <tr class="tableRow">
                                      <td><?php echo $id ?></td>     
                                      <td><?php echo $naslov ?></td>
                                      <td><?php echo substr($tekst,0,100) ?></td>
                                      <td><img class="img-resposnive" src="images/vijesti/<?php echo $fotografija ?>" style="max-height: 30px"></td>
                                      <td><?php echo $datum ?></td>
                                      <td><?php echo $kategorija ?></td>
                                      <td>
                                          <?php $status = ($aktivan === 'aktivan')? 'neaktivan': 'aktivan'  ?>
                                          <label class="switch" onclick="status('<?php echo $status ?>', 'vijesti', <?php echo $id ?>)">
                                            <input class="input" type="checkbox" <?php echo ($aktivan === 'aktivan')? 'checked': '' ?> >
                                            <span class="slider round"></span>
                                          </label>
                                      </td>
                                      <td>
                                          <a href="pregledVijesti.php?id=<?php echo $id; ?>" class="edit_btn">PREGLED</a>
                                      </td>
                                      <td>
                                          <input type="hidden" class="rowId" value="<?php echo $id ?>">
                                          <span class="delete_btn">IZBRIŠI</span>
                                          <input type="hidden" class="tableName" value="vijesti">
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