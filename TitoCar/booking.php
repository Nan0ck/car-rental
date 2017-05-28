<?php
session_start();
$firstName = htmlspecialchars($_POST['firstName']);
$lastName = htmlspecialchars($_POST['lastName']);
$phone = htmlspecialchars($_POST['phone']);

$birthDate = htmlspecialchars($_POST['birthDate']);
$id = htmlspecialchars($_POST['id']);

$licenseNumber = htmlspecialchars($_POST['licenceNumber']);
$licenseDate = htmlspecialchars($_POST['licenceDate']);
$homeAdress = htmlspecialchars($_POST['homeAddress']);

if(isset($_SESSION["path"])){
  $path =   $_SESSION["path"];
}else{
  $path = NULL;
}

if (isset($_POST['email'])) {
  $_SESSION["email"] = htmlspecialchars($_POST['email']);
}

if(isset($_POST['returnDate']) && isset($_POST['pickUpDate'])
&& isset($_POST['timePickUp'])  && isset($_POST['timeReturn']) ){

  $returnDate = htmlspecialchars($_POST["returnDate"]);
  $pickUpDate = htmlspecialchars($_POST["pickUpDate"]);
  $timePickUp = htmlspecialchars($_POST["timePickUp"]);
  $timeReturn = htmlspecialchars($_POST["timeReturn"]);
}else{
  $returnDate = $_SESSION["returnDate"];
  $pickUpDate = $_SESSION["pickUpDate"];
  $timePickUp = $_SESSION["timePickUp"];
  $timeReturn = $_SESSION["timeReturn"];
}

$rental = $_SESSION["cars"][$_SESSION["index"]][1];echo "<br>"; // rental
$type =  $_SESSION["cars"][$_SESSION["index"]][2];echo "<br>";// type
$brand =  $_SESSION["cars"][$_SESSION["index"]][3];echo "<br>";// brand
$model =  $_SESSION["cars"][$_SESSION["index"]][4];echo "<br>";// model
$fuelType =  $_SESSION["cars"][$_SESSION["index"]][6];echo "<br>";// fuel
$yearCar =  $_SESSION["cars"][$_SESSION["index"]][7];echo "<br>";// year
$price =  $_SESSION["cars"][$_SESSION["index"]][5];echo "<br>";// price
$email =   $_SESSION["email"];
$country =  $_SESSION["country"];
$city =  $_SESSION["city"];


//datos del additionalDriver *******************************
if(isset($_POST['firstNameAdditional']) && isset($_POST['lastNameAdditional'])){
  $firstNameAdd = htmlspecialchars($_POST["firstNameAdditional"]);
  $lastNameAdd = htmlspecialchars($_POST["lastNameAdditional"]);
  $emailAdd = htmlspecialchars($_POST["emailAdditional"]);
  $phoneAdd = htmlspecialchars($_POST["phoneAdditional"]);
  $licenceNumberAdd = htmlspecialchars($_POST["licenceNumberAdditional"]);
  $licenceDateAdd = htmlspecialchars($_POST["licenceDateAdditional"]);
  $homeAddressAdd = htmlspecialchars($_POST["homeAddressAdditional"]);
  $birthDateAdd = htmlspecialchars($_POST['birthDateAdd']);
  $idAdd = htmlspecialchars($_POST['idAdd']);
}
//datos del additionalDriver ********************************

//extras ********************************
if(isset($_POST["insurance"])){
  $insurance = 1;
} else {
  $insurance = 0;
}
if(isset($_POST["gps"])){
  $gps = 1;
}else {
  $gps = 0;
}
if(isset($_POST["fullTank"])){
  $fullTank = 1;
}else {
  $fullTank = 0;
}
//extras ********************************

$servername = "localhost";
$username = "root";
$password = "";

$today = date("Y-m-d");
// Create connection
$conn = new mysqli($servername, $username, $password,"titocar");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


