  <?php 
    
	$conn = mysql_connect("localhost", "root", "");
	if(!$conn) die("Failed to connect to database!");
	$status = mysql_select_db('fosho', $conn);
	if(!$status) die("Failed to select database!");
	
	
	$type=$_GET['t'];
	
	$get = mysql_query("SELECT * FROM truck_type WHERE `id`='$type' ");
	$fet = mysql_fetch_array($get);
	$rate = $fet['rate'];
	echo $rate;
  ?>
    		  
			  
			  
			  


