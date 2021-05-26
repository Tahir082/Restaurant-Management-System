<?php
session_start();
$connection=mysqli_connect('localhost','root','','restaurants');
if(isset($_POST['save_emp'])){
  $emp_id= mysqli_real_escape_string($connection, $_POST['employee']);
  $o_id= mysqli_real_escape_string($connection, $_POST['o_id']);
  $emp_fetch="select * from employee where id='$emp_id'";
  $emp_result=mysqli_query($connection, $emp_fetch);
  $ans_fetch= mysqli_fetch_array($emp_result);
  $emp_name=$ans_fetch['name'];
  $emp_email=$ans_fetch['email'];
  $emp_contact=$ans_fetch['contact'];
  $update="update order_details set emp_id='$emp_id', emp_name='$emp_name', emp_email='$emp_email', emp_contact='$emp_contact' where id='$o_id'";
  $up_query=mysqli_query($connection, $update);
  if($up_query){
    $_SESSION['msg']="Delivery Man assigned successfully";
  }
  else {
    $_SESSION['msg']="Delivery-man assignment not successfully completed";
  }
}
if (isset($_POST['cancel'])) {
  $ord_id=mysqli_real_escape_string($connection, $_POST['del_id']);
  $delete="delete from order_details where id='$ord_id'";
  if(mysqli_query($connection, $delete))
  {
    $_SESSION['msg']="Order Cancelled as per customer request";
  }
  else {
    $_SESSION['msg']="Order cancellation has not been successfully completed";
  }
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>

     <title>Cafe Winterfell</title>
<!--

Eatery Cafe Template

http://www.templatemo.com/tm-515-eatery

-->
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


     <!-- MAIN CSS -->
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
                      <li><a href="update.php" class="smoothScroll"><font color="black">Admin Home</font></a></li>
                      <li><a href="logout.php" class="smoothScroll"><font color="black">Log Out</font></a></li>
                 </ul>
            </div>
       </div>
  </section>
  <br><br>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <?php
                  $query="select * from order_details";
                  $result=mysqli_query($connection,$query);
                  $emp="select * from employee";
                  $emp_res=mysqli_query($connection, $emp);
                      if($result){
                      if(mysqli_num_rows($result)>0){
                                      echo '<table class="table" border="1">
                                          <tr>
                                          <th>
                                              Order ID
                                          </th>
                                              <th>
                                                  Customer Name
                                              </th>
                                              <th>
                                                  Customer Email
                                              </th>
                                              <th>
                                                  Customer Contact
                                              </th>

                                              <th>
                                                  Ordered Items
                                              </th>
                                              <th>
                                                  Bill
                                              </th>
                                              <th>
                                                  Assign Delivery man
                                              </th>
                                              <th>
                                                  Delivery man Contact
                                              </th>
                                              <th>
                                                  Cancel
                                              </th>
                                          </tr>
                                          ';
                        while($ans=mysqli_fetch_array($result)){
                                          echo "<tr>";
                                                      echo "<td>". $ans['id'] ."</td>";
                                                      echo "<td>". $ans['customer_name'] ."</td>";
                                                      echo "<td>". $ans['customer_email'] ."</td>";
                                                      echo "<td>". $ans['customer_contact'] ."</td>";
                                                      echo "<td>". $ans['items'] ."</td>";
                                                      echo "<td>". $ans['amount'] ."</td>";
                                                      if($ans['emp_name']=="")
                                                    {
                                                      echo '<td>';
                                                      ?>
                                                      <form action="" method="post">
                                                        <select name="employee" id="employee">
                                                          <?php
                                                            foreach($emp_res as $row)
                                                            {?>
                                                              <option value="<?php echo $row['id']?>"> <?php echo $row['name'] ?></option>
                                                            <?php
                                                            }
                                                           ?>
                                                           <input type="hidden" name="o_id" value="<?php echo $ans['id']; ?>">
                                                        </select>
                                                        <input type="submit" name="save_emp" class="btn btn-primary" value="Assign">
                                                      </form>
                                                      <?php
                                                      echo '</td>';
                                                      echo'<td>????</td>';
                                                    }

                                                    else {
                                                      echo '<td>'.$ans['emp_name'].'</td>';
                                                      echo '<td>'.$ans['emp_contact'].'</td>';
                                                    }?>
          <?php
                                          echo '<td><form action="" method="post">
                                          <input type="hidden" value="'.$ans['id'].'" name="del_id">
                                          <input type="submit" class="btn btn-danger" value="Cancel" name="cancel">
                                          </form></td>';
                                          echo "</tr>";
                                      }

                                      echo "</table>";
                                      echo $_SESSION['msg'];


              }
          }



          ?>
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
<?php $_SESSION['msg']=""; ?>
