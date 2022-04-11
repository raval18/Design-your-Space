<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "furnituregame";

//Variable submitted by user
$loginUser = $_POST["loginUser"];
$loginPass = $_POST["loginPass"];
$loginEmail = $_POST["loginEmail"];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT username FROM user WHERE username = '" . $loginUser ."'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Tell user that name is already taken
    echo "Username already taken";
  
    
} else {
  //Insert the user and password into the database
  $sql2 = "INSERT INTO user (username,email, password, level, coins) VALUES ('" . $loginUser ."','" . $loginEmail ."', '" . $loginPass . "', 1, 1000);";
  if ($conn->query($sql2) === TRUE) {
    echo "User created successfully";
  } else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
  }
}
$conn->close();

?>