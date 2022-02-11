<?php
//Connecter dans localhost
$localhost="localhost";
$user="root";
$password="";
$DA="pme";
$connet= mysqli_connect($localhost,$user,$password,$DA);
if($connet==true){
    echo "Connected";
}else{
	echo "Disconnected";
}
?>