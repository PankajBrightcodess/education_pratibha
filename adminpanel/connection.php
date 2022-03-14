<?php 
if(isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST']=='localhost'){
	$conn=new mysqli("localhost","root","","db_pratibha");
}
else{
	$conn=new MySQLi("localhost","softwarebss_prathibha","Prathibha@123#","softwarebss_prathibha");
}
if($conn->connect_errno){
	echo "connection failed";
}
date_default_timezone_set('Asia/Kolkata');
?>
