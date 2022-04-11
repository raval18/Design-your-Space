<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "furnituregame";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$coins=  $_POST["coins"];
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
    $coins_updated = $row["coins"] - $coins;
    echo $coins_updated;
    $sql2 = "UPDATE user SET coins= '" . $coins_updated . "' WHERE username = '" . $_SESSION["username"] . "'";
    if ($conn->query($sql2) === TRUE) {
      echo "Coins Updated successfully";
    } else {
      echo "Error: " . $sql2 . "<br>" . $conn->error;
    }
  }
} else {
  echo "0 results";
}
$conn->close();

?>