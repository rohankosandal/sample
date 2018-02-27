<?php
session_start();
if (!isset($_SESSION['uid'])) {
  header("Location:../register/");
}
include '../db_connect.php';
$diff=$_POST['diff'];
$editor=$_POST['editor'];
$editorheader=$_POST['editorheader'];
$pbName=$_POST['pbName'];
$pbStat=$_POST['pbStat'];
$ips1=$_POST['ips1'];
$ips2=$_POST['ips2'];
$ips3=$_POST['ips3'];
$ips4=$_POST['ips4'];
$ops1=$_POST['ops1'];
$ops2=$_POST['ops2'];
$ops3=$_POST['ops3'];
$ops4=$_POST['ops4'];
$sql="INSERT into codedb(diff,code,code1,pbName,pbStat,ips1,ips2,ips3,ips4,expop1,expop2,expop3,expop4) VALUES('$diff','$editorheader','$editor','$pbName','$pbStat','$ips1','$ips2','$ips3','$ips4','$ops1','$ops2','$ops3','$ops4')";
$result=mysqli_query($conn,$sql);
header("Location: index.php");

 ?>
