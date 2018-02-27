<?php
$time = $_SERVER['REQUEST_TIME'];
$timeout_duration = 7200;

if (isset($_SESSION['LAST_ACTIVITY']) && ( $time - $_SESSION['LAST_ACTIVITY'])> $timeout_duration) {
  unset($_SESSION['uid']);
  echo "Session timeout";
  header("Location:../register/");

}

$_SESSION['LAST_ACTIVITY'] = time();


 ?>
