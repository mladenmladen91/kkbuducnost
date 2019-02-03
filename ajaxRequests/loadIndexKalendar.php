<?php

include "../includes/db.php";
    
include "../includes/functions.php";

            $query = "SELECT * FROM kalendar WHERE datum >= CURDATE() ORDER BY datum ASC LIMIT 10";
            $result = mysqli_query($connection, $query);
            testQuery($result);
?>

<table class="tableLiga table-hover">
                                  <thead>
                                      <th>DATUM</th>
                                      <th>VRIJEME</th>
                                      <th>UTAKMICA</th>
                                  </thead>
                                  <tbody>
                                    <?php
                                       while($row = mysqli_fetch_assoc($result)){
                                    ?>  
                                     <tr>  
                                      <td style="color:#004b93"><?php echo $newDate = date("d.m.Y", strtotime($row['datum'])) ?></td>
                                      <td style="color:#f5a000"><?php echo $newDate = date("H:m", strtotime($row['vrijeme'])) ?></td>
                                      <td><?php echo $row['domacin'] ?>&ensp;<img class="img-resposnive" src="admin/images/timovi/<?php echo $row['domacin_logo'] ?>" style="max-height: 16px">&ensp;VS&ensp;<img class="img-resposnive" src="admin/images/timovi/<?php echo $row['gost_logo'] ?>" style="max-height: 16px">&ensp;<?php echo $row['gost'] ?></td>
                                     </tr>
                                    <?php } ?>  
                                  </tbody>     
                                 </table>

