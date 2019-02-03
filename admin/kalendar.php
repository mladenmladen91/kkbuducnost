
<?php 

include "includes/adminHeader.php";

redirect();

?>

<title>Kalendar</title>


</head>

<body>
    
<!-- navigation including -->
<?php include "includes/adminNav.php";?>

<div class="container  px-3 py-3">
        <div class="row">
            <div class="col-sm-6 col-md-5 col-lg-3">
                <a href="dodajMec.php" class="btn dodaj_btn  mb-3">
                    <i class="fas fa-plus"></i>&ensp;DODAJ MEČ</a>
            </div>
        </div>
        <div class="col-lg-12 p-0 text-center" style="overflow-x: auto;min-height:61.5vh;">
            <table class="tableLiga table-hover my-2">
                                  <thead>
                                      <th>ID</th>
                                      <th>DOMAĆIN</th>
                                      <th>GOST</th>
                                      <th>DATUM</th>
                                      <th>VRIJEME</th>
                                      <th>LIGA</th>
                                      <th></th>
                                      <th></th>
                                 </thead>
                                  <tbody>
                                    <?php
                                     $query = "SELECT a.id, a.domacin, a.gost, a.datum, a.vrijeme, b.naziv FROM kalendar a JOIN lige b ON a.liga_id = b.id ORDER BY a.id DESC";
                                     $result = mysqli_query($connection, $query);
                                     testQuery($result);
                                     
                                     $rezultati = [];  
                                      while($row = mysqli_fetch_assoc($result)){ 
                                         array_push($rezultati, $row);
                                      }
                                      mysqli_close($connection);
                                      
                                      for($i=0; $i < sizeof($rezultati); $i++){
                                   ?>  
                                     <tr class="tableRow">
                                      <td><?php echo $rezultati[$i]['id'] ?></td> <td><?php echo $rezultati[$i]['domacin'] ?>
                                      <td><?php  echo $rezultati[$i]['gost']; ?></td>     
                                      <td><?php echo $rezultati[$i]['datum'] ?></td>
                                      <td><?php echo $rezultati[$i]['vrijeme'] ?></td>     
                                      <td><?php echo $rezultati[$i]['naziv'] ?></td>     
                                      <td>
                                          <a href="izmijeniMec.php?id=<?php echo $rezultati[$i]['id'] ?>" class="edit_btn">IZMIJENI</a>
                                      </td>
                                      <td>
                                          <input type="hidden" class="rowId" value="<?php echo $rezultati[$i]['id'] ?>">
                                          <span class="delete_btn">IZBRIŠI</span>
                                          <input type="hidden" class="tableName" value="kalendar">
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