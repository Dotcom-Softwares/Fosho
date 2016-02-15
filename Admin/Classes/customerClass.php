<?php
/*  Azhar Coded*/
error_reporting(0);
class customerClass
{

      function __construct()
		{
			dbConfig::config();
		}
		

      public function customerreg($data)
	  {
	       $customername = $data['customer-name'];
		   $customeremail = $data['customer-email'];
		   $panno = $data['pan-no'];
		   $password = $data['password'];
		   $phoneno = $data['phone-no'];
		   $mobileno = $data['mobile-no'];
		   $address = $data['address'];

			$insert = mysql_query("INSERT INTO customer (`name`,`pan_no`,`phone`,`mobile`,`address`,`password`,`email`,`status`) VALUES ('$customername','$panno','$phoneno','$mobileno','$address','$password','$customeremail','1')");	
			
			if($insert)
			{
			$_SESSION['cid'] = mysql_insert_id();
			$cid = $_SESSION['cid'];
			
			
			
			
			$msg = 'success';
				
				$username = $_SESSION['username'];
				$date22 = date('Y-m-d');
				$timezone = new DateTimeZone("Asia/Kolkata" );
				$date = new DateTime();
				$date->setTimezone($timezone );
				$cur_time=$date->format( 'H:i:s ' );
				
				
				
				$action = 'Insert Customer Id'." ".$cid;
				
				
				$log = mysql_query("INSERT INTO userlog_details (`user`,`date`,`time`,`action`) VALUES ('$username','$date22','$cur_time','$action')");
			
	}  
	 		else
			{
			$msg = 'error';
			
			} 
			return $msg;
	  }
	  
	  
	  					public function showCustomer()
						{
						
						$getcustomer = mysql_query("SELECT * FROM customer ORDER BY cid DESC");
						while ($fetcustomer = mysql_fetch_array($getcustomer))
							{
$res[] = array ('cid' => $fetcustomer['cid'] , 'name' => $fetcustomer['name'] , 'email' => $fetcustomer['email'] , 'pan_no' => $fetcustomer['pan_no'] , 'phone' => $fetcustomer['phone'] , 'address' => $fetcustomer['address']);
							}
							
							//$data = array('result' => $res);
							return $res ; 
						
						
						} 
						
						
						
						public function getcustomerdetailsById($data)
						{
						$cid = $data['cid'];
						$qry = mysql_query("SELECT * FROM customer WHERE cid='$cid'");
						$fet = mysql_fetch_array($qry);
						$res[] = array ('cid' => $fet['cid'] , 'name' => $fet['name'] , 'email' => $fet['email'] , 'password' => $fet['password'] , 'pan_no' => $fet['pan_no'] , 'phone' => $fet['phone'] , 'mobile' => $fet['mobile'] , 'address' => $fet['address']);
						
						return $res;
						}
						
			  
			 			public function delcustomerById($data)
						{
						$cid = $data['cid'];
						
						$qry = mysql_query("DELETE FROM customer WHERE cid='$cid'");
						if($qry)
						{
						$msg = 'success';
						}
						else
						{
						$msg = 'error';
						}
						return $msg;
						}
			 
						
	  
	  
	  
	  		
	  
	  
	  
	  
	  
	  

}


?>