<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>User Sign In</title>
     <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="register.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
  </head>
  <body>
    <style media="">
      .card{
        border: 3px solid #000;
        height: 450px;
        width: auto;
        padding: 30px 30px 30px 30px;
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

              <!-- MENU LINKS -->
         </div>
    </section>
    <section>
      <div class="container">
      <div class="row">
              <div class="popup1">
                  <div class="card">
                    <div class="content">
                      <h2>User Log In</h2><hr>
                          <!-- multistep form -->
                              <div class="col-lg-12">
                                      <form class="form-group" method="POST" action="">
                                      <div class="row">
                                          <div class="col-lg-6 col-md-6">
                                              <label>Email: </label>
                                              <input type="email" name="email" class="form-control" placeholder="Enter Email">
                                          </div>
                                       </div>
                                       <br>
                                       <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                              <label>Password</label>
                                              <input type="password" name="password" class="form-control" placeholder="Enter password">
                                            </div>
                                        </div>
                                      <br>
                                    <input type="submit" name="submit" value="Log In" class="btn btn-warning" style="box-shadow: 2px 2px 2px gray;">
                                </form>

                                      <?php
                                          $connection=mysqli_connect('localhost','root','','restaurants');
                                        
                                          if(isset($_POST['submit']))
                                          {
                                              $email=mysqli_real_escape_string($connection,$_POST['email']);
                                              $password=mysqli_real_escape_string($connection,$_POST['password']);
                                              $query="select * from customer where email='$email' and password='$password'";
                                              $result=mysqli_query($connection,$query);
                                              $count=mysqli_num_rows($result);
                                              $ans=mysqli_fetch_array($result);
                                              if($count>=1){
                                                session_start();
                                                $_SESSION['id']=$ans['id'];
                                                $_SESSION['email']=$ans['email'];
                                                $_SESSION['name']=$ans['name'];
                                                $_SESSION['msg']="";
                                                $_SESSION['contact']=$ans['contact'];
                                                $_SESSION['address']=$ans['address'];
                                                header('Location: user_homepage.php');
                                              }
                                              else{
                                                echo 'Wrong Email or Password!';
                                              }
                                          }
                                      ?>

                          </div>
                    </div>
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
