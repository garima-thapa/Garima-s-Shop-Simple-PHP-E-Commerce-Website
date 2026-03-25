<?php
$host="localhost";
$user="root";
$pass="";
$db="ecommerce";
$conn=mysqli_connect($host,$user,$pass,$db);
if(!$conn){
	die("connection failed:".mysqli_connect.error());
}
echo "database connection successful !";
?>