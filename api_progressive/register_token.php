<?php

if(!isset($_POST['class'])  || !isset($_POST['token_key']) || !isset($_POST['user_id'])  )
{
echo "failure,thats all we know" ;
return;
}


$hostname="localhost" ;
$username="al854zika58251jp" ;
$password="jfkdfj4545*/*(&$&$#Hjkadfh!@#$" ;
$dbname= "zeenom_alpha_zikatin" ;

$con = mysqli_connect($hostname,$username,$password,$dbname);

$class = $_POST['class'] ;
$token = $_POST['token_key'] ;
$user_id_zika = $_POST['user_id'] ;

 try {
            $dbh = new PDO ("mysql:host=$hostname;dbname=$dbname", $username, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        } catch (PDOException $e) {
            echo "some error occured";
        }

 $stm = $dbh->prepare("INSERT INTO pci_token (token_zika,class_zika,user_id_zika) VALUES(:token_zika,:class_zika,:user_id_zika)");
        $stm->bindParam(':token_zika', $token);
        $stm->bindParam(':class_zika', $class);
        $stm->bindParam(':user_id_zika', $user_id_zika);

        if ($stm->execute()) {

            echo "successfull" ;
            return ;
        } else {
            echo "failed" ;
            return ;
        }

 


?>