<?php
error_reporting(0);
$current_page_name=basename($_SERVER['PHP_SELF']);
?>
     <div class="header">
        <a class="logo" href="index.html"><font color="#FFFFFF" size="4px" style="padding-left:10px;"><b>FOSHO</b> </font></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>    
    </div>        
           
        
        
        <div class="menu">  
        
        <div class="breadLine">            
            <div class="arrow"></div>
            <div class="adminControl active">
              Hi, <?php echo $sessionuser; ?> 
            </div>
        </div>
        
        <div class="admin">
            <div class="image">
                <img src="html/img/users/aqvatarius.jpg" class="img-polaroid"/>                
            </div>
            <ul class="control">                
                
                
                <?php /*?><li><span class="icon-share-alt"></span> <a href="<?php $login->logout(); ?>">Logout</a></li><?php */?>
				<li><span class="icon-share-alt"></span> <a href="logout.php">Logout</a></li>
            </ul>
            <div class="info">
                <span>Welcom back! Your last visit: 24.10.2012 in 19:55</span>
            </div>
        </div>
        
        <ul class="navigation">            
            <li class="active">
                <a href="dashboard.php">
                    <span class="isw-grid"></span><span class="text">Dashboard</span>
                </a>
            </li>
            <li class="openable <?php if($current_page_name=='view_truck_type.php' || $current_page_name=='view_cargo_type.php' || $current_page_name=='manage_vehicle.php' || $current_page_name=='view_vehicle.php' ) { ?> active <?php } ?>">
                <a href="#">
                    <span class="isw-list"></span><span class="text">Manage Vehicle</span>
                </a>
                <ul>
                              
                                     
                    
                    
                    <li class="<?php if($current_page_name=='view_truck_type.php') { ?> active <?php } ?>">
                        <a href="view_truck_type.php">
                            <span class="icon-pencil"></span><span class="text">Manage Truck Type</span>
                        </a>                  
                    </li>
                    
                    
                     <li class="<?php if($current_page_name=='view_cargo_type.php') { ?> active <?php } ?>">
                        <a href="view_cargo_type.php">
                            <span class="icon-pencil"></span><span class="text">Manage Cargo Type</span>
                        </a>                  
                    </li>
                    
                    
                    <li class="<?php if($current_page_name=='manage_vehicle.php') { ?> active <?php } ?>">
                        <a href="manage_vehicle.php">
                            <span class="icon-pencil"></span><span class="text">Add Vehicle</span>
                        </a>                  
                    </li>
                    
                    
                     <li class="<?php if($current_page_name=='view_vehicle.php') { ?> active <?php } ?>">
                        <a href="view_vehicle.php">
                            <span class="icon-pencil"></span><span class="text">View Vehicle</span>
                        </a>                  
                    </li>
                                         
                   
                    
                                        
                </ul>                
            </li>          
                                    
            
            
            <li class="openable <?php if($current_page_name=='showCustomers.php' || $current_page_name=='customer-Entry.php') { ?> active <?php } ?>" >
                <a href="#">
                    <span class="isw-users"></span><span class="text">Manage Customer</span>
                </a>
                <ul>
                                     
                    <li class="<?php if($current_page_name=='showCustomers.php') { ?> active <?php } ?>">
                        <a href="showCustomers.php">
                            <span class="icon-list-alt"></span><span class="text">Show Customers</span>
                        </a>                  
                    </li> 
                    
                                        
                </ul>                
            </li>  
            
            
            
            <li class="openable <?php if($current_page_name=='ShowBookings.php' || $current_page_name=='ConfirmBooking.php') { ?> active <?php } ?>">
                <a href="#">
                    <span class="isw-right_circle"></span><span class="text">Manage Booking</span>
                </a>
                <ul>
                              
                                      
                    <li <?php if($current_page_name=='ShowBookings.php') { ?> active <?php } ?>>
                        <a href="ShowBookings.php">
                            <span class="icon-list-alt"></span><span class="text">View Booking</span>
                        </a>                  
                    </li> 
                    
                    
                    <li <?php if($current_page_name=='ConfirmBooking.php') { ?> active <?php } ?>>
                        <a href="ConfirmBooking.php">
                            <span class="icon-list-alt"></span><span class="text">Confirm Booking</span>
                        </a>                  
                    </li> 
                    
                    
                    
                    
                                        
                </ul>                
            </li>
            
            
            
            
            <li class="openable <?php if($current_page_name=='showUsers.php') { ?> active <?php } ?>">
                <a href="#">
                    <span class="isw-text_document"></span><span class="text">Manage Users</span>
                </a>
                <ul>
                              
                                     
                    <li <?php if($current_page_name=='showUsers.php') { ?> active <?php } ?>>
                        <a href="showUsers.php">
                            <span class="icon-list-alt"></span><span class="text">Show Users</span>
                        </a>                  
                    </li> 
                    
                                        
                </ul>                
            </li>
            
                                   
        </ul>
        
        <div class="dr"><span></span></div>
        
        <div class="widget-fluid">
            <div id="menuDatepicker"></div>
        </div>
        
     
        
        
        
       
        
        
        
    </div>