<?php
session_start();
include '../required/conn.php';

  $id=$_GET['id'];
  $pro="UPDATE users SET type='1' WHERE id='$id'";
  mysqli_query($conn,$pro);
  header('location:users.php');




?>