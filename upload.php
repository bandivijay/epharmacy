<?php
              $target_Path = "prescriptions/";
              $target_Path = $target_Path.basename( $_FILES['userFile']['name'] );
              move_uploaded_file( $_FILES['userFile']['tmp_name'], $target_Path );
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <?php include 'required/scripts.php' ?>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <title>ePharm |  File uploaded</title>
  <nav>
        <div class="menu-icon">
          <i class="fa fa-bars fa-2x"></i>
        </div>
        <a href="home.php" class="logo"> ePharm</a>
        <div class="menu">
          <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="shopping.php">Shopping</a></li>
            <li><a href="diagnosis.php" >Diagnosis</a></li>
            <li><a href="mycart.php">My Cart</a></li>
            <li><a href="myorders.php">My Orders</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
</nav>
  </head>
<body class="bg-dark">
<div style="text-align:center">
<h1 class="overlay-text ml-1 text-center animated zoomIn">The file has been uploaded successfully</h1>
    <a href="diagnosis.php"><button class="btn btn-success text-white p-3">Diagnosis</button></a>
    <a href="home.php"><button class="btn btn-success text-white p-3">Home</button></a>
</div>