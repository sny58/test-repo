<html>
<body>
<?php 
	session_start();
	echo "<br><br><br><br> <center>Welcome : {$_SESSION['uname']} </center>";
?>
<br>
<center>
<a href="logout.php">Logout</a>
</center>
</body>
</html>