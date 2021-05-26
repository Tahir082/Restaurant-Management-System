<?php
session_start();
$connection=mysqli_connect('localhost','root','','restaurants');

if(isset($_POST['confirm']))
{
  $itemset=mysqli_real_escape_string($connection, $_POST['items']);
  (int)$gt=mysqli_real_escape_string($connection, $_POST['gt']);
  $cust_id=$_SESSION['id'];
  $cust_email=$_SESSION['email'];
  $cust_name=$_SESSION['name'];
  $cust_contact=$_SESSION['contact'];
  $address=$_SESSION['address'];
  $insert="insert into order_details(customer_id, customer_email, customer_name, customer_contact, customer_address,items, amount) values('$cust_id','$cust_email','$cust_name','$cust_contact','$address','$itemset', '$gt')";
  $result_insert=mysqli_query($connection,$insert);
  if($result_insert)
  {
    $del_sc="delete from shopping_cart where customer_id='$cust_id' and customer_email='$cust_email'";
    $del_res=mysqli_query($connection, $del_sc);
    $_SESSION['msg']="ORDER CONFIRMED!!!";
    header('Location: user_homepage.php');
  }
  else{
    $_SESSION['msg']="There was a problem placing the order!";
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
  <body><br><br>
    <div class="container">
      <div class="collapse navbar-collapse">
     <ul class="nav navbar-nav navbar-right">
       <li><a href="user_homepage.php" class="smoothScroll">Home</a></li>
         <li><a href="logout.php" class="smoothScroll">Log Out</a></li>
     </ul>
     </div>
    </div>

    <div class="container">
      <div class="row">
        <h2> <b>Hope, you will enjoy our dishes! </b> </h2>
      </div>
    </div>
    <br><br>
    <div class="container">
      <div class="row">
        <table class="table" border="1">
            <center><h3>Order Details</h3></center>
					<tr>
						<th>Name</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>subtotal</th>
					</tr>
					<?php
					$customer_id=$_SESSION['id'];
					$customer_email=$_SESSION['email'];
					$fetch="select * from shopping_cart where customer_id='$customer_id' and customer_email='$customer_email'";
					$result=mysqli_query($connection, $fetch);
					$grand_total=0;
					$amount=0;
          $items='';
					if(mysqli_num_rows($result)>0)
					{
						while($details=mysqli_fetch_array($result)){
							echo '<tr>';
							echo '<td>'.$details['product_name'].'</td>';
							echo '<td>'.$details['quantity'].'</td>';
							echo '<td>BDT '.$details['price'].'</td>';
							echo '<td>BDT '.$details['total'].'</td>';
							echo '</tr>';
							$amount=$amount+(int)$details['total'];
              $items.=$details['product_name'].'('.$details['quantity'].'), ';
						}
						if($amount>=1000)
						{
							$discount=$amount*0.10;
							$grand_total= $amount-$discount;
							echo'Congratulations! 10% Discount applied!';
						}
            else {
              $grand_total=$amount;
            }
					}
					?>
					<th></th>
					<th></th>
					<th></th>
					<th>Grand Total: BDT <?php echo $amount;?></th>
					<br><br>
				</table>
        <h5> <b>Billed: </b> BDT <?php echo $amount;?> </h5>
        <?php
          if($grand_total<$amount)
          {
            echo '<h5> <b>Billed after discount:</b> BDT '.$grand_total.' </h5>';
          }
         ?>

        <form action="" method="post">
          <input type="hidden" name="items" value="<?php echo $items;?>">
          <input type="hidden" name="gt" value="<?php echo $grand_total;?>">
          <input type="submit" name="confirm" value="Confirm" class="btn btn-primary"> &nbsp; &nbsp;
          <a href="shoppingcart.php" class="btn btn-success">Add or remove items</a>
        </form>

      </div>
    </div>
  </body>
</html>
