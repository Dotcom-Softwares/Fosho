<?php
class trucksClass
{

	  function __construct()
		{
			dbConfig::config();
		}
		
	  
	  
	  public function truckentry($data)
		{
		$truckno = $data['truck-no'];
		$ownername = $data['owner-name'];
		$contactno = $data['contact-no'];
		$drivername = $data['driver-name'];
		$driverphone = $data['driver-phone'];
		$trucktype = $data['truck-type'];
		$maxweight = $data['max-weight'];
		
		$truckentry = mysql_query("INSERT INTO `trucks` (`number`,`owner_name`,`owner_contact_no`,`driver_name`,`driver_contact_no`,`status`,`running_status`,`truck_type`,`max_weight`) VALUES ('$truckno','$ownername','$contactno','$drivername','$driverphone','1','Available','$trucktype','$maxweight')");
		
		if($truckentry)
		{
			$_SESSION['id']=mysql_insert_id();
			$msg = "Success";
		}
		else
		{
			$msg = "Error";
		}
		
		return $msg;
		
		}
		
			public function showtruck()
			{
				
				$gettrucks = mysql_query("SELECT * FROM trucks");
				$res = array();
				while($fetrucks = mysql_fetch_array($gettrucks))
				{
				$res[] = array('id' => $fetrucks['id'],'number' => $fetrucks['number'],'owner_name' => $fetrucks['owner_name'],'owner_name' => $fetrucks['owner_name'],'owner_name' => $fetrucks['owner_name'],'owner_contact_no' => $fetrucks['owner_contact_no'],'driver_name' => $fetrucks['driver_name'],'driver_contact_no' => $fetrucks['driver_contact_no'],'driver_contact_no' => $fetrucks['driver_contact_no'],'truck_type' => $fetrucks['truck_type']);
				}
				 $data = array('result'=>$res);
				 return($res);	
			}
			
			
			
			 public function gettruckDetailsbyId($id)
			{   $id = $id['id'];
				$gettrucks = mysql_query("SELECT * FROM trucks WHERE id='$id'");
				$res = array();
				while($fetrucks = mysql_fetch_array($gettrucks))
				{
				$res[] = array('id' => $fetrucks['id'],'number' => $fetrucks['number'],'owner_name' => $fetrucks['owner_name'],'owner_name' => $fetrucks['owner_name'],'owner_name' => $fetrucks['owner_name'],'owner_contact_no' => $fetrucks['owner_contact_no'],'driver_name' => $fetrucks['driver_name'],'driver_contact_no' => $fetrucks['driver_contact_no'],'driver_contact_no' => $fetrucks['driver_contact_no'],'truck_type' => $fetrucks['truck_type']);
				}
			
				
				 //$data = array('result'=>$res);
				
				 return($res);
				 
			  }
			  
			  
			  
			  
			  public function truckupdate($data)
		{
		$id=$data['id'];
		$truckno_up = $data['truck-no'];
		$ownername_up = $data['owner-name'];
		$contactno_up = $data['contact-no'];
		$drivername_up = $data['driver-name'];
		$driverphone_up = $data['driver-phone'];
		$trucktype_up = $data['truck-type'];
		$maxweight_up = $data['max-weight'];
				
		$truck_update=mysql_query("UPDATE trucks SET `number`='$truckno_up',`owner_name`='$ownername_up',`owner_contact_no`='$contactno_up',`driver_name`='$drivername_up',`driver_contact_no`='$driverphone_up',`status`='',`running_status`='',`truck_type`='$trucktype_up',`max_weight`='' WHERE id='$id'");
		
		if($truck_update)
		{
			$_SESSION['id']=mysql_insert_id();
			$msg = "Success";
		}
		else
		{
			$msg = "Error";
		}
		
		return $msg;
		
		}
		
		
		
		 public function deletetruckId($id)
			{   $id = $id['id'];
				$delete_truck = mysql_query("DELETE FROM trucks WHERE id='$id'");
				
				
				
			 if($delete_truck)
			 {
				 $_SESSION['id']=$id;
				 $msg="Successs";
			 }
			 else
			 {
				 $msg="Error";
			 }
				
				return($msg);
						
			 }
			
							
}

?>