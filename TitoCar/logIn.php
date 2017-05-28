
<?php

$email = htmlspecialchars($_POST["email"]);
$password = htmlspecialchars($_POST["pass"]);

$servername = "localhost";
$username = "root";
$passwordR = "";


// Create connection
$conn = new mysqli($servername, $username, $passwordR,"titocar");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT email ,password FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      if ($email == $row["email"] && $password == $row["password"]) {
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION["auth"]= "1";
        echo "1";

        $conn->close();
        exit;
      }
    }

} else {
      echo "0";
      $conn->close();
}

?>
