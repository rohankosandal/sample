<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<html >
<head>
  <meta charset="UTF-8">
  <title>Code-It</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <script src="../jquery/3.2.js" charset="utf-8"></script>
  <!--<link rel="stylesheet" href="css/style.css">-->
  <script type="text/javascript" src="validate.js"></script>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" >
  <script src="../bootstrap/js/bootstrap.min.js" charset="utf-8"></script>

      <link rel="stylesheet" href="./login.css">

</head>
<nav class="navbar navbar-inverse" style="background:#323754;margin-bottom:0px;">
 <div class="container-fluid">
   <div class="navbar-header">
     <a class="navbar-brand" href="#" style="color:white; ">Codeit</a>
   </div>
   <ul class="nav navbar-nav">

   </ul>
   <ul class="nav navbar-nav navbar-right">
     <li><a href="admin-login.html" style="color:white;"><span class="glyphicon glyphicon-log-out"></span>Admin Login</a></li>
   </ul>
 </div>
</nav>
<body>
  <div class="form">

      <ul class="tab-group">
        <li class="tab active"><a href="#login">Log In</a></li>
        <li class="tab"><a href="#signup">Sign Up</a></li>
      </ul>

      <div class="tab-content">

        <div id="login">
          <h1>Welcome Back!</h1>

          <form action="" method="post" id="log">

            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input name="email" id="logname" type="email"required autocomplete="off"/>
          </div>

          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input name="password" id="logpass" type="password"required autocomplete="off"/>
          </div>

          <p class="forgot"><a href="#">Forgot Password?</a></p>
          <div class="field-wrap" id="logmessage" style="color:red;font-size:20px;"></div>

          <button type="submit" name="login_submit" id="logBtn" class="button button-block"/>Log In</button>

          </form>

        </div>
        <div id="signup">
          <h1>Sign Up for Free</h1>

          <form action="" method="post" id="reg">



            <div class="field-wrap">
              <label>
                User-Name<span class="req">*</span>
              </label>
              <input name="username" id="username" type="text" required autocomplete="off"/>
            </div>


          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input name="email" id="email" type="email" required autocomplete="off"  />
          </div>

          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input name="password" id="password" type="password" required autocomplete="off"/>
          </div>
          <div class="field-wrap" id="message" style="color:red;font-size:20px;"></div>

          <button type="submit" name="signup_submit" id="signupbtn" class="button button-block"/>Get Started</button>

          </form>

        </div>


      </div><!-- tab-content -->

</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="js/index.js"></script>

</body>
</html>
