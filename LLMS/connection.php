<?php
$servername = "localhost";
$username="root";
$password="root";
$dbname="student";

$con = musqli_connect($servername,$username,$password,$dbname);
if(!con){
	die("connection failed:" . mysqli_connect_error());
}
?>