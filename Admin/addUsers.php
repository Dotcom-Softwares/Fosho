<!DOCTYPE html>
<html lang="en">


<?php 
/*  Azhar Coded*/
session_start();
$sessionuser = $_SESSION['username'];
include'include/head.php'; ?>

<script type="text/javascript">
 
         $(document).ready(function(){
            $("#username").change(function(){
                 $("#message").html("<img src='loader.gif' /> checking...");
             
 
            var username=$("#username").val();
 
              $.ajax({
                    type:"post",
                    url:"checkusername.php",
                    data:"username="+username,
                        success:function(data){
                        if(data==0){
                            $("#message").html("<img src='accepted.png' /> Username available");
                        }
                        else{
                            $("#message").html("Username Exists");
                        }
                    }
                 });
 
            });
 
         });
		 
		 
		  $(document).ready(function(){
            $("#email").change(function(){
                 $("#msg").html("<img src='loader.gif' /> checking...");
             
 
            var email=$("#email").val();
 
              $.ajax({
                    type:"post",
                    url:"checkemail.php",
                    data:"email="+email,
                        success:function(data){
                        if(data==0){
                            $("#msg").html("<img src='accepted.png' /> Email available");
                        }
                        else{
                            $("#msg").html("Email Exists");
                        }
                    }
                 });
 
            });
 
         });
		 
		 
		 
 
       </script>
	   
	   <script type="text/javascript">
		$(document).ready(function(){
		$("#submit").click(function(){
		var userType = $(#userType option:selected).val();
		if(year == "")
		{
		$("#msg").html("Please select a Type");
		return false;
		}
		});
		});
	   </script>
	   
	   

<body>
    
    
    
    <?php include 'include/navigation.php'; ?>
        
    <div class="content">
        
        
        <div class="breadLine">
            
            <ul class="breadcrumb">
                <li><a href="dashboard.php">Dashboard</a> <span class="divider">></span></li>                
                <li class="active">Manage Users</li>
            </ul>
                        
            
            
        </div>
        
        <div class="workplace">
		<div align="right"><a href="showUsers.php"><button class="btn" type="button">Show Users</button></a></div>    
          <br> 
            
            <div class="row-fluid">
                <div class="span2"></div>
                <div class="span8">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1>Add Users</h1>
                    </div>
                    <div class="block-fluid">                        
                        <form name="customerEntry" action="submitUsers.php" method="post" id="validation">
                        <div class="row-form clearfix">
                            <div class="span3">User Name:</div>
                            <div class="span6"><input type="text" name="name" value="" class="validate[required]" id="user" placeholder="Please input User Name"/></div>
                        </div> 
						
						
                            
                           
                        

                        <div class="row-form clearfix">
                            <div class="span3">User EmailId</div>
                            <div class="span6"><input type="text" name="userEmail" class="validate[required,custom[email]]" id="email" placeholder="Please input EmailId"/></div>
							<div class="span3" id="msg"></div>   
                        </div>   
						
						 <div class="row-form clearfix">
                            <div class="span3">User PhoneNo</div>
                            <div class="span6">
							<input type="text" name="userPhone" value="" id="mask_phone" placeholder="Please input PhoneNo"/></div>
                        </div>                         

                        <div class="row-form clearfix">
                            <div class="span3">User login Name</div>
                            <div class="span6">
							<input type="text" name="userName" id="username" placeholder="Please input UserName" />
							
							</div>    <div class="span3" id="message"></div>                        
                        </div> 
						
						

                        <div class="row-form clearfix">
                            <div class="span3">Password</div>
                            <div class="span6"><input type="password" class="validate[required,minSize[5]]" id="password" placeholder="Please Input Password" name="password" /></div>
                        </div>                                       
                        
                        <div class="row-form clearfix">
                            <div class="span3">UserType</div>
                            <div class="span6">
							<select name="userType" id="sport" class="validate[required]" id="sport">
							<option></option>
							<option value="admin">Admin</option>
							<option value="callcenter">Call Center</option>
							</select></div>
							
                        </div>                                                               

                       <!-- <div class="row-form clearfix">
                            <div class="span3">Login Time</div>
                            <div class="span9"><input type="text" name="loginTime" placeholder="Please Input LoginIn Time"/></div>
                        </div>                        

                        <div class="row-form clearfix">
                            <div class="span3">Logout Time</div>
                            <div class="span9"><input type="text" name="logoutTime" placeholder="Please Input Loginout Time"/></div>
                        </div>  -->
                        
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
