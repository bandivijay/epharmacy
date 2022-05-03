<?php
session_start();
include '../required/conn.php';

  $id=$_GET['id'];
  $delivery="UPDATE orders SET order_status='2' WHERE id='$id'";
  mysqli_query($conn,$delivery);
  header('location:manage.php');




?>