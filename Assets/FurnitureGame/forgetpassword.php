<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "furnituregame";

//Variable submitted by user
$loginUser = $_POST["loginUser"];
$loginPass = $_POST["loginPass"];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT username FROM user WHERE email = '" . $loginUser ."'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Tell user that name is already taken
    echo "Updating Info...";
  //Insert the user and password into the database
  while($row = $result->fetch_assoc()){
    $sql2 = "UPDATE `user` SET `password` = '" .$loginPass. "' WHERE email = '" . $loginUser ."'";
    if ($conn->query($sql2) === TRUE) {
      echo "Password updated successfully";
    } else {
      echo "Error: " . $sql2 . "<br>" . $conn->error;
    }

  }
    
} else {
    echo "Username is not present";
    
}
$conn->close();

?>