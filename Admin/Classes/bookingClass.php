<?php
	/* Azhar Coded */
	class bookingClass
	{
	
		function __construct()
		{
			dbConfig::config();
		}
	
	
	    	public static function bookingentry($data)
		
			{
			$start = $data['start'];
			$end = $data['end'];
			$distance = $data['distance'];
			$fare = $data['fare'];
			$cargotype = $data['cargo-type'];
			$cargoweight = $data['cargo-weight'];
			$trucktype = $data['truck-type'];
			$totaltruck = $data['total-truck'];
			$pickdate = $data['pick-date']; 
			
									$query = mysql_query("INSERT INTO booking (`pickup_city`,`destination_city`,`app_distance`,`estimate_cost`,`cargo_type`,`cargo_weight`,`truck_type`,`total_truck`,`pickup_date`) VALUES ('$start','$end','$distance','$fare','$cargotype','$cargoweight','$trucktype','$totaltruck','$pickdate')");
			
			if($query)
			{
			$_SESSION['booking_id'] = mysql_insert_id();
			$bid = $_SESSION['booking_id'];
			$msg = 'success';
			
				
				$username = $_SESSION['username'];
				
				$date22 = date('Y-m-d');
				$timezone = new DateTimeZone("Asia/Kolkata" );
				$date = new DateTime();
				$date->setTimezone($timezone );
				$cur_time=$date->format( 'H:i:s ' );
				
				
				
				$action = 'Insert Booking Id'." ".$bid;
				
				
				$log = mysql_query("INSERT INTO userlog_details (`user`,`date`,`time`,`action`) VALUES ('$username','$date22','$cur_time','$action')");
			
			
			
			}
			else
			{
			$msg = 'error';
			}
			
			return $msg;
			
			
			}
			
					public function showbooking()
					{
					
						$bookingid=$_SESSION['booking_id'];
						$getdata=mysql_query("SELECT * FROM `booking` WHERE `booking_id`='$bookingid'");
						if(mysql_num_rows($getdata)>0)
						{
							$fetbookingdata=mysql_fetch_array($getdata);
							return $fetbookingdata;
						}
					
					}
					
					
					
					public function showallbooking()
					{
						$get_booking=mysql_query("SELECT * FROM `booking`");
						$res=array();
						while($fet_booking=mysql_fetch_array($get_booking))
						{
						  $res[]=array('id'=>$fet_booking['booking_id'],'pickup_city'=>$fet_booking['pickup_city'],'destination_city'=>$fet_booking['destination_city'],'cargo_type'=>$fet_booking['cargo_type'],'cargo_weight'=>$fet_booking['cargo_weight'],'truck_type'=>$fet_booking['truck_type'],'total_truck'=>$fet_booking['total_truck'],'pickup_date'=>$fet_booking['pickup_date'],'app_distance'=>$fet_booking['app_distance'],'estimate_cost'=>$fet_booking['estimate_cost'],'current_status'=>$fet_booking['current_status']);	
						}
						 
						return($res); 
					}
					
					
					public function showbookingbyid($b_id)
					{
				 		 $b_id = $b_id['b_id'];
						$get_booking_by_id = mysql_query("SELECT * FROM booking WHERE booking_id='$b_id'");
						$res = array();
						while($fet_booking_by_id = mysql_fetch_array($get_booking_by_id))
						{
						$res[]=array('id'=>$fet_booking_by_id['booking_id'],'pickup_city'=>$fet_booking_by_id['pickup_city'],'destination_city'=>$fet_booking_by_id['destination_city'],'cargo_type'=>$fet_booking_by_id['cargo_type'],'cargo_weight'=>$fet_booking_by_id['cargo_weight'],'truck_type'=>$fet_booking_by_id['truck_type'],'total_truck'=>$fet_booking_by_id['total_truck'],'pickup_date'=>$fet_booking_by_id['pickup_date'],'app_distance'=>$fet_booking_by_id['app_distance'],'estimate_cost'=>$fet_booking_by_id['estimate_cost']);
						}
			     
				 		return($res);
			  		 }
					 
					 
					 		 
	    	public static function confirmbookingentry($data)
		
			{
			$id = $data['id'];
			$start = $data['start'];
			$end = $data['end'];
			$distance = $data['distance'];
			$fare = $data['fare'];
			$cargotype = $data['cargo-type'];
			$cargoweight = $data['cargo-weight'];
			$trucktype = $data['truck-type'];
			$totaltruck = $data['total-truck'];
			$pickdate = $data['pick-date'];
			
								
									$query_update=mysql_query("UPDATE `booking` SET `pickup_city`='$start',`destination_city`='$end',`app_distance`='$distance',`estimate_cost`='$fare',`cargo_type`='$cargotype',`cargo_weight`='$cargoweight',`truck_type`='$trucktype',`total_truck`='$totaltruck',`pickup_date`='$pickdate',`current_status`='confirm' WHERE booking_id='$id'");
		
									
			
			if($query_update)
			{
			$_SESSION['booking_id'] = mysql_insert_id();
			$bid = $_SESSION['booking_id'];
			$msg = 'success';
			
				
				$username = $_SESSION['username'];
				$date22 = date('Y-m-d');
				$timezone = new DateTimeZone("Asia/Kolkata" );
				$date = new DateTime();
				$date->setTimezone($timezone );
				$cur_time=$date->format( 'H:i:s ' );
				$action = 'Confirm Booking Id'." ".$bid;
				$log = mysql_query("INSERT INTO userlog_details (`user`,`date`,`time`,`action`) VALUES ('$username','$date22','$cur_time','$action')");
			}
			else
			{
			$msg = 'error';
			}
			
			return $msg;
			
			
			}
					
					
			
			
	
	
	}


?>