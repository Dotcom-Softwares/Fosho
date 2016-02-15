<?php  

session_start(); 
class dbConfig
{
		function config()
		{
		
		mysql_connect ("localhost" , "root" , "");
		$config = mysql_select_db('fosho'); 
		if(!$config) die ("Failed to select database");
		}

}
?>