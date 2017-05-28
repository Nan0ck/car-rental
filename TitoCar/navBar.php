

<nav  id="headBar" class="navbar navbar-default">
  <div class="container">

    <ul class="nav navbar-nav">
      <li>

        <a href="index.php"><img src="img/titoCarLogo.png" class="img"></a>
      </li>

      <li class="dropdown ">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Reservations
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="index.php?focus=1">New Reservation</a></li>
            <li><a href="modify.php">View,Cancel Bookings!</a></li>
          </ul>
        </li>

        <li class="dropdown ">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Cars
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a onclick="carByCountry()" >Search for your Car!</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Locations
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="location.php">Search for a Location!</a></li>
              </ul>
            </li>

          </ul>

          <ul class="nav navbar-nav navbar-right">

            <?php if (!isset($_SESSION["auth"]) || $_SESSION["auth"] == "0") { ?>


              <li id="singUp">
                <a style="color: #FF4500;" href="#" data-toggle="modal" data-target="#myModal" ><span class="glyphicon glyphicon-user"></span> Sign Up</a>
                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content" id="myModalC" >
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style="color: white;">Join TitoCar</h4>
                      </div>
                      <div class="modal-body">
                        <div class="container">
                          <div class="row">
                            <div class="col-md-3">
                              <div class="modal_promo_left">

                                <p>
                                  Being an account holder means you can:
                                </p>
                                <ul class="">

                                  <p><span class="glyphicon glyphicon-hand-right custom"></span> Access exclusive deals and offers</p>

                                  <p><span class="glyphicon glyphicon-hand-right custom"></span> Manage all your bookings in one place</p>

                                  <p><span class="glyphicon glyphicon-hand-right custom"></span> Store payment and driver details for even quicker bookings</p>

                                  <p><span class="glyphicon glyphicon-hand-right custom"></span> Easy Transactions!</p>
                                </ul>
                              </div>

                            </div>

                            <div class="col-md-4" style="width: 225px;">
                              <div class="form">
                                <label style="color:  #f4511e;font-size: 80%;">Sing Up</label>
                                <form class="form" role="form"  accept-charset="UTF-8" >
                                  <div class="form-group">

                                    <input type="email" id="emailR" class="form-control" placeholder="Email address" required>
                                  </div>
                                  <div class="form-group">

                                    <input type="password" id="passR" class="form-control"  placeholder="Password" required>
                                  </div>
                                  <div class="form-group">
                                    <button type="button" class="button" onclick = "singUp()" ><span>Sign Up!</span></button>
                                  </div>

                                  <div>
                                    <label id="errorSingUp" style="color: red;font-size: 80%; display: none ">There is already an account with that email!!</label>
                                    <label id="success" style="color: green;font-size: 80%; display: none ">Your account was created successfully!!</label>
                                    <label id="errorE" style="color: red;font-size: 80%; display: none ">Please, enter an email!!</label>
                                    <label id="errorP" style="color: red;font-size: 80%; display: none ">Please, enter an acceptable password (8 characters)!!</label>
                                  </div>
                                </form>

                              </div>

                            </div>
                          </div>
                        </div>

                      </div>
                      <div class="modal-footer">

                        </div>
                      </div>

                    </div>

                    </div>

                </li>

                <!-- log in menu drop -->
                <li id="singIn" class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a>
                  <ul id="login" class="dropdown-menu">
                    <li>

                      <span style="color: white">Log In </span>
                      <form class="form" role="form" method="post" action="" accept-charset="UTF-8" id="login-nav">
                        <div class="form-group">

                          <input type="email" name="email" class="form-control" id="email" placeholder="Email address" required>
                        </div>
                        <div class="form-group">

                          <input type="password" name="pass" class="form-control" id="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                          <button type="button" onclick = 'logIn()' class="button"><span>Sign in!</span></button>
                        </div>
                        <div>
                          <label id="error" style="color: red;font-size: 80%; display: none ">Nombre o contraseña incorrecta, por favor trate de nuevo</label>
                        </div>
                      </form>

                    </li>
                  </ul>
                </li>


                <?php
              } else {
                ?>
                <!-- log in menu drop -->
                <li id="emailDisplay" class="dropdown" style="display: block";>
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <label id="emailS"><?php echo $_SESSION['email']; ?></label> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="bookings.php"><span class="glyphicon glyphicon-book" aria-hidden="true"></span>Bookings</a></li>
                      <li><a href="logOut.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Log Out</a></li>
                    </ul>
                  </li>

                  <?php
                }
                ?>
              </ul>


          </div>
          </nav>
