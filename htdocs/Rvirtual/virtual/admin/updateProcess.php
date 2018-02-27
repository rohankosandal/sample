<?php
session_start();
if (!isset($_SESSION['uid'])) {
  header("Location:../register/");
}
include '../db_connect.php';
$pbid=$_GET['id'];
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
$sql="UPDATE codedb SET diff='$diff',code='$editorheader',code1='$editor',pbName='$pbName',pbStat='$pbStat',ips1='$ips1',ips2='$ips2',ips3='$ips3',ips4='$ips4',expop1='$ops1',expop2='$ops2',expop3='$ops3',expop4='$ops4' where id='$pbid' ";
$result=mysqli_query($conn, $sql);
header("Location: index.php");
