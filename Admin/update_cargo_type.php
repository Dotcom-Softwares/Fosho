<?php 

include('include/autoLoad.php');

$regObj = new trucktypeClass();

$res = $regObj->cargotypeupdate($_POST);


?>


<script>window.location='view_cargo_type.php?msg=<?php echo $res; ?>';</script> 

