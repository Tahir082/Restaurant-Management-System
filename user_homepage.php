<?php
session_start();
$connection=mysqli_connect('localhost','root','','restaurants');
if(isset($_POST['cancel_order']))
{
  $order_id= mysqli_real_escape_string($connection, $_POST['o_id']);
  $del_order= "delete from order_details where id='$order_id'";
  if(mysqli_query($connection, $del_order))
  {
    $_SESSION['msg']="Order has been cancelled as requested!";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Cafe Winterfell</title>
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
                                                   <a href="" class="navbar-brand" style="color:#000">Cafe Winterfell</a>

                                              </div>

              <!-- MENU LINKS -->
              <div class="collapse navbar-collapse">
                   <ul class="nav navbar-nav navbar-nav-first">
                        <li><a href="" class="smoothScroll"><font color="black">Home</font></a></li>
                        <li><a href="logout.php" class="smoothScroll"><font color="black">Log Out</font></a></li>
                   </ul>
              </div>

         </div>
    </section>
    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <br><br><br>
            <h4>Hello!</h4>
            <h1> <b><?php echo $_SESSION['name']?></b> </h1>
            <h5>Click the button below to see our tasty and yummy dishes!</h5>
            <a href="shoppingcart.php" class="btn btn-success">See items</a>
          </div>
          <div class="col-md-6">
            <table class="table" border="1">
                <center><h3>My Orders</h3><hr></center>
    					<tr>
    						<th>Items</th>
    						<th>Grand Total</th>
    						<th>Delivery-man Name</th>
    						<th>Contact</th>
                <th>Cancel Order</th>
    					</tr>
    					<?php
    					$customer_id=$_SESSION['id'];
    					$customer_email=$_SESSION['email'];
    					$fetch="select * from order_details where customer_id='$customer_id' and customer_email='$customer_email'";
    					$result=mysqli_query($connection, $fetch);
    					if(mysqli_num_rows($result)>0)
    					{
    						while($details=mysqli_fetch_array($result)){
    							echo '<tr>';
    							echo '<td>'.$details['items'].'</td>';
    							echo '<td>'.$details['amount'].'</td>';
    							echo '<td> '.$details['emp_name'].'</td>';
    							echo '<td> '.$details['emp_contact'].'</td>';
                  echo '<td><form action="" method="post">
                  <input type="hidden" name="o_id" value="'.$details['id'].'">
                  <input type="submit" name="cancel_order" value="cancel" class="btn btn-danger"></form> </td>';
    							echo '</tr>';
    						}
    					}
    					?>
    				</table>
            <h6> <b><?php echo $_SESSION['msg']; $_SESSION['msg']="";?></b> </h6>
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
