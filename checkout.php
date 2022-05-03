<?php
session_start();
include 'required/conn.php';
$tid=uniqid();
$checkout_id=date('A-g-i-D-m-Y-W').uniqid();
$email=$_SESSION['email'];
$total=0;
$sql="SELECT * FROM cart WHERE email='$email' AND status='1'";
$query=mysqli_query($conn,$sql);
while ($result=mysqli_fetch_array($query)) {

  $id=$result['id'];
  $pname=$result['pname'];
  $bprice=$result['bprice'];
  $quantity=$result['quantity'];
  $ptotal=$bprice*$quantity;
  $insert="INSERT INTO orders(transid,id,email,pname,bprice,quantity,ptotal,checkout_id) VALUES ('$tid','$id','$email','$pname','$bprice','$quantity','$ptotal','$checkout_id')";
  mysqli_query($conn,$insert);
  $tid=uniqid();

}

$update="UPDATE cart SET status='0' WHERE email='$email'";
mysqli_query($conn,$update);
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
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <title>ePharm | Checkout Area</title>

  </head>
<body class="bg-dark">
<h1 class="text-white mt-4 text-center"><span class="badge rounded badge-success">Order Placed!!</span></h1>

<div class="container text-center p-2 my-5">
<div class="col-md-7 mx-auto rounded bg-white mb-5">
<h4 class="pt-5">Ordered Email: <?php echo $email ?></h4>
<h4 class="pt-2">Order ID: <?php echo $checkout_id ?></h4>
<div class="container p-3">
<table class="table table-responsive-sm table-dark table-hover table-bordered">
<tr class="bg-primary text-center text-white">
          
          <td>Product Name</td>
          <td>Product Price</td>
          <td>Quantity</td>
          <td>Total Price</td>
        </tr>
        <?php
        $select="SELECT * FROM orders WHERE email='$email' AND checkout_id='$checkout_id'";
        $query1=mysqli_query($conn,$select);
        while ($result1=mysqli_fetch_array($query1)) {
        ?>
        <tr class="text-center">
         <?php
            $total= $total+$result1['bprice']*$result1['quantity'];
         ?>
         <td><?php echo $result1['pname'];?></td>
         <td><?php echo '₹'.number_format($result1['bprice'],2);?></td>
         <td><?php echo $result1['quantity'];?></td>
         <td><?php echo '₹'.number_format($result1['ptotal'],2);?></td>
         </tr>
  <?php
  }
  ?>
  <tr>
       <td colspan='2'></td>
       <td class="bg-success text-center"><b?>Total Price</b></td>
       <td class="text-center"><?php echo  '₹'.number_format($total,2)?></td>
       </tr>
</table>
</div>
</div>
<a href="shopping.php" class="btn btn-primary p-2 mr-4">Back to shopping</a>
<a href="mycart.php" class="btn btn-warning p-2">Back to cart</a>

</div>












</body>
<!-- <?php include 'required/footer.php'; ?> -->
<script>
Swal.fire({
  title: 'Order Successful!',
  text: '',
  icon: 'success',
  confirmButtonText: 'Dismiss'
})
</script>
  <!-- Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="htpps://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="main.js"></script>
</html>






  