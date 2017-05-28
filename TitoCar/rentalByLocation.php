<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>TitoCar - Search By Location!</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
  <script src="https://use.fontawesome.com/b4880f565c.js"></script>
  <script src="mainJavaScript.js" type="text/javascript"></script>
  <script src="moment.js" type="text/javascript"></script>
  <script src="auth.js" type="text/javascript"></script>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="Style.css">
  <!-- mapa google -->

</head>
<body>

  <?php
  session_start();
  include("navBar.php");

  $servername = "localhost";
  $username = "root";
  $passwordR = "";

  if(isset($_POST['returnDate']) && isset($_POST['pickUpDate'])
  && isset($_POST['timePickUp'])  && isset($_POST['timeReturn']) ){
    $_SESSION["returnDate"] = htmlspecialchars($_POST["returnDate"]);
    $_SESSION["pickUpDate"] = htmlspecialchars($_POST["pickUpDate"]);
    $_SESSION["timePickUp"] = htmlspecialchars($_POST["timePickUp"]);
    $_SESSION["timeReturn"] = htmlspecialchars($_POST["timeReturn"]);
  }else{
    // necesario para limpiar la session de datos previamente guardados pero no necesarios acontinuacion
    $_SESSION["returnDate"] = null;
    $_SESSION["pickUpDate"] = null;
    $_SESSION["timePickUp"] = null;
    $_SESSION["timeReturn"] = null;
  }

  if (isset($_POST['country'])) {
    $country = htmlspecialchars($_POST["country"]);
    $_SESSION["country"] = $country;

    $conn = new mysqli($servername, $username, $passwordR,"titocar");
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $sql = "CALL getRental('" . $_SESSION["country"] . "')";
    $result = $conn->query($sql);
  } else {

    $conn = new mysqli($servername, $username, $passwordR,"titocar");
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $sql = "CALL getRental('" . $_SESSION["country"] . "')";
    $result = $conn->query($sql);
  }

  ?>

  <div id="divider" class="container-fluid">
    <br>
  </div>


  <div id="information" class="container">
    <div class="row">

      <div class="col-md-8 col-md-offset-2">

        <div class="panel panel-default">
          <div class="panel-heading panel-heading-custom">
            <h3 class="panel-title">Rental Locations in <?php $country ?></h3>
          </div>
          <div class="panel-body">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Rental</th>
                  <th>Country</th>
                  <th>City</th>
                  <th>Select</th>
                </tr>
              </thead>
              <tbody>

                <?php
                while($row = $result->fetch_assoc()) {
                  ?>
                  <tr>
                    <td><label class="rental" value><?php echo $row["rental"]; ?></label></td>
                    <td><label class="country"><?php echo $row["country"]; ?></label></td>
                    <td><label class="country"><?php echo $row["city"]; ?></label></td>
                    <td><button type="button"  class="button" style="font-size: 20px; width: 130px; height: 50px;" onclick="searchForCars('<?php echo $row["rental"]; ?>','<?php echo $row["city"]; ?>')"><span>Go!</span></button></td>
                  </tr>
                  <?php
                }
                $conn->close();
                ?>


                <tr>
                </tr>


              </tbody>
            </table>

          </div>
          <div class="panel-footer">

          </div>
        </div>

      </div>
    </div>

    <!-- Principal Form -->

  </div>


  <?php include("footer.php"); ?>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
</body>

</html>
