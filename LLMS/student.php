<?php
include "connection.php";

$sql = "SELECT studentid, name, contact, address, course FROM student";
$result = mysqli_query($con,$sql);

?>


<!DOCTYPE html>
<html>
<head>
	<title>my page</title>
</head>
<body>
	<style>
		table,th,td{
			border: 1px solid black;
			text-align: center;
		}
		h1{
			text-align: center;
		}
	</style>
	<div>
	<form action="" method="">
		NAME: <input type="text" name="nm">
		contact: <input type="text" name="cn">
		Address: <input type="text" name="ad">
		Course: <input type="text" name="cu"><br>
		<input type="submit" name="add" value="ADD">
	</form>
	</div><br><br>
	<table style="width: 100%">
		<tr>
				<th>STUDENT ID</th>
				<th>NAME</th>
				<th>CONTACT</th>
				<th>ADDRESS</th>
				<th>COURSE</th>
		</tr>
		
				<?php while ($row = mysqli_fetch_array($result);) { ?>
					<tr>
						<td><?php echo "$row[studentid]";?></td>
						<td><?php echo "$row[name]";?></td>
						<td><?php echo "$row[contact]";?></td>
						<td><?php echo "$row[address]";?></td>
						<td><?php echo "$row[course]";?></td>
					</tr>
				}
				
			
	</table>
</body>
</html>