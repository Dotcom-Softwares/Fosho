<?php
/*  Azhar Coded*/
	//error_reporting(0);
	class insuranceClass 
	{
	
		function __construct()
		{
			dbConfig::config();
		}
		
		
		public function insurance($data)
		{
			$to = 'azharislam21@gmail.com';
			$subject = 'Insurance Details for a journey';
			$from = 'info@translinkasia.com';
			
			$bookingid = $data['bookingid'];
			
			$customername = $data['customer-name'];
		   	$customeremail = $data['customer-email'];
		   	$panno = $data['pan-no'];
		   	$phoneno = $data['Phoneno'];
			
			$journeydata = $data['date'];
			$journeytime = $data['time'];
			$pickuppoint = $data['start'];
			$destinationpoint = $data['end'];
			$distance = $data['distance'];
			
			$cargotype = $data['cargotype'];
			$weight = $data['weight'];
			$drivername = $data['drivername'];
			$driverph = $data['driverphone'];
			
			
			
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			// Create email headers
			
			$headers .= 'From: '.$from."\r\n".
			
				'Reply-To: '.$from."\r\n" .
			
				'X-Mailer: PHP/' . phpversion();
				
			$message = '<html><body>';
			
			$message .= '<div style="border:1px solid #000; padding:10px;">';
			
			$message .= 'FOSHO';
			
			$message .= '<p>Hello There,</p>';
			$message .= '<p>Details are Listed Below</p>';
			
			$message .= '<p>Booking Id : '.$bookingid.'</p>';
			$message .= '<p>Journey Details</p>';
			
			$message .= '<p>Journey Date & Time : '.$journeydata." ".$journeytime.'</p>';
			$message .= '<p>PickUp Point : '.$pickuppoint.'</p>';
			$message .= '<p>Destination Point : '.$destinationpoint.'</p>';
			$message .= '<p>Distance : '.$distance.'</p>';
			$message .= '<p>CargoType : '.$cargotype.'</p>';
			$message .= '<p>Weight : '.$weight.'</p>';
			
			$message .= '<p>Party/Company Details</p>';
			
			$message .= '<p>Party/Company Name : '.$customername.'</p>';
			$message .= '<p>EmailId : '.$customeremail.'</p>';
			$message .= '<p>Pan No : '.$panno.'</p>';
			$message .= '<p>Phone No : '.$phoneno.'</p>';
			
			$message .= '<p>Driver Details</p>';
			
			$message .= '<p>Driver Name : '.$drivername.'</p>';
			$message .= '<p>Driver PhoneNo : '.$driverph.'</p>';
			
			$message .= '</div>';
			
			$message .= '</body></html>';	
			
			
					if(mail($to, $subject, $message, $headers))
					{
						$msg = 'success';
					}
					
					else
					{
						$msg = 'error';
					}

					return $msg;
		}
	
	}

?>