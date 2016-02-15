<?php 

include('include/autoLoad.php');

$regObj = new trucktypeClass();

$res = $regObj->trucktypeupdate($_POST);


?>


<script>window.location='view_truck_type.php?msg=<?php echo $res; ?>';</script> 

