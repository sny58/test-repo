<?php

$servername="localhost";
$username="root";
$password="root";
$dbname="LLMS";

// if($_POST['passkey']!=1234){ 
  // header("location:Adminlogin.php");
 // }
// create connection
$conn =  new mysqli($servername, $username, $password, $dbname);
if ($conn->connec_error) {
  die ("connection failed:" . mysqli_connect_error());
}

// ADD A NEW BOOK ENTRY
if(!empty($_POST['add_book'])) {
      $T=$_POST['Title'];
      $D=$_POST['Description'];
      $A=$_POST['Author'];
      $Q=$_POST['Quantity'];
      $S=$_POST['Status'];
      $sql = "INSERT INTO books_data (Title, Description, Author, Quantity, Status) VALUES( '$T', '$D', '$A', '$Q', '$S')";
      $conn->query($sql);
    }
 // CHANGE THE STATUS OF A BOOK ENTRY   
if(!empty($_POST['Arch'])) {
      $archive= $_POST['archive'];
      $status= $_POST['Arch'];
      $sql= "UPDATE books_data SET Status='$status' WHERE ID=$archive";
      $conn->query($sql);
    }
// UPDATE A BOOK ENTRY
if(!empty($_POST['edit_book'])) { 
      $edited_id=$_POST['edited_id'];
      $a=$_POST['Title_edit'];
      $b=$_POST['Description_edit'];
      $c=$_POST['Author_edit'];
      $d=$_POST['Quantity_edit'];
      $e=$_POST['Status_edit'];
      $sql = "UPDATE books_data SET Title='$a', Description='$b', Author='$c', Quantity='$d', Status='$e' WHERE ID=$edited_id";
      $conn->query($sql);
    }     
/*
// create database

$sql = "CREATE DATABASE LLMS";
if($conn->query($sql)) { 
  echo "database created succesfully";
}
else {
	echo "error creating database" . $conn->error;
}
*/

// create a table
/*
$sql = "CREATE TABLE books_data (
           ID INT (6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
           Title VARCHAR(30) NOT NULL,
           Description VARCHAR(30),
           Author VARCHAR(30),
           Quantity INT (6) UNSIGNED NOT NULL,
           Status VARCHAR(30)
           )";

    $conn->query($sql);

    $sql = " INSERT INTO books_data (Title, Description, Author, Quantity, Status) VALUES( 'Abc', 'sjbajba skbdaj', 'dssigi', 2, 'Archive');";
    $sql .= " INSERT INTO books_data (Title, Description, Author, Quantity, Status) VALUES( 'DEF', 'sasdada asda', 'dsdasda', 3, 'Active')";

    $conn->multi_query($sql); 
    */

    $sql= "SELECT ID, Title, Description, Author, Quantity, Status FROM books_data";
    $result= $conn->query($sql);

    

    

    
    

    ?>

   <!-- html table -->
   
   <html>
     <head>
       <title>Admin@LLMS</title>
       <h1>Limited Library Management System</h1>
     </head>
      <style>
        table, th , td { border: 1px solid black; text-align: center;}
          h1{ text-align: center; }
        
      </style>
     <body>
      <div>
        <form action="" method="post">
          Title: <input type="text" name="Title" >
          Description: <input type="text" name="Description" >
          Author: <input type="text" name="Author" >
          Quantity: <input type="number" name="Quantity" >
          Status: <input type="text" name="Status" >
                  <input type="submit" name="add_book" value="Add">
        </form>
      </div>
       <table style=" width: 100%;">
        <tr>
         <th>ID</th>
         <th>Title</th>
         <th>Description</th>
         <th>Author</th>
         <th>Quantity</th>
         <th>Status</th>
         <th>Edit</th>
         <th>Delete</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr> 
         <td><?php echo $row['ID']; ?></td>
         <td><?php echo $row['Title']; ?></td>
         <td><?php echo $row['Description']; ?></td>
         <td><?php echo $row['Author']; ?></td>
         <td><?php echo $row['Quantity']; ?></td>
         <td><?php echo $row['Status']; ?></td>
         <td>
          <form action="edit.php" method="post">
            <input type="hidden" name="id_edit" value="<?php echo $row['ID']; ?>" >
            <input type="submit" name="edit" value="Edit">
           </form></td>
          <td>
            <form action="" method="post">
             <input type="hidden" name="archive" value="<?php echo $row['ID']; ?>" >
             <?php if ($row['Status']=='Active') { ?>
              <input type="submit" name="Arch" value="Archive">
              <?php } ?>
             <?php if ($row['Status']=='Archive') { ?>
              <input type="submit" name="Arch" value="Active">
              <?php } ?>
            </form>
          </td>
          
           <?php } ?>
        </tr>

       </table>
     </body>

    </html>


   <?php
     $conn->close();
    
   ?>