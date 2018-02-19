<?php
	// Account details
	$apiKey = urlencode('8ZS3H5SrJzU-YnSC68ldsaTIMm8wZsFsODGTS7WrMS');
	
	// Message details
	$numbers = array($_GET['mobile']);
	$sender = urlencode('TXTLCL');
	$random_number = intval( rand(0,9) . rand(1,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) );
	$message = 'Your OTP is :'.$random_number;
	
 
	$numbers = implode(',', $numbers);
 
	// Prepare data for POST request
	$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 
	// uncomment to actually send an SMS
	 $ch = curl_init('https://api.textlocal.in/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	 
	// Process your response here
	echo $response;
	//echo "Success";	
	echo $random_number;
?>
