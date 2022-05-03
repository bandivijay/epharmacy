<?php
session_start();
include 'required/conn.php';
if (!isset($_SESSION['email'])) {
    header('location:index.php');
  }
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
  <title>ePharm | My Cart</title>

  <style>
    header {
      width: 100%;
      height: 50vh;
      background: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.3)),url(https://images.pexels.com/photos/1005638/pexels-photo-1005638.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940) no-repeat 35% 65%;
      background-size: cover;
    }
    nav.black ul {
      background: linear-gradient(to right, #d53369, #cbad6d);
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
            <li><a href="mycart.php" class="active">My Cart</a></li>
            <li><a href="myorders.php">My Orders</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </nav>
      <h1 class="overlay-text ml-1 text-center animated zoomIn">Expand the shopping cart</h1>
    </header>
    <div class="content">
    <div class="container-fluid">

    <h2>Please check you cart <span class="badge rounded badge-secondary"><?= $_SESSION['email'] ?></span></h2>
    

    <!-- 2667 -->
  
    <div class="col-md-12 mt-4">
       <table class="table table-responsive-sm table-stripped table-hover table-bordered">
        <tr class="bg-dark text-center text-white">
          <td>Id</td>
          <td>Product Name</td>
          <td>Product Price</td>
          <td>Quantity</td>
          <td>Total Price</td>
          <td>Action</td>
        </tr>
        <?php 
         $total=0;
        $email=$_SESSION['email'];
        $sql="SELECT * FROM cart WHERE email='$email' AND status='1'";
        $query=mysqli_query($conn,$sql);
        while ($result=mysqli_fetch_array($query)) {
         ?>
         <tr class="text-center">
         <td><?php echo $result['id'];?></td>
         <?php
            $total= $total+$result['bprice']*$result['quantity'];
         ?>
         <td><?php echo $result['pname'];?></td>
         <td><?php echo '₹'.number_format($result['bprice'],2);?></td>
         <td><?php echo $result['quantity'];?></td>
         <td><?php echo '₹'.number_format($result['bprice']*$result['quantity'],2);?></td>
         <td><button class="btn btn-danger"><a href="required/delete.php?id=<?php echo $result['id']; ?>" class="btn btn-danger text-white">Delete</a></button></td>
        </tr>
         <?php  
       }  
       ?>
       <tr>
       <td colspan='3'></td>
       <td class="bg-warning text-center"><b?>Total Price</b></td>
       <td class="text-center"><?php echo  '₹'.number_format($total,2)?></td>
       </tr>
       </table>
    </div>
    
    </div>

    <div class="container text-center mt-5">

    <a href="shopping.php" class="btn btn-primary text-white p-3 mr-4">Continue Shopping</a>
    <?php 
    if($total>0){
    ?>
    <a href="payments.php" class="btn btn-success text-white p-3 mr-4">Checkout</a>
    <?php
    }else{
    ?>
    <button class="btn btn-success text-white p-3 mr-4" disabled>Checkout</button>
    <?php
    }
    ?>
    <a href="myorders.php"><button class="btn btn-danger text-white p-3">My Orders</button></a>
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