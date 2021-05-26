
<html>
    <head>
        <title>Register</title>
        <link rel="stylesheet" type="text/css" href="register.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/owl.theme.default.min.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/templatemo-style.css">
    </head>
    <body>
      <style media="screen">
      .card{
        border: 3px solid #000;
        height: auto;
        width: auto;
        padding: 30px 30px 30px 30px
      }
      </style>
        <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
             <div class="container">
                                                  <div class="navbar-header">
                                                       <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                                            <span class="icon icon-bar"></span>
                                                            <span class="icon icon-bar"></span>
                                                            <span class="icon icon-bar"></span>
                                                       </button>

                                                       <!-- lOGO TEXT HERE -->
                                                       <a href="index.php" class="navbar-brand" style="color:#000">Cafe Winterfell</a>
                                                  </div>
             </div>
        </section>
        <section>
          <div class="container">
              <div class="row">
                  <div class="popup1">
                    <div class="card">
                        <h2>User Sign Up</h2><hr>
                              <!-- multistep form -->
                          <form class="form-group" method="POST" action="user_reg_process.php">
                                  <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                      <label>Name: </label>
                                      <input type="text" name="name" class="form-control"  placeholder="Your Full Name">
                                    </div>
                                  </div>
                                  <br>
                                  <label>Contact</label>
                                  <input type="text" name="contact" class="form-control" placeholder="Conatct Number">
                                  <br>
                                  <label>Address</label>
                                  <input type="text" name="address" class="form-control" placeholder="Enter address">
                                  <br>
                                  <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                      <label>Email</label>
                                      <input type="email" name="email" class="form-control" placeholder="Enter email" >
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <label>Date of birth</label>
                                        <input type="date" name="dob" class="form-control" placeholder="Enter Date of birth">
                                    </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                      <div class="col-lg-6 col-md-6">
                                          <label>Password</label>
                                          <input type="password" name="password" class="form-control" placeholder="Enter password">
                                      </div>
                                      <div class="col-lg-6 col-md-6">
                                          <label>Confirm Password</label>
                                          <input type="password" name="c_password" class="form-control" placeholder="Enter password">
                                      </div>
                                  </div>
                                <br>
                              <input type="submit" name="submit" value="Register Now" class="btn btn-warning btn-block btn-lg" style="box-shadow: 2px 2px 2px gray;"onclick="warn();">
                          </form>
                          <br>
                    </div>
  	               </div>
                </div>
              </div>
        </section>
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.stellar.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/smoothscroll.js"></script>
        <script src="js/custom.js"></script>
</body>
</html>
