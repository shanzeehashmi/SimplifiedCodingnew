<?php

if(!isset($_GET['key']))
{
return;
}

?>


<html>
<head>
    
    <title>Confirmation | FUNA Water Booking Portal </title>
<link href='https://fonts.googleapis.com/css?family=ABeeZee' rel='stylesheet'>

</head>

<body >
    <br>
<center>
<h3 ><font face="AbeeZee">We Have Received Your Order. Your Water Will Reach You Soon.</font></h3>


<h3><font face="AbeeZee">Your Order Id is :<h2><font color="blue"> <?php echo $_GET['key'];?> </font></h2></font></h3>

<img src="done.jpg" style=" top:10%; width:65%; height:65%;border-radius:10px " >


<h3><font face="AbeeZee">Please call our support centre if water not arrived within 30 minutes | +91 9608877234</font></h3>

</center>
<body>