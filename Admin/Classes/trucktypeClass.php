<?php
	class trucktypeClass
	{
	
	
	function __construct()
		{
			dbConfig::config();
		}
	
	
			public static function cargotypeentry($data)
			{
			$cargotype = $data['cargo-type'];
			$cargo = mysql_query("INSERT INTO cargo_type (`type`) VALUES ('$cargotype')");
			if($cargo)
			{
			$_SESSION['id'] = mysql_insert_id();
			$msg = 'success';
			}
			else
			{
			$msg = 'fail';
			}
			return $msg;
			}
			
			
			public function showcargotype()
			{
				
				$getcargo = mysql_query("SELECT * FROM cargo_type");
				$res = array();
				while($fetcargo = mysql_fetch_array($getcargo))
				{
				$res[] = array('id' => $fetcargo['id'],'type' => $fetcargo['type']);
				}
			
				 $data = array('result'=>$res);
				 return($res);
			}
			
			
			public function showcargotypeByid($type)
			{
				 $type = $type['type'];
				
				$get_cargo_type = mysql_query("SELECT * FROM cargo_type WHERE id='$type'");
				
				$res = array();
				while($fet_cargo_type = mysql_fetch_array($get_cargo_type))
				{
				$res[] = array('id' => $fet_cargo_type['id'],'type' => $fet_cargo_type['type']);
				}
			     
				 return($res);
			  }
			  
			 
			   public function cargotypeupdate($data)
		{
			$id=$data['id'];
			$cargo_type = $data['cargo-type'];
			
			$truck_cargo_type_update=mysql_query("UPDATE cargo_type SET `type`='$cargo_type' WHERE id='$id'");
		
		
		if($truck_cargo_type_update)
		{
			$_SESSION['id']=mysql_insert_id();
			$msg = "Success";
		}
		else
		{
			$msg = "Error";
			
		}
		return($msg);
		}
		
		
		public function deletecargotypekId($id)
			{   $id = $id['id'];
				$delete_cargo_type = mysql_query("DELETE FROM cargo_type WHERE id='$id'");
				
				
				
			 if($delete_cargo_type)
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
			  
			
		
			public static function trucktypeentry($data)
			{
			$trucktype = $data['truck-type'];
			$maxweight = $data['max-weight'];
			$rate = $data['rate'];
			$truck = mysql_query("INSERT INTO truck_type (`type`,`max_weight`,`rate`) VALUES ('$trucktype','$maxweight','$rate')");
			if($truck)
			{
			$_SESSION['id'] = mysql_insert_id();
			$msg = 'success';
			}
			else
			{
			$msg = 'fail';
			}
			return $msg;
			}
			
			
			
			public function showtrucktype()
			{
				
				$get_truck_type = mysql_query("SELECT * FROM truck_type");
				$res = array();
				while($fet_truck_type = mysql_fetch_array($get_truck_type))
				{
				$res[] = array('id' => $fet_truck_type['id'],'type' => $fet_truck_type['type'],'max_weight' => $fet_truck_type['max_weight'],'rate' => $fet_truck_type['rate']);
				}
			
				 //$data = array('result'=>$res);
				 return($res);
				 
			  }
			  
			  
			  public function showtrucktypeByid($type)
			{
				 $type = $type['type'];
				
				$get_truck_type = mysql_query("SELECT * FROM truck_type WHERE id='$type'");
				
				$res = array();
				while($fet_truck_type = mysql_fetch_array($get_truck_type))
				{
				$res[] = array('type' => $fet_truck_type['type'],'max_weight' => $fet_truck_type['max_weight'],'rate' => $fet_truck_type['rate']);
				}
			     
				 return($res);
			  }
			  
			 
			  public function trucktypeupdate($data)
		{
			$id=$data['id'];
			$trucktype = $data['truck-type'];
			$maxweight = $data['max-weight'];
			$rate = $data['rate'];
			$truck_type_update=mysql_query("UPDATE truck_type SET `type`='$trucktype',`max_weight`='$maxweight',`rate`='$rate' WHERE id='$id'");
		
		
		if($truck_type_update)
		{
			$_SESSION['id']=mysql_insert_id();
			$msg = "Success";
		}
		else
		{
			$msg = "Error";
			
		}
		return($msg);
		}
		
		 public function deletetructypekId($id)
			{   
			     $id = $id['id'];
				
				
				$delete_truck_type = mysql_query("DELETE FROM truck_type WHERE id='$id'");
				
				
				
			 if($delete_truck_type)
			 {
				 //$_SESSION['id']=$id;
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