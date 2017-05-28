<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>TitoCar - Main</title>

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

<?php
  session_start();
if(!isset($_GET['focus']) || $_GET['focus'] == "0" ){   ?>
    <body onload="changeDate();">

    <?php   } else {
            //session existe y se  inicio login
            if((isset($_SESSION["auth"]) && $_SESSION["auth"] == "1")) { ?>

                    <body onload="changeDate();focusF();">

            <?php   } else {     //session existe pero no se inicio login ?>

                      <body onload="changeDate();focusF2();">

        <?php } } ?>

        <div id="overlay" style="position: fixed; top: 0; left: 0;background: rgba(0, 0, 0, 0.9); display: none; z-index: 999; width: 100%; height: 100%;" onclick="focusF()"></div>

        <?php
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

        <?php if (isset($_GET["id"])) { ?>


          <div class="modal fade" id="myModal3" role="dialog">
            <div class="modal-dialog" id="myModal">

              <!-- Modal content-->
              <div class="modal-content" id="myModalC" >
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title" style="color: white;">Your Booking status</h4>
                </div>

                <div class="modal-body">
                  <div class="container">
                    <div class="row">

                      <?php
                      $id = htmlspecialchars($_GET['id']);
                        if ($id == -1) {  ?>

                          <label> OH oh.. There was a problem with ur booking, please try again later! Sorry! </label><br>

                        <?php     } else {   ?>

                          <label> Your booking was a success! </label><br>

                          <label> The ID of ur booking is : <span style="color: green; font-size: 25px;"> <?php echo $id ?></span></label> <br>
                          <label style="color: red;"> TAKE NOTE OF YOUR ID!<label>


                    <?php } ?>
                    </div>

                        </div>

                      </div>
                    </div>
                  </div>
                </div>



        <?php  } ?>





                  <div id="divider" class="container-fluid">
                    <br>
                  </div>
                  <!-- xs (phones), sm (tablets), md (desktops), and lg (larger desktops). -->
                  <div id="imageDiv" class="container-fluid">
                    <div class="row">
                      <div  id="pDiv" class=" hidden-xs col-sm-5 col-lg-offset-2 ">
                        <h1><span style="color: white;">Car Hire – Search, Compare & Save</span>
                          <span style="color: #FF4500;">Compare all the companies. Best price guaranteed</span></h1>
                        </div>

                        <div id="formReserv" class="col-xs-12 col-sm-3 col-md-3 col-lg-2 col-sm-offset-1">
                          <h2 class="whiteLabel">Start Here!</h2>
                          <!-- Principal Form -->
                          <form class="formReservClass" method="post" action="rentalByLocation.php">
                            <div class="form-group">
                              <label class="whiteLabel">Pick-up:</label> <select name="country" class = "form-control">
                                <?php
                                while($row = $result->fetch_assoc()) {
                                  ?>
                                    <option value="<?php echo $row["name"];?>"> <?php echo $row["name"]; ?> </option>
                                  <?php
                                    }
                                    $conn->close();
                                 ?>

                              </select><br>
                              <input type="date" name="pickUpDate"
                               id="pickUpDate" style="width:140px;" onblur="changeReturnDate()" required>

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
                      <!--
                            <div class="form-group">
                              <label class="whiteLabel">Return: </label> <input id="returnDiferentLocation"
                              type="checkbox" name="returnDiferentLocation" onclick="showInput()"><label class="whiteLabel"
                              style="font-size: small;">
                              Return to diferent location </label>
                              <br>
                              <input type="hidden" id="returnLocation" placeholder="Enter Location">
                            </div>
                        -->
                            <div class="form-group">
                              <label class="whiteLabel">Return: </label><br>

                             <input type="date" id="returnDate" name="returnDate"
                             style="width:140px;" required>

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

                          <button class="button" type="submit" style="vertical-align:middle"><span>Search!</span></button>
                          </form>
                          <!-- Principal Form -->
                        </div>
                      </div>
                  </div>

                  <?php include("footer.php"); ?>

                    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


                    <?php if (isset($_GET["id"])) { ?>


                      <script type="text/javascript">
                      $(window).load(function(){
                        $('#myModal3').modal('show');
                      });

                                <?php } ?>




                    </script>
                    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
                  </body>
                  </html>
