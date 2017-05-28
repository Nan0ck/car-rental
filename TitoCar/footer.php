<footer id="myFooter">
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <img src="img/logoBig.png" class="img" width="200px">
      </div>
      <div class="col-sm-2">
        <h3 class="customTitle" style="">&nbsp;Get started</h5>
        <ul>
                <?php if (!isset($_SESSION["auth"]) || $_SESSION["auth"] == "0") {
                 ?>
            <li><a style="color: #FF4500;" href="#" data-toggle="modal" data-target="#myModal" ></span>  <span class="glyphicon glyphicon-triangle-right"></span> Sign Up</a></li>
                  <?php   } ?>

          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

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
        </ul>

      </div>
      <div class="col-sm-2">
        <h3 class="customTitle" >&nbsp;About us</h3>
        <ul>
          <li><a href="aboutUs.php">   <span class="glyphicon glyphicon-triangle-right"></span>Company Information</a></li>
        </ul>
      </div>
      <div class="col-sm-2">
        <h3 class="customTitle" >&nbsp;Support</h3>
        <ul>
          <li><a href="faq.php">  <span class="glyphicon glyphicon-triangle-right"></span>FAQ</a></li>
        </ul>
      </div>
      <div class="col-sm-2">
        <div class="social-networks">
          <a href="https://twitter.com/SebastianHidal" class="twitter"><i class="fa fa-twitter"></i></a>
          <a href="https://www.facebook.com/SebastianHidalgoAstorga" class="facebook"><i class="fa fa-facebook"></i></a>
        </div>
        <button type="button" class="button"  data-toggle="modal" data-target="#myModal2"><span>Contact Us!</span></button>


      <!-- Modal -->
      <div class="modal fade" id="myModal2" role="dialog">
        <div class="modal-dialog" id="myModal">

          <!-- Modal content-->
          <div class="modal-content" id="myModalC" >
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" style="color: white;">Contact Us!</h4>
            </div>
            <div class="modal-body">
              <div class="container">
                <div class="row">
                      <div class="form" style="color: #f4511e">
                    <form class="form" role="form" method="post" action="" accept-charset="UTF-8" >
                  <div class="col-md-3">

                        <div class="form-group">
                         <span ><i class="fa fa-user bigicon"></i></span>

                             <input id="fname" name="name" type="text" placeholder="First Name" class="form-control" required>

                     </div>
                     <div class="form-group">
                         <span ><i class="fa fa-user bigicon"></i></span>
                             <input id="lname" name="name" type="text" placeholder="Last Name" class="form-control" required>
                     </div>

                     <div class="form-group">
                         <span ><i class="fa fa-envelope-o bigicon"></i></span>
                             <input id="email" name="email" type="text" placeholder="Email Address" class="form-control" required>
                     </div>
                   </div>

                   <div class="col-md-3">
                     <div class="form-group">
                         <span ><i class="fa fa-phone-square bigicon"></i></span>
                             <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control">
                     </div>

                     <div class="form-group">
                         <span ><i class="fa fa-pencil-square-o bigicon"></i></span>
                             <textarea class="form-control" id="message" name="message" placeholder="Enter your massage for us her!" rows="7" required></textarea>
                     </div>

                     <div class="form-group">
                          <button type="submmi" onclick = '' data-dismiss="modal" class="button"><span>Send!</span></button>
                             </div>


                    </div>

                    </form>


                          </div>

                  </div>
                </div>
              </div>

              <div class="modal-footer">

                </div>

            </div>

            </div>

            </div>

          </div>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <p>© 2017, TitoCar Copyright</p>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-6 hidden-xs hidden-sm col-md-offset-1" style="margin-top: 20px; margin-left: 170px;">
        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" ><img src="img/add.jpg" class="img"></a>

      </div>
    </div>
  </div>
</footer>
