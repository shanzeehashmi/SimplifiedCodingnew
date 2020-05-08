
<?php

 function sendConfirmation($mob,$name,$order_id)
    {
       
        $key = "54564fas6a3fg4as5dte6wasdfasdg3574" ;  //this key is used to validate the request

        // Prepare data for POST request
        $data = array("mob_no" => $mob, "name" => $name, "key" => $key,"order_id" => $order_id);


        // Send the POST request with cURL
        $ch = curl_init('http://zeenomware.com/funa/sms.php');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

       

    }

?>





<?php
/*
echo '
//<div id="loader"></div> ' ;

  */



echo "
<script>
$('#loader').css('visibility', 'hidden');
  </script>

" ;


if(isset($_GET['name']) && isset($_GET['mobile_no']) && isset($_GET['address'])  &&  isset($_GET['locality'])   && isset($_GET['volume']) && isset($_GET['quantity'])  )
{

  
echo "
<script>
$('#loader').css('visibility', 'visible');

  </script>

" ;


// coming here means.. everything is ook and accept the order


    


$name = htmlspecialchars($_GET['name'])  ;
$mobile_no = htmlspecialchars($_GET['mobile_no'])  ;
$address = htmlspecialchars($_GET['address'])  ;
$locality = htmlspecialchars($_GET['locality'])  ;
$volume = htmlspecialchars($_GET['volume'])  ;
$quantity = htmlspecialchars($_GET['quantity'])  ;


//generate numeric order id 
$order_id = rand(1000,9999) ;


if(isset($_GET['name']) && isset($_GET['mobile_no']) )
{
    sendConfirmation($mobile_no,$name,$order_id);

}


// mailing

if(isset($_GET['email']))
{
    $to = $_GET['email'] ; 
}else
{
    $to = "mdfhashmi@gmail.com";
}


$subject = "Funa Water Booking | Online Portal";
$heading =" Hey Funa, You have water booking. Checkout the details below" ;

if(isset($_GET['email']))
{
    $heading = "Hello ".$name.",<br> We have received your order, Soon one of our representative will call you and will deliver the water" ;
}

$message = '
<html>
<head>
<title>Funa Water Booking | Online Portal</title>

<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>

</head>
<body>
<p>
<h3>'.$heading.' </h3>
</p>
<table  id="customers" >
<tr>
<th>Name</th>
<th>Mob.</th>
<th>Address</th>
<th>Locality</th>
<th>Volume</th>
<th>Quantity</th>
<th>Order Id</th>

</tr>
<tr>
<td>'.$name.'</td>
<td>'.$mobile_no.'</td>
<td>'.$address.'</td>
<td>'.$locality.'</td>
<td>'.$volume.'</td>
<td>'.$quantity.'</td>
<td>'.$order_id.'</td>
</tr>
</table>
</body>
</html>
';

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: water_booking@zeenomware.com' . "\r\n";

if(isset($_GET['email']))
{
$headers .= 'Bcc: mdfhashmi@gmail.com' . "\r\n"; 
}

if(mail($to,$subject,$message,$headers))
	{
//coming here means :::: mail sent successfully ... show the confirmation to user

echo '
<script type="text/javascript">

var x = document.getElementById("loader");

  x.style.display = "none";


</script>';

header("Location: confirmation.php?key=".$order_id);
	}

}

?>




<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Funa Drinking Water | Online Booking System</title>
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600&display=swap" rel="stylesheet">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel="stylesheet" href="style.css">

</head>

<body>

<script>
$('#loader').css('visibility', 'hidden');
  </script>


<header class="header">
  <h1 class="header__title"><img src="logo.png" style="width:280px;height:90px"/></h1>
