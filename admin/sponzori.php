<?php 

include "includes/adminHeader.php";

redirect();

?>

<title>Sponzori</title>

</head>

<body>
    
<!-- navigation including -->
<?php include "includes/adminNav.php";?>

<div class="container  px-3 py-3">
        <div class="row">
            <div class="col-sm-6 col-md-5 col-lg-3">
                <a href="dodajSponzora.php" class="btn dodaj_btn  mb-3">
                    <i class="fas fa-plus"></i>&ensp;DODAJ SPONZORA</a>
            </div>
        </div>
        <div class="col-lg-12 p-0 text-center" style="overflow-x: auto;min-height:61.5vh;">
            <table class="tableLiga table-hover my-2">
                                  <thead>
                                      <th>ID</th>
                                      <th>LINK</th>
                                      <th>FOTOGRAFIJA</th>
                                      <th>RANG</th>
                                      <th>AKTIVAN</th>
                                      <th></th>
                                      <th></th>
                                 </thead>
                                  <tbody>
                                   <?php
                                     $stmtSezone = mysqli_prepare($connection, "SELECT id, fotografija, link, ranking, aktivan FROM sponzori");
                                     $stmtSezone->execute();
                                     testQuery($stmtSezone);
                                     $stmtSezone->bind_result($id, $fotografija, $link, $rank, $aktivan);
                                     
                                      while($stmtSezone->fetch()){  
                                   ?>      
                                     <tr class="tableRow">
                                      <td><?php echo $id; ?></td>     
                                      <td><?php echo $link; ?></td>
                                      <td><a href="images/sponzori/<?php echo $fotografija ?>" target="_blank"><img class="img-resposnive" src="images/sponzori/<?php echo $fotografija ?>" style="max-height: 30px"></a></td>
                                      <td><?php echo $rank ?></td>
                                      <td>
                                          <?php $status = ($aktivan === 'aktivan')? 'neaktivan': 'aktivan'  ?>
                                          <label class="switch" onclick="status('<?php echo $status ?>', 'sponzori', <?php echo $id ?>)">
                                            <input class="input" type="checkbox" <?php echo ($aktivan === 'aktivan')? 'checked': '' ?> >
                                            <span class="slider round"></span>
                                          </label>
                                      </td>     
                                      <td>
                                          <a href="izmijeniSponzora.php?id=<?php echo $id; ?>" class="edit_btn">IZMIJENI</a>
                                      </td>
                                      <td>
                                          <input type="hidden" class="rowId" value="<?php echo $id ?>">
                                          <span class="delete_btn">IZBRIŠI</span>
                                          <input type="hidden" class="tableName" value="sponzori">
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