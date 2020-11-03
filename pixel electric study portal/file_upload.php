<?php
 
ServerConfig();

$session = 'pdfs/';
 
$ServerURL = 'http://192.168.42.162:80/session/'.$session;
 

 if(isset($_POST['submit1']) and isset($_FILES['pdf']['name'])){

$con = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die("Unable to connect");
 
 $PdfName = $_POST['t'];
 $PdfDepartment = $_POST['department'];
 $PdfSchool = $_POST['school'];
 
 $PdfInfo = pathinfo($_FILES['pdf']['name']['department']['school']);
 
 $PdfFileExtension = $PdfInfo['extension'];
 
 $PdfFileURL = $ServerURL . GenerateFileNameUsingID() . '.' . $PdfFileExtension;
 
 $PdfFileFinalPath = $swift . GenerateFileNameUsingID() . '.'. $PdfFileExtension;
 
 try{
 
 move_uploaded_file($_FILES['pdf']['tmp_name'],$PdfFileFinalPath);
 
 $InsertTableSQLQuery = "INSERT INTO pdftable (PdfURL, PdfName,PdfDepartment,PdfSchool) VALUES ('$PdfFileURL', '$PdfName','$PdfDepartment','$PdfSchool') ;";

 mysqli_query($con,$InsertTableSQLQuery);

 }catch(Exception $e){} 
 mysqli_close($con);
 
 }
}

function ServerConfig(){
 
define('HostName','localhost');
define('HostUser','root');
define('HostPass','');
define('DatabaseName','session');
 
}

function GenerateFileNameUsingID(){
 
 $con2 = mysqli_connect(HostName,HostUser,HostPass,DatabaseName);
 
 $GenerateFileSQL = "SELECT max(id) as id FROM pdftable";
 
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