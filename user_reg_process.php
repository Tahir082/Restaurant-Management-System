<?php
  $connection=mysqli_connect('localhost','root','','restaurants');
    if(isset($_POST['submit'])){

    /*Catching data from new customer form*/
    $name=mysqli_real_escape_string($connection,$_POST['name']);
    $contact=mysqli_real_escape_string($connection,$_POST['contact']);
    $address=mysqli_real_escape_string($connection,$_POST['address']);
    $email=mysqli_real_escape_string($connection,$_POST['email']);
    $dob=mysqli_real_escape_string($connection,$_POST['dob']);
    $password=mysqli_real_escape_string($connection,$_POST['password']);
    $confirm_password=mysqli_real_escape_string($connection,$_POST['c_password']);
    $sql="select * from customer where email='$email'";
    $res=mysqli_query($connection,$sql);
    $count=mysqli_num_rows($res);
    if($count>=1){
      echo 'User exists with same email! <b><a href="user_reg.php">Try Again </a></b>';
    }
    else {
      if($password==$confirm_password)
      {
        $insert= "insert into customer(email, name, contact, address, dob, password) values('$email','$name','$contact','$address','$dob','$password')";
         $result=mysqli_query($connection, $insert);
         if($result)
         {
           session_start();
           $_SESSION['reg_msg']="USER REGISTRATION SUCCESSFUL! NOW LOG IN USING CREDENTIALS!";
           header('Location: user_login.php');
         }
      }
      else{
          echo 'Password and Confirm Password do not match!  <b><a href="user_reg.php">Try Again </a></b>';
      }
    }
  }
 ?>
