<!DOCTYPE html>
<html lang="en">
<?php include 'include/head.php'; 
  error_reporting(0);
	 if($_GET['msg']!='') 
	 {  
	 $myData = json_decode( base64_decode( $_GET['msg'] ) );
     $msg = $myData->{'response'};
	 }
?>
<body>
    
    <div>
   			  
    <div class="loginBox">     
    
     
        <div class="loginHead">
            <label><font color="#FFFFFF"><b> Fosho </b> </font> </label>
        </div>
        <?php if($msg=='error') { ?>
        <div class="alert alert-error" >                
               
                Username And/Or Password is Wrong....
            	</div>
        <?php } ?>
        <form class="form-horizontal" action="login.php" method="POST">            
            <div class="control-group">
                <label for="inputEmail">Username</label>                
                <input type="text" name="username" id="inputEmail"/>
            </div>
            <div class="control-group">
                <label for="inputPassword">Password</label>                
                <input type="password" name="password" id="inputPassword"/>                
            </div>
            <div class="control-group" style="margin-bottom: 5px;">                
                <label class="checkbox"><input type="checkbox"> Remember me</label>                                                
            </div>
            
                
                
            	
  
            <div class="form-actions">
                <button type="submit" class="btn btn-block">Log in</button>
            </div>
        </form>        
        
    </div> 
  </div> 
       
    
</body>
</html>
