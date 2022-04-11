<?php
session_start();
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
$sql = "SELECT password, id FROM user WHERE username = '" . $loginUser ."'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    if($row["password"] == $loginPass){
      $_SESSION["username"] = $loginUser;
      $_SESSION["id"] = $row["id"];
        echo $row["id"];

        //Get UserData

        // Get Player Info

        // Get Inventory

        // Modify Player data
        
        //Update Inventory
    }else{
        echo("Please check your credentials");
        session_destroy();
    }
  }
} else {
  echo "Username does not exist";
  session_destroy();
}
$conn->close();

?>