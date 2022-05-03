<?php
include("../required/conn.php");

$res_sql="SELECT * FROM orders";
$res_query=mysqli_query($conn,$res_sql);
$rows=array();
while ($row=mysqli_fetch_array($res_query)) {
   $rows[]=$row;
}

echo json_encode($rows);



?>