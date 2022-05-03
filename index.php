<?php 
include 'required/conn.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head> 
    <title>Reg</title>
    <?php include 'required/scripts.php'?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>
<body style="background:#ff005c">
    <div class="container-fluid bg-dark">
        <div class="w-100 text-center">
            <h2 style="background:#440a67;font-family: vortice-concept,sans-serif;" class="p-4 mx-auto"><a class="text-white text-decoration-none" href="index.php">ePharm</a></h2>
      </div>
    </div>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6 mb-2">
            <img class="img-fluid" src="images/login-img.png" width="500" alt="">
            </div>
            <div class="col-md-6 mb-4">
            <div class="card" style="border-radius: 1rem;">
          <div class="card-body mt-2">
            <h5 class="card-title text-center">Register Here</h5>
            <form action="#" class="form-signin" method="POST">
              <div class="form-label-group">
                <label class="mt-2">Email address</label>
                <input type="email" name="email" class="form-control mb-2" placeholder="Email address" required autofocus>
                <label class="mt-2">Username</label>
                <input type="text" name="name" class="form-control mb-2" placeholder="Username" required>
                <label class="mt-2">Password</label>
                <input type="password" name="password1" class="form-control" placeholder="Password" required>
                <label for="inputPassword" class="mt-2">Confirm Password</label>
                <input type="password" name="password2" id="inputPassword" class="form-control" placeholder="Confirm Password" required>
                <button name="submit" class="btn btn-primary btn-block text-uppercase mt-4 mb-2" type="submit">Register</button>
                <a href="login.php"style="text-decoration: none; font-size: 17px; font-weight: 600;">Already a member? Login here</a>
              </div>
            </form>
          </div>
        </div>
            </div>
        </div>
    </div>

      
    
</body>
</html>
<?php

$email    = "";

if (isset($_POST['submit'])) {
  $email=mysqli_real_escape_string($conn,$_POST['email']);
  $name=mysqli_real_escape_string($conn,$_POST['name']);
  $password1=mysqli_real_escape_string($conn,$_POST['password1']);
  $password2=mysqli_real_escape_string($conn,$_POST['password2']);


  if ($password1!=$password2) 
    {
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
  else{
    $check_query="SELECT * FROM users WHERE email='$email'";
    $result=mysqli_query($conn,$check_query);
    $user=mysqli_fetch_assoc($result);
    if ($user) {
       if ($user['email']===$email) {
         ?>
         <script>
        Swal.fire({
        title: 'This email already exists',
        text: '',
        icon: 'warning',
        confirmButtonText: 'Dismiss'
      })
      </script>
         <?php
        } 
    }else{
       $password1=md5($password1);
       $sql="INSERT INTO users(email,name,password) VALUES('$email','$name','$password1')";
       mysqli_query($conn,$sql);
       ?>
       <script>
        Swal.fire({
        title: 'Registered succesfully',
        text: 'Now Please Log In',
        icon: 'info',
        confirmButtonText: `Log in`,
        denyButtonText: `Cancel`,})
        .then((result) => {
          if (result.isConfirmed) {
            location.replace("login.php");
          } else if (result.isDenied) {
            location.replace("index.php");
          }
      })
      </script>
      <?php
      }
  }
}
 ?>
