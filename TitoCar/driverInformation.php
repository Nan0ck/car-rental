<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>TitoCar - Driver Information!</title>

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

<?php
if(isset($_SESSION["returnDate"])) {
  ?>

  <body>

    <?php
  } else{
    ?>

    <body onload="changeDate()">

      <?php
    }
    session_start();
    include("navBar.php");
    if(isset($_POST['carIndex'])) {
      $_SESSION["index"] = htmlspecialchars($_POST['carIndex']);


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
              <h3 class="panel-title">Car Information</h3>
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
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><label class="rental"><?php echo $_SESSION["cars"][$_SESSION["index"]][1]; ?></label></td>
                      <td><img src="<?php echo $_SESSION["cars"][$_SESSION["index"]][0]; ?>" width="150" height="100"></td>
                      <td><label class="country"><?php echo $_SESSION["cars"][$_SESSION["index"]][2]; ?></label></td>
                      <td><label class="country"><?php echo $_SESSION["cars"][$_SESSION["index"]][3]; ?></label></td>
                      <td><label class="country"><?php echo $_SESSION["cars"][$_SESSION["index"]][4]; ?></label></td>
                      <td><label class="country"><?php echo $_SESSION["cars"][$_SESSION["index"]][6]; ?></label></td>
                      <td><label class="country"><?php echo $_SESSION["cars"][$_SESSION["index"]][7]; ?></label></td>
                      <td><label class="cost">US$<?php echo $_SESSION["cars"][$_SESSION["index"]][5];?></label></td>
                    </tr>

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

    <div id="information" class="container">
      <div class="row">

        <div class="col-md-4 col-md-offset-2">

          <div class="panel panel-default">
            <div class="panel-heading panel-heading-custom">
              <h3 class="panel-title">Location, Dates And Total</h3>
            </div>
            <div class="panel-body">
              <form class="form" method="post" id="formComplete" action="booking.php" role="form"  accept-charset="UTF-8" > <!--    form dinamico   *************************************************************************************** -->
                <?php
                if(isset($_SESSION["returnDate"])) {
                  ?>
                  <div >
                    <label>Country: <?php echo $_SESSION["country"]; ?> </label> <br>
                  </div>
                  <div >
                    <label>City: <?php echo $_SESSION["city"]; ?> </label> <br>
                  </div>

                  <div  style= "border-top: solid #ff0000; padding-top: 5px;" >
                    <label>Pick Up Date: <?php echo $_SESSION["pickUpDate"]; ?> </label> <br>
                    <label>Time: <?php echo $_SESSION["timePickUp"]; ?> </label> <br>
                  </div>
                  <div style= "border-top: solid #ff0000; padding-top: 5px;" >

                    <label>Return Date: <?php echo $_SESSION["returnDate"]; ?> </label> <br>
                    <label>Time: <?php echo $_SESSION["timeReturn"]; ?> </label> <br>
                  </div>
                  <div style= "border-top: solid #ff0000; padding-top: 5px; font-size: 25px;" >

                    <?php

                    $datetime1 = date_create($_SESSION["pickUpDate"]);
                    $datetime2 = date_create($_SESSION["returnDate"]);
                    $interval = date_diff($datetime1, $datetime2);
                    echo "<label>".$interval->format('%a Days')."</label><br>";
                    ?>

                    <label style="color: green;">Total: US$
                      <?php
                      $_SESSION["total"] = $interval->format('%a Days') *  $_SESSION["cars"][$_SESSION["index"]][5];
                      echo $_SESSION["total"];

                      ?>
                    </label>
                  </div>
                  <?php

                } else {
                  ?>

                  <div >
                    <label>Country: <?php echo $_SESSION["country"]; ?> </label> <br>
                  </div>
                  <div >
                    <label>City: <?php echo $_SESSION["city"]; ?> </label> <br>
                  </div>


                  <div  style= "border-top: solid #ff0000; padding-top: 5px;" >


                    <label>Pick Up Date: </label><br>

                    <input type="date" name="pickUpDate" onblur="calculateDaysPrice(<?php echo $_SESSION["cars"][$_SESSION["index"]][5] ?>);changeReturnDate();" id="pickUpDate" style="width:140px;" required>

                    <select name="timePickUp" id="timePick" required>
                      <option value="00:30">12:30 am</option>
                      <option value="01:00">01:00 am</option>
                      <option value="01:30">01:30 am</option>
                      <option value="02:00">02:00 am</option>
                      <option value="02:30">02:30 am</option>
                      <option value="03:00">03:00 am</option>
                      <option value="03:30">03:30 am</option>
                      <option value="04:00">04:00 am</option>
                      <option value="04:30">04:30 am</option>
                      <option value="05:00">05:00 am</option>
                      <option value="05:30">05:30 am</option>
                      <option value="06:00">06:00 am</option>
                      <option value="06:30">06:30 am</option>
                      <option value="07:00">07:00 am</option>
                      <option value="07:30">07:30 am</option>
                      <option value="08:00">08:00 am</option>
                      <option value="08:30">08:30 am</option>
                      <option value="09:00">09:00 am</option>
                      <option value="09:30">09:30 am</option>
                      <option value="10:00">10:00 am</option>
                      <option value="10:30">10:30 am</option>
                      <option value="11:00">11:00 am</option>
                      <option value="11:30">11:30 am</option>
                      <option selected="selected" value="12:00">Noon</option>
                      <option value="12:30">12:30 pm</option>
                      <option value="13:00">01:00 pm</option>
                      <option value="13:30">01:30 pm</option>
                      <option value="14:00">02:00 pm</option>
                      <option value="14:30">02:30 pm</option>
                      <option value="15:00">03:00 pm</option>
                      <option value="15:30">03:30 pm</option>
                      <option value="16:00">04:00 pm</option>
                      <option value="16:30">04:30 pm</option>
                      <option value="17:00">05:00 pm</option>
                      <option value="17:30">05:30 pm</option>
                      <option value="18:00">06:00 pm</option>
                      <option value="18:30">06:30 pm</option>
                      <option value="19:00">07:00 pm</option>
                      <option value="19:30">07:30 pm</option>
                      <option value="20:00">08:00 pm</option>
                      <option value="20:30">08:30 pm</option>
                      <option value="21:00">09:00 pm</option>
                      <option value="21:30">09:30 pm</option>
                      <option value="22:00">10:00 pm</option>
                      <option value="22:30">10:30 pm</option>
                      <option value="23:00">11:00 pm</option>
                      <option value="23:30">11:30 pm</option>
                    </select>

                  </div>
                  <br>

                  <div  style= "border-top: solid #ff0000; padding-top: 5px;" >

                    <label>Return Date: </label><br>

                    <input type="date" id="returnDate" name="returnDate" onblur="calculateDaysPrice(<?php echo $_SESSION["cars"][$_SESSION["index"]][5] ?>)" style="width:140px;" required>
                    <select name="timeReturn" id="time" contenteditable="false">
                      <option value="00:30">12:30 am</option>
                      <option value="01:00">01:00 am</option>
                      <option value="01:30">01:30 am</option>
                      <option value="02:00">02:00 am</option>
                      <option value="02:30">02:30 am</option>
                      <option value="03:00">03:00 am</option>
                      <option value="03:30">03:30 am</option>
                      <option value="04:00">04:00 am</option>
                      <option value="04:30">04:30 am</option>
                      <option value="05:00">05:00 am</option>
                      <option value="05:30">05:30 am</option>
                      <option value="06:00">06:00 am</option>
                      <option value="06:30">06:30 am</option>
                      <option value="07:00">07:00 am</option>
                      <option value="07:30">07:30 am</option>
                      <option value="08:00">08:00 am</option>
                      <option value="08:30">08:30 am</option>
                      <option value="09:00">09:00 am</option>
                      <option value="09:30">09:30 am</option>
                      <option value="10:00">10:00 am</option>
                      <option value="10:30">10:30 am</option>
                      <option value="11:00">11:00 am</option>
                      <option value="11:30">11:30 am</option>
                      <option selected="selected" value="12:00">Noon</option>
                      <option value="12:30">12:30 pm</option>
                      <option value="13:00">01:00 pm</option>
                      <option value="13:30">01:30 pm</option>
                      <option value="14:00">02:00 pm</option>
                      <option value="14:30">02:30 pm</option>
                      <option value="15:00">03:00 pm</option>
                      <option value="15:30">03:30 pm</option>
                      <option value="16:00">04:00 pm</option>
                      <option value="16:30">04:30 pm</option>
                      <option value="17:00">05:00 pm</option>
                      <option value="17:30">05:30 pm</option>
                      <option value="18:00">06:00 pm</option>
                      <option value="18:30">06:30 pm</option>
                      <option value="19:00">07:00 pm</option>
                      <option value="19:30">07:30 pm</option>
                      <option value="20:00">08:00 pm</option>
                      <option value="20:30">08:30 pm</option>
                      <option value="21:00">09:00 pm</option>
                      <option value="21:30">09:30 pm</option>
                      <option value="22:00">10:00 pm</option>
                      <option value="22:30">10:30 pm</option>
                      <option value="23:00">11:00 pm</option>
                      <option value="23:30">11:30 pm</option>
                    </select>
                  </div>
                  <br>
                  <div style= "border-top: solid #ff0000; padding-top: 5px; font-size: 25px;" >

                    <label id="days">_ Days</label><br>

                    <label id="total" style="color: green;">Total: 0.00 US$

                    </label>
                  </div>
                  <?php    }

                  ?>

                </div>
                <div class="panel-footer">

                </div>
              </div>

            </div>
            <!--  extras **************************************************************** -->
            <div class="col-md-4 ">

              <div class="panel panel-default">
                <div class="panel-heading panel-heading-custom">
                  <h3 class="panel-title">Extras!</h3>
                </div>
                <div class="panel-body">


                  <div class="form-group">
                    <label>Insurance:  </label>
                    <input  type="checkbox" id = "insurance" name="insurance" onclick="addInsurance(1)">
                  </div>
                  <div class="form-group">
                    <label>Gps:  </label>
                    <input  type="checkbox" id = "gps" name="gps" onclick="addInsurance(2)">
                  </div>
                  <div class="form-group">
                    <label>Full Tank:  </label>
                    <input  type="checkbox" id = "fullTank" name="fullTank" onclick="addInsurance(3)">
                  </div>
                  <div style="color:green; font-size: 25px" >
                    <label> Total extras:   </label>  <label id="totalExtras" >0</label> <label> US$</label>
                  </div>



                </div>
                <div class="panel-footer">

                </div>
              </div>


            </div>

            <!--  extras **************************************************************** -->
          </div>

          <div class="row">

            <div class="col-md-4 col-md-offset-2 ">

              <div class="panel panel-default">
                <div class="panel-heading panel-heading-custom">
                  <h3 class="panel-title">Driver Information</h3>
                </div>
                <div class="panel-body">


                  <div class="form-group">
                    <label>First Name:  </label> <br>
                    <input type="input" name="firstName" class="form-control" placeholder="First Name" required>
                  </div>
                  <div class="form-group">
                    <label>Last Name:  </label> <br>
                    <input type="input"   name="lastName" class="form-control" placeholder="Last Name" required>
                  </div>

                  <div class="form-group">
                    <label>Birthday:  </label> <br>
                    <input type="date" name="birthDate" onblur="" id="birthDate" style="width:140px;" required>
                  </div>

                  <div class="form-group">
                    <label>ID:  </label> <br>
                    <input type="number"   name="id" class="form-control" placeholder="ID.." required>
                  </div>

                  <?php
                  if (!isset($_SESSION["auth"]) || $_SESSION["auth"] == "0") {
                    ?>

                    <div class="form-group">
                      <label>Email:  </label> <br>
                      <input type="email"  name="email" class="form-control" placeholder="Email address" required>
                    </div>

                    <?php  } else {   ?>

                      <label>Email:  <?php echo $_SESSION["email"]; ?> </label> <br>

                      <?php      }
                      ?>


                      <div class="form-group">
                        <label>Phone:  </label> <br>
                        <input type="number"  name="phone" class="form-control" placeholder="Phone" required>
                      </div>

                      <div class="form-group">
                        <label>Licence Number:  </label> <br>
                        <input type="number"  name="licenceNumber" class="form-control" placeholder="Licence Number" required>
                      </div>

                      <div class="form-group">
                        <label>Licence Exp:  </label> <br>
                        <input type="date" name="licenceDate" onblur="" id="licenceDate" style="width:140px;" required>
                      </div>

                      <div class="form-group">
                        <label>Home address:  </label> <br>
                        <input type="input"  name="homeAddress" class="form-control" placeholder="Home address" required>
                      </div>

                      <div class="form-group">
                        <label>Aditional Driver:  </label>
                        <input  type="checkbox" id = "aditional" name="aditionalDriver" onclick="addDriverEvent()">
                      </div>

                      <!--  Signature -->
                      <label>Signature:  </label>
                      <iframe src=signature.svg></iframe>
                      <a onclick=savePathServer()>Save signature</a>
                      <a onclick=clearSignature()>Clear signature</a>

                      <!--  Signature -->


                      <button class="button" type="submit" style="vertical-align:middle"><span>Book Now!</span></button>
                      <!-- *************************************************************************************** -->

                    </div>



                    <div class="panel-footer">

                    </div>
                  </div>

                </div>

                <!-- ajax additionalDriver *********************************************************************** -->
                <div id="additionalDriver">

                </div>
                <!-- ajax additionalDriver *********************************************************************** -->

                <!-- Fin del Form dinamico *******************  ************  ********  ****************  ************** **********************-->

              </div>
            </form>

          </div>

          <?php include("footer.php"); ?>

          <script>
          //signature
          var svg = document.getElementsByTagName('iframe')[0].contentWindow;

          function clearSignature() {
            svg.clearSignature();
            deleteSignature();
          }

          //signature

          </script>
          <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        </body>

        </html>
