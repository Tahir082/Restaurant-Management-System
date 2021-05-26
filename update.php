<!--for addin product into database-->
<?php


                     //connection
                     session_start();
       $connection=mysqli_connect('localhost','root','','restaurants');
       // for uploading image file to add products
    if(isset($_POST['upload_product'])){
        $file = $_FILES['file'];
        $filename=$_FILES['file']['name'];
        $filetmpname=$_FILES['file']['tmp_name'];
        $filesize=$_FILES['file']['size'];
        $fileerror=$_FILES['file']['error'];
        $filetype=$_FILES['file']['type'];


        $fileext=explode('.',$filename);
        $fileactualextension=strtolower(end($fileext));

        $allowed=array('jpg','jpeg','png','pdf');

        if(in_array($fileactualextension,$allowed)){
            if($fileerror==0){
                if($filesize<10000000000){
                    $filenamenew=$_POST['product_name']."."."$fileactualextension";
                    $_SESSEION['filenamenew']=$filenamenew;
                    $filedestination=$filenamenew;
                    move_uploaded_file($filetmpname,$filedestination);
    /*Catching data for  add product*/
    $product_name=mysqli_real_escape_string($connection,$_POST['product_name']);
    $product_price=mysqli_real_escape_string($connection,$_POST['product_price']);


    /*insert query */
    $insert= "insert into products(name, image, price) values('$product_name','$filenamenew','$product_price')";
    if(mysqli_query($connection, $insert)){
                echo "Product Inserted Succesfully";

        }
    else{
            echo "ERROR: Could not able to execute $insert. " . mysqli_error($connection);
                }
     /* end insert query */
                }
                else{
                    echo "big size";
                }
            }
            else{
                "not uploaded because error";
            }

        }
        else{
            echo "you can not upload file of this type";
        }

    }



//Updating a products

if(isset($_POST['update_product'])){

/*Catching data for  update product*/
$product_id=mysqli_real_escape_string($connection,$_POST['product_id']);
$product_price=mysqli_real_escape_string($connection,$_POST['product_price']);


/*insert query */
$query= "update products set id='$product_id', price='$product_price' where id=$product_id";
if(mysqli_query($connection, $query))
{
            echo "Information of the Product has been updated Succesfully";

    }
    else
    {
        echo "Product Update Failed!! Reload or Log in again as admin";
    }

}








//searching a product

    if(isset($_POST['delete_product']))
    {
    $product_id=$_POST['product_id'];
        $query="delete from products where id='$product_id'";
        $result=mysqli_query($connection,$query);
            if($result){
              {
		                          echo "the product has been deleted successfully.<br>";
                            }
                          }
                        }
//Deleting Employee....
          if(isset($_POST['fire']))
          {
              $employee_id=$_POST['id'];
              $query="delete from employee where id='$employee_id'";
              $result=mysqli_query($connection,$query);
              if($result)
              {
                {
                  echo "An employee has been fired....<br>";
                }
              }
          }
//Updating employee
if(isset($_POST['emp_update'])){
/*Catching data from new customer form*/
$emp_name=mysqli_real_escape_string($connection,$_POST['name']);
$emp_contact=mysqli_real_escape_string($connection,$_POST['contact']);
$emp_address=mysqli_real_escape_string($connection,$_POST['address']);
$emp_email=mysqli_real_escape_string($connection,$_POST['email']);
$emp_designation=mysqli_real_escape_string($connection,$_POST['designation']);
$emp_salary=mysqli_real_escape_string($connection,$_POST['salary']);
$query= "update employee set name='$emp_name', address='$emp_address', contact='$emp_contact', designation='$emp_designation', salary='$emp_salary' where email='$emp_email'";
if(mysqli_query($connection, $query))
{
  echo "Informations of the desired Employee have been updated Succesfully!!!";

    }
else{
        echo "ERROR: Could not able to execute $query. " . mysqli_error($connection);
            }

// Close connection
}


?>


