
<?php
	//for product adding
	session_start();
	$connection=mysqli_connect('localhost','root','','restaurants');
//for submit a item into data base
if(isset($_POST['add_to_cart']))
{
	$cust_id=$_SESSION['id'];
	$cust_email=$_SESSION['email'];
	$cust_name=$_SESSION['name'];
	$prod_id=mysqli_real_escape_string($connection,$_POST['prod_id']);
	$prod_name=mysqli_real_escape_string($connection,$_POST['name']);
	$prod_price=mysqli_real_escape_string($connection,$_POST['price']);
	$quantity=mysqli_real_escape_string($connection,$_POST['quantity']);
	$total_price= (int)$quantity*(int)$prod_price;
	if((int)$quantity>0)
	{
		$ins_to_sc="insert into shopping_cart(customer_id, customer_email, customer_name, product_id, product_name, price, quantity, total) values('$cust_id','$cust_email','$cust_name','$prod_id','$prod_name','$prod_price','$quantity','$total_price')";
		$ins_result=mysqli_query($connection, $ins_to_sc);
		if($ins_result)
		{
			$_SESSION['msg']="Added Succesfully";
		}
		else {
			$_SESSION['msg']="not added!";
		}
	}
	else {
		$_SESSION['msg']='QUANTITY must not be zero or negative';
	}
}

if(isset($_POST['delete_from_cart']))
{
	$customer_id= $_SESSION['id'];
	$customer_email= $_SESSION['email'];
	$prod_id=mysqli_real_escape_string($connection,$_POST['prod_id']);
	$delete="delete from shopping_cart where product_id='$prod_id' and customer_id='$customer_id' and customer_email='$customer_email'";
	$del_res=mysqli_query($connection, $delete);
	if($del_res)
	{
		$_SESSION['msg']="Item removed";
	}
	else {
		$_SESSION['msg']="Item removal unsuccess!";
	}
}

//pre_r($_SESSION);
//session_destroy();
//product adding end
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="connect.css">

             <link rel="stylesheet" href="css/bootstrap.min.css">
             <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/animate.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">
     <link rel="stylesheet" href="css/magnific-popup.css">


     <!-- MAIN CSS -->


     <!-- MAIN CSS -->

    </head>
    <body>

        <div class="split left">

                <div class="container">
                    <div class="col-lg-9">

			<?php
					$connect=mysqli_connect('localhost','root','','restaurants');
					$query="select * from products order by id asc";
					$result=mysqli_query($connect,$query);
					if($result){
						if(mysqli_num_rows($result)>0){
							while($product=mysqli_fetch_assoc($result)){
								?>
										<div class=" col-sm-4 col-md-3">
											<form method="post" action="">
												<div class="products">
													<img class="img-responsive" src="<?php echo $product['image'];?>" />
													<h4 style="color:white;" class="text-info"><center><?php echo $product['name']?></center></h4>
													<h4><center>BDT<?php echo " ".$product['price']?></center></h4>
													<input type="number" name="quantity" class="form-control" value="0">
													<input type="hidden" name="prod_id" value="<?php echo $product['id'];?>">
													<input type="hidden" name="name" value="<?php echo $product['name'];?>">
													<input type="hidden" name="price" value="<?php echo $product['price'];?>">
													<center><input type="submit" name="add_to_cart" class="btn btn-info" value="ORDER" style="margin-top:3px;"></center>
												</div>
											</form>
										</div>
								<?php
						}
					}
				}
			?>
    </div>
        </div>
            </div>



        <!--Split right-->
            <div class="split right">
                <div class="col-lg-12">
									<?php echo '<p><b>'.$_SESSION['msg'].'</b></p>';?>
									<div class="collapse navbar-collapse">
								 <ul class="nav navbar-nav navbar-nav-first">
									 <li><a href="user_homepage.php" class="smoothScroll">Home</a></li>
										 <li><a href="logout.php" class="smoothScroll">Log Out</a></li>
								 </ul>
								 </div>
                    <div class="table-responsive">
                        <form method="post" action="shoppingcart.php">
				<table class="table" border="1">
            <center><h3>ORDER</h3></center>
					<tr>
						<th>Name</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Total</th>
						<th>Remove</th>
					</tr>
					<?php
					$customer_id=$_SESSION['id'];
					$customer_email=$_SESSION['email'];
					$fetch="select * from shopping_cart where customer_id='$customer_id' and customer_email='$customer_email'";
					$result=mysqli_query($connection, $fetch);
					$grand_total=0;
					$amount=0;
					if(mysqli_num_rows($result)>0)
					{
						while($details=mysqli_fetch_array($result)){
							echo '<tr>';
							echo '<td>'.$details['product_name'].'</td>';
							echo '<td>'.$details['quantity'].'</td>';
							echo '<td>BDT '.$details['price'].'</td>';
							echo '<td>BDT '.$details['total'].'</td>';
							echo '<td><form action="" method="post">
							<input type="hidden" name="prod_id" value="'.$details['product_id'].'">
							<input type="submit" name="delete_from_cart" value="Remove" class="btn btn-danger">
							</form></td>';
							echo '</tr>';
							$amount=$amount+(int)$details['total'];
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

					<h5> <b>Billed:</b> BDT <?php echo $amount;?> </h5>
					<?php if($grand_total<$amount){
						echo'<h5> <b>Billed after discount:</b> BDT '.$grand_total.'</h5>';
					} ?>

					<th></th>
					<th></th>
					<th></th>
					<th>Grand Total: BDT <?php echo $amount;?></th>
					<th></th>
					<a href="proceed_order.php" class="btn btn-info">Proceed</a>
					<br><br>
				</table>
        </div>
    </div>
 </div>
</body>
</html>
<?php $_SESSION['msg']="";?>
