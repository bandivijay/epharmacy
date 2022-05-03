<?php 
session_start(); 
include 'required/conn.php';
if (!isset($_SESSION['email'])) {
  header('location:index.php');
}

if(isset($_POST['add_to_cart'])){
  $id=$_POST['id'];
  $qua=$_POST['quantity'];
  $sql3="SELECT * FROM shopping WHERE id='$id'";
  $query3=mysqli_query($conn,$sql3);
  $result3=mysqli_fetch_array($query3);

  $email=$_SESSION['email'];
  $pid=$result3['id'];
  $pname=$result3['pname'];
  $bprice=$result3['bprice'];
  $add_cart="INSERT INTO cart(id,email,pname,bprice,quantity,status) VALUES ('$pid','$email','$pname','$bprice','$qua','1')";
  $check=mysqli_query($conn,$add_cart);
  if(!$check)
  echo "Not success";
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
  <title>ePharm | Shopping Area</title>

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
            <li><a href="home.php">Home</a></li>
            <li><a href="shopping.php" >Shopping</a></li>
            <li><a href="diagnosis.php" class="active">Diagnosis</a></li>
            <li><a href="mycart.php">My Cart</a></li>
            <li><a href="myorders.php">My Orders</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </nav>
      <h1 class="overlay-text ml-1 text-center animated zoomIn">Our diagnosis reults are faster and accurate</h1>
      <h1 class="overlay-text ml-1 text-center animated zoomIn">Explore in a dynamic way</h1>
    </header>
    <div>
    <form method="post" action="upload.php" enctype="multipart/form-data">
            <input type="file" name="userFile" />
            <input type="submit" name='upload_btn' value='upload' disabled="true" />
          </form>
          <script>
            document.querySelector("input[type=file]").onchange = ({
              target: { value },
            }) => {
              document.querySelector("input[type=submit]").disabled = !value;
            };
          </script>
       </div>
    <!-- Products -->
    <section class="products">
    <div class="content">
      <div class="container-fluid">
        <h1 class="latest text-center text-white bg-info p-1"> Deals</h1>
        <div class="row mt-4" data-aos="fade-up">
          <div class="col-md-2">
            <ul class="list-group">
            <?php 
            $sql1="SELECT DISTINCT pcategory FROM diagnosis";
            $query=mysqli_query($conn,$sql1);
            while ($result=mysqli_fetch_array($query)) {
              ?>
            <li class="list-group-item"><a href="dia-cat.php?cat=<?php echo $result['pcategory'] ?>" class="text-decoration-none"><?php echo $result['pcategory'] ?></a></li>
            <?php
            }
            ?>
            </ul>

          </div>
          <div class="col-md-10">
          <div class="container-fluid">
          <div class="row mt-3">
          
          <?php
          $sql2="SELECT * FROM diagnosis WHERE pcategory='Deals'";
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
            ?>
             </div>
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
  AOS.init();
  </script>
  <!-- Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="htpps://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="main.js"></script>
</body>
</html>
