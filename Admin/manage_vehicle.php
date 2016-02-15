<!DOCTYPE html>
<html lang="en">

<?php 

 error_reporting(0);
include'include/head.php'; 
 $msg=$_GET['msg']
 
 

?>

<body>
    
    <?php 
	
		include ('include/autoload.php'); 
		include ('include/navigation.php'); 
	    $under_truck_type_class = new trucktypeClass();
		$truck_type = $under_truck_type_class -> showtrucktype();
	 
	 ?>
    
    
        
    <div class="content">
        
        
        <div class="breadLine">
            
            <ul class="breadcrumb">
                <li><a href="#">Admin</a> <span class="divider">></span></li>                
                <li class="active">Manage Vehicle</li>
            </ul>
                        
            
            
        </div>
        
        
        
        
        <div class="workplace">
        
        <!--For Success Message-->
        
        <?php  if($msg=='Success') {   ?>
        
        <div class="row-fluid">
            <div class="span2"></div>
           <div class="span8">  <div class="alert alert-success"> 
           
                          
                <h4>Success!</h4>
                You successfully insert your data.
            </div> </div>
            
              </div>
              
              <?php } ?>
              
              <!--End For Success Message-->
            
             
            
            <div class="row-fluid">
            
             
            
                <div class="span2"></div>
                <div class="span8">
                
                <div align="right"><a href="view_vehicle.php"  class="btn" >View Vehicle</a></div>    
          <br>
                
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1>Add Vehicle Details</h1>
                    </div>
                   <form name="truckEntry" action="submit-truck.php" method="post">
                    
                    <div class="block-fluid">  
                    
                    
                    <div class="row-form clearfix">
                            <div class="span3">Vehicle No.:</div>
                            <div class="span9"><input type="text" name="truck-no" value="" placeholder="Please input Vehicle No......" /></div>                            
                        </div>                       
                        
                        <div class="row-form clearfix">
                            <div class="span3">Owner/Company:</div>
                            <div class="span9"><input type="text" name="owner-name" value="" placeholder="Please input owner/Company Name......"/></div>
                        </div> 

                        <div class="row-form clearfix">
                            <div class="span3"> Contact No.:</div>
                            <div class="span9"><input type="text" name="contact-no" value="" placeholder="Please input owner Contact No......"/></div>
                        </div>                         
                                    
                        
                        <div class="row-form clearfix">
                            <div class="span3">Drievr Name:</div>
                            <div class="span9"><input type="text" name="driver-name" placeholder="Please Input Driver Name......"/></div>
                        </div>                                                               

                        <div class="row-form clearfix">
                            <div class="span3">Driver Contact No.:</div>
                            <div class="span9"><input type="text" name="driver-phone" placeholder="Please Input Conatct No......"/></div>
                        </div>     
                        
                        
                        <div class="row-form clearfix">
                            <div class="span3">Vehicle Type:</div>
                            <div class="span9">                                                        
                            <select name="truck-type" id="s2_3" style="width: 100%;" onChange="show_rate(this.value)" >
                  			<option>choose a option...</option>
                  			<?php foreach($truck_type as $tt ) { ?>
                  			<option value="<?php echo $tt['id']; ?>"> <?php echo $tt['type']; ?> </option>
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
            
            <div class="dr"><span></span></div>
            
           
            
           
            
        
        </div>
        
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
