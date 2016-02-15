<?php
$conn = mysql_connect("localhost", "translin_fosho", "fosho");
if(!$conn) die("Failed to connect to database!");
$status = mysql_select_db('translin_fosho', $conn);
if(!$status) die("Failed to select database!");
date_default_timezone_set("Asia/Kolkata");
date_default_timezone_get();
$dateti = date('d/m/Y h:i:s a', time());
$rawData = file_get_contents("php://input");
mysql_query("INSERT INTO `testgps` ( `details`,`datetime`) VALUES ( '$rawData','$dateti')");
if (isset ($_REQUEST))
{
	foreach($_REQUEST as $reg=> $b)
	{
		
		mysql_query("INSERT INTO `testgps` ( `details`,`datetime`) VALUES ( '$b','$dateti')");
	}
}
		
?>
