<?php

include '../db_connect.php';
session_start();

$pbid=$_GET['id'];

$userCodeSQL="SELECT * FROM userdata WHERE uid=".$_SESSION['uid']." AND qid=".$_GET['id'].""; //to get the submitted answer
$userCodeQuery=mysqli_query($conn,$userCodeSQL);
$userCodeData =mysqli_fetch_assoc($userCodeQuery);

$sql="SELECT * FROM codedb where id='$pbid' ";
$codeData=$conn->query($sql);
$codeData=mysqli_fetch_array($codeData);
$jsonData = array('code'=> $codeData['code'],'code1'=> $codeData['code1'],'userCode'=>$userCodeData['userCode']);
$jsonDataEnc=json_encode($jsonData);
echo $jsonDataEnc;