<?php
    //for new employee


    /*connecting database*/

  $connection=mysqli_connect('localhost','root','','restaurants');
    if(isset($_POST['add_employee'])){

    /*Catching data from new customer form*/
    $emp_name=mysqli_real_escape_string($connection,$_POST['name']);
    $emp_password=mysqli_real_escape_string($connection,$_POST['password']);
    $emp_contact=mysqli_real_escape_string($connection,$_POST['contact']);
    $emp_address=mysqli_real_escape_string($connection,$_POST['address']);
    $emp_email=mysqli_real_escape_string($connection,$_POST['email']);
    $empjoindate=mysqli_real_escape_string($connection,$_POST['jdate']);
    $emp_designation=mysqli_real_escape_string($connection,$_POST['designation']);
    $emp_dob=mysqli_real_escape_string($connection,$_POST['dob']);
    $emp_bg=mysqli_real_escape_string($connection,$_POST['bloodgroup']);
    $emp_salary=mysqli_real_escape_string($connection,$_POST['salary']);
    $insert= "insert into employee(name,address,contact,bloodgroup,jdate,designation,email,password,dob,salary)
    values('$emp_name','$emp_address','$emp_contact','$emp_bg','$empjoindate','$emp_designation','$emp_email','$emp_password','$emp_dob','$emp_salary')";
    if(mysqli_query($connection, $insert))
    {
      echo "Employee Added Succesfully";

        }
    else{
            echo "ERROR: Could not able to execute $insert. " . mysqli_error($connection);
                }

// Close connection
    }


//end of new customer
 ?>




<html>
    <head>
        <title>Welcome to the Admin page</title>
        <link rel="stylesheet" type="text/css" href="connect.css">
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
     <link rel="stylesheet" href="update.css">
     <link rel="stylesheet" type="text/css" href="connect.css">


     <!-- MAIN CSS -->

        <style>
            body{

            }
            ul li a{
                text-decoration: none;
                color: black;
                padding: 10px;
                margin: 10px;
                margin-top: 20px;
                font-weight: bold;

            }
            ul li {
                float: left;
                margin: 10px;
                list-style: none;
            }
            ul li:hover{
                display: block;
                color: red;
            }
        </style>
    </head>

    <body>
        <center><h2 style="color:black;">Welcome <?php echo $_SESSION['name']; ?></h2></center>
        <br>




        <div>
            <div>
                   <center><ul>

                         <li><a href="#addproduct" class="smoothScroll">Add Product</a></li>
                         <li><a href="#updateproduct" class="smoothScroll">Update Product</a></li>
                         <li><a href="#deleteproduct" class="smoothScroll">Delete Product</a></li>
                         <li><a href="#addemployee" class="smoothScroll">ADD Employee</a></li>
                        <li><a href="#delete_employee" class="smoothScroll">Delete Employee</a></li>
                        <li><a href="#update_employee" class="smoothScroll">Update Employee</a></li>
                        <li><a href="order_management.php" class="smoothScroll">Order Management</a></li>
                        <li><a href="logout.php" class="smoothScroll">Log Out</a></li>

                    </ul>
                </center>

            </div>
    </div>
        <br>
        <br>
        <br>
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <h3> <b>Product Info</b> </h3>
              <?php

                $prod_sql="SELECT * FROM products";
                $prod_res=mysqli_query($connection, $prod_sql);
                if(mysqli_num_rows($prod_res)>0)
                {
                    ?>
                    <table class="table" border="1">
                      <tr>
                        <th>Product ID</th>
                        <th>Name</th>
                        <th>Price</th>
                      </tr>
                    <?php
                    while ($p_ans=mysqli_fetch_array($prod_res)) {
                      echo'<tr>';
                      echo '<td>'.$p_ans['id'].'</td>';
                      echo '<td>'.$p_ans['name'].'</td>';
                      echo '<td>'.$p_ans['price'].'</td>';
                      echo'</tr>';
                  }
                  echo "</table>";
                }
                ?>
            </div>
            <div class="col-md-8">
              <h3> <b>Employee Info</b> </h3>
              <?php

                $emp_sql="SELECT * FROM employee";
                $emp_res=mysqli_query($connection, $emp_sql);
                if(mysqli_num_rows($emp_res)>0)
                {
                    ?>
                    <table class="table" border="1">
                      <tr>
                        <th>Employee ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Contact</th>
                        <th>Date Of Birth</th>
                      </tr>
                    <?php
                    while ($emp_ans=mysqli_fetch_array($emp_res)) {
                      echo'<tr>';
                      echo '<td>'.$emp_ans['id'].'</td>';
                      echo '<td>'.$emp_ans['name'].'</td>';
                      echo '<td>'.$emp_ans['email'].'</td>';
                      echo '<td>'.$emp_ans['address'].'</td>';
                      echo '<td>'.$emp_ans['contact'].'</td>';
                      echo '<td>'.$emp_ans['dob'].'</td>';
                      echo'</tr>';
                  }
                  echo "</table>";
                }
                ?>
            </div>
          </div>
        </div>








                              <!--add product-->
 <section id="">
        <div class="container">
            <div class="row">
                <div id="addproduct" class="overlay">
                    <div class="popup" style="width:600px">
		              <center><h2>Add product</h2></center>
		                  <a class="close" href="">&times;</a>
		                  <div class="content">
                                <!-- multistep form -->
                            <div class="col-lg-3"></div>
                                <div class="col-lg-6">
                                    <form action="update.php" method="post" enctype="multipart/form-data" class="form-group">
                                      <br>
                                        <label for="pname">Product Name</label>
                                        <input type="text" name="product_name" id="pname">
                                        <br>
                                        <label for="pprice">Product Price</label>
                                        <input type="text" name="product_price" id="pprice">
                                        <br>
                                        <br>
                                        <input type="file" name="file">
                                        <br>
                                        <button type="submit" name="upload_product" style="color:black;">Upload</button>

                                    </form>


                         </div>
	               </div>
                </div>
            </div>
        </div>
    </div>
