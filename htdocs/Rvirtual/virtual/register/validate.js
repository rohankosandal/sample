$(document).ready(function() {
  var message = $('#message');
  $('#reg').on("submit", function(e) {
    e.preventDefault();

    var uname = $('#username').val();
    var uemail = $('#email').val();
    var upass = $('#password').val();
    if (uname == "") {
      message.html("Enter your username first");
      $("#username").val("");
      $('#username').focus();
    } else if (upass == uname) {
      message.html("Password cannot be same as username");
      $("#password").val("");
      $("#password").focus();
    } else if (upass.length < 8) {
      message.html("Password should be atleast 8 characters wide");
      $("#password").focus();
    } else {
      $('#signupbtn').val("Signing Up..");
      $.ajax({
        type: "POST",
        url: "regProcess.php",
        cache: false,
        data: {
          uname: uname,
          uemail: uemail,
          upass: upass
        },
        success: function(data, status) {
          $('#signupbtn').val("Sign up");
          if (!isNaN(data)) {
            window.location.href="../index.php";
          }else {
            $('#message').html(data);
          }
        }
      });
    }
  });

  $('#log').on("submit", function(e) {
    e.preventDefault();
    var uemail = $('#logname').val();
    var upass = $('#logpass').val();
    $('#logBtn').val("Logging in..");
    $.ajax({
      type: "POST",
      url: "logProcess.php",
      cache: false,
      data: {
        uemail: uemail,
        upass: upass
      },
      success: function(data, status) {
        $('#logBtn').val("Login");

        if (!isNaN(data)) {
          window.location.href="../index.php";
        }else {
          $('#logmessage').html(data);
        }
      }
    });
  });
});
