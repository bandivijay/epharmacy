<?php 
session_start(); 
include 'required/conn.php';
if (!isset($_SESSION['email'])) {
  header('location:index.php');
}
 ?>

<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth;">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title> ePharm | Home area</title>
  <?php include 'required/scripts.php' ?>
  <style type="text/css">
    header {
      width: 100%;
      height: 90vh;
      background:linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.3)),url("https://wallpapercave.com/dwp1x/wp1813060.png?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940") no-repeat;
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
      background-attachment: scroll;
}
  </style>

  
</head>
<body>
  <header>
      <nav>
        <div class="menu-icon">
          <i class="fa fa-bars fa-2x"></i>
        </div>
        <a href="home.php" class="logo">ePharm</a>
        <div class="menu">
          <ul>
            <li><a href="home.php" class="active">Home</a></li>
            <li><a href="shopping.php">Shopping</a></li>
            <li><a href="diagnosis.php" >Diagnosis</a></li>
            <li><a href="mycart.php">My Cart</a></li>
            <li><a href="myorders.php">My Orders</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </nav>
      <h1 class="overlay-text ml-1 text-center animated zoomIn">Welcome</h1>
      <?php 
      $email=$_SESSION['email'];
      $sql="SELECT * from users WHERE email='$email'";
      $query=mysqli_query($conn,$sql);
      $fetch_name=mysqli_fetch_assoc($query);	
      if($fetch_name['type']== 0){
        ?>
        <h1 class="overlay-text ml-1 text-center animated zoomIn"><?php echo $fetch_name['name'] ?></h1>
        <?php
      }else{
        ?>
        <h1 class="overlay-text ml-1 text-center animated zoomIn"><?php echo $fetch_name['name'] ?> ℗</h1>
        <?php
      }
      ?>
      
      
    </header>
    <!-- Latest products -->
        
    <section>
    <div>
        <P>Finding difficulty in searching products?
        <a href='search.php'> <button >Search</button> </a>
    </p>
        <div class="mt-5 mb-5">
            <div class="container-fluid">
                <div class="row card-columns" data-aos="fade-right">
                    <div class="col-lg-4">
                        <div class="card shadow-lg text-center">
                            <h4 class="mt-1">Free shipping</h4>
                            <p class="m-2">As our member enjoy fast, FREE delivery on over 100 million items. Also, gain early access to deals and exclusive brands.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card shadow-lg text-center">
                            <h4 class="mt-1">100% Money back </h4>
                            <p class="m-2">A satisfaction gesture, is essentially if a buyer is not satisfied with a product or service, a refund will be made.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card shadow-lg text-center">
                            <h4 class="mt-1"> support 24/7</h4>
                            <p class="m-2">Our support is one of the best in the leading generation.We Provide quality services.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
  <!-- Footer Section Begin -->
  <?php include 'required/footer.php' ?>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
  AOS.init({
    duration:1200
  });
  </script>
  <!-- Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="htpps://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="main.js"></script>
</body>
</html>