</section>
        <!-- update product-->
    <section >
        <div class="container">
            <div class="row">
                <div id="updateproduct" class="overlay">
                  <?php
                  $prod_id=$_GET['prod_id'];
                  ?>
                    <div class="popup" style="width:600px">
		              <center><h2>Update Product</h2></center>
		                  <a class="close" href="">&times;</a>
		                  <div class="content">
                                <!-- multistep form -->
                            <div class="col-lg-3"></div>
                                <div class="col-lg-6">
                                    <form action="update.php" method="post" enctype="multipart/form-data" class="form-group">

                                        <label for="p_id">Product ID</label>
                                        <input type="number" name="product_id" id="p_id" required>
                                        <br>
                                        <label for="p_price">New Price</label>
                                        <input type="text" name="product_price" id="p_price" required>
                                        <br>
                                        <button type="submit" name="update_product" style="color:black;"> Update</button>

                                    </form>
                                </div>
                      <div class="col-lg-3"></div>
                    </div>
	               </div>
                </div>
            </div>
        </div>
</section>


        <!--Delete product-->


  <section id="">
        <div class="container">
            <div class="row">
                <div id="deleteproduct" class="overlay">
                    <div class="popup" style="width:600px">
		              <center><h2>Delete Product</h2></center>
		                  <a class="close" href="">&times;</a>
		                  <div class="content">
                                <!-- multistep form -->
                            <div class="col-lg-3"></div>
                                <div class="col-lg-6">
                                    <form action="update.php" method="post" enctype="multipart/form-data" class="form-group">

                                        <label for="search_p_id">Product ID</label>
                                        <input type="text" name="product_id" id="search_p_id">


                                        <button type="submit" name="delete_product" style="color:black;">Search</button>

                                    </form>
                                </div>
                            <div class="col-lg-3"></div>
                         </div>
	               </div>
                </div>
            </div>
        </div>
