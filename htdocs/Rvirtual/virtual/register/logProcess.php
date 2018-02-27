<?php
session_start();

include '../db_connect.php';
$uemail=$_POST['uemail'];
$upass=$_POST['upass'];

$sql="SELECT * FROM users where uemail='$uemail' AND upass='$upass'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
  $data=mysqli_fetch_assoc($result);
  $_SESSION['uid']=$data['uid'];
  $_SESSION['LAST_ACTIVITY']= time();
  echo $_SESSION['uid'];
}else {
  echo "Enter your correct email/password";
}
 ?>
