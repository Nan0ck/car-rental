<?php

$email = htmlspecialchars($_POST["email"]);
$passwordC = htmlspecialchars($_POST["pass"]);

$servername = "localhost";
$username = "root";
$password = "";


// Create connection
$conn = new mysqli($servername, $username, $password,"titocar");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO user (email, password)
VALUES ('$email','$passwordC')";

if ($conn->query($sql) === TRUE) {
    echo "1";
} else {
    echo "0";
}

$conn->close();

 ?>
