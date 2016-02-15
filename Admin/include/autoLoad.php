
<?php
session_start();
function __autoload($classname)
	{
		
		$filename="Classes/" .$classname. ".php";
		include_once($filename);	
		
	}
	
	?>