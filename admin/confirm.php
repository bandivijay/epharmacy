<?php
session_start();
include '../required/conn.php';

  $id=$_GET['id'];
  $confirm="UPDATE orders SET order_status='1' WHERE id='$id'";
  mysqli_query($conn,$confirm);
  header('location:manage.php');




?>