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
      width: 100%;
      height: 50vh;
      background: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.3)),url(https://images.pexels.com/photos/1005638/pexels-photo-1005638.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940) no-repeat 35% 65%;
      background-size: cover;
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
            <li><a href="users.php" class="active">Users</a></li>
            <li><a href="uploaditems.php"  >Upload</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </nav>
      <h1 class="overlay-text ml-1 text-center animated zoomIn">Enhance your orders</h1>
      <?php
      $total=0;
      $count="SELECT ptotal FROM orders";
      $res_query=mysqli_query($conn,$count);
      while ($result=mysqli_fetch_array($res_query)) {
        $total= $total+$result['ptotal'];
      }
      ?>
      <h2 class="overlay-text ml-1 text-center animated zoomIn">Total value: <?php echo '₹'.number_format($total,2); ?></h2>
    </header>
    <!-- <div class="content"> -->
    <div class="container-fluid">
    

    <!-- 2667 -->
    <div class="form-group col-md-4 mt-3">
    <input type="text" class="form-control" id="searchInput" onkeyup="myFunction()" placeholder="Search User">
    </div>
    <div class="col-md-12 mt-4">
       <table id="order_table" class="table table-responsive-sm table-stripped table-hover table-bordered">
       <tr class="bg-dark text-center text-white">
          <th scope="col">Id</th>
          <th scope="col">Email Address</th>
          <th scope="col">Name</th>
          <th scope="col">Registered on</th>
          <th scope="col">Subscription type</th>
        </tr>
        <?php 
        $sql="SELECT * FROM users";
        $query=mysqli_query($conn,$sql);
        while ($result=mysqli_fetch_array($query)) {
         ?>
         <tr class="text-center">
         <td><?php echo $result['id'];?></td>
         <td><?php echo $result['email'];?></td>
         <td><?php echo $result['name'];?></td>
         <td><?php echo $result['created_at'];?></td>
         <?php 
         if($result['type']==0){
         ?>
         <td><button class="btn btn-warning"><a href="pro.php?id=<?php echo $result['id']; ?>" class="btn btn-warning text-white">Make Premium Subscriber</a></button></td>
        </tr>
        <?php
         }else{
           ?>
          <td><button class="btn p-2 btn-success"><a href="normal.php?id=<?php echo $result['id']; ?>" class="btn btn-success text-white">Premium Subscriber</a></button></td>
        </tr>
           <?php
         }
         ?>
         <?php  
       }  
       ?>
       </table>
    </div>
    </div>

    </div>




    <!-- Footer Section Begin -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
  AOS.init();
  function myFunction() {

  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("searchInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("order_table");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
  </script>
  <!-- Bootstrap JS -->
  
  <script src="htpps://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../main.js"></script>
</body>
</html>