<?php

// This is a sample code in case you wish to check the username from a mysql db table

	
				mysql_connect ("localhost" , "root" , "");
				$config = mysql_select_db('fosho'); 
				if(!$config) die ("Failed to select database");
				
		
		  $email=$_POST["email"];
		  $query=mysql_query("SELECT * FROM user_login where user_email='$email' ");
		 
		  $find=mysql_num_rows($query);
		 
		  echo $find;

?>