<?php 
function __autoload($classname)
	{
		$filename = "Classes/".$classname.".php";
		include_once($filename);
	}
	
	$crClass = new bookingClass();
	$undercrClass = $crClass -> bookingentry($_POST); 

?>
<script>window.location = 'ShowBookings.php?msg=<?php echo $undercrClass; ?>';</script>