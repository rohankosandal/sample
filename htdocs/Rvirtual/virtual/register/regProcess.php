<?php
session_start();
include '../db_connect.php';
$uname=$_POST['uname'];
$uemail=$_POST['uemail'];
$upass=$_POST['upass'];

$sql="SELECT * FROM users where uemail='$uemail'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
  echo "Email address already Exists";

}else {
  $sql="INSERT into users(uname,uemail,upass) VALUES('$uname','$uemail','$upass')";
  $result=mysqli_query($conn,$sql);
  $_SESSION['uid']=mysqli_insert_id($conn);
  $_SESSION['LAST_ACTIVITY']= time();
  
  echo $_SESSION['uid'];
}
 ?>
