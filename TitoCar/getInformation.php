
<?php

session_start();
$id = htmlspecialchars($_POST["id"]);

$servername = "localhost";
$username = "root";
$passwordR = "";


// Create connection
$conn = new mysqli($servername, $username, $passwordR,"titocar");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM booking WHERE  bookingNumber = '$id' AND isDelete = 0";
$result = $conn->query($sql);
$extraTotal = 0;



if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    if($row["insurance"] == 1){
      $extraTotal += 50;
    }
    if($row["gps"] == 1){
      $extraTotal += 30;
    }
    if($row["fullTank"] == 1){
      $extraTotal += 60;
    }
    $_SESSION["id"] = $id;
    echo "Booking Number: " . $row["bookingNumber"];
    echo "<br>";
    echo "Name: " . $row["firstName"] . " " . $row["lastName"];
    echo "<br>";
    echo "ID: " . $row["id"];
    echo "<br>";
    echo "Birthday: ". $row["birthDate"];
    echo "<br>";
    echo "Home Adress: ". $row["homeAddress"];
    echo "<br>";
    echo "Email: " . $row["email"];
    echo "<br>";
    echo "Phone: " . $row["phone"];
    echo "<br>";
    echo "*********************************************************";
    echo "<br>";
    echo "Rental: " . $row["rental"];
    echo "<br>";
    echo "Country: " . $row["country"];
    echo "<br>";
    echo "City: " . $row["city"];
    echo "<br>";
    echo "Pick up Date: " . $row["pickUp"] . ", Time: " .   $row["pickUpTime"];
    echo "<br>";
    echo "Return Date: " . $row["returnDate"] . ", Time: " .   $row["returnTime"];
    echo "<br>";
    echo "*********************************************************";
    echo "<br>";
    echo "Type of Car: " . $row["type"];
    echo "<br>";
    echo "Brand: " . $row["brand"];
    echo "<br>";
    echo "Model: " . $row["model"];
    echo "<br>";
    echo "Full Type: " . $row["fuelType"];
    echo "<br>";
    echo "Year Car: " . $row["yearCar"];
    echo "<br>";
    echo "Insurance: "  ; echo ($row["insurance"] == 0) ? "No" : "Si";
    echo "<br>";
    echo "Gps: " ; echo ($row["gps"] == 0) ? "No" : "Si";
    echo "<br>";
    echo "Full Tank: "  ; echo ($row["fullTank"] == 0) ? "No" : "Si";
    echo "<br>";
    echo "Price: US$" . $row["price"];
    echo "<br>";

    if($row["idAdd"] != NULL){
      echo "*********************************************************";
      echo "<br>";
      echo "Additional Driver: ";
      echo "<br>";
      echo "Name: ". $row["firstNameAdd"] . " " . $row["lastNameAdd"];
      echo "<br>";
      echo "ID: ". $row["idAdd"];
      echo "<br>";
      echo "Home Adress: ". $row["homeAdressAdd"];
      echo "<br>";
      echo "Email: ". $row["emailAdd"];
      echo "<br>";
      echo "Birthday: ". $row["birthDateAdd"];
      echo "<br>";
      echo "Phone: ". $row["phoneAdd"];
      echo "<br>";
    }
    echo "*********************************************************";
    echo "<br>";
    $datetime1 = date_create($row["pickUp"] );
    $datetime2 = date_create($row["returnDate"] );
    $interval = date_diff($datetime1, $datetime2);
    echo "Number of days: ".$interval->format('%a Days');

    echo "<br>";
    echo "<label>Total Days: US$" . (($interval->format('%a')) *  $row["price"]) . "</label>";
    echo "<br>";
    echo "<label>Total Extras: US$" . $extraTotal . "</label>";
    echo "<br>";
    echo "<label style='color:green'>Final Total: US$" . ((($interval->format('%a')) *  $row["price"]) + $extraTotal) . "</label>";

  }

} else {
  echo "-1";
  $conn->close();
}

?>
