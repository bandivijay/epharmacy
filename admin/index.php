


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php include '../required/scripts.php' ?>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <title>SSPS | Admin Area</title>
    <link rel="stylesheet" href="index.css">

<body>
    <h3 class="text-center mt-4">Admin Portal</h3>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first mt-3">
      <img src="https://image.flaticon.com/icons/png/128/1794/1794707.png" id="icon" width="150" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form method="post" action="#">
      <input type="text" id="login" name="email" class="fadeIn second" placeholder="login">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
      <input type="submit" name="admin_submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">All rights reserved |By ePharm.org</a>
    </div>

  </div>
</div>


</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="htpps://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</html>

<?php 
session_start();
include '../required/conn.php';
$email    = "";

if (isset($_POST['admin_submit'])) {
  $email=mysqli_escape_string($conn,$_POST['email']);
  $password=mysqli_escape_string($conn,$_POST['password']);
  $sql="SELECT * FROM admin WHERE email='$email'AND password='$password'";
  $result=mysqli_query($conn,$sql);
  if (mysqli_num_rows($result)==1) {
    $_SESSION['password']=$password;
    header("location:admin.php");
  }else{
    ?>
    <script>
    Swal.fire({
      title: 'Email and password does not match!!',
      text: '',
      icon: 'error',
      confirmButtonText: 'Dismiss'
    })
    </script>
    <?php
  }
}
 ?>