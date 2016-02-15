<!DOCTYPE html>
<html lang="en">

<?php  /* azhar coded */
    error_reporting(0);
	include('include/autoLoad.php');
	include'include/head.php'; 
	$sessionuser = $_SESSION['username'];
	$underclass = new bookingClass();
	$func = $underclass -> showallbooking();
	
	
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
                <li class="active">Manage Manage Bookings</li>
            </ul>
        </div>
		
		
		
		<div class="workplace">
        
       
              
              
         
         <div align="right"><a href="newBooking.php"><button class="btn" type="button">New Booking</button></a></div>    
          <br> 
            
           <div class="row-fluid">
                
                <div class="span12">                    
                    
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Show All Booking</h1>      
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
                                    <th>PickUp Date</th>
                                    <th>Pickup City</th>
                                    <th>Destination City</th>
                                    <th>Approax Distance </th>
                                    <th>Truck Type</th>
                                    <th>Estimate Freight </th>
									<th>Cargo Type</th>
                                    <th>Cargo Weight</th> 
									<th>Total Truck</th>
                                    <th>Action</th>                                    
                                </tr>
                            </thead>
							
                            <tbody>
							<?php 
							foreach ($func as $link){
							
							?>
                                <tr>
                                    <td><?php echo $link['pickup_date']; ?></td>
                                    <td><?php echo $link['pickup_city']; ?></td>
                                    <td><?php echo $link['destination_city']; ?></td>
                                    <td><?php echo $link['app_distance']; ?></td>
									<td><?php  
										$type=$link['truck_type'];
										$under_trucktypeclass = new trucktypeClass();
										$trty = $under_trucktypeclass -> showtrucktypeByid($type);
										foreach ($trty as $typerow)
										{  
										echo  $typerow['type']; 
										}
										?>
                                    </td>
                                    <td><?php echo $link['estimate_cost']; ?></td>  
									<td><?php 
										$type=$link['cargo_type']; 
										$under_cargotypeclass = new trucktypeClass();
										$cargo_type_fet = $under_cargotypeclass -> showcargotypeByid($type);
										foreach ($cargo_type_fet as $cargotyperow)
										{  
										echo  $cargotyperow['type']; 
										}
										?>
                                    </td>
                                    <td><?php echo $link['cargo_weight']; ?></td>  
                                    <td><?php echo $link['total_truck']; ?></td>  
                                    <td><?php if($link['current_status']!='confirm') { ?><a href="ConfirmBooking.php?id=<?php echo $link['id']; ?>"><button class="btn btn-mini btn-primary" type="button"><b>Confirm </b></button></a><?php } ?>
                                    
                                    <?php if($link['current_status']=='confirm') { ?><button class="btn btn-mini btn btn-success" type="button"><b>Confirmed</b></button><?php } ?>
                                    </td>                                    
                                </tr>
                            <?php  } ?>                      
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
