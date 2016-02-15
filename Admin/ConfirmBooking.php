<!DOCTYPE html>
<html lang="en">

<meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>



<?php 
error_reporting(0);
session_start();
$sessionuser = $_SESSION['username'];
include('include/autoLoad.php');
include'include/head.php'; 

if($_GET['id']!='') 
 { 
   $b_id = $_REQUEST['id'];
   $getdetails = new bookingClass();
   $getbook = $getdetails -> showbookingbyid($b_id);
 }
 
 $under_truck_type_class = new trucktypeClass();
$truck_type = $under_truck_type_class -> showtrucktype();


$under_cargo_type_class = new trucktypeClass();
$cargo_type = $under_cargo_type_class -> showcargotype();

?>


<!--Start Distance Api -->

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
    <script type="text/javascript">
        var source, destination;
        var directionsDisplay;
        var directionsService = new google.maps.DirectionsService();
        google.maps.event.addDomListener(window, 'load', function () {
            new google.maps.places.SearchBox(document.getElementById('txtSource'));
            new google.maps.places.SearchBox(document.getElementById('txtDestination'));
            directionsDisplay = new google.maps.DirectionsRenderer({ 'draggable': true });
        });

        function GetRoute() {
            var mumbai = new google.maps.LatLng(18.9750, 72.8258);
            var mapOptions = {
                zoom: 7,
                center: mumbai
            };
            map = new google.maps.Map(document.getElementById('dvMap'), mapOptions);
            directionsDisplay.setMap(map);
            directionsDisplay.setPanel(document.getElementById('dvPanel'));

            //*********DIRECTIONS AND ROUTE**********************//
            source = document.getElementById("txtSource").value;
            destination = document.getElementById("txtDestination").value;

            var request = {
                origin: source,
                destination: destination,
                travelMode: google.maps.TravelMode.DRIVING
            };
            directionsService.route(request, function (response, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    directionsDisplay.setDirections(response);
                }
            });

            //*********DISTANCE AND DURATION**********************//
            var service = new google.maps.DistanceMatrixService();
            service.getDistanceMatrix({
                origins: [source],
                destinations: [destination],
                travelMode: google.maps.TravelMode.DRIVING,
                unitSystem: google.maps.UnitSystem.METRIC,
                avoidHighways: false,
                avoidTolls: false
            }, function (response, status) {
                if (status == google.maps.DistanceMatrixStatus.OK && response.rows[0].elements[0].status != "ZERO_RESULTS") {
                    var distance = response.rows[0].elements[0].distance.text;
                    var duration = response.rows[0].elements[0].duration.text;
                    var dvDistance = document.getElementById("dvDistance");
                    dvDistance.value = "";
                    dvDistance.value =distance ;
					var res = distance.split("km");
                    var dist=res[0];
					distan.value =dist;
					calculate_total();

                } else {
                    alert("Unable to find the distance via road.");
                }
				
				showHide();
				
            });
        }
		
    </script>
    
    <!--End Distance Api-->
    
<script>
function showHide()
{
	
   document.getElementById("hide1").style.display="";
   document.getElementById("hide2").style.display="";
   document.getElementById("hide3").style.display="";
   document.getElementById("hide4").style.display="";
   document.getElementById("hide5").style.display="";
   document.getElementById("hide6").style.display="";
   document.getElementById("hide7").style.display="";
   document.getElementById("hide8").style.display="";
   document.getElementById("hidebutton").style.display="none";

}
</script>

<script>
function show_rate(str)
{
	
var s = document.getElementById("ss").value;		
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
		
    }
  }

xmlhttp.open("GET","ajax_page_4_show_rate_per_km.php?t="+s,true);
xmlhttp.send();

}
</script>	

<script>

function calculate_total(){
	
dist=eval(document.getElementById('distan').value);
rate=eval(document.getElementById('km_rate').value);
tot=rate*dist;
document.getElementById('fare').value=tot;
}

</script>	
			
