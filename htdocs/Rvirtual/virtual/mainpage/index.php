<?php


include '../db_connect.php';
session_start();
if (!isset($_SESSION['uid'])) {
  header("Location:../register/");
}
include '../sessionTime.php';
$sql="SELECT id,pbName,pbStat,diff FROM codedb";
$result=mysqli_query($conn, $sql);

$comm="SELECT * FROM users ORDER BY points DESC";
$CommRe=mysqli_query($conn, $comm);
$highest=mysqli_fetch_assoc($CommRe);
$highest=$highest['points'];

$getScore="SELECT * FROM users where uid=".$_SESSION['uid']."";
$getScoreResult=mysqli_query($conn, $getScore);
$getScoreResult=mysqli_fetch_assoc($getScoreResult);

$getUserData="SELECT * FROM userdata where uid=".$_SESSION['uid']."";
$getUserDataResult=mysqli_query($conn, $getUserData);
$noQuestionSolved=mysqli_num_rows($getUserDataResult);

$message="SOLVE";

 ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodeIt-Problem Statements</title>

<?php include '../commonIncludes.php'; ?>
<link rel="stylesheet" href="../embededitor/extracss.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" type="text/css" href="../loaderGIF/loading.css"/>
<link rel="stylesheet" type="text/css" href="../loaderGIF/loading-btn.css"/>
<script type="text/javascript">
    $(window).ready(function() {
        $(".loader").fadeOut("slow");
    });
  </script>
<script type="text/javascript">
  $(document).ready(function () {
    $('#LeaderBoard').hide();
    $('#DashBoard').hide();
  });
</script>
</head>

<body>
  <div class="loader"> </div>

  <nav class="navbar  navbar-expand-lg navbar-light bg-info" style="margin:0px; padding-left:60px;padding-right:90px;">
<div class="container" style="padding:0px;">
  <a class="navbar-brand" href="#"><b style="font-size:18px;">CodeIt</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor03">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../mainpage/index.php">Home <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item" onclick="LeaderBoard()">
        <a class="nav-link" href="#">LeaderBoard</a>
      </li>
      <!--<li class="nav-item" onclick="DashBoard()">
        <a class="nav-link" href="#">DashBoard</a>
      </li>-->


      <li class="nav-item" style="float:right;">
      </ul>
      <form class="form-inline ml-auto">
          <div class="form-group has-white">
      <ul class="nav navbar-nav navbar-right" >
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:white;">Account
              <b class="caret"></b></a>
              <ul class="dropdown-menu" style="left:-30%">
                  <li>
                      <div class="navbar-content">
                          <div class="row">

                              <div class="col-md-12">
                                  <span style="text-transform:capitalize;"><?php echo $getScoreResult['uname']; ?></span>
                                  <p class="text-muted small">
                                      <?php echo $getScoreResult['uemail']; ?></p>
                                  <div class="divider">
                                  </div>
                                  <a href="#" class="btn btn-primary btn-sm active" onclick="DashBoard()" style="background-color:#00bcd4;">View Profile</a>
                              </div>
                          </div>
                      </div>
                      <div class="navbar-footer">
                          <div class="navbar-footer-content">
                              <div class="row">

                                  <div class="col-md-6">
                                      <a href="../logout.php" class="btn btn-default btn-sm pull-left">Sign Out</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </li>
              </ul>
          </li>
      </ul>
    </li>
  </div>
