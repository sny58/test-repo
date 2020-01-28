<?php
session ();
$servername="localhost";
$username="root";
$password="root";
$dbname="LLMS_login";
// create connection

$conn =  new mysqli($servername, $username, $password, $dbname);
if ($conn->connec_error) {
  die ("connection failed:" . mysqli_connect_error());
}
/*
$sql= "CREATE DATABASE LLMS_login";
if($conn->query($sql)){
	echo "database created";
} */

/* $sql= " CREATE TABLE login_details (
           username VARCHAR(30),
           password VARCHAR(30)
       )";

       $conn->query($sql);
   
       $sql= "INSERT INTO login_details (username, password) VALUES('user', 'password')";
       $conn->query($sql);
 */

       if(!empty($_POST['submit']) && $_POST['username']!="" && $_POST['password']!="") {
	        echo "right";
       	 $username=$_POST['username'];
       	 $password=$_POST['password'];
         $sql= "SELECT username, password FROM login_details";
         $result=$conn->query($sql);
         $login_data=$result->fetch_assoc();
          if($username==$login_data['username'] && $password==$login_data['password']){
            
          	header("location: data_base.php");
          } 
          else {
          	echo "Wrong credentials";
          }
       }
       else { echo " enter credentials";
       }
       

  ?>




<html>
<head>
	<title>Admin Login</title>
</head>
<body>
	<form action="" method="post">
		Username:<input type='text' name='username'><br>
		Password:<input type="password" name="password"><br>
		         <input type="submit" name="submit" value="Login">
	</form>

</body>
</html>



<?php


 $conn->close();    

?>