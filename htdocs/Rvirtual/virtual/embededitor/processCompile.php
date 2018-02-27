<?php
session_start();
if (!isset($_SESSION['uid'])) {
  header("Location:../register/");
}
include '../db_connect.php';
$pbid=$_GET['id'];
$sql="SELECT * FROM codedb where id='$pbid' ";
$codeData=$conn->query($sql);
$codeData=mysqli_fetch_array($codeData);
$code=$_POST['codeData'];
$sql="SELECT * FROM users where uid=".$_SESSION['uid']." ";
$userData=$conn->query($sql);
$userData=mysqli_fetch_array($userData);
$wholeCode="{$codeData['code']}{$code}";
$codeFile="code.c";
chdir("temp");
$handleFile=fopen("code.c", 'w');
fwrite($handleFile, $wholeCode);
fclose($handleFile);
$inputs = array('ips1' =>$codeData['ips1'],'ips2' =>$codeData['ips2'],'ips3' =>$codeData['ips3'],'ips4' =>$codeData['ips4']  );


system("gcc {$codeFile} 2> error.txt");
$error=file_get_contents("error.txt");

$handleFile=fopen("input1.txt", "w");
fwrite($handleFile, $codeData['ips1']);
    system("./a.out < input1.txt > output1.txt");
    $userOutput1=file_get_contents("output1.txt");
fclose($handleFile);

$handleFile=fopen("input2.txt", "w");
fwrite($handleFile, $codeData['ips2']);
    system("./a.out < input2.txt > output2.txt");
    $userOutput2=file_get_contents("output2.txt");
fclose($handleFile);

$handleFile=fopen("input3.txt", "w");
fwrite($handleFile, $codeData['ips3']);
    system("./a.out < input3.txt > output3.txt");
    $userOutput3=file_get_contents("output3.txt");
fclose($handleFile);

$handleFile=fopen("input4.txt", "w");
fwrite($handleFile, $codeData['ips4']);
    system("./a.out < input4.txt > output4.txt");
    $userOutput4=file_get_contents("output4.txt");
fclose($handleFile);

    // $input=file_get_contents("input.txt");
    $actualOutput1=$codeData['expop1'];
    $actualOutput2=$codeData['expop2'];
    $actualOutput3=$codeData['expop3'];
    $actualOutput4=$codeData['expop4'];



$done=0;
 if (strcmp($userOutput1, $actualOutput1)==0) {
     $flagResult1="../svg/correct.svg";
     $done=1;
 } else {
     $done=0;
     $flagResult1="../svg/wrong.svg";
 }
 if (strcmp($userOutput2, $actualOutput2)==0) {
     $done=1;
     $flagResult2="../svg/correct.svg";
 } else {
     $done=0;
     $flagResult2="../svg/wrong.svg";
 }
if (strcmp($userOutput3, $actualOutput3)==0) {
    $done=1;
    $flagResult3="../svg/correct.svg";
} else {
    $done=0;
    $flagResult3="../svg/wrong.svg";
}
if (strcmp($userOutput4, $actualOutput4)==0) {
    $done=1;
    $flagResult4="../svg/correct.svg";
} else {
    $done=0;
    $flagResult4="../svg/wrong.svg";
}
$totalPoints=0;
$points=0;
if ($done==1) { // done=1 means user has all test case correct

    $sql="SELECT * from userdata where uid=".$_SESSION['uid']." AND qid='$pbid'";
    $result=mysqli_query($conn, $sql);
    if (mysqli_num_rows($result)>0) {
        $data=mysqli_fetch_assoc($result);
        if ($data['solved']==0) { //if he has not solved the problem before
            $points=$codeData['diff'];
            $totalPoints=$userData['points']+$points;
            $nQS=$codeData['pbSol']+1;
            $sql="UPDATE users set done='$done',points='$totalPoints',pbSol='$nQS' where uid=".$_SESSION['uid']."";
            $result=mysqli_query($conn, $sql);
        }else {
          $totalPoints=$userData['points'];
        }
    } else { //if he has solved the problem for first time and successfull solved
        $sql="INSERT INTO userdata(uid,qid,solved,userCode) VALUES('".$_SESSION['uid']."','$pbid','1','".$code."')";
        $result=mysqli_query($conn, $sql);
        $points=$codeData['diff'];
        $totalPoints=$userData['points']+$points;
        $nQS=$codeData['pbSol']+1;
        $sql="UPDATE users set done='$done',points='$totalPoints' ,pbSol='$nQS' where uid=".$_SESSION['uid']."";
        $result=mysqli_query($conn, $sql);
    }
}
    $jsonData = array('totalPoints'=>$totalPoints,'points'=>$points,'done' => $done,'flagResult1' => $flagResult1,'flagResult2' => $flagResult2,'flagResult3' => $flagResult3,'flagResult4' => $flagResult4,'inputs' =>$inputs ,'actualOutput1' =>$actualOutput1 ,'actualOutput2' =>$actualOutput2 ,'actualOutput3' =>$actualOutput3 ,'actualOutput4' =>$actualOutput4 ,'userOutput1' =>$userOutput1 ,'userOutput2' =>$userOutput2 ,'userOutput3' =>$userOutput3 ,'userOutput4' =>$userOutput4 ,'error' => $error );
    $jsonDataEnc=json_encode($jsonData);
    echo $jsonDataEnc;


if ($error=="") {
    unlink("a.out");
}
    unlink($codeFile);
    unlink("input1.txt");
    unlink("output1.txt");
    unlink("input2.txt");
    unlink("output2.txt");
    unlink("input3.txt");
    unlink("output3.txt");
    unlink("input4.txt");
    unlink("output4.txt");
