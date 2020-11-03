<?php
ServerConfig();

$pixel = 'resource/';
 
$ServerURL = 'http://pixel.centre4resource.com/'.$pixel;
 
if($_SERVER['REQUEST_METHOD']=='POST'){
 
 if(isset($_POST['name']) and isset($_FILES['pdf']['name'])){

 include "connect.php";

 $PdfName = $_POST['name'];
 $PdfDescription = $_POST['description'];

 
 $PdfInfo = pathinfo($_FILES['pdf']['name']);
 
 $PdfFileExtension = $PdfInfo['extension'];
 
 $PdfFileURL = $ServerURL . GenerateFileNameUsingID() . '.' . $PdfFileExtension;
 
 $PdfFileFinalPath = $post . GenerateFileNameUsingID() . '.'. $PdfFileExtension;
 
 try{
 
 move_uploaded_file($_FILES['pdf']['tmp_name'],$PdfFileFinalPath);
 
 $InsertTableSQLQuery = "INSERT INTO resource (PdfURL, PdfName,PdfDescription) VALUES ('$PdfFileURL', '$PdfName','$PdfDescription') ;";

 mysqli_query($con,$InsertTableSQLQuery);
 echo "<script>alert('file uploaded successfull')</script>";
 echo "<script>window.location='resource.html'</script>";

 }catch(Exception $e){} 
 mysqli_close($con);
 
 }
}

function ServerConfig(){
 
define('HostName','localhost');
define('HostUser','centrere_pixel');
define('HostPass','pixel2019');
define('DatabaseName','centrere_pixel');
 
}

function GenerateFileNameUsingID(){
 
 $con2 = mysqli_connect(HostName,HostUser,HostPass,DatabaseName);
 
 $GenerateFileSQL = "SELECT max(id) as id FROM resource";
 
 $Holder = mysqli_fetch_array(mysqli_query($con2,$GenerateFileSQL));

 mysqli_close($con2);
 
 if($Holder['id']==null)
 {
 return 1;
 }
 else
 {
 return ++$Holder['id'];
 }
}



?>