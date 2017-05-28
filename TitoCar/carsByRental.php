<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="Style.css">
  <title>TitoCar - Cars</title>

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

  if (isset($_GET['rental'])) {

    $servername = "localhost";
    $username = "root";
    $passwordR = "";

    $rental = htmlspecialchars($_GET['rental']);
    $city = htmlspecialchars($_GET['city']);
    $_SESSION["rental"] = $_GET['rental'];
    $_SESSION["city"] = $city;

    $conn = new mysqli($servername, $username, $passwordR,"titocar");
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $sql = "CALL getCarsByRental('" . $_SESSION["rental"] . "')";
    $result = $conn->query($sql);

  }

  ?>


  <div id="divider" class="container-fluid">
    <br>
  </div>


  <div id="information" class="container">
    <div class="row">

      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading panel-heading-custom" >
            <h3 class="panel-title">Find a Rental Car</h3>
          </div>
          <div class="panel-body">
            <p>
              At TitoCar, it’s easy to find a rental car that suits
              your budget and your style. TitoCar offers a large selection of
              high-quality rental vehicles designed to make getting to your
              destination comfortable and fun. All vehicles in our fleet are
              non-smoking, and each year we add more and more fuel-efficient vehicles,
              which means even more savings for you. In the United States,  TitoCar
              offers a wide variety of great rental cars, like the Nissan Altima;
              Dodge Avenger and Caravan; the Chevrolet Traverse and Suburban LS;
              the Ford Focus, Escape and Mustang convertible; the Buick Lacrosse
              and the Jeep® Grand Cherokee. No matter what kind of vehicle fits your needs,
              TitoCar has just what you’re looking for at a great rate, backed by excellent service.
            </p>
          </div>
          <div class="panel-footer">

          </div>
        </div>

        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <img src="img/jimmySuzuki.jpg" >
            </div>

            <div class="item">
              <img src="img/coroyaToyota.jpg" >
            </div>

            <div class="item">
              <img src="img/jeep.jpg" >
            </div>

            <div class="item">
              <img src="img/minivan.jpg" >
            </div>
          </div>

          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      <!-- CarsPanelList esta mierda tiene que ser dinamica :V -->
      <div class="col-md-8 ">
        <div class="panel panel-default">
          <div class="panel-heading panel-heading-custom" >
            <h3 class="panel-title">Cars</h3>
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Rental</th>
                    <th>Image</th>
                    <th>Car Type</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Fuel Type</th>
                    <th>Year </th>
                    <th>Price Per Day</th>
                    <th>Select</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  $_SESSION["cars"] = array();
                  $counter = 0;
                  while($row = $result->fetch_assoc()) {
                    array_push($_SESSION["cars"],array($row["image"],$_SESSION["rental"],$row["type"],$row["brand"],$row["model"],$row["priceDay"], $row["fuelType"], $row["yearCar"]));
                    ?>
                    <form class="" action="driverInformation.php" method="post">

                      <tr>
                        <td><label class="rental"><?php echo $_SESSION["rental"]; ?></label></td>
                        <td><img src="<?php echo $row["image"]; ?>" width="150" height="100"></td>
                        <td><label class="country"><?php echo $row["type"]; ?></label></td>
                        <td><label class="country"><?php echo $row["brand"]; ?></label></td>
                        <td><label class="country"><?php echo $row["model"]; ?></label></td>
                        <td><label class="country"><?php echo $row["fuelType"]; ?></label></td>
                        <td><label class="country"><?php echo $row["yearCar"]; ?></label></td>
                        <td><label class="cost">US$<?php echo $row["priceDay"]; ?></label></td>
                        <td><button type="submit" name="carIndex" value="<?php echo $counter; ?>" class="button" style="font-size: 20px; width: 50px; height: 50px;"  onclick=""><span>Go!</span></button></td>
                      </tr>

                    </form>

                    <?php
                    $counter++;
                  }

                  $conn->close();
                  ?>

                </tbody>
              </table>
            </div>
          </div>
          <div class="panel-footer">

          </div>
        </div>
      </div>




    </div>



  </div>
</div>
</div>

<?php include("footer.php"); ?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
</body>
</html>
