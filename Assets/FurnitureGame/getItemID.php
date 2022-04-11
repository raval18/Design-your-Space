<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "furnituregame";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//User Submitted variable
$userID = $_POST["userID"];

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully". "<br>";

$sql = "SELECT itemID FROM usersitems WHERE userID ='" . $userID ."'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  $rows = array();
  while($row = $result->fetch_assoc()) {
    $rows[] = $row;
}
    echo json_encode($rows);
} else {
  echo "0 results";
}
$conn->close();

?>