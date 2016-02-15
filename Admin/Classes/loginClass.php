<?php 
/*  Azhar Coded */
error_reporting(0);
class loginClass
{
	
		function __construct()
		{
			dbConfig::config();
		}
		
		
		public function logincheck($data)
		
		{		
		
			
			
			 $username = $data['username'];
			 $password = $data['password'];	
			
			
			$query_check=mysql_query("SELECT * FROM `admin` WHERE BINARY `username`= BINARY '$username' AND BINARY `password`= BINARY '$password'");
			$fetch_check=mysql_fetch_array($query_check);
			
			if(mysql_num_rows($query_check)>0){
			
			$pass = $fetch_check['password'];
			
			$user = $fetch_check['username'];
			
			$email=$fetch_check['email'];
	
				
				$_SESSION['username']=$user;
				$username = $_SESSION['username'];
				
				$date22 = date('Y-m-d');
				
				$timezone = new DateTimeZone("Asia/Kolkata" );
				$date = new DateTime();
				$date->setTimezone($timezone );
				$cur_time=$date->format( 'H:i:s ' );
				
				
				
				$action = $username." ".'Login';
				
				
				$log = mysql_query("INSERT INTO userlog_details (`user`,`date`,`time`,`action`) VALUES ('$username','$date22','$cur_time','$action')");
				
				$msg = "success";
				
				}
			
				 else { $msg = "error"; }
				 
				 return $msg;
			
			
		}
		
		
	
   
}



?>