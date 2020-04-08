<?php

$servername="localhost";
$username="root";
$password="root";
$dbname="LLMS";
// create connection

$conn =  new mysqli($servername, $username, $password, $dbname);
if ($conn->connec_error) {
  die ("connection failed:" . mysqli_connect_error());
}

 ?>

 <html>
 	<head>
 		<title>Edit page</title>
 	</head>
 	<body>
 		<form action="data_base.php" method="post">
 			<?php 
 			$id=$_POST['id_edit'];
 			$sql= "SELECT ID, Title, Description, Author, Quantity, Status FROM books_data WHERE ID= $id";
            $result= $conn->query($sql);
 			$row = $result->fetch_assoc(); 
 			?>
 			Title: <input type="text" name="Title_edit" value="<?php echo $row['Title']; ?>"><br>
          Description: <input type="text" name="Description_edit" value="<?php echo$row['Description']; ?>" ><br>
          Author: <input type="text" name="Author_edit" value="<?php echo $row['Author']; ?>"><br>
          Quantity: <input type="number" name="Quantity_edit" value="<?php echo$row['Quantity']; ?>" ><br>
          Status: <input type="text" name="Status_edit" value="<?php echo$row['Status']; ?>" ><br>
                  <input type="hidden" name="edited_id" value="<?php echo $id; ?>" >
                  <input type="submit" name="edit_book" value="Update"><br>
 		</form>
 	</body>
 </html>


 <?php 
 $conn->close();
  ?>