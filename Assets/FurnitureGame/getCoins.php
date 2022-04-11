<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "furnituregame";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT coins,username FROM user WHERE username = '" . $_SESSION["username"] . "'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    // echo "username: " . $row["username"]. " Coins: " . $row["coins"]. "<br>";
    echo $row["coins"] . "C";
  }
} else {
  echo "0 results";
}
$conn->close();

?>