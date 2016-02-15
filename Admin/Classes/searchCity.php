<?php
/* Azhar Coded */
class searchCity
{

	function __construct()
		{
			dbConfig::config();
		}

	public function viewcity()
	{
			
			$result=mysql_query("SELECT city_id,city_name,state FROM `tblcitylist`");
			$res = array();
			while($resultSet = mysql_fetch_array($result)) 
			{
				$res[] = array('city_id' => $resultSet['city_id'], 'city_name' => $resultSet['city_name'], 'state' => $resultSet['state']);
			}
			
			 $data = array('result'=>$res);
			 return($res);
			
	}


}


?>