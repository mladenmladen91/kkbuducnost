<?php 

include "includes/adminHeader.php";

redirect();

?>

<title>Podešavanje</title>


</head>

<body>
    
<!-- navigation including -->
<?php include "includes/adminNav.php";?>

<div class="container  px-3 py-3">
        <div class="row" id="table_container">
        </div>        
</div>
<?php 
    $pageName = basename(__FILE__);
    include "scripts.php";
?>

    
    
<!--  footer including  -->
<?php include "includes/adminFooter.php";?>