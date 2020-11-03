<?php 
session_start();

$host = "localhost";
$user_name = "centrere_pixel";
$user_password="pixel2019";
$db_name="centrere_pixel";

$con = mysqli_connect($host,$user_name,$user_password,$db_name);

$username = $_POST["username"];
$password = md5($_POST["password"]);

$sql = "select username from admin where username = '$username' and password = '$password'";

$result = mysqli_query($con,$sql);

if(!mysqli_num_rows($result)>1){
  echo "<script>alert('you have entered wrong username or password!')</script>";
     echo "<script>window.location='index.html'</script>";
    

}else{
      
  header('location:home.html');


  }
mysqli_close($con);

?>