<body>
    
    
     <?php include 'include/navigation.php'; ?>
    
       <div class="content">
        
        
        <div class="breadLine">
            
            <ul class="breadcrumb">
                <li><a href="dashboard.php">Dashboard</a> <span class="divider">></span></li>                
                <li class="active">Confirm Booking</li>
            </ul>
                        
            
            
        </div>
        
        <div class="workplace">
            
            <div class="row-fluid">
                
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1>Confirm Booking</h1>
                    </div>
                   
                   <?php 
				   foreach($getbook as $booking_det)
				   {
				   ?>
                   
                    <div class="block-fluid"> 
                    
                     <div class="span6" style="background-color:#FFF;">                      
                        <form name="newBooking" action="submit_confirm_booking.php" method="post">
                        <!--For Booking Id--> <input type="hidden" name="id" value="<?php echo $booking_det['id']; ?>" />
                        <div class="row-form clearfix">
                            <div class="span3">PickUp City:</div>
                            <div class="span9">
							<input type="text" id="txtSource" name="start" value="" />
							</div>
                        </div> 

                        <div class="row-form clearfix">
                            <div class="span3">Destination City:</div>
                            <div class="span9">
						   	<input type="text" id="txtDestination" name="end" value="" />  
							</div>
                        </div>
                        
                        <div class="row-form clearfix" id="hide1" style="display:none;">
                            <div class="span3">Approax Distance</div>
                              <div class="span9"> 
                            	<input type="text" id="dvDistance" readonly style="width: 250px" />
                            
                             <input type="hidden" id="distan" name="distance"  style="width: 250px"  /> <!--For Distance Value Without KM-->   
                                </div>                            
                        	</div>
                            
                            <div class="row-form clearfix" id="hidebutton">
                            <div class="span3"></div>
                              <div class="span9"> 
                            	 <input class="btn" type="button" value="Calculate" onclick="GetRoute();show_rate(this.value);"  />  
                                </div>                            
                        	</div> 
                            
                            <div class="row-form clearfix" id="hide2" style="display:none;">
                            <div class="span3">Truck Type</div>
                              <div class="span9"> 
                                 <select name="truck-type" id="ss" style="width: 100%;" onChange="show_rate(this.value);calculate_total();">
                                   <option>choose a option...</option>
                                  <?php foreach($truck_type as $tt ) { ?>
                                  <option <?php if($tt['id']==$booking_det['truck_type']) { ?> selected<?php } ?> value="<?php echo $tt['id'] ;?>"><?php echo 												$tt['type'];?></option>
                                  <?php } ?>
                                  </select>    
                                </div>                            
                        	</div>
                             <!--For Truck Type Wise Rate-->
                             <input type="hidden" name="km_rate" id="km_rate" value="0"  readonly>
                             
                            <div class="row-form clearfix" id="hide3" style="display:none;">
                            <div class="span3">Estimate Freight</div>
                              <div class="span9"> 
                            	<input type="text" id="fare" name="fare" readonly style="width: 250px" value="" readonly/> 
                                </div>                            
                        	</div>
                            
                            <div class="row-form clearfix" id="hide4" style="display:none;">
                            <div class="span3">Cargo Type</div>
                              <div class="span9"> 
                            	  <select name="cargo-type" style="width: 100%;">
                                   <option>choose a option...</option>
                                  <?php foreach($cargo_type as $cc ) { ?>
                                  <option <?php if($cc['id']==$booking_det['cargo_type']) { ?> selected<?php } ?> value="<?php echo $cc['id'] ;?>"><?php echo 												$cc['type'];?></option>
                                  <?php } ?>
                                  </select> 
                                </div>                            
                        	</div>
                            
                            <div class="row-form clearfix" id="hide5" style="display:none;">
                            <div class="span3">Cargo Weight</div>
                              <div class="span9"> 
                            	<input type="text" id="" name="cargo-weight"  style="width: 250px" value="<?php echo $booking_det['cargo_weight']; ?>"/> 
                                </div>                            
                        	</div>
                            
                            <div class="row-form clearfix" id="hide6" style="display:none;">
                            <div class="span3">Total truck</div>
                              <div class="span9"> 
                            	<input type="text" id="" name="total-truck" readonly style="width: 250px" value="<?php echo $booking_det['total_truck']; ?>"/> 
                                </div>                            
                        	</div>
                            
                            <div class="row-form clearfix" id="hide7" style="display:none;">
                            <div class="span3">PickUp Date</div>
                              <div class="span9"> 
                            	<input type="text" id="" name="pick-date" readonly style="width: 250px" value="<?php echo $booking_det['pickup_date']; ?>"/> 
                                </div>                            
                        	</div>
 
                         <div class="row-form clearfix">
                         <div class="span6">
                        <button class="btn" type="submit">Confirm Booking</button>       
                        
                         <button class="btn btn-danger" type="submit">Reset</button>                                         
                        </div>
                        
                        
                        <?php } ?>
                        
                        </div>
                         	
                   
                      
                         
                        
                        
                        </form>
                        </div>
                        
                        <div class="span6" style="background-color:#FFF; padding-top:5px;">
                        
                         <div id="dvMap" style="width: 490px; height: 300px">
                		 </div>
                        </div>
                        
                      
                    
                    </div>
                    
                    
                    
                    </div>
                </div>
                
            
            

            <div class="dr"><span></span></div>
            
            
                 </div>
            
        </div>
        </div>
        
      
    
</body>
</html>
