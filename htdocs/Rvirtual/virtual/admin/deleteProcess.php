<?php
session_start();
if (!isset($_SESSION['uid'])) {
  header("Location:../register/");
}
include '../db_connect.php';
$pbid=$_GET['id'];
$sql="DELETE FROM codedb where id='$pbid'";
$result=mysqli_query($conn,$sql);
header("Location:index.php");
 ?>