if(isset($_POST['firstNameAdditional']) && isset($_POST['lastNameAdditional'])){
  $sql = "INSERT INTO `booking` (`bookingNumber`, `firstName`, `lastName`, `phone`, `pickUp`, `returnDate`, `pickUpTime`, `returnTime`, `country`, `rental`, `model`, `brand`, `price`, `email`, `type`,
    `licenseNumber`, `licenseDate`, `homeAddress`, `insurance`, `gps`, `fullTank`, `isDelete`, `today`, `notes`, `firstNameAdd`, `lastNameAdd`, `emailAdd`, `phoneAdd`, `licenceNumberAdd`, `licenceDateAdd`,

    `homeAdressAdd`,  `id`,  `idAdd`,  `birthDate`,  `birthDateAdd`,`fuelType`,`yearCar`,`city`,`signature`) VALUES (NULL, '$firstName', '$lastName', '$phone', '$pickUpDate', '$returnDate', '$timePickUp', '$timeReturn', '$country', '$rental', '$model', '$brand', '$price', '$email',
      '$type', '$licenseNumber', '$licenseDate', '$homeAdress', '$insurance', '$gps', '$fullTank', '0', '$today', NULL, '$firstNameAdd', '$lastNameAdd', '$emailAdd', '$phoneAdd', '$licenceNumberAdd', '$licenceDateAdd', '$homeAddressAdd','$id','$idAdd' , '$birthDate','$birthDateAdd',
      '$fuelType','$yearCar','$city', '$path');";



    }else{
      $sql = "INSERT INTO `booking` (`bookingNumber`, `firstName`, `lastName`, `phone`, `pickUp`, `returnDate`, `pickUpTime`, `returnTime`, `country`, `rental`, `model`, `brand`, `price`, `email`, `type`,
        `licenseNumber`, `licenseDate`, `homeAddress`, `insurance`, `gps`, `fullTank`, `isDelete`, `today`, `notes`, `firstNameAdd`, `lastNameAdd`, `emailAdd`, `phoneAdd`, `licenceNumberAdd`, `licenceDateAdd`,

        `homeAdressAdd`,  `id`,  `idAdd`,  `birthDate`,  `birthDateAdd`,`fuelType`,`yearCar`,`city`,`signature`) VALUES (NULL, '$firstName', '$lastName', '$phone', '$pickUpDate', '$returnDate', '$timePickUp', '$timeReturn', '$country', '$rental', '$model', '$brand', '$price', '$email',
          '$type', '$licenseNumber', '$licenseDate', '$homeAdress', '$insurance', '$gps', '$fullTank', '0', '$today', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL,'$id',NULL , '$birthDate',NULL,'$fuelType','$yearCar','$city', '$path');";


        }

        if ($conn->query($sql) === TRUE) {

          $last_id = $conn->insert_id;

          $datetime1 = date_create($returnDate);
          $datetime2 = date_create($pickUpDate);
          $interval = date_diff($datetime1, $datetime2);

          $todalDays = (($interval->format('%a'))) * $price;

          $extraTotal = 0;
          if($insurance == 1){
            $extraTotal += 50;
          }
          if($gps == 1){
            $extraTotal += 30;
          }
          if($fullTank == 1){
            $extraTotal += 60;
          }

          $finalTotal = $todalDays + $extraTotal;

          ?>

          <!DOCTYPE html>
          <html>
          <head>
            <link rel="stylesheet" href="Style.css">
            <style>

            table {
              font-family: arial, sans-serif;
              border: 1px solid black;
              border-collapse: collapse;
              width: 350px;
            }

            .head {
              text-align: center;
            }

            #printTable {
              font-family: "Courier New", "Courier", "monospace";
            }


            </style>

          </head>
          <body onload = "printSig( '<?php echo $_SESSION["path"]; ?>' ) ">

            <table id="printTable">
              <div id="head">
                <tr>
                  <td class="head" ><strong>TitoCar</strong></td>
                </tr>

                <tr>
                  <td class="head">Costa Rica, Central America</td>
                </tr>

                <tr>
                  <td class="head">Phone Number: +(506)84499333</td>
                </tr>

                <tr>
                  <td class="head">Email: sebastian.hidalgo@ucrso.info</td>
                </tr>
                <tr>
                  <td><br></td>
                </tr>
                <tr>
                  <td class="head">-----------------------------------</td>
                </tr>
                <tr>
                  <td>Date.......:<label class="strong"><?php echo $today ?></label></td>
                </tr>
                <tr>
                  <td>Receipt number..:<label class="strong"><?php echo $last_id ?></label></td>
                </tr>
                <tr>
                  <td class="head">-----------------------------------</td>
                </tr>
                <tr>
                  <td><br></td>
                </tr>
                <tr>
                  <td class="head">** --- Vehicle info --- **</td>
                </tr>
                <tr>
                  <td>Type...: <label class="strong"><?php echo $type ?></label></td>
                </tr>
                <tr>
                  <td>Brand....: <label class="strong"><?php echo $brand ?></label></td>
                </tr>
                <tr>
                  <td>Model....: <label class="strong"><?php echo $model ?></label></td>
                </tr>
                <tr>
                  <td>Fuel Type...: <label class="strong"><?php echo $fuelType ?></label></td>
                </tr>
                <tr>
                  <td>Year.....: <label class="strong"><?php echo $yearCar ?></label></td>
                </tr>
                <tr>
                  <td>Price per day...: <label class="strong"><?php echo $price ?></label></td>
                </tr>


                <tr>
                  <td class="head">** --- Rent info --- **</td>
                </tr>
                <tr>
                  <td>Rental......:<label class="strong"><?php echo $rental ?></label></td>
                </tr>
                <tr>
                  <td>City......:<label class="strong"><?php echo $city ?></label></td>
                </tr>
                <tr>
                  <td>Country......:<label class="strong"><?php echo $country?></label></td>
                </tr>
                <tr>
                  <td> From.........: <label class="strong"><?php echo $pickUpDate ?></label> </td>
                </tr>
                <tr>
                  <td>To...........:<label class="strong"><?php echo $returnDate ?></label> </td>
                </tr>
                <tr>
                  <td>Total days...:<label class="strong"><?php echo $interval->format('%a') ?></label> </td>
                </tr>
                <tr>
                  <td>Fuel Tank...: <label class="strong"><?php echo ($fullTank == 0) ? "No" : "Si" ?></label></td>
                </tr>
                <tr>
                  <td>GPS..........: <label class="strong"><?php echo ($gps == 0) ? "No" : "Si"  ?></label> </td>
                </tr>
                <tr>
                  <td>Insured......:<label class="strong"><?php echo ($insurance == 0) ? "No" : "Si" ?></label></td>
                </tr>


                <tr>
                  <td class="head">** --- Driver info --- **</td>
                </tr>
                <tr>
                  <td>Id Number.....:  <label class="strong"><?php echo $id ?></label></td>
                </tr>
                <tr>
                  <td>First name....: <label class="strong"><?php echo $firstName ?></label></td>
                </tr>
                <tr>
                  <td>Last name.....: <label class="strong"><?php echo $lastName ?></label></td>
                </tr>
                <tr>
                  <td>Birthday......: <label class="strong"><?php echo $birthDate ?></label></td>
                </tr>
                <tr>
                  <td>License Number: <label class="strong"><?php echo $licenseNumber ?></label></td>
                </tr>
                <tr>
                  <td>Expiration....: <label class="strong"><?php echo $licenseDate ?></label></td>
                </tr>
                <tr>
                  <td>Phone number..: <label class="strong"><?php echo $phone ?></label></td>
                </tr>
                <tr>
                  <td>Home address..:  <label class="strong"><?php echo $homeAdress ?></label></td>
                </tr>
                <tr>
                  <td>e-mail........: <label class="strong"><?php echo $email ?></label></td>
                </tr>

                <tr>
                  <td class="head">** --- Additional Driver --- **</td>
                </tr>
                <?php if (isset($_POST['firstNameAdditional']) && isset($_POST['lastNameAdditional'])) {  ?>
                  <tr>
                    <td>Id Number.....: <label class="strong"><?php echo $idAdd ?></label></td>
                  </tr>
                  <tr>
                    <td>First name....: <label class="strong"><?php echo $firstNameAdd ?></label></td>
                  </tr>
                  <tr>
                    <td>Last name.....:  <label class="strong"><?php echo $lastNameAdd ?></label></td>
                  </tr>
                  <tr>

                    <td>Birthday......: <label class="strong"><?php echo $birthDateAdd ?></label></td>
                  </tr>
                  <tr>
                    <td>License Number: <label class="strong"><?php echo $licenceNumberAdd ?></label></td>
                  </tr>
                  <tr>
                    <td>Expiration....: <label class="strong"><?php echo $licenceDateAdd ?></label></td>
                  </tr>
                  <tr>
                    <td>Phone number..: <label class="strong"><?php echo $phoneAdd ?></label></td>
                  </tr>
                  <tr>
                    <td>Home address..: <label class="strong"><?php echo $homeAddressAdd ?></label></td>
                  </tr>
                  <tr>
                    <td>e-mail........: <label class="strong"><?php echo $emailAdd ?></label></td>
                  </tr>
                  <?php  } else { ?>
                    <tr>
                      <td>No Additional Driver</td>
                    </tr>
                    <?php } ?>
                    <tr>
                      <td class="head">** --- Notes --- **</td>
                    </tr>
                    <tr>
                      <td class="head">-----------------------------------</td>
                    </tr>
                    <tr>
                      <td>Total days..:<label class="strong"><label class="strong"><?php echo " US$ " . $todalDays ?></label></td>
                    </tr>
                    <tr>
                      <td>Total extras..:<label class="strong"><label class="strong"><?php echo " US$ " .  $extraTotal ?></label></td>
                    </tr>
                    <tr>
                      <td>Final price..:<label class="strong"><label class="strong"><?php echo " US$ " . $finalTotal ?></label></td>
                    </tr>
                    <tr>
                      <td>Signature...:<label class="strong"></label></td>
                      <!--  Signature -->

                    </tr>
                    <tr>
                      <td>
                        <div class="signature">
                          <label>Signature:  </label>
                          <iframe  src=signature.svg> </iframe>
                          <!--  Signature -->
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="head">-----------------------------------</td>
                    </tr>
                    <tr>
                      <td class="head">Thank you for choosing us!!!</td>
                    </tr>


                  </div>


                </table>

              </body>
              </html>

              <script>
              //signature
              var svg = document.getElementsByTagName('iframe')[0].contentWindow;

              function printSig(e) {
                svg.printSignature(e);
              }

              </script>

              <?php


              $conn->close();
              $_SESSION["path"] = NULL;
              exit;
            } else {
              header('Location: index.php?id=-1');
              $_SESSION["path"] = NULL;
              $conn->close();
            }
            ?>
