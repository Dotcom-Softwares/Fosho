<!DOCTYPE html>
<html lang="en">

<?php 
error_reporting(0);
include'include/head.php'; 
//$id=$_GET['id']; /* Trucks/vechicle Id */
include('include/autoLoad.php');
$under_truckclass = new trucksClass();
$truck = $under_truckclass -> showtruck();

$under_truck_type_class = new trucktypeClass();
$truck_type = $under_truck_type_class -> showtrucktype();
?>

<body>
     <?php include 'include/navigation.php'; ?>
        
        <div class="content">
           <div class="breadLine">
            	<ul class="breadcrumb">
               		<li><a href="#">Admin</a> <span class="divider">></span></li>                
               		 <li class="active">Manage Vehicle</li>
            	</ul>
           </div> 
              
              <!--Start Of Edit Vechicle Chandra Coded-->   
         <?php if($_GET['id']!='') { 
		 	   $id = $_REQUEST['id'];
			   $getdetails = new trucksClass();
			   $gettruck = $getdetails -> gettruckDetailsbyId($id);
			   //print_r($gettruck);
		       foreach($gettruck as $truckrow){
			   $tt2 = $truckrow['truck_type'];
		 ?>           
        <div class="workplace">
           		<div class="row-fluid">
                	<div class="span2"></div>
                		<div class="span8">
                        	<div align="right"><a href="view_vehicle.php"  class="btn" >View Vehicle</a></div>    
          					 <br>
                    		 <div class="head clearfix">
                        		<div class="isw-documents"></div>
                       				 <h1>Update Vehicle Details</h1>
                    		</div>
                  				 <form name="Edittruck" action="update_truck.php" method="post">
                                 <input type="hidden" name="id" value="<?php echo $truckrow['id']; ?>"/>
                    				<div class="block-fluid">  
                    <div class="row-form clearfix">
                            <div class="span3">Vehicle No.:</div>
                            <div class="span9"><input type="text" name="truck-no" value="<?php echo $truckrow['number'];  ?>" /></div>                      </div>                       
                        
                        <div class="row-form clearfix">
                            <div class="span3">Owner/Company:</div>
                            <div class="span9"><input type="text" name="owner-name" value="<?php echo $truckrow['owner_name'];  ?>" /></div>
                        </div> 

                        <div class="row-form clearfix">
                            <div class="span3"> Contact No.:</div>
                            <div class="span9"><input type="text" name="contact-no" value="<?php echo $truckrow['owner_contact_no'];  ?>" /></div>
                        </div>                         
                                    
                        
                        <div class="row-form clearfix">
                            <div class="span3">Drievr Name:</div>
                            <div class="span9"><input type="text" name="driver-name" value="<?php echo $truckrow['driver_name'];  ?>" /></div>
                        </div>                                                               

                        <div class="row-form clearfix">
                            <div class="span3">Driver Contact No.:</div>
                            <div class="span9"><input type="text" name="driver-phone" value="<?php echo $truckrow['driver_contact_no'];  ?>"/></div>
                        </div>     
                        
                        
                        <div class="row-form clearfix">
                            <div class="span3">Vehicle Type:</div>
                            <div class="span9">                                                        
                            <select name="truck-type" style="width: 100%;">
                  			
                            
                            <option>choose a option...</option>
                  			<?php foreach($truck_type as $tt ) { ?>
                            <option <?php if($tt['id']==$truckrow['truck_type']) { ?> selected<?php } ?> value="<?php echo $tt['id'] ;?>"><?php echo 												$tt['type'];?></option>
                  			<?php } ?>
                			</select>                            
                            </div>
                        </div>   
                                           

                        <!--<div class="row-form clearfix">
                            <div class="span3">Maximum Weight:</div>
                            <div class="span9"><input type="text" name="max-weight" placeholder="Please Input Vehicle Maximum Weight......"/></div>
                        </div>-->
                        
                         <div class="row-form clearfix">
                         
                         <div class="span4">
                        <button class="btn" type="submit">Submit</button>       
                        
                         <button class="btn btn-danger" type="reset">Reset</button>                                         
                        </div>
                        
                        
                        

                        <div class="span8">
                     
                        
                        </div>
                        </div>
                        
                        
                    </div>
                    
                    </form>
                </div>
                
            </div>			 
             
        </div>
         <?php } } ?>
        
        	<!--End Of Edit Vechicle Chandra Coded-->  
            
            
              
           <!--Start Of View Vechicle Chandra Coded-->   
                   
        <div class="workplace">
           <div align="right"><a href="manage_vehicle.php"  class="btn" >Add New Vehicle</a></div>    
          	<br> 
           		<div class="row-fluid">
                	<div class="span12">                    
                    	<div class="head clearfix">
                        	<div class="isw-grid"></div>
                        	<h1>Show All Vehicle Details</h1>      
                          </div>                    
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable">
                            <thead>
                                <tr>
                                   <th width="8%">Sl. No.:</th>
                                    <th width="10%">Vehicle No.:</th>
                                    <th width="16%">Owner/Company:</th>
                                    <th width="10%">Contact No.:</th>
                                    <th width="14%">Drievr Name:</th>
                                    <th width="10%">Driver Contact No.:</th>
                                    <th width="10%">Vehicle Type:</th> 
                                    <th width="6%">Action</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                            		<?php	
                                    $i=1;	
                                    foreach($truck as $row) 
                                    {
                                    ?>
                            
                                <tr>
                                  <td><?php echo $i; ?> </td>
                                  <td ><?php echo $row['number']; ?></td>
                                  <td><?php echo $row['owner_name']; ?></td>
                                  <td><?php echo $row['owner_contact_no']; ?></td>
                                  <td><?php echo $row['driver_name']; ?></td>
                                  <td><?php echo $row['driver_contact_no']; ?></td>
                                  <td>
                                 <?php 
                                   $type=$row['truck_type'];
								  $under_trucktypeclass = new trucktypeClass();
								  $trty = $under_trucktypeclass -> showtrucktypeByid($type);
								  
								 
                                  
                                  foreach ($trty as $typerow)
								  {  
								 echo  $typerow['type']; 
								  }
								    
                                  ?></td>
                                 <td><a href="view_vehicle.php?id=<?php echo $row['id']; ?>" title="Edit"><span class="isb-edit"></span></a>&nbsp;<a  onClick="return show_confirm()" href="delete_vehicle.php?id=<?php echo $row['id']; ?>" title="Delete"><span class="isb-delete"></span></a> </td>
                                  </tr> 
                                                                          
                                 <?php 	 
								 $i++;
							   	   } 
								  ?>
							                                      
                            </tbody>
                        </table>
                    </div>
                </div>                                
                
            </div>			 
             
        </div>
     
        	<!--End Of View Vechicle Chandra Coded-->  
        
    </div>   
    
    <!--Add Dialog Pop up Form -->
    
    <!--<div id="fModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Modal form</h3>
        </div>        
        <div class="row-fluid">
            <div class="block-fluid">
                <div class="row-form clearfix">
                    <div class="span3">First name:</div>
                    <div class="span9"><input type="text" value=""/></div>
                </div>            
                <div class="row-form clearfix">
                    <div class="span3">Last name:</div>
                    <div class="span9"><input type="text" value=""/></div>                    
                </div>                                    
                <div class="row-form clearfix">
                    <div class="span3">About:</div>
                    <div class="span9"><textarea></textarea></div>
                </div>                                                
            </div>                
            <div class="dr"><span></span></div>
            <div class="block">                
                <p>Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet purus. Vivamus hendrerit, dolor at aliquet laoreet.</p>
            </div>
        </div>                    
        <div class="modal-footer">
            <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Save updates</button> 
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>            
        </div>
    </div>-->
    
    
</body>
</html> 