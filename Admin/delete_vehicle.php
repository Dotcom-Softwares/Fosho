<?php 
error_reporting(0);
include('include/autoLoad.php');
$id=$_GET['id'];
$getdetails = new trucksClass();
$deletetruck = $getdetails -> deletetruckId($id);
?>
<script>window.location='view_vehicle.php?msg=<?php echo $deletetruck; ?>';</script> 

