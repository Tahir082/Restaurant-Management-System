<?php
    session_start();
    $connection=mysqli_connect('localhost','root','','restaurants');
    if(isset($_POST['submit']))
    {
        $email=mysqli_real_escape_string($connection,$_POST['email']);
        $adminpassword=mysqli_real_escape_string($connection,$_POST['password']);
        $query="select * from admin where email='$email' and password='$adminpassword'";
        $result=mysqli_query($connection,$query);
        $ans=mysqli_fetch_array($result);
          if($result)
          {
						  if(mysqli_num_rows($result)>=1)
              {
                $_SESSION['name']=$ans['name'];
                $_SESSION['email']=$ans['email'];
                $_SESSION['msg']="";
                header('Location: update.php');
              }
          }
    }
mysqli_close($connection);
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin Login</title>
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
    	<div id="content">
                <?php
                    if(!isset($_POST['submit'])){
                ?>

                  <h2> <b>Admin Log In</b> </h2>
                <form class="form-group" method="POST" action="">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <label>Email </label>
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
                    }
                ?>

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