</section>

  <section id="">
    <div class="container">
        <div class="row">
            <div id="addemployee" class="overlay">
              <div class="popup">
                  <div class="container">
                    <center><h2></h2></center>
                    <a class="close" href="">&times;</a>
                      <div class="content">
                            <!-- multistep form -->
                                <div class="col-lg-12">
                                        <form class="form-group" method="POST" action="update.php">
                                        <div class="row">
                                          <div class="col-lg-6">
                                              <label>Name: </label>
                                                <input type="text" name="name" class="form-control"  placeholder="Name">
                                          </div>
                                          <div class="col-lg-6">
                                              <label>Password: </label>
                                                  <input type="password" name="password" class="form-control"  placeholder="Enter a password">
                                          </div>
                                        </div>
                                         </div>
                                                         <br>
                                                          <label>Contact</label>
                                                          <input type="text" name="contact" class="form-control" placeholder="Conatct">
                                                            <br>
                                                         <label>Address</label>
                                                          <input type="text" name="address" class="form-control" placeholder="Enter address">
                                                            <br>
                                                            <label>Join Date</label>
                                                             <input type="date" name="jdate" class="form-control" placeholder="Enter Join date">
                                                               <br>
                                                               <label> Designation </label>
                                                                <input type="text" name="designation" class="form-control" placeholder="Enter Designation">
                                                                  <br>
                                         <div class="row">
                                                            <div class="col-lg-6 col-md-6">
                                                          <label>Email</label>
                                                          <input type="text" name="email" class="form-control" placeholder="Enter email" >
                                                            </div>

                                                            <div class="col-lg-6 col-md-6">
                                                          <label>Date of birth</label>
                                                          <input type="date" name="dob" class="form-control" placeholder="Enter Date of birth">
                                                            </div>

                                                            <div class="col-lg-6 col-md-6">
                                                          <label> Blood Group</label>
                                                          <input type="text" name="bloodgroup" class="form-control" placeholder="Enter Blood Group">
                                                            </div>
                                                            <div class="col-lg-6 col-md-6">
                                                          <label> Salary</label>
                                                          <input type="text" name="salary" class="form-control" placeholder="Enter Employee's Salary">
                                                            </div>


                                      </div>
                                    <br>
                                  <input type="submit" name="add_employee" value="Add Employee" class="btn btn-warning btn-block btn-lg" style="box-shadow: 2px 2px 2px gray;"onclick="warn();">

                            </form>
                      </div>
                  </div>
              </div>
            </div>
        </div>
    </div>
  </section>

  <section id="">
        <div class="container">
            <div class="row">
                <div id="delete_employee" class="overlay">
                    <div class="popup" style="width:600px">
                  <center><h2>Delete Employee</h2></center>
                      <a class="close" href="">&times;</a>
                      <div class="content">
                                <!-- multistep form -->
                            <div class="col-lg-3"></div>
                                <div class="col-lg-6">
                                    <form action="update.php" method="post" enctype="multipart/form-data" class="form-group">

                                        <label for="search_e_id">Employee Email</label>
                                        <input type="number" name="id" id="search_e_id">
                                        <button type="submit" name="fire" style="color:black;">Search</button>

                                    </form>
                                </div>
                            <div class="col-lg-3"></div>
                         </div>
                 </div>
                </div>
            </div>
        </div>
</section>

<section id="">
      <div class="container">
          <div class="row">
              <div id="update_employee" class="overlay">
                  <div class="popup" style="width:600px">
                <center><h2>Update Informations of an Employee</h2></center>
                    <a class="close" href="">&times;</a>
                    <div class="content">
                              <!-- multistep form -->
                          <div class="col-lg-3"></div>
                              <div class="col-lg-6">
                                  <form action="update.php" method="post" enctype="multipart/form-data" class="form-group">

                                    <div>
                                  <label>Employee Email</label>
                                  <input type="text" name="email" class="form-control" placeholder="Enter email" required>
                                    </div>
                                    <label>Name Correction: </label>
                                    <input type="text" name="name" class="form-control"  placeholder="Name" required>
                                     </div>
                                   <br>
                                   <div class="col-lg-6">
                                    <label>New Contact</label>
                                    <input type="text" name="contact" class="form-control" placeholder="Conatct" required>
                                  </div>
                                    <br>
                                    <div class="col-lg-6">
                                   <label>New Address</label>
                                    <input type="text" name="address" class="form-control" placeholder="Enter address" required>
                                  </div>
                                      <br>
                                      <div class="col-lg-6">
                                        <label> New Designation </label>
                                         <input type="text" name="designation" class="form-control" placeholder="Enter Designation" required>
                                      </div>
                                            <br>
                                      <div class="col-lg-6">
                                    <label>New Salary</label>
                                    <input type="text" name="salary" class="form-control" placeholder="Enter Employee's Salary" required>
                                      </div>
                                      <br><br>
                                      <div class="col-lg-6">
                                        <button type="submit" name="emp_update" style="color:black;"> Update </button>
                                      </div>
                                  </form>
                              </div>
                          <div class="col-lg-3"></div>
                       </div>
               </div>
              </div>
          </div>
      </div>
</section>



    </body>

</html>
