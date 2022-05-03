<?php
session_start();
include 'required/conn.php';
if (!isset($_SESSION['email'])) {
    header('location:index.php');
  }
$email=$_SESSION['email'];

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="description" content="A Brand New Ecommerce website">
  <meta name="keywords" content="Shop,phone,deals,fashion">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php include 'required/scripts.php' ?>
  <title>ePharm | My Orders</title>

  <style>
    header {
      width: 100%;
      height: 50vh;
      background: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.3)),url(https://images.pexels.com/photos/4246119/pexels-photo-4246119.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940) no-repeat 45% 55%;
      background-size: cover;
    }
    nav.black ul {
      background: linear-gradient(to right, #3494E6, #EC6EAD);
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
            <li><a href="home.php">Home</a></li>
            <li><a href="shopping.php">Shopping</a></li>
            <li><a href="diagnosis.php" >Diagnosis</a></li>
            <li><a href="mycart.php">My Cart</a></li>
            <li><a href="myorders.php" class="active">My Orders</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </nav>
      <h1 class="overlay-text ml-1 text-center animated zoomIn">Keep track of you orders</h1>
    </header>
    <div class="content">
    <div class="container-fluid">
    <table class="table table-responsive-sm table-dark table-hover table-bordered">
      <tr class="bg-primary text-center text-white">
          <td>Order ID</td>
          <td>Transaction ID</td>
          <td>Product Name</td>
          <td>Product Price</td>
          <td>Quantity</td>
          <td>Total Price</td>
          <td>Ordered time</td>
          <td>Order Status</td>
        </tr>
    <?php
        $select="SELECT * FROM orders WHERE email='$email'";
        $query1=mysqli_query($conn,$select);
        while ($result1=mysqli_fetch_array($query1)) {
        ?>
        <tr class="text-center">
        <td><?php echo $result1['checkout_id'] ?></td>
        <td><?php echo $result1['transid'] ?></td>
         <td><?php echo $result1['pname'];?></td>
         <td><?php echo '₹'.number_format($result1['bprice'],2);?></td>
         <td><?php echo $result1['quantity'];?></td>
         <td><?php echo '₹'.number_format($result1['ptotal'],2);?></td>
         <td><?php echo $result1['ordered_at']; ?></td>
         <?php
         if($result1['order_status']==0){
         ?>
         <td class="bg-white text-secondary">Waiting for confirmation</td>
         <?php
         }
         else if($result1['order_status']==1){
          ?>
         <td class="bg-white text-danger">Order Confirmed</td>
         <?php
         }else {
         ?>
         <td class="bg-white text-success">Product Delivered</td>
         <?php
         }
         ?>
         </tr>
  <?php
  }
  ?>
  </table>

    </div>
    </div>






     <!-- Footer Section Begin -->
  <?php include 'required/footer.php' ?>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
  AOS.init();
  </script>
  <!-- Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="htpps://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="main.js"></script>
</body>
</html>