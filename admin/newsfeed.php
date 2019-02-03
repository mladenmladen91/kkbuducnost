
<?php include "includes/adminHeader.php";?>

<title>Newsfeed</title>

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
                <a href="dodajNewsfeed.php" class="btn dodaj_btn  mb-3">
                    <i class="fas fa-plus"></i>&ensp;DODAJ NEWSFEED</a>
            </div>
        </div>
        <div class="col-lg-12 p-0 text-center" style="overflow-x: auto; margin-bottom: 227px">
            <table class="tableLiga table-hover my-2">
                                  <thead>
                                      <th>ID</th>
                                      <th>DATUM</th>
                                      <th>TEKST</th>
                                 </thead>
                                  <tbody>
                                    <?php
                                     $stmtSezone = mysqli_prepare($connection, "SELECT id, datum, tekst FROM newsfeed ORDER BY id DESC");
                                     $stmtSezone->execute();
                                     testQuery($stmtSezone);
                                     $stmtSezone->bind_result($id, $datum, $tekst);
                                     
                                      while($stmtSezone->fetch()){  
                                   ?>  
                                     <tr class="tableRow">
                                      <td><?php echo $id ?></td>     
                                      <td><?php echo $datum ?></td>
                                      <td><?php echo substr($tekst,0,100) ?></td>
                                         
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