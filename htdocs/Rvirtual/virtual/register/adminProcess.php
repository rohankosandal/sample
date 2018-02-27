<?php
session_start();
include '../db_connect.php';
$username=$_POST['username'];
$email=$_POST['email'];
$pass=$_POST['password'];


$sql="SELECT * FROM admin where username='$username' AND password='$pass' AND email='$email'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
  $data=mysqli_fetch_assoc($result);
  $_SESSION['uid']=$data['aid'];
  echo $_SESSION['uid'];
}else {
  echo "Enter your email/password Correctly";
}
 ?>
