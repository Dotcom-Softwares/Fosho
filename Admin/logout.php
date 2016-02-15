<?php
	session_start();

	
	 //public function logout()
  //{	
   
   		$username = $_SESSION['username'];
   		$date22 = date('Y-m-d');
		$timezone = new DateTimeZone("Asia/Kolkata" );
		$date = new DateTime();
		$date->setTimezone($timezone );
		$cur_time=$date->format( 'H:i:s ' );
		
		$action = 'Logout'." ".$username;
   		
		mysql_query("INSERT INTO `userlog_details` (`user`,`date`,`time`,`action`) VALUES ('$username','$date22','$cur_time','$action')");
        session_destroy();
        unset($_SESSION['username']);
        return true;
   //}
?>
	<script>
	window.location.href='index.php';
	</script>