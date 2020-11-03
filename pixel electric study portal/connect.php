
 <?php
define ('DB_HOST','localhost');
define ('DB_USERNAME','centrere_pixel');
define ('DB_PASSWORD','pixel2019');
define ('DB_NAME','centrere_pixel');

$con = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die("Unable to connect");

?>