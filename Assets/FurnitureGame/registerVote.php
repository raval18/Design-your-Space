<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "furnituregame";

//Variable submitted by user
$voteID = $_POST["voteID"];



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


  $sql2 = "INSERT INTO uservote (userid,voteid) VALUES ('" . $_SESSION["id"] . "','" . $voteID ."');";
  if ($conn->query($sql2) === TRUE) {
    echo $_SESSION["id"];
    echo "Voted successfully";
  } else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
  }
// }
$conn->close();

?>