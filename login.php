 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
     <title>Reg</title>
     <?php include 'required/scripts.php'?>
     <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
 </head>
 <body style="background-image: url('https://images.pexels.com/photos/713644/pexels-photo-713644.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940'); background-repeat: no-repeat;background-attachment: fixed;background-size: cover;">
    <div class="container-fluid">
        <div class="w-100 text-center">
            <h2 style="background:#440a67;font-family: vortice-concept,sans-serif;" class="p-4 mx-auto"><a class="text-white text-decoration-none" href="index.php">ePharm</a></h2>
        </div>
        
    </div>
    <div class="container">
    <div class="row mt-5">
            <div class="col-md-7 mx-auto">
                <div class="card my-4" style="border-radius: 1rem;">
                    <div class="card-body mt-3">
                        <h5 class="card-title text-center">LogIn Here</h5>
                        <form action="#" class="form-signin" method="POST">
                        <div class="form-label-group">
                        <label for="inputEmail" class="mt-2">Email address</label>
                        <input type="email" name="email" id="inputEmail" class="form-control mb-2" placeholder="Email address" required autofocus>
                        <label for="inputPassword" class="mt-2">Password</label>
                        <input type="password" name="password1" id="inputPassword" class="form-control" placeholder="Password" required>
                        <button name="lgn_submit" class="btn btn-success btn-block text-uppercase mt-4 mb-2" type="submit">Log In</button>
                        <a href="index.php" style="text-decoration: none; font-size: 17px;font-weight: 600;">Not a member? Register here. . .</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
            <img class="img-fluid" src="images/welcome.png" width="500" alt="">
            </div>
        </div>
        </div>
        
     
 </body>
 </html>

 <?php 
session_start();
include 'required/conn.php';
$email    = "";

if (isset($_POST['lgn_submit'])) {
  $email=mysqli_escape_string($conn,$_POST['email']);
  $password1=mysqli_escape_string($conn,$_POST['password1']);
  $password1=md5($password1);
  $sql="SELECT * FROM users WHERE email='$email'AND password='$password1'";
  $result=mysqli_query($conn,$sql);
  if (mysqli_num_rows($result)==1) {
    $_SESSION['msg']="You're now logged in";
    $_SESSION['email']=$email;
    header("location:home.php");
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
