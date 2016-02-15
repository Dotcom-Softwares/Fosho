<?php 

include('include/autoLoad.php');

$regObj = new trucksClass();

$res = $regObj->truckentry($_POST);


?>


<script>window.location='manage_vehicle.php?msg=<?php echo $res; ?>';</script> 

