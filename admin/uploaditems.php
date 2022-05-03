<?php 
include '../required/conn.php';
session_start();
if(!isset($_SESSION['password'])){
	header('Location:index.php');
 }
 ?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php include '../required/scripts.php' ?>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <link rel="stylesheet" href="../style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <title>SSPS | Admin</title>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>

  <style>
    header {
      
      height: 2vh;
      
    }
    nav.black ul {
      background: linear-gradient(to right, #d23369, #cbad6d);
    }
  </style>
</head>
<body>
    <header>
      <nav>
        <div class="menu-icon">
          <i class="fa fa-bars fa-2x"></i>
        </div>
        <a href="admin.php" class="logo"> ePharm</a>
        <div class="menu">
          <ul>
            <li><a href="admin.php">Orders</a></li>
            <li><a href="manage.php">Manage Orders</a></li>
            <li><a href="users.php" >Users</a></li>
            <li><a href="uploaditems.php" class="active" >Upload</a></li>
            
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </nav>
</header>
</body>
<body style="background:#ff005c">
    
    <div class="container ">
        <div class="row mt-5  ">
            
            <div class="col-md-6 mb-4  ">
            <div class="card " style="border-radius: 1rem;  ">
          <div class="card-body mt-2 ">
            <h5 class="card-title text-center"></h5>
            <form action="#" class="" method="POST">
              <div class="form-label-group">
                <label class="mt-2">Product Cateogry</label>
                <input type="text" name="pcategory" class="form-control mb-2" placeholder="Product Category" required autofocus>
                <label class="mt-2">Product Name</label>
                <input type="text" name="pname" class="form-control mb-2" placeholder="Product Name" required>
                <label class="mt-2">Product path</label>
                <input type="text" name="pimg" class="form-control mb-2" placeholder="Product path" >
                <label class="mt-2">Actual Price</label>
                <input type="text" name="aprice" class="form-control" placeholder="Enter price" required>
                <label for="inputPassword" class="mt-2">Our Price</label>
                <input type="text" name="bprice" id="inputPassword" class="form-control" placeholder="Enter sell price" required>
                <button name="submit" class="btn btn-primary btn-block text-uppercase mt-4 mb-2" type="submit">Upload Item</button>
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


$pcategory='';
$pname='';
$pimg='';
$aprice='';
$bprice='';

if (isset($_POST['submit'])) {
  $pcategory=mysqli_real_escape_string($conn,$_POST['pcategory']);
  $pname=mysqli_real_escape_string($conn,$_POST['pname']);
  $pimg=mysqli_real_escape_string($conn,$_POST['pimg']);
  $aprice=mysqli_real_escape_string($conn,$_POST['aprice']);
  $aprice=intval($aprice);
  $bprice=mysqli_real_escape_string($conn,$_POST['bprice']);
  $bprice=intval($bprice);

  if ($aprice==$bprice or $aprice<= $bprice) 
    {
      ?>
      <script>
      Swal.fire({
        title: 'Selling price should be lesser than actual price ',
        text: '',
        icon: 'error',
        confirmButtonText: 'Dismiss'
      })
      </script>
      <?php
      }
  else{
    $check_query="SELECT pcategory,pname FROM shopping WHERE pcategory='$pcategory' and pname='$pname'";
    $result=mysqli_query($conn,$check_query);
    $name=mysqli_fetch_assoc($result);
    if ($name) {
        
       if ($_POST['pcategory']===$pcategory and $_POST['pname']===$pname ) {
         ?>
         <script>
        Swal.fire({
        title: 'This product in the same category already exists',
        text: '',
        icon: 'warning',
        confirmButtonText: 'Dismiss'
      })
      </script>
         <?php
        } 
    }else{
      
       $sql="INSERT into shopping(pcategory,pname,pimg,aprice,bprice)VALUES('$pcategory','$pname','$pimg',$aprice,$bprice)";
       mysqli_query($conn,$sql);
       ?>
       <script>
        Swal.fire({
        title: 'Product added successfully',
        text: '',
        icon: 'success',
        confirmButtonText: `Orders`,
        denyButtonText: `Manage Orders`,})
        .then((result) => {
          if (result.isConfirmed) {
            location.replace("admin.php");
          } else if (result.isDenied) {
            location.replace("manage.php");
          }
          })
        </script>
      <?php
      }
  }
}
 ?>