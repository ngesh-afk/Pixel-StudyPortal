<?php

require_once 'connect.php';
 
//connecting to the db
$con = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die("Unable to connect");
 
//sql query
$sql = "SELECT * FROM `resource` ORDER BY id DESC";
 
//getting result on execution the sql query
$result = mysqli_query($con,$sql);
 
//response array
$response = array();
 
$response['error'] = false;
 
$response['message'] = "PDfs fetched successfully.";
 
$response['pdfs'] = array();
 
//traversing through all the rows
 
while($row =mysqli_fetch_array($result)){
    $temp = array();
    $temp['id'] = $row['id'];
    $temp['PdfURL'] = $row['PdfURL'];
    $temp['PdfName'] = $row['PdfName'];
    $temp['PdfDescription'] = $row['PdfDescription'];
    array_push($response['pdfs'],$temp);
}
 
echo json_encode($response);
?>