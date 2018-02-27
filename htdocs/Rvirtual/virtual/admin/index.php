<?php
session_start();
if (!isset($_SESSION['uid'])) {
  header("Location:../register/");
}
include '../db_connect.php';

$sql="SELECT id,pbName,pbStat FROM codedb";
$result=mysqli_query($conn, $sql);

 ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodeIt-Admin-Home</title>
  <script type="text/javascript" src="../jquery/3.2.js"></script>
  <link rel="stylesheet" href="../stylesheets/materialIcons.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css" >
  <link href='../stylesheets/fonts.css' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <nav class="navbar navbar-inverse" style="background:#323754;">
   <div class="container-fluid">
     <div class="navbar-header">
       <a class="navbar-brand" href="#">Codeit</a>
     </div>
     <ul class="nav navbar-nav">
       <li class="active"><a href="#">Admin-Problem Statements</a></li>
       <li><a href="addnew.php"><span class="glyphicon glyphicon-plus"></span>&nbsp;Add New Problem</a></li>

     </ul>
     <ul class="nav navbar-nav navbar-right">
       <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
     </ul>
   </div>
 </nav>


  <div class="title"><h4>Problem Statements</h4></div>
<div class="container">
  <ul class="collapsible popout" data-collapsible="accordion">

    <?php
    while ($row=mysqli_fetch_assoc($result)) {
        echo "  <li class=''>
          <div class='collapsible-header'>".$row['pbName']."   <a class='solvebtn' style='float:right;' href='edit.php?id=".$row['id']." '>  EDIT  </a><a class='solvebtn' style='float:right;' href='deleteProcess.php?id=".$row['id']." '>&nbsp;&nbsp;DELETE&nbsp;&nbsp;  </a></div>
          <div class='collapsible-body' style=''><p>".$row['pbStat']."</p>

          </div>
        </li>";
    }
     ?>

  </ul>
</div>

    <script  src="js/index.js"></script>

</body>
</html>
