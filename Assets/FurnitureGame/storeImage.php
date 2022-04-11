<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "furnituregame";

//Variable submitted by user
$myImage = $_POST["myImage"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


  $sql2 = "INSERT INTO vote (img,userid,votecount) VALUES ('" . $_SESSION["id"] . "',0,'" . $myImage ."');";
  if ($conn->query($sql2) === TRUE) {
    echo $_SESSION["id"];
    echo "Voted successfully";
  } else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
  }
// }
$conn->close();

?>