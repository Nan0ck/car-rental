<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>TitoCar - Bookings!</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
  <script src="https://use.fontawesome.com/b4880f565c.js"></script>
  <script src="mainJavaScript.js" type="text/javascript"></script>
  <script src="moment.js" type="text/javascript"></script>
  <script src="auth.js" type="text/javascript"></script>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="Style.css">

</head>
<body>


  <?php
  session_start();
  include("navBar.php");

  $servername = "localhost";
  $username = "root";
  $passwordR = "";

  $email = $_SESSION["email"];


  $conn = new mysqli($servername, $username, $passwordR,"titocar");
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM booking
  WHERE email = '$email' AND isDelete = 0";

  $result = $conn->query($sql);

  ?>

  <div id="divider" class="container-fluid">
    <br>
  </div>

  <?php

  if ($result->num_rows > 0) {

    ?>

    <div class="container">
      <div class="row">
        <div class="col-md-9 col-md-offset-1">



          <?php  while($row = $result->fetch_assoc()) {   ?>

            <div class="panel panel-default">
              <div class="panel-heading panel-heading-custom">
                <h3 class="panel-title">Booking</h3>
              </div>
              <div class="panel-body" style="font-size: 15px;">
                <?php
                $extraTotal = 0;
                if($row["insurance"] == 1){
                  $extraTotal += 50;
                }
                if($row["gps"] == 1){
                  $extraTotal += 30;
                }
                if($row["fullTank"] == 1){
                  $extraTotal += 60;
                }

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
                ?>



              </div>
              <div class="panel-footer" style="">

              </div>
            </div>

    <?php        }   ?>

        </div>

      </div>
    </div>

    <?php

  } else  {

    ?>

    <div class="container" style="background-color: Snow ; color: #FF4500;">
      <div class="row">
        <div class="col-md-2 col-md-offset-1">
          <h1>Bookings</h1>
        </div>

      </div>

      <div id="bookings" class="row">

        <div  id="imageDiv2" class="col-md-7 col-md-offset-1">

          <div id="pDiv2" class="col-md-12" >


            <p style=" margin-left: 65px; color: black; ">You don't have any upcoming trips. Would you like to search for a car now?</p>


            <button type="button" class="button2" onclick="window.location.href='index.php?focus=1'"><span>Search for Rental Cars!</span></button>


          </div>
        </div>
      </div>
    </div>
    <?php
  }

  ?>

  <!-- Principal Form -->



  <?php include("footer.php"); ?>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
</body>
</html>
