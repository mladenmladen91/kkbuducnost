<?php
session_start();

include "../../includes/db.php";
    
include "../../includes/functions.php";
?>
   <select class="form-control form-control-lg add_news_form_select" id="tagSelect" name="tagovi[]" required multiple>
         <?php 
            $stmtTim = mysqli_prepare($connection, "SELECT id, naziv FROM tagovi");
            $stmtTim->execute();
            testQuery($stmtTim);
            $stmtTim->bind_result($id, $naziv);
                                     
            while($stmtTim->fetch()){
         ?>    
                <option value="<?php echo $id ?>"><?php echo $naziv ?></option>
         <?php } ?>
    </select>
<script>
 $(document).ready(function(){
     $("#tagSelect").select2();
 });

</script>