</form>
    </div>
   </div>
 </nav>
 <div id="LeaderBoard">
   <div class="card card-nav-tabs" style="width: 100%;" >
     <div class="card-header card-header-danger">
       LeaderBoard
     </div>
       <?php

       $comm="SELECT * FROM users ORDER BY points DESC";
       $CommRe=mysqli_query($conn, $comm);


       while ($data=mysqli_fetch_assoc($CommRe)) {
           $userScore=$data['points'];
           $percentage=0;
           if ($userScore != 0) {
             $percentage=($userScore/$highest)*100;
           }

           echo  "
           <div class='card' style='width: 100%;margin-top:2px;margin-bottom:2px;'>
            <div class='card-body row'>
            <div class=' col-md-4'><b>Name: </b>".$data['uname']."</div><div class='col-md-4'><b>Points Scored:</b> ".$data['points']."XP</div><div class='col-md-4'><b>Problems Solved: </b>".$data['pbSol']."</div>
            </div>
           </div>
";
       }
        ?>
   </div>
 </div>

  <div id="pbStat">
    <div class="title"><h4>Problem Statements</h4></div>
  <div class="container-fluid">
    <ul class="collapsible popout" data-collapsible="accordion">

      <?php
      while ($row=mysqli_fetch_assoc($result)) {

        $userSolved="SELECT * FROM userdata where uid=".$_SESSION['uid']." AND qid=".$row['id']." ";
        $userSolvedQuestions=mysqli_query($conn, $userSolved);
          if ($newMessage=mysqli_fetch_assoc($userSolvedQuestions)) {
              if ($newMessage['solved']==1 ) {
                  $message="SOLVE AGAIN";
              } else {
                  $message="SOLVE";
              }
          } else {
              $message="SOLVE";
          }

          if ($row['diff']==25) {
              $diff="Easy";
          }
          if ($row['diff']==50) {
              $diff="Moderate";
          }
          if ($row['diff']==100) {
              $diff="Difficult";
          }
          echo " <li>
            <div class='collapsible-header'><b>".$row['pbName']."</b><a class='solvebtn' style='float:right;' href='../embededitor/index.php?id=".$row['id']." '><b>".$message."</b></a>
            <h5 style='float:right;font-size:12px;color:grey;margin-top:14px;' >LEVEL-<b>".$diff."</b>&nbsp;&nbsp;&nbsp;</h5>
            </div>
            <div class='collapsible-body' style=''><p>".$row['pbStat']."</p>

            </div>
          </li>";
      }
       ?>

    </ul>
  </div>
  </div>
  <div id="DashBoard">
    <div class="card card-nav-tabs" >
     <div><h3 class="card-header card-header-info" style="color:;"><center>PROFILE</center></h3>
     <div class="card-body">
       <table class="table" style="border:0px;">
         <tbody>
         <tr class="" style="font-size:15px;">
           <td  style='text-transform:capitalize;'><span class="card-title">Name: </span> <?php echo $getScoreResult['uname']; ?></td>
           <td><span class="card-title">Score: </span>  <?php echo $getScoreResult['points'];?>XP</td>
           <td><span class="card-title">Number of Problems solved: </span> <?php echo $noQuestionSolved;?></td>
         </tr>
         <tr>
           <td class="card-title"><?php
             if ($noQuestionSolved==0) {
                 echo "You have not solved any questions yet!";
             } else {
                 echo "Your solved Problems:"; ?></td>
         </tr>
         <tr style="font-size:15px;"><td>
           <?php
           echo "<ul class='list-group' style='text-transform:capitalize;'>";
                 while ($data=mysqli_fetch_assoc($getUserDataResult)) {
                     $qid=$data['qid'];
                     $question="SELECT pbName FROM codedb WHERE id='$qid'";
                     $questionResult=mysqli_query($conn, $question);

                     while ($questionData=mysqli_fetch_assoc($questionResult)) {
                         echo "

                     <li class='list-group-item'>".$questionData['pbName']."</li>
               ";
                     }
                 }
                 echo "</ul>";
             }
            ?>
         </td></tr>
       </tbody>
       </table>
   </div>
   </div>
  </div>

    <script  src="js/index.js"></script>
<script type="text/javascript">
function LeaderBoard() {
  $('#LeaderBoard').fadeIn().show();
  $('#pbStat').fadeOut().hide();
  $('#DashBoard').hide();
}
function DashBoard() {
  $('#DashBoard').fadeIn().show();
  $('#pbStat').fadeOut().hide();
  $('#LeaderBoard').hide();
}
function home() {
  $('#LeaderBoard').fadeOut().hide();
  $('#DashBoard').fadeOut().hide();
  $('#pbStat').fadeIn().show();
}
</script>
</body>
