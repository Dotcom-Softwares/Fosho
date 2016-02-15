<?php 
function __autoload($classname)
	{
		$filename = "Classes/".$classname.".php";
		include_once($filename);
	}
	
	$crClass = new trucktypeClass();
	$undercrClass = $crClass -> cargotypeentry($_POST); 

?><script>window.location = 'view_cargo_type.php?msg=<?php echo $undercrClass; ?>';</script>