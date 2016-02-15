<?php 
error_reporting(0);
include('include/autoLoad.php');
$id=$_GET['id'];
$getdetails = new trucktypeClass();
$deletecargotype = $getdetails -> deletecargotypekId($id);
?>
<script>window.location='view_cargo_type.php?msg=<?php echo $deletecargotype; ?>';</script> 

