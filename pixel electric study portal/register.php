<?php

$con=mysqli_connect('localhost','centrere_pixel','pixel2019','centrere_pixel');

$name=$_GET["name"];
$institution= $_GET["institution"];
$course= $_GET["course"];
$number= $_GET["number"];
$email= $_GET["email"];
$password= $_GET["password"];

$ar=array();


$sql="insert into student (name,institution,course,number,email,password) values('$name','$institution','$course','$number','$email','$password')";
$re=mysqli_query($con,$sql);


if ($re) {
	$mess="ok";
}
else{
$mess="failed";
}


$ar['response']=$mess;

echo json_encode($ar);


?>
