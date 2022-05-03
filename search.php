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
  <title> ePharm | Search</title>
  <?php include 'required/scripts.php' ?>
  <style>
    header {
      width: 100%;
      height: 80vh;
      background: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.3)),url(https://images.unsplash.com/photo-1573855619003-97b4799dcd8b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80) no-repeat 50% 50%;
      background-size: cover;
    }
    nav.black ul {
      background: linear-gradient(90deg, #00416A 0%, #79CBCA 100%);
    }
    body{
    background: #f2f2f2;
    
  }
  
  .search {
    width: 100%;
    position: relative;
    display: flex;
  }
  
  .searchTerm {
    width: 100%;
    border: 3px solid #00B4CC;
    border-right: none;
    padding: 5px;
    height: 36px;
    border-radius: 5px 0 0 5px;
    outline: none;
    color: #9DBFAF;
  }
  
  .searchTerm:focus{
    color: #00B4CC;
  }
  
  .searchButton {
    width: 40px;
    height: 36px;
    border: 1px solid #00B4CC;
    background: #00B4CC;
    text-align: center;
    color: #fff;
    border-radius: 0 5px 5px 0;
    cursor: pointer;
    font-size: 20px;
  }
  
  /*Resize the wrap to see the search bar change!*/
  .wrap{
    width: 30%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }
  </style>
  </head>
<body>
  <header>
      <nav>
        <div class="menu-icon">
          <i class="fa fa-bars fa-2x"></i>
        </div>
        <a href="home.php" class="logo"> ePharm</a>
        <div class="menu">
          <ul>
            <li><a href="home.php" >Home</a></li>
            <li><a href="shopping.php" >Shopping</a></li>
            <li><a href="diagnosis.php" >Diagnosis</a></li>
            <li><a href="logout.php" >Logout</a></li>
          </ul>
        </div>
      </nav>
</header>
<form action="#" class="" method="POST">
<div class="wrap">
   <div class="search">
      <input type="text" name=pname id=pname class="searchTerm" placeholder="What are you looking for?">
      <button type="submit" class="searchButton" name=searchitem>
        <i class="fa fa-search"></i>
     </button>
   </div>
</div>
</form>

    <?php
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['searchitem']))
    {
        searchitem();
    }
    function searchitem(){
      include 'required/conn.php';
      $pname =  $_REQUEST['pname'];
          $sql2="SELECT * FROM shopping WHERE pname='$pname'";;
          $query2=mysqli_query($conn,$sql2);
            while ($result2=mysqli_fetch_array($query2)) {
              ?>
            
              <div class="col-md-4 col-sm-6">
              <form method="post" action="#">
              <div class="card-deck">
              <div class="card shadow-lg mb-3">
                <img class="card-img-top img-fluid mt-1" src="<?php echo $result2['pimg'];?>">
                <div class="card-body text-center">
                  <h4 class="card-title"><?php echo $result2['pname'];?></h4>
                  <h5 class="mt-2">
                    <small><s class="text-secondary">Rs.<?php echo $result2['aprice'];?></s></small>
                    <span class="price">Rs.<?php echo number_format($result2['bprice'],2);?></span>
                  </h5>
                  <input class="form-control text-center" type="number" min="1" name="quantity" value="1">
                  <input type="hidden" name="id" value="<?= $result2['id'] ?>">
                  <input type="hidden" name="pname" value="<?= $result2['pname'] ?>">
                  <input type="hidden" name="bprice" value="<?= $result2['bprice'] ?>">
                </div>
                  <div class="card-footer">
                  <form method="post">
                  <input type="hidden" name="id" value="<?php echo $result2['id'] ?>" id="id">
                  <input type="submit" name="add_to_cart" value="Add to cart" class="btn btn-block btn-danger btn-sm link">
                  </form>
                  </div>
              </div>
              </div>
              </div>
              <?php
            }
        }

            ?>