<!DOCTYPE html>
<html lang="en">

<meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>



<?php 
/*  Azhar Coded*/
error_reporting(0);
session_start();
$sessionuser = $_SESSION['username'];
include('include/autoLoad.php');
include'include/head.php'; 

		$under = new searchCity();
		$create = $under -> viewcity();
		//print_r($create);
		
		//$under_rate = new rateClass();
		//$rate_val = $under_rate -> viewrate();
		//$rate = $rate_val['rate'];
		
		$under_truck_type_class = new trucktypeClass();
		$truck_type = $under_truck_type_class -> showtrucktype();
		
		


?>
			
			<meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
  var directionDisplay;
 
  function initialize() {
    directionsDisplay = new google.maps.DirectionsRenderer();
   }
</script>
<script>
var directionsService = new google.maps.DirectionsService();

function calcRoute() {
  var start = document.getElementById("s2_1").value;
  var end = document.getElementById("s2_2").value;
  var s2_3 = document.getElementById("s2_3").value;
  var distanceInput = document.getElementById("distance");
   var fare = document.getElementById("fare");
  var request = {
    origin:start,
    destination:end,
    travelMode: google.maps.DirectionsTravelMode.DRIVING
  };
  
  directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
	  var dis1=distanceInput.value = response.routes[0].legs[0].distance.value / 1000;
	  calculate_total();
    }
  });
  
}
</script>
<script>
function show_rate(str)
{
if (str.length==0)
  {
  document.getElementById("sd").innerHTML="";
  return;
  }
var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    	document.getElementById("km_rate").value = xmlhttp.responseText;
		calculate_total();
    }
  }
xmlhttp.open("GET","ajax_page_4_show_rate_per_km.php?t="+str,true);
xmlhttp.send();
}
</script>
<script>

function calculate_total(){
	
dist=eval(document.getElementById('distance').value);
rate=eval(document.getElementById('km_rate').value);
tot=rate*dist;
document.getElementById('fare').value=tot;
}

</script>
<body onLoad="initialize()">
    
    
    
    <?php include 'include/navigation.php'; ?>
        
    <div class="content">
        
        
        <div class="breadLine">
            
            <ul class="breadcrumb">
                <li><a href="dashboard.php">Dashboard</a> <span class="divider">></span></li>                
                <li class="active">New Booking</li>
            </ul>
                        
            
            
        </div>
        
        <div class="workplace">
            
            <div class="row-fluid">
                <div class="span2"></div>
                <div class="span8">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1>New Booking</h1>
                    </div>
                    <div class="block-fluid">                        
                        <form name="newBooking" action="submit-booking.php" method="post">
                        <div class="row-form clearfix">
                            <div class="span3">PickUp City:</div>
                            <div class="span9">
							 <select name="start" id="s2_1" style="width: 100%;" onChange="calcRoute()">
                  <option>Choose a City</option>
                  <?php foreach($create as $citydetails ) { ?>
                  <option value="<?php echo $citydetails['city_name']; ?>"> <?php echo $citydetails['city_name']; ?> </option>
                  <?php } ?>
                </select>
							</div>
                        </div> 

                        <div class="row-form clearfix">
                            <div class="span3">Destination City:</div>
                            <div class="span9">
						<select name="end" id="s2_2" style="width: 100%;" onChange="calcRoute()">
                  <option>Choose a City</option>
                  <?php foreach($create as $citydetails ) { ?>
                  <option value="<?php echo $citydetails['city_name']; ?>"> <?php echo $citydetails['city_name']; ?> </option>
                  <?php } ?>
                </select>
							</div>
                        </div>      
						
						<div class="row-form clearfix">
                            <div class="span3">truck Type</div>
                            <div class="span9">
							<select name="truck-type" id="s2_3" style="width: 100%;" onChange="show_rate(this.value)" >
                  <option>choose a option...</option>
                  <?php foreach($truck_type as $tt ) { ?>
                  <option value="<?php echo $tt['id']; ?>"> <?php echo $tt['type']; ?> </option>
                  <?php } ?>
                </select>
							</div>
                        </div>                    

                        <div class="row-form clearfix">
                            <div class="span3">Approax Distance</div>
                            <div class="span9"><input type="text" name="distance" id="distance" value="0" readonly></div>                            
                        </div> 
                        
                        
                      <!--<div class="row-form clearfix">
              			<div class="span3"> Rate Per km:</div>
              			  <div class="span9">
              			    <input type="text" name="km_rate" id="km_rate" value="0" readonly>
              			  </div>
           			  </div>-->
                      
                       <input type="hidden" name="km_rate" id="km_rate" value="0" readonly>
                        

                        <div class="row-form clearfix">
                            <div class="span3">Estimate Freight</div>
                            <div class="span9"><input type="text" name="fare" id="fare" value="0" readonly></div>
                        </div>                                       
                        
                        <div class="row-form clearfix">
                            <div class="span3">Cargo Type</div>
                            <div class="span9">
							 <select name="cargo-type" id="s2_4" style="width: 100%;">
                           <option>choose a option...</option>
							<option value="1">Truck Type1</option>
							<option value="2">Truck Type2</option>
							<option value="3">Truck Type3</option>
							<option value="4">Truck Type4</option>
							</select>
							</div>
                        </div>                                                               

                        <div class="row-form clearfix">
                            <div class="span3">Cargo Weight</div>
                            <div class="span9"><input type="text" name="cargo-weight" id="cargo-weight" /></div>
                        </div> 
						
						<div class="row-form clearfix">
                            <div class="span3">total truck</div>
                            <div class="span9"><input type="text" name="total-truck"/></div>
                        </div>                        

                        <div class="row-form clearfix">
                            <div class="span3">PickUp Date</div>
                            <div class="span9">
							<input type="text" name="pick-date"/>
							</div>
                        </div>
                        
                         <div class="row-form clearfix">
                         <div class="span4">
                        <button class="btn" type="submit">Submit</button>       
                        
                         <button class="btn btn-danger" type="submit">Reset</button>                                         
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
