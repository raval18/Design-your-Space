<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "furnituregame";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$itemID = $_POST["itemID"];
$path = "http://localhost/furnituregame/images/" . $itemID . ".jpg";

//Get model and convert into string
$model = file_get_contents($path);

echo $model;


$conn->close();

?>