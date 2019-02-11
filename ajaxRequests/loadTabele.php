<?php

include "../includes/db.php";
    
include "../includes/functions.php";

$array = [];

// getting the active league names
$query = "SELECT * FROM lige WHERE status='aktivan'";
$result = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($result)){
    array_push($array, $row['naziv']);
}


            foreach($array as $liga){
                
             if($liga === 'prva liga'){
                $stmtSezone = mysqli_prepare($connection, "SELECT a.id, b.naziv, b.logo, a.broj_utakmica, a.dobijene, a.izgubljene, a.krajnja_razlika, a.bodovi FROM cg a JOIN timovi b ON a.klub_id = b.id ORDER BY a.bodovi DESC");
                $stmtSezone->execute();
                testQuery($stmtSezone);
                $stmtSezone->bind_result($id, $naziv, $logo, $broj_utakmica, $dobijene, $izgubljene, $krajnja_razlika, $bodovi); 
             }else{
                $stmtSezone = mysqli_prepare($connection, "SELECT a.id, b.naziv, b.logo, a.broj_utakmica, a.dobijene, a.izgubljene, a.krajnja_razlika, a.bodovi FROM {$liga} a JOIN timovi b ON a.klub_id = b.id ORDER BY a.bodovi DESC");
               // $stmtSezone->bind_param('s', $liga); 
                
             }
                
                $stmtSezone->execute();
                testQuery($stmtSezone);
                $stmtSezone->bind_result($id, $naziv, $logo, $broj_utakmica, $dobijene, $izgubljene, $krajnja_razlika, $bodovi);
            
?>
             <div class="col-lg-12 table_show">
                <div class="row justify-content-center">  
                <div class="col-lg-10 game_navigation mb-4">
                                 <div class="row">
                                     <div class="col-lg-12 text-center game_navigation">
                                         <span class="game_navigation_dir game_navigation_dir_kalendar"><?php echo strtoupper($liga) ?></span>
                                     </div>
                                  </div>       
                             </div>
                             <div class="col-lg-12" style="margin-bottom: 50px">
                                <div class="row justify-content-center align-items-center"> 
                                <div class="col-lg-10 mb-4" style="overflow:auto !important"> 
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
                                      $i=1;
                                      while($stmtSezone->fetch()){     
                                  ?>
                                     <tr>  
                                      <td><?php echo $i ?>.</td>
                                      <td style="text-align:left !important"><img class="img-resposnive" src="admin/images/timovi/<?php echo $logo ?>" style="max-height: 16px">&ensp;<?php echo $naziv ?></td>
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
                                </div>
                                </div>    
                             </div>
                 </div>
                 </div> 
  <?php } ?>              