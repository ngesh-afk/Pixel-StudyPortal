<?php
$con=mysqli_connect('localhost','centrere_pixel','pixel2019','centrere_pixel');

$email= $_GET["email"];
$password= $_GET["password"];

$ar=array();

$s="select * from student where email='$email' and password='$password' ";
$r= mysqli_query($con, $s);
$rows=mysqli_num_rows($r);

if ($rows>0) {
	
	$mess="ok";
	$ar['response']=$mess;
	echo json_encode($ar);

}else{
	$mess="failed";

	$ar['response']=$mess;
	echo json_encode($ar);
}
mysqli_close($con);

?>