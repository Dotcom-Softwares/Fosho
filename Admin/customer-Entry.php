<!DOCTYPE html>
<html lang="en">

<?php 
/*  Azhar Coded*/
include'include/head.php'; ?>

<body>
    
    
    
    <?php include 'include/navigation.php'; ?>
        
    <div class="content">
        
        
        <div class="breadLine">
            
            <ul class="breadcrumb">
                <li><a href="dashboard.php">Dashboard</a> <span class="divider">></span></li>                
                <li class="active">Manage Customer</li>
            </ul>
                        
            
            
        </div>
        
        <div class="workplace">
		<div align="right"><a href="showCustomers.php"><button class="btn" type="button">Show Customers</button></a></div>    
          <br> 
            
            <div class="row-fluid">
                <div class="span2"></div>
                <div class="span8">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1>Add Customer</h1>
                    </div>
                    <div class="block-fluid">                        
                        <form name="customerEntry" action="submit-customer.php" method="post">
                        <div class="row-form clearfix">
                            <div class="span3">Customer Name:</div>
                            <div class="span9"><input type="text" name="customer-name" value="" placeholder="Please input Customer Name......"/></div>
                        </div> 

                        <div class="row-form clearfix">
                            <div class="span3">Customer EmailId</div>
                            <div class="span9"><input type="text" name="customer-email" value="" placeholder="Please input Customer EmailId......"/></div>
                        </div>                         

                        <div class="row-form clearfix">
                            <div class="span3">Pan No</div>
                            <div class="span9"><input type="text" name="pan-no" value="" placeholder="Please input Pan No......" /></div>                            
                        </div> 

                        <div class="row-form clearfix">
                            <div class="span3">Password</div>
                            <div class="span9"><input type="password" placeholder="Please InputPassword......" name="password" /></div>
                        </div>                                       
                        
                        <div class="row-form clearfix">
                            <div class="span3">Phone No</div>
                            <div class="span9"><input type="text" name="phone-no" placeholder="Please Input Phone No......"/></div>
                        </div>                                                               

                        <div class="row-form clearfix">
                            <div class="span3">Mobile No</div>
                            <div class="span9"><input type="text" name="mobile-no" placeholder="Please Input Mobile No......"/></div>
                        </div>                        

                        <div class="row-form clearfix">
                            <div class="span3">Address</div>
                            <div class="span9">
							<textarea name="address">Please Input Address.....</textarea>
							</div>
                        </div>
                        
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
            

            <div class="dr"><span></span></div>
            
           
            
        
        </div>
        
    </div>   
    
</body>
</html>
