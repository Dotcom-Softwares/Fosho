<?php 
/*  Azhar Coded*/
//session_start();
	error_reporting(0);
	include('include/autoLoad.php');

	$under = new loginClass();
	$create = $under -> logincheck($_POST);
	
	
	$myData = array('response'=>$create);
	$arg = base64_encode( json_encode($myData) );
	
	
	/*$myData = json_decode( base64_decode( $_GET['id'] ) );
	$cid = $myData->{'ci'};
	$sid = $myData->{'si'};*/
	
	
	
	//$useranme = $_SESSION['username'];
	if($create == 'success')
	{ ?>
	
	<script>window.location='dashboard.php?msg=<?php echo $arg; ?>';</script>
	<?php 
	
	}
	if($create == 'error')
	{
	?>
	
	<script>window.location='index.php?msg=<?php echo $arg; ?>';</script>
	<?php 
	}


?>

