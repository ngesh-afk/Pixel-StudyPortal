<?php
$con=mysqli_connect('localhost','centrere_pixel','pixel2019','centrere_pixel');
$sql = "SELECT * FROM images";
$r = mysqli_query($con,$sql);
$result = array();
while($res = mysqli_fetch_array($r)){
array_push($result,array(
"AndroidNames"=>$res['AndroidNames'],
"ImagePath"=>$res['ImagePath']
)
);
}
echo json_encode(array("result"=>$result));
mysqli_close($con);
?>