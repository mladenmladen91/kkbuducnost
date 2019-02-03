<?php

include "../includes/db.php";
    
include "../includes/functions.php";

$category = $_POST['category'];
          
    switch($category){
        case "aba":
            $stmt = mysqli_prepare($connection, "SELECT b.naziv, b.logo, a.broj_utakmica, a.dobijene, a.izgubljene, a.krajnja_razlika, a.bodovi  FROM aba a JOIN timovi b ON a.klub_id=b.id ORDER BY a.bodovi DESC");
            break;
        case "euroleague":
            $stmt = mysqli_prepare($connection, "SELECT b.naziv, b.logo, a.broj_utakmica, a.dobijene, a.izgubljene, a.krajnja_razlika, a.bodovi  FROM euroleague a JOIN timovi b ON a.klub_id=b.id ORDER BY a.bodovi DESC");
            break;
        case "eurocup":
            $stmt = mysqli_prepare($connection, "SELECT b.naziv, b.logo, a.broj_utakmica, a.dobijene, a.izgubljene, a.krajnja_razlika, a.bodovi  FROM eurocup a JOIN timovi b ON a.klub_id=b.id ORDER BY a.bodovi DESC");
            break;
        case "prva liga":
            $stmt = mysqli_prepare($connection, "SELECT b.naziv, b.logo, a.broj_utakmica, a.dobijene, a.izgubljene, a.krajnja_razlika, a.bodovi  FROM cg a JOIN timovi b ON a.klub_id=b.id ORDER BY a.bodovi DESC");
            break;    
            
    }
   
?>

<table class="tableLiga table-hover">
                                  <thead>
                                      <th>POZ</th>
                                      <th>KLUB</th>
                                      <th>BR.UT</th>
                                      <th>DOB.</th>
                                      <th>IZG.</th>
                                      <th>K.R.</th>
                                      <th>BOD</th>
                                  </thead>
                                  <tbody>
                                  <?php
                                     $stmt->execute();
                                     testQuery($stmt);
                                     $stmt->bind_result($naziv, $logo, $broj_utakmica, $dobijene, $izgubljene, $krajnja_razlika, $bodovi);    
                                     
                                     $i=1;     
                                     while($stmt->fetch()){  
                                  ?>      
                                     <tr>  
                                      <td><?php echo $i; ?></td>
                                      <td><img class="img-resposnive" src="admin/images/timovi/<?php echo $logo ?>" style="max-height: 16px">&ensp;<?php echo $naziv ?></td>
                                      <td><?php echo $broj_utakmica ?></td>
                                      <td><?php echo $dobijene ?></td>
                                      <td><?php echo $izgubljene ?></td>
                                      <td><?php echo $krajnja_razlika ?></td>
                                      <td><?php echo $bodovi ?></td>
                                     </tr>
                                    <?php 
                                       $i++;
                                        } 
                                    ?>  
                                  </tbody>     
                                 </table>

