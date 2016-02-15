<?php 

include('include/autoLoad.php');

$regObj = new trucksClass();

$res = $regObj->truckupdate($_POST);


?>


<script>window.location='view_vehicle.php?msg=<?php echo $res; ?>';</script> 

