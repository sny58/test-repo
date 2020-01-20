<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "stu_info";

// create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// check connection

if(!$conn) 
{
    die("connection failed: " . mysqli_connect_error());
}

//echo "connected successfully <br>";
// to add a new row
if(!empty($_POST["submit"]))
{
	$x=$_POST["firstname"];
	$y=$_POST["lastname"];

	$sql = "INSERT INTO students(firstname, lastname) VALUES('$x', '$y')";
	mysqli_query($conn, $sql);
}

 // to delete a new row
if(!empty($_POST["delete"]))
{
 	$delete_id = $_POST['delete_id'];
 	$sql = "DELETE FROM students WHERE id=$delete_id;"; 
    mysqli_query($conn, $sql); 
     
 } 




 /*
 // create database
 $sql = "CREATE DATABASE stu_info";
 if (mysqli_query($conn, $sql) )
 {
 	echo "database created succcesfully";
 }  
 else
 {
 	echo "error creating database: " . mysqli_error($conn);
 }


// sql to create table

 $sql = "CREATE TABLE students (
 id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30)  NOT NULL
 )";

// end

 
$sql = "INSERT INTO students(firstname, lastname) VALUES('Sunny', 'choudhary');";
$sql .= "INSERT INTO students(firstname, lastname) VALUES('Honey', 'Choudhary');";
$sql .= "INSERT INTO students(firstname, lastname) VALUES('Jimmy', 'Singh')";


        if (mysqli_multi_query($conn, $sql)) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


*/

$sql = "SELECT id, firstname, lastname FROM students";

$result = mysqli_query($conn, $sql);

//if (mysqli_num_rows($result) > 0) {
	// $row = mysqli_fetch_array($result);


    // output data of each row
  
    /* while($row = mysqli_fetch_assoc($result)) {

        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";


  } */ 
//} 
  //else {
    // echo "0 results";
// } 
?>

 
 

 <html>
<head> <title> table </title>
<h2>Table</h2> </head>
<body>
	
      <form action="" method="post"> 
	    <input type="text" name="firstname" placeholder="enter first name"><br>
	    <input type="text" name="lastname" placeholder="enter lastname"><br>
	    <input type="submit" name="submit">
      </form>
    

<table style="width:100%;" border="1" cellspacing="0">
  <tr>
    <th>ID</th>
    <th>Firstname</th>
    <th>Lastname</th> 
    <th>option</th> 
  </tr>
  <?php
  	while($row = mysqli_fetch_assoc($result)) { 
  ?> 
  <tr>
  	<td><?php echo $row['id'];  ?></td>
  	<td><?php echo $row['firstname']; ?></td>
  	<td><?php echo $row['lastname']; ?></td>
    <td> <form action="" method="post">
  		<input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>" >
        <input type="submit" name="delete" placeholder="delete" value="DELETE">
  	    </form>
  	</td>
  </tr>
  <?php } mysqli_close($conn); ?>
</table>

</body>
</html>



