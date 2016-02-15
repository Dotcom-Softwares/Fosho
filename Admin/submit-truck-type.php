<?php

	include('include/autoLoad.php');
	
	$crClass = new trucktypeClass();
	$undercrclass = $crClass -> trucktypeentry($_POST);
?>

<script>window.location='view_truck_type.php?msg=<?php echo $undercrclass; ?>';</script>