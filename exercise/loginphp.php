<?php

include "config.php";

$userid = $_POST["uid"];
$ps = $_POST["pass"];

if ($userid != "" && $ps != "")
	{

        $sql_query = "select * from user where userid='".$userid."' and password='".$ps."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        if($row['userid']==$userid && $row['password']==$ps)
		{
			$_SESSION['uname'] = $userid;
            header('Location: homepage.php');
		}
		else
		{
			echo "alert('Invalid UserId or Password');";
			header('Location: index.php');
			//echo "<script type='text/javascript'>alert('Invalid UserId or Password');</script>";
		}
	}

?>