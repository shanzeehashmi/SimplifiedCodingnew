<?php

if($_POST['auth_key'] != "laksfjifdvilwerumfb" || !isset($_POST['title'])  || !isset($_POST['body']) || !isset($_POST['class'])  )
{
echo "failure,thats all we know" ;
return;
}


$hostname="localhost" ;
$username="al854zika58251jp" ;
$password="jfkdfj4545*/*(&$&$#Hjkadfh!@#$" ;
$dbname= "zeenom_alpha_zikatin" ;


$con = mysqli_connect($hostname,$username,$password,$dbname);

$message = $_POST['body'] ;
$title =  $_POST['title'] ;
$class = $_POST['class'] ;

$path_to_fcm = 'https:fcm.googleapis.com/fcm/send' ;
$server_key = "AAAArcNwCdI:APA91bFkXIdZXyFsVc-xmx5P_tpht1-NwO9KYWkUMHSjpDUD8vwZjWuzSsMATTmomi6B4kvQUeMmplgTOpffNQn38121uCyn1UEr8KoW487RFuftSgBwftWtGFRO-20q0E9G3KVdx19m";

$sql = "select token_zika from pci_token where  class_zika = '$class' " ;

$result = mysqli_query($con,$sql) ;


$registration_ids = array() ;

 while ($row=mysqli_fetch_row($result))
    {
    array_push($registration_ids,$row[0]) ;
    }

 

$headers = array (
					'Authorization:key=' . $server_key ,
					'Content-Type:application/json'
					) ;

$fields = array('registration_ids'=>$registration_ids,
				'notification'=>array('title'=>$title,'body'=>$message,'vibrate'=> 'true','sound'=> 'default') ,'priority' => 'high') ;


$payload = json_encode($fields) ;


//github

$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, $payload );
		$result = curl_exec($ch );
		curl_close( $ch );


//closed git



mysqli_close($con) ;

$ooo = json_encode($result) ;




 


?>