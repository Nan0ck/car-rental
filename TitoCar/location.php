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

    $conn = new mysqli($servername, $username, $passwordR,"titocar");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT name FROM country";
    $result = $conn->query($sql);

  ?>

          <div id="divider" class="container-fluid">
            <br>
          </div>


          <div id="information" class="container">
            <div class="row">

              <div class="col-md-8 col-md-offset-2">

              <div class="panel panel-default">
                <div class="panel-heading panel-heading-custom">
                  <h3 class="panel-title">Find TitoCar Rental Locations</h3>
                </div>
                <div class="panel-body">
                    <div class="col-md-3">
                      <p>
                        See all Rentals in:
                      <p>

                        <form class="form" role="form" method="POST" action="rentalByLocation.php" accept-charset="UTF-8" id="login-nav">

                          <select name="country" class = "form-control">
                            <?php
                            while($row = $result->fetch_assoc()) {
                              ?>
                                <option value="<?php echo $row["name"];?>"> <?php echo $row["name"]; ?> </option>
                              <?php
                                }
                                $conn->close();
                             ?>

                          </select>
                          <div class="form-group">
                            <button type="submit"  class="button" style="width: 130px;"><span>Go!</span></button>
                          </div>

                        </form>
                    </div>

                        <div class="col-md-3" style="width: 250px;
                        height:250px; ">
                            <p id="bloc"> </p>
                            <div style="width: 500px;
                            height: 190px; "id="map">

                            </div>
                        </div>


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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPMmN59OXzvbkehgE2TugJYj7vzWncdXU&callback=getCordenates"
      async defer></script>
    </html>
