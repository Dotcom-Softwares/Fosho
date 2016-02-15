<?php 
error_reporting(0);
include('include/autoLoad.php');
$id=$_GET['id']; 
$getdetails = new trucktypeClass();
$deletetrucktype = $getdetails -> deletetructypekId($id);
?>
<script>window.location='view_truck_type.php?msg=<?php echo $deletetrucktype; ?>';</script> 

