<?php
/*  Azhar Coded */
		error_reporting(0);
		class usersClass
		{
		
		function __construct()
		{
			dbConfig::config();
		}
		
		
			public function userentry($data)
			{
			
			$name = $data['name'];
			$userEmail = $data['userEmail'];
			$userPhone = $data['userPhone'];
			$userName = $data['userName'];
			$password = $data['password'];
			$userType = $data['userType'];
			//$loginTime = $data['loginTime'];
			//$logoutTime = $data['logoutTime'];
			$status = '0';
			
			//$sql = mysql_query("INSERT INTO user_login (`name`,`user_email`,`userPhone`,`username`,`password`,`usertype`,`logintime_from`,`logintime_to`,`status`) VALUES ('$name','$userEmail','$userPhone','$userName','$password','$userType','$loginTime','$logoutTime','$status')");
			
			$sql = mysql_query("INSERT INTO user_login (`name`,`user_email`,`userPhone`,`username`,`password`,`usertype`,`status`) VALUES ('$name','$userEmail','$userPhone','$userName','$password','$userType','$status')");
			
			
			if($sql){ $msg = 'success'; } else { $msg = 'error'; }
			
			return $msg;
			
			
			}
			
			
			public function showusers()
			{
			$getusers = mysql_query("SELECT * FROM user_login ORDER BY uid DESC");
				while ($fetusers = mysql_fetch_array($getusers))
				{
//$res[] = array('uid'=>$fetusers['uid'],'name'=>$fetusers['name'],'user_email'=>$fetusers['user_email'],'userPhone'=>$fetusers['userPhone'],'username'=>$fetusers['username'],'password'=>$fetusers['password'],'usertype'=>$fetusers['usertype'],'logintime_from'=>$fetusers['logintime_from'],'logintime_to'=>$fetusers['logintime_to'],'status'=>$fetusers['status']);

$res[] = array('uid'=>$fetusers['uid'],'name'=>$fetusers['name'],'user_email'=>$fetusers['user_email'],'userPhone'=>$fetusers['userPhone'],'username'=>$fetusers['username'],'password'=>$fetusers['password'],'usertype'=>$fetusers['usertype'],'status'=>$fetusers['status']);
				}
							
							//$data = array('result' => $res);
							return $res ; 
			}
			
			
			
			public function getuserdetailsById($data)
						{
						echo $uuid = intval($data['uid']);
						exit;
						$qry = mysql_query("SELECT * FROM user_login WHERE uid='$uuid'");
						$fet = mysql_fetch_array($qry);
						//$res[] = array ('uid' => $fet['uid'] , 'name' => $fet['name'] , 'user_email' => $fet['user_email'] , 'userPhone' => $fet['userPhone'] , 'username' => $fet['username'] , 'password' => $fet['password'] , 'usertype' => $fet['usertype'] , 'logintime_from' => $fet['logintime_from'] , 'logintime_to' => $fet['logintime_to'] , 'status' => $fet['status']);
						$res[] = array ('uid' => $fet['uid'] , 'name' => $fet['name'] , 'user_email' => $fet['user_email'] , 'userPhone' => $fet['userPhone'] , 'username' => $fet['username'] , 'password' => $fet['password'] , 'usertype' => $fet['usertype'] , 'status' => $fet['status']);
						return $res;
						}
		
		
		
			public function userupdate($data)
			{
				$uid = $data['uid'];
				$name = $data['name'];
				$userEmail = $data['userEmail'];
				$userPhone = $data['userPhone'];
				$userName = $data['userName'];
				$password = $data['password'];
				$userType = $data['userType'];
				//$login = $data['loginTime'];
				//$logout = $data['logoutTime'];
				
				//$sql = mysql_query("UPDATE user_login SET `name`='$name',`user_email`='$userEmail',`userPhone`='$userPhone',`username`='$userName',`password`='$password',`usertype`='$userType',`logintime_from`='$login',`logintime_to`='$logout' WHERE uid='$uid'");
				
				$sql = mysql_query("UPDATE user_login SET `name`='$name',`user_email`='$userEmail',`userPhone`='$userPhone',`username`='$userName',`password`='$password',`usertype`='$userType' WHERE uid='$uid'");
				
				if($sql){ $msg = 'success'; } else { $msg = 'error'; }
			
				return $msg;
				
			
			}
		
		
		}