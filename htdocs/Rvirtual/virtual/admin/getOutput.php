<?php
include '../db_connect.php';
$code=$_POST['code'];
$code1=$_POST['code1'];
$ips1=$_POST['ips1'];
$ips2=$_POST['ips2'];
$ips3=$_POST['ips3'];
$ips4=$_POST['ips4'];

$wholeCode="{$code}{$code1}";
$codeFile="temp.c";

$handleFile=fopen("temp.c", 'w');
chmod("temp.c", 0777);
fwrite($handleFile, $wholeCode);
fclose($handleFile);

system("gcc {$codeFile} 2> error.txt");
$error=file_get_contents("error.txt");


$handleFile=fopen("input1.txt", "w");
chmod("input1.txt", 0777);
fwrite($handleFile, $ips1);
    system("./a.out < input1.txt > output1.txt");
    $userOutput1=file_get_contents("output1.txt");
fclose($handleFile);

$handleFile=fopen("input2.txt", "w");
chmod("input2.txt", 0777);
fwrite($handleFile, $ips2);
    system("./a.out < input2.txt > output2.txt");
    $userOutput2=file_get_contents("output2.txt");
fclose($handleFile);

$handleFile=fopen("input3.txt", "w");
chmod("input3.txt", 0777);
fwrite($handleFile, $ips3);
    system("./a.out < input3.txt > output3.txt");
    $userOutput3=file_get_contents("output3.txt");
fclose($handleFile);

$handleFile=fopen("input4.txt", "w");
chmod("input4.txt", 0777);
fwrite($handleFile, $ips4);
    system("./a.out < input4.txt > output4.txt");
    $userOutput4=file_get_contents("output4.txt");
fclose($handleFile);

$jsonData = array('error' => $error,'userOutput1' =>$userOutput1 ,'userOutput2' =>$userOutput2 ,'userOutput3' =>$userOutput3 ,'userOutput4' =>$userOutput4);
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
