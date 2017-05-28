<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>TitoCar - Modify Booking!</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
  <script src="https://use.fontawesome.com/b4880f565c.js"></script>
  <script src="moment.js" type="text/javascript"></script>
  <script src="auth.js" type="text/javascript"></script>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="Style.css">

</head>
<body>

  <?php
  session_start();
  include("navBar.php");
  ?>


  <div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog" id="myModal">

      <!-- Modal content-->
      <div class="modal-content" id="myModalC" >
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" onclick="showButtons()">&times;</button>
          <h4 class="modal-title" style="color: white;">Your Booking status</h4>
        </div>

        <div class="modal-body">
          <div class="container">
            <div class="row">
              <div class="col-md-6">


                Are you sure you want to cancel the booking??
                <br>
                <button id="cancel" type="button" onclick = '' data-dismiss="modal" class="button" style="background-color: green"><span>Cancel</span></button>
                <button id="accept" type="button" onclick = 'deleteBooking()' class="button" style="background-color: red"><span>Yes</span></button>

                <div class="row">

                  <div class="col-md-12">
                    <div class="alert alert-success" id="alert" style="display:none;"  >
                      <strong>Success!</strong> Your booking was deleted!
                    </div>

                    <div class="alert alert-danger" id="s"  style="display:none;"  >
                      <strong>Oh oh!</strong> There was a problem with ur transaction please try again later!
                    </div>
                  </div>
</div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>


  <div id="divider" class="container-fluid">
    <br>
  </div>


  <div id="information" class="container">
    <div class="row">

      <div class="col-md-4 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading panel-heading-custom">
            <h3 class="panel-title">Delete</h3>
          </div>
          <div style="  background-color: Gainsboro ;" class="panel-body">
            <p>
              About This Reservation
              <p>

              </div>
              <div class="panel-body">

                <p id="informationR">
                  <!-- esto se edita para que muestre la informacion con PHP al leerla de la base de datos -->
                  Not found yet.


                  <p>
                    <button id="deleteButton" type="button" data-toggle="modal" data-target="#myModal3" class="button" style="display: none;"><span>Delete!</span></button>
                  </div>
                  <div class="panel-footer">

                  </div>
                </div>
              </div>
              <div class="col-md-4 ">

                <div class="panel panel-default">
                  <div class="panel-heading panel-heading-custom">
                    <h3 class="panel-title">View, Modify, or Cancel a Reservation</h3>
                  </div>
                  <div class="panel-body">
                    <p>
                      Have you reserved a car with TitoCar? Enter your id booking number to view it. Your confirmation number was given to you after your booking registration!!

                      <p>

                        <form class="form" role="form" method="post" action="" accept-charset="UTF-8" id="login-nav">
                          <div class="form-group">
                            <label>ID Booking Number</label>
                            <input type="input" name="id" class="form-control" id="confNumber" placeholder="Confirmation Number" required>
                          </div>
                          <div class="form-group">
                            <button type="button" onclick = 'getInformation()' class="button"><span>Search!</span></button>
                          </div>

                        </form>
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
              <script src="mainJavaScript.js" type="text/javascript"></script>
              <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            </body>
            </html>
