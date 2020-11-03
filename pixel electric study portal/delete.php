<?php
require_once('db11.php');

$get_id=$_GET['id'];

//$get_id2=$_GET['slot'];

//$conn=mysqli_connect("localhost","root","","project");
// sql to delete a record
$sql = "Delete from pdftable where id = '$get_id'   ";



// use exec() because no results are returned
$conn->exec($sql);
//$conn->exec($sql1);
header('location:managenotes.php');


?>
