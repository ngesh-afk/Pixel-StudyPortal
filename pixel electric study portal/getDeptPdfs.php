<?php

require_once 'connect.php';
 
//connecting to the db
$con = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die("Unable to connect");
 
//sql query
$sql = "SELECT * FROM `pdftable` WHERE PdfInstitution='laikipia' ORDER BY id DESC";
$sql1 = "SELECT * FROM `pdftable` WHERE PdfInstitution='mku' ORDER BY id DESC";
 
//getting result on execution the sql query
$result = mysqli_query($con,$sql);
$result1 = mysqli_query($con,$sql1);
 
//response array
$response = array();
 $response['error'] = false;
 $response['message'] = "PDfs fetched successfully.";
 $response['laikipia'] = array();
 $response['mku'] = array();
 
//traversing through all the rows
 
while($row =mysqli_fetch_array($result)){
    $temp = array();
    $temp['id'] = $row['id'];
    $temp['PdfURL'] = $row['PdfURL'];
    $temp['PdfName'] = $row['PdfName'];
    $temp['PdfInstitution'] = $row['PdfInstitution'];
    array_push($response['laikipia'],$temp);
}

while($row =mysqli_fetch_array($result1)){
    $temp = array();
    $temp['id'] = $row['id'];
    $temp['PdfURL'] = $row['PdfURL'];
    $temp['PdfName'] = $row['PdfName'];
    $temp['PdfInstitution'] = $row['PdfInstitution'];
    array_push($response['mku'],$temp);
}
 
echo json_encode($response);
?>