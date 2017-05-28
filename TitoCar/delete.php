
<?php

session_start();
$id = $_SESSION["id"];

$servername = "localhost";
$username = "root";
$passwordR = "";


// Create connection
$conn = new mysqli($servername, $username, $passwordR,"titocar");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE booking
SET isDelete = 1
WHERE bookingNumber = '$id'";



if ($conn->query($sql) === TRUE) {
    echo 1;
      $conn->close();
} else {
  echo "-1";
  $conn->close();
}


?>