</header>
<div class="content">
  <div class="content__inner">

    <div class="container overflow-hidden">
      <div class="multisteps-form">
        <div class="row">
          <div class="col-12 col-lg-8 ml-auto mr-auto mb-4">
            <div class="multisteps-form__progress">
              <button class="multisteps-form__progress-btn js-active" type="button" title="User Info">Order Details</button>
              <button class="multisteps-form__progress-btn" type="button" title="Address">Basic Info</button>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-lg-8 m-auto">
            <form class="multisteps-form__form" onsubmit="ShowLoading()">
              <div class="multisteps-form__panel shadow p-4 rounded bg-white js-active" data-animation="scaleIn">
                <h3 class="multisteps-form__title">Order Details</h3>
                <div class="multisteps-form__content">
                  <div class="form-row mt-4">
                   
                    <div class="col-6 col-sm-6 ">
                        <select class="multisteps-form__select form-control" name="volume" required>
                          <option >Choose Volume</option>
                          <option>500 ml</option>
                          <option>1 Litre</option>
                          <option selected="selected">20 Litres</option>
                        </select>
                      </div>

                      <div class="col-6 col-sm-6">
                          <select class="multisteps-form__select form-control" name="quantity" required>
                            <option >Select Quantity</option>
                            <option selected="selected">1 piece</option>
                            <option>2 pieces</option>
                            <option>3 pieces</option>
                            <option>4 pieces</option>
                            <option>5 pieces</option>
                            <option>6 pieces</option>
                            <option>7 pieces</option>
                            <option>8 pieces</option>
                            <option>9 pieces</option>
                            <option>10 pieces</option>
                            <option>10+ pieces</option>

                          </select>
                        </div>
                    
                  </div>
                 
                  <div class="button-row d-flex mt-4">
                    <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                  </div>
                </div>
              </div>

              <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                <h3 class="multisteps-form__title">Basic Info</h3>
                <div class="multisteps-form__content">
                        <div class="form-row mt-4">
                                <div class="col">
                                  <input class="multisteps-form__input form-control" type="text" placeholder="Full Name" name="name" required/>
                                </div>
                              </div>

                              <div class="form-row mt-4">
                                    <div class="col">
                                      <input class="multisteps-form__input form-control" type="tel" maxlength="10" placeholder="Mobile No." name="mobile_no" required/>
                                   
                                    </div>
                                  </div>
                                  
                                   <div class="form-row mt-4">
                                    <div class="col">
                                      <input class="multisteps-form__input form-control" type="text" placeholder="Email (optional)" name="email" />
                                   
                                    </div>
                                  </div>

                  <div class="form-row mt-4">

                        <div class="col-12 col-sm-6">
                            <select class="multisteps-form__select form-control">
                              <option selected="selected">Jharkhand</option> 
                            </select>
                        </div>

                  </div>
                        
                    
                  <div class="form-row mt-4">

                        <div class="col-12 col-sm-6">
                            <select class="multisteps-form__select form-control" name="locality">
                              <option>Ranchi</option>
                              <option selected="selected">Itki</option>  
                            </select>
                        </div>
                   
                  </div>

                  <div class="form-row mt-4">
                        <div class="col">
                          <input class="multisteps-form__input form-control" name="address" type="text" placeholder="Address for Delivery" required/>
                        </div>
                      </div>
                  
                  <div class="button-row d-flex mt-4">
                        <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                        <button class="btn btn-success ml-auto" type="submit" title="Send" >Place Order</button>
                      </div>

                </div>
              </div>

              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div >

<br><br><br><br><br>
<center>Copyright &copy; And All Rights Reserved by Funa &trade;</center>
<center><span style="text-decoration:none">Developed and Managed by <a href="http://www.zeenomware.com">Zeenomware</a></span></center>
<br>
</div>

<div style="background:#25d366;border-bottom-right-radius: 50%;border-top-right-radius: 50%;top:0;position: fixed;margin-top: 120px">

    <a href="https://api.whatsapp.com/send?phone=919608877234&text=Hi%20Funa Drinking Water,%20I%20Contacted%20Here%20Through%20Your%20Order Booking Portal ..!">   <img  src="whatsapp.png" style="height:50px;"> </a>
    
    
</div>


<script  src="function.js"></script>



<script type="text/javascript">
function myFunctionShowProgress() {
  var x = document.getElementById("loader");

    x.style.display = "block";
  
}
</script>


<script type="text/javascript">
    function ShowLoading(e) {
        var div = document.createElement('div');
       // var img = document.createElement('img');
       // img.src = 'loading.gif';
        div.innerHTML = '<h3>Placing Your Order</h3> <br /> <img src="loading.gif" style="width:70%; height:70% " class="img-responsive"  />  <div class="row"> <div class="col-md-12"  >  <span id="loader" style="z-index:5000" </div></div>  ';
        div.style.cssText = 'position: fixed; top: 5%; left: 10%; z-index: 5000; width: 80%; height:100%; text-align: center; background: #ffffff; border: 1px solid #000';
       // div.appendChild(img);
        document.body.appendChild(div);
        return true;
        // These 2 lines cancel form submission, so only use if needed.
        //window.event.cancelBubble = true;
        //e.stopPropagation();
    }
</script>



</body>
</html>