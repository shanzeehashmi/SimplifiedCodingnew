<?php

$mob ;
$otp ;



if(isset($_POST['mob_no']) && isset($_POST['name']) && isset($_POST['key']) && isset($_POST['order_id']) )
{
    
    $string = trim($_POST['name']);
$result = explode(" ", $string);
   
   $mob = "91".$_POST['mob_no'] ;   
   $msg ="Hi,%n".$result[0]."%nWe have received your order for Water%n%nYour Order Id :".$_POST['order_id']."%n%nFor any query call us at +91 9608877234%n%nGet 10% OFF on bulk booking%n%nThanks,%nFuna" ; 
   
   $key= "54564fas6a3fg4as5dte6wasdfasdg3574" ;
   
   if($_POST['key'] != $key)
   {
       return 5;
   }
   
}
else
{
    return 5 ;
}


	


	// Account details
	$apiKey = urlencode('xxQJx0KxBC4-ISOGYfxNpsXd8nOb2YT2BvpGqfpBLY');
	
	// Message details
	$numbers = array("'".$mob."','919608877234'");
	$sender = urlencode('TXTLCL');
	$message = rawurlencode($msg);
 
	$numbers = implode(',', $numbers);
 
	// Prepare data for POST request
	$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 
	// Send the POST request with cURL
	$ch = curl_init('https://api.textlocal.in/send');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
	// Process your response here
	echo $response;
	
	

	
?>