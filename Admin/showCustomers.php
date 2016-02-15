<!DOCTYPE html>
<html lang="en">

<?php 
/* azhar coded */
	error_reporting(0);
	include('include/autoLoad.php');
	include'include/head.php'; 
	
	$sessionuser = $_SESSION['username'];
	
	$underclass = new customerClass();
	$func = $underclass -> showCustomer();
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
        
		
        <script language="JavaScript" type="text/javascript">
		function showConfirm(id){
    	var a = confirm("Are You Sure Want to Delete");
		if (a==true)
		{
		
		<?php 
		/*Delete part*/
		
		
		
		
		$customerId = id ;
		
		$myData = json_decode( base64_decode( $_GET['did'] ) );
		$cid = $myData->{'cid'};
		
		
		$delcustomer = new customerClass();
		$delete = $delcustomer -> delcustomerById($cid);
		
		?>
		}
		else
		{
		return false;
		}
		}
		</script>
		
		
		<?php
		/*Edit part*/
		if($_GET['id']!='') { 
		$customerId = $_REQUEST['id'];
		
		$myData = json_decode( base64_decode( $_GET['id'] ) );
		$customerId = $myData->{'cid'};
		
		$getcustomer = new customerClass();
		$customerdet = $getcustomer -> getcustomerdetailsById($customerId);
		
		
		foreach($customerdet as $row){ 
		$name = $row['name'];
		$ccid = $row['cid'];	   
		 ?>  
		
		<div class="workplace">
            
            <div class="row-fluid">
                <div class="span2"></div>
                <div class="span8">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1>Edit Customer Id : <?php echo $ccid?>&nbsp;Name : <?php echo $name; ?> </h1>
                    </div>
                    <div class="block-fluid">                        
                        <form name="customerEntry" action="submit-customer.php" method="post">
                        <div class="row-form clearfix">
                            <div class="span3">Customer Name:</div>
                            <div class="span9"><input type="text" name="customer-name" value="<?php echo $row['name']; ?>" /></div>
                        </div> 

                        <div class="row-form clearfix">
                            <div class="span3">Customer EmailId</div>
                            <div class="span9"><input type="text" name="customer-email" value="<?php echo $row['email']; ?>"/></div>
                        </div>                         

                        <div class="row-form clearfix">
                            <div class="span3">Pan No</div>
                            <div class="span9"><input type="text" name="pan-no" value="<?php echo $row['pan_no']; ?>"/></div>                            
                        </div> 

                        <div class="row-form clearfix">
                            <div class="span3">Password</div>
                            <div class="span9"><input type="text"  name="password" value="<?php echo $row['password']; ?>" /></div>
                        </div>                                       
                        
                        <div class="row-form clearfix">
                            <div class="span3">Phone No</div>
                            <div class="span9"><input type="text" name="phone-no" value="<?php echo $row['phone']; ?>" /></div>
                        </div>                                                               

                        <div class="row-form clearfix">
                            <div class="span3">Mobile No</div>
                            <div class="span9"><input type="text" name="mobile-no" value="<?php echo $row['mobile']; ?>"/></div>
                        </div>                        

                        <div class="row-form clearfix">
                            <div class="span3">Address</div>
                            <div class="span9">
							<textarea name="address" value="<?php echo $row['address']; ?>"><?php echo $row['address']; ?></textarea>
							</div>
                        </div>
                        
                         <div class="row-form clearfix">
                         <div class="span4">
                        <button class="btn" type="submit">Update</button>       
                        
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
         
         <div align="right"><a href="customer-Entry.php"><button class="btn" type="button">Add New Customer</button></a></div>    
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
                                    <th>CustomerID</th>
                                    <th>Name</th>
                                    <th>E-mail</th>
									<th>PanNo</th>
                                    <th>Phone</th> 
									<th>Address</th> 
                                    <th width="7%">Action</th>                                    
                                </tr>
                            </thead>
							
                            <tbody>
							<?php 
							$i = 1;
							foreach ($func as $link){
							
							?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $link['cid']; ?></td>
                                    <td><?php echo $link['name']; ?></td>
                                    <td><?php echo $link['email']; ?></td>
									<td><?php echo $link['pan_no']; ?></td>
                                    <td><?php echo $link['phone']; ?></td>  
									<td><?php echo $link['address']; ?></td>  
                                    <td>
									<?php 
									$cid = $link['cid']; 
									$action = 'delete';
									$myData = array('cid'=>$cid);
									$arg = base64_encode( json_encode($myData) );
									
									?>
									<a href="showCustomers.php?id=<?php echo $arg; ?>" title="Edit"><span class="isb-edit"></span></a>&nbsp;
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
