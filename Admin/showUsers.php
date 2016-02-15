<!DOCTYPE html>
<html lang="en">

<?php 
/* azhar coded */
	error_reporting(0);
	include('include/autoLoad.php');
	include'include/head.php'; 
	
	$sessionuser = $_SESSION['username'];
	
	$underclass = new usersClass();
	$func = $underclass -> showusers();
	//print_r($func);
	
?>

<body>
    
    <div class="header">
        <a class="logo" href="index.html"><font color="#FFFFFF" size="4px" style="padding-left:10px;"><b>Fosho</b> </font></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>    
    </div>
    
    <?php include 'include/navigation.php'; ?>
        
    <div class="content">
        
        
        <div class="breadLine">
            
            <ul class="breadcrumb">
                <li><a href="#">Admin</a> <span class="divider">></span></li>                
                <li class="active">Customer Details</li>
            </ul>
        </div>
        
		
       
		
		
		<?php
		/*Edit part*/
		if($_GET['uid']!='') { 
		$userId = $_REQUEST['uid'];
		
		$myData = json_decode( base64_decode( $_GET['uid'] ) );
		$usrId = $myData->{'uid'};
		
		$getuser = new usersClass();
		$userdet = $getuser -> getuserdetailsById($usrId);
		
		
		foreach($userdet as $row){ 
		$uname = $row['name'];
		$uuuid = $row['uid'];	   
		 ?>  
		
		<div class="workplace">
            
            <div class="row-fluid">
                <div class="span2"></div>
                <div class="span8">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1>Edit User Id : <?php echo $uuuid?>&nbsp;Name : <?php echo $uname; ?> </h1>
                    </div>
                    <div class="block-fluid">                        
                        <form name="customerEntry" action="updateUsers.php" method="post">
						<input type="hidden" name="uid" value="<?php echo $row['uid']; ?>">
						
                        <div class="row-form clearfix">
                            <div class="span3">User Name:</div>
                            <div class="span9"><input type="text" name="name" value="<?php echo $row['name']; ?>" required/></div>
                        </div> 

                        <div class="row-form clearfix">
                            <div class="span3">User EmailId</div>
                            <div class="span9"><input type="text" name="userEmail" value="<?php echo $row['user_email']; ?>" required/></div>
                        </div> 
						
						<div class="row-form clearfix">
                            <div class="span3">User PhoneNo</div>
                            <div class="span9"><input type="text" name="userPhone" value="<?php echo $row['userPhone']; ?>" required/></div>
                        </div>                         

                        <div class="row-form clearfix">
                            <div class="span3">User login Name</div>
                            <div class="span9"><input type="text" name="userName" value="<?php echo $row['username']; ?>" required/></div>                            
                        </div> 

                        <div class="row-form clearfix">
                            <div class="span3">Password</div>
                            <div class="span9"><input type="text"  name="password" value="<?php echo $row['password']; ?>" required/></div>
                        </div>                                       
                        
                        <div class="row-form clearfix">
                            <div class="span3">UserType</div>
                            <div class="span9">
							<select name="userType" required>
							<option value="<?php echo $row['usertype']; ?>"><?php echo $row['usertype']; ?></option>
							<option value="Admin">Admin</option>
							<option value="Callcenter">Callcenter</option>
							</select></div>
                        </div>                                                               

                       <?php /*?> <div class="row-form clearfix">
                            <div class="span3">Login Time</div>
                            <div class="span9"><input type="text" name="loginTime" value="<?php echo $row['logintime_from']; ?>" required/></div>
                        </div>                        

                        <div class="row-form clearfix">
                            <div class="span3">Logout Time</div>
                            <div class="span9"><input type="text" name="logoutTime" value="<?php echo $row['logintime_to']; ?>" required/></div>
                        </div>  <?php */?>
                        
                         <div class="row-form clearfix">
                         <div class="span4">
                        <button class="btn" type="submit">Submit</button>       
                        
                         <button class="btn btn-danger" type="button">Reset</button>                                         
                        </div>
                        
                        
                        
                        <div class="span8">
                     
                        
                        </div>
                        </div>
                        
                        </form>
                    </div>
                </div>
                
            </div>
            

           
            
           
            
        
        </div>
        
        
        <?php } }  ?>
		
		<div class="workplace">
         
         <div align="right"><a href="addUsers.php"><button class="btn" type="button">Add New Users</button></a></div>    
          <br> 
            
           <div class="row-fluid">
                
                <div class="span12">                    
                    
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Simple table</h1>      
                        <ul class="buttons">
                            <!--<li><a href="#" class="isw-download"></a></li>                                                        
                            <li><a href="#" class="isw-attachment"></a></li>-->
                            <li>
                                <a href="#" class="isw-settings"></a>
                                <ul class="dd-list">
                                   
                                    <li><a href="#"><span class="isw-edit"></span> Edit</a></li>
                                    <li><a href="#"><span class="isw-delete"></span> Delete</a></li>
                                </ul>
                            </li>
                        </ul>                        
                    </div>
                    
                    
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable">
                            <thead>
                                <tr>
                                    <th>SlNo</th>
                                    <th>Name</th>
                                    <th>EmailId</th>
                                    <th>UserType</th>
									<th>PhoneNo</th>
                                    <th>User LoginName</th> 
									 
                                    <th width="7%">Action</th>                                    
                                </tr>
                            </thead>
							
                            <tbody>
							<?php 
							$i = 1;
							foreach ($func as $link){
							//$res[] = array ('uid' => $fetusers['uid'] , 'name' => $fetusers['name'] , 'user_email' => $fetusers['user_email'] , 'username' => $fetusers['username'] , 'password' => $fetusers['password'] , 'usertype' => $fetusers['usertype'] , 'logintime_from' => fetusers['logintime_from'] , 'logintime_to' => fetusers['logintime_to'] , 'status' => fetusers['status']);
							
							?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $link['name']; ?></td>
                                    <td><?php echo $link['user_email']; ?></td>
                                    <td><?php echo $link['usertype']; ?></td>
									<td><?php echo $link['userPhone']; ?></td>
                                   
									<td><?php echo $link['username']; ?></td>  
                                    <td>
									<?php 
									$uid = $link['uid']; 
									$action = 'delete';
									$myData = array('uid'=>$uid);
									$arg = base64_encode( json_encode($myData) );
									
									?>
									<a href="showUsers.php?uid=<?php echo $arg; ?>" title="Edit"><span class="isb-edit"></span></a>&nbsp;
									<?php /*?><a href="showCustomers.php?did=<?php echo $arg; ?>" title="Delete"><span class="isb-delete"></span></a> <?php */?>
									<!--<a href="" onClick="show_confirm()" title="Delete"><span class="isb-delete"></span></a> -->
									<a href="" onClick="showConfirm('<?php echo $arg; ?>')"><span class="isb-delete"></span></a>
									</td>                                 	
                                </tr>
                            <?php 
							$i++;
							} ?>                      
                            </tbody>
                        </table>
                    </div>
                </div>                                
                
            </div>
            
        
        </div>
        
          <!--<div class="dr"><span></span></div>-->
        
        
    </div>   
    
</body>
</html>
