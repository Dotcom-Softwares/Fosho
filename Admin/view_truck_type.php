<!DOCTYPE html>
<html lang="en">

<?php 
 error_reporting(0);
include'include/head.php'; 
 $msg=$_GET['msg'];
 ?>

<body>

<?php
include('include/autoLoad.php');

$under_truck_type_class = new trucktypeClass();
$truck_type = $under_truck_type_class -> showtrucktype();

?>
    
    
    
    <?php include 'include/navigation.php'; ?>
        
    <div class="content">
        
        
        <div class="breadLine">
            
            <ul class="breadcrumb">
                <li><a href="#">Admin</a> <span class="divider">></span></li>                
                <li class="active">Manage Vehicle</li>
            </ul>
                        
            
            
        </div>
        
        
        
        <!--For Edit Start Here -->
         <?php if($_GET['id']!='') { 
		 	   $type = $_REQUEST['id'];
			   $gettypedetails = new trucktypeClass();
			   $gettype = $gettypedetails -> showtrucktypeByid($type);
		       foreach($gettype as $typerow){
			   
		 ?>  
        
       <div class="workplace">
        <form name="truck" action="update_truck_type.php" method="post">   
        <input type="hidden" name="id" value="<?php echo $type; ?>" /> 
        <div class="row-fluid">
            <div align="right"><a href="view_vehicle.php"  class="btn" >View Vehicle</a></div>    
          		<br>
                 <div class="head clearfix">
                   <div class="isw-documents"></div>
                     <h1>Update Vehicle Type Details</h1>
                    </div>
            <div class="block-fluid">
                <div class="row-form clearfix">
                    <div class="span3">Truck Type Name:</div>
                    <div class="span9"><input type="text" name="truck-type" value="<?php echo $typerow['type']; ?>"/></div>
                </div>            
                <div class="row-form clearfix">
                    <div class="span3">Maximum Weight:</div>
                    <div class="span9"><input type="text" name="max-weight" value="<?php echo $typerow['max_weight']; ?>"/></div>                    
                </div>                                    
                <div class="row-form clearfix">
                    <div class="span3">Rate Per K.M.:</div>
                    <div class="span9"><input type="text" name="rate" value="<?php echo $typerow['rate']; ?>"/></div>
                </div> 
                <div class="row-form clearfix">
                 <div class="span4">
               <button class="btn" type="submit">Submit</button>       
                <button class="btn btn-danger" type="reset">Reset</button>                                         
        		</div>
                </div>
                                                               
            </div>                
            
            
        </div>                    
        
    </form>
   </div>     
        
     <?php } } ?>   
        
        
        
        <div class="workplace">
        
        <!--For Success Message-->
        
        <?php  if($msg=='success') {   ?>
        
        <div class="row-fluid">
            <div class="span2"></div>
           <div class="span8">  <div class="alert alert-success"> 
           
                          
                <h4>Success!</h4>
                You successfully insert your data.
            </div> </div>
            
              </div>
              
              <?php } ?>
              
              <!--End For Success Message-->
            
            
            
            
            
            
           <div align="right"><a href="add_truck_type.php"  class="btn" >Add New Truck Type</a></div>    
          <br> 
            
           <div class="row-fluid">
                
                <div class="span12">                    
                    
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Show All Truck Type </h1>      
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
                                    
                                    <th width="6%">Sl. No.</th>
                                    <th width="20%">Truck Type Name</th>
                                    <th width="20%">Maximum Weight</th>
                                    <th width="20%">Rate Per K.M.</th> 
                                    <th width="6%"> Action </th>                                   
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php
  								
							$i=1;	
							foreach($truck_type as $row) 
							{
  
  							?>
                            
                                <tr>
                                    <td><?php echo $i; ?> </td>
                                    <td><?php echo $row['type']; ?></td>
                                    <td><?php echo $row['max_weight']; ?></td>
                                    <td><?php echo $row['rate']; ?></td>
                                    <td><a  href="view_truck_type.php?id=<?php echo $row['id']; ?>" title="Edit"><span class="isb-edit"></span></a>&nbsp;<a onClick="return show_confirm()" href="delete_vehicle_type.php?id=<?php echo $row['id']; ?>" title="Delete"><span class="isb-delete"></span></a> </td>
                                                                      
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
        
    </div>   
    
    <!--Add Dialog Pop up Form -->
   
    
</body>
</html>
