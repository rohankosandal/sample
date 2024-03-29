<?php
session_start();
if (!isset($_SESSION['uid'])) {
  header("Location:../register/");
}
$pbid=$_GET['id'];
include '../db_connect.php';
$sql="SELECT * FROM codedb where id='$pbid' ";
$result=mysqli_query($conn, $sql);
$data=mysqli_fetch_assoc($result);

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 <title>Codeit-Admin-Edit</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="../w3/w3css.css">
 <link rel="stylesheet" href="../stylesheets/fonts-awesome.css">
 <script type="text/javascript" src="../jquery/3.2.js"></script>
 <script src="../notify/bootstrap-notify.min.js"></script>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css" >
  <script src="../bootstrap/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="stylesheets/stylesheet.css">
 <script src="../spin/src/loadingOverlay.js" charset="utf-8"></script>

 </head>
 <body>

   <nav class="navbar navbar-inverse" style="background:#323754;margin-bottom:0px;">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Codeit</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li class="active"><a href="#"><?php echo $data['pbName'];?></a></li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
   </nav>

 <div class="panel panel-primary" style="margin-top:0px;">
   <div class="panel-body" style="background:#333;"><h4 class="editorTag">Editor</h4>
     <div class="setbtns">
       <span class="dropdown">
          <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Language
          <span class="caret"></span></button>
          <ul class="dropdown-menu"  id="languageSelector">
            <li class="active"><a value="c_cpp">C and C++</a></li>
            <li><a value="html">HTML</a></li>
            <li><a value="css">CSS</a></li>
            <li><a value="javascript">Javascript</a></li>
            <li><a value="php">PHP</a></li>
          </ul>
       </span>
       <span class="dropdown">
          <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Themes
          <span class="caret"></span></button>
          <ul class="dropdown-menu" id="themeSelector">
            <li class="active"><a value="monokai">Monokai</a></li>
            <li><a value="ambiance">Ambiance</a></li>
            <li><a value="chrome">Chrome</a></li>
            <li><a value="cobalt">Cobalt</a></li>
            <li><a value="eclipse">Eclipse</a></li>
            <li><a value="twilight">Twilight</a></li>
          </ul>
       </span>
       <span class="dropdown">
          <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Font Size
          <span class="caret"></span></button>
          <ul class="dropdown-menu"  id="fontSizeSelector">
            <li><a value="12">1</a></li>
            <li class="active"><a value="14">2</a></li>
            <li><a value="15">3</a></li>
            <li><a value="16">4</a></li>
            <li><a value="17">5</a></li>
            <li><a value="18">6</a></li>
            <li><a value="19">7</a></li>
            <li><a value="20">8</a></li>
            <li><a value="21">9</a></li>
            <li><a value="22">10</a></li>
            <li><a value="23">11</a></li>
            <li><a value="24">12</a></li>
            <li><a value="25">13</a></li>
            <li><a value="26">14</a></li>
          </ul>
       </span>
     </div>
   <div class="w3-row">
     <div class="w3-col w3-container m6 l6 " id="editor1">
     </div>
     <div class="w3-col w3-container m6 l6" id="editor">
     </div>
   </div>
   </div>
 </div>
 <div class="bgform">
 <form action="updateProcess.php?id=<?php echo $pbid;?>" method="post">
   <textarea name="editor" id="editormain" rows="8" cols="80" hidden="hidden"></textarea>
   <textarea name="editorheader" id="editorheader" rows="8" cols="80" hidden="hidden"></textarea>

 <div class="container" >

   <div class="form-group">
     <input type="text" name="pbName" class="form-control" id="pbName" placeholder="Problem Name" value="<?php echo $data['pbName']; ?>">
   </div>
   <div class="form-group">
     <textarea name="pbStat" rows="8" cols="80" class="form-control" id="pbStat" placeholder="Problem Statement" value=""><?php echo $data['pbStat'];?></textarea>
   </div>
   <div class="form-group">
     <label>Enter the Program Difficulty level</label><br>
   <label class="radio-inline"><input type="radio" name="diff" value="25" required <?php if ($data['diff']==25) {
     echo "checked='checked'";
 } ?>>Easy</label>
   <label class="radio-inline"><input type="radio" name="diff" value="50" required <?php if ($data['diff']==50) {
     echo "checked='checked'";
 } ?>>Moderate</label>
   <label class="radio-inline"><input type="radio" name="diff" value="100" required <?php if ($data['diff']==100) {
     echo "checked='checked'";
 } ?>>Difficult</label>
   <a href="#" data-toggle="tooltip" title="Difficulty Levels are Given specific xps points. Easy - 25XPS, Moderate - 50XPS, Difficult - 100XPS" style="margin-left:50px;">Help</a>

   </div>
   <p>Inputs to program(if any)</p>
   <div class="form-group onerow">
     <textarea name="ips1" rows="8" cols="40" class="form-control" id="ips1" placeholder="Inputs for case 1"  value=""><?php echo $data['ips1'];?></textarea>
   </div>
   <div class="form-group onerow">
     <textarea name="ips2" rows="8" cols="40" class="form-control" id="ips2" placeholder="Inputs for case 2" value=""><?php echo $data['ips2'];?></textarea>
   </div><br>
   <div class="form-group secrow">
     <textarea name="ips3" rows="8" cols="40" class="form-control" id="ips3" placeholder="Inputs for case 3" value="" ><?php echo $data['ips3'];?></textarea>
   </div>
   <div class="form-group secrow">
     <textarea name="ips4" rows="8" cols="40" class="form-control" id="ips4" placeholder="Inputs for case 4" value=""><?php echo $data['ips4'];?></textarea>
   </div><br>
   <button type="button" class="btn btn-default btn-sm  " id="compileBtn" value="Get The Output"  name="compileBtn"><span class="glyphicon glyphicon-cog"></span> Get The Output</button>
   <a href="#" data-toggle="tooltip" title="You can get the output of the Program. You need to write the full working program and then click on this button. The outputs will appear on the boxes below" style="margin-left:50px;">Help</a>

   <p>Expected Outputs:</p>
   <div class="form-group thirdrow">
     <textarea name="ops1" rows="8" cols="40" class="form-control" id="ops1" placeholder="Output for case 1" value=""><?php echo $data['expop1'];?></textarea>
   </div>
   <div class="form-group thirdrow">
     <textarea name="ops2" rows="8" cols="40" class="form-control" id="ops2" placeholder="Output for case 2" value=""><?php echo $data['expop2'];?></textarea>
   </div><br>
   <div class="form-group frow">
     <textarea name="ops3" rows="8" cols="40" class="form-control" id="ops3" placeholder="Output for case 3" value=""><?php echo $data['expop3'];?></textarea>
   </div>
   <div class="form-group frow">
     <textarea name="ops4" rows="8" cols="40" class="form-control" id="ops4" placeholder="Output for case 4" value=""><?php echo $data['expop4'];?></textarea>
   </div><br>
 <button type="submit" class="btn" name="button">Submit</button>
 </div>
 </form>
 </div>
 <script src="../ace-builds/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
 <script>
         var editor = ace.edit("editor");
         editor.setTheme("ace/theme/monokai");
         editor.getSession().setMode("ace/mode/c_cpp");
         editor.resize();
         document.getElementById('editor').style.fontSize='14px';
         var editorheader = ace.edit("editor1");
         editorheader.setTheme("ace/theme/monokai");
         editorheader.getSession().setMode("ace/mode/c_cpp");
         editorheader.resize();
         document.getElementById('editor1').style.fontSize='14px';
         editorheader.setHighlightActiveLine(false);
         editorheader.getSession().setUseSoftTabs(true);
         editorheader.clearSelection();



         $.get("../embededitor/getData.php?id=<?php echo $pbid; ?>",function(data){ // gets the data and sets it to editors
           var data= JSON.parse(data);
           editorheader.setValue(data.code);
           editor.setValue(data.code1);
           editor.clearSelection();
           editorheader.clearSelection();
         });
         var textareaEditor = $('#editormain');
         editor.on("change", function () {
         textareaEditor.val(editor.getValue());
         });
         var textareaEditorheader = $('#editorheader');
         editorheader.on("change", function () {
             textareaEditorheader.val(editorheader.getValue());
         });

 </script>
 </body>
 </html>
  <script type="text/javascript">
 $('#languageSelector').on("click",'a',function(){
   var lng=$(this).attr('value');
   editor.getSession().setMode("ace/mode/"+lng);
   editorheader.getSession().setMode("ace/mode/"+lng);
   $('#languageSelector li').removeClass("active");
   $(this).parent().addClass("active");
 });
 $('#themeSelector').on("click",'a',function(){
   var thm=$(this).attr('value');
   editor.setTheme("ace/theme/"+thm);
   editorheader.setTheme("ace/theme/"+thm);
   $('#themeSelector li').removeClass("active");
   $(this).parent().addClass("active");
 });
 $('#fontSizeSelector').on("click",'a',function(){
   var siz=$(this).attr('value');
   document.getElementById('editor').style.fontSize=siz+'px';
   document.getElementById('editor1').style.fontSize=siz+'px';
   document.getElementById('editor2').style.fontSize=siz+'px';
   $('#fontSizeSelector li').removeClass("active");
   $(this).parent().addClass("active");
 });
 $('#compileBtn').on('click',function(){
   var spinHandle= loadingOverlay().activate();

        var code= editorheader.getValue();
        var code1= editor.getValue();
        var ips1=$('#ips1').val();
        var ips2=$('#ips2').val();
        var ips3=$('#ips3').val();
        var ips4=$('#ips4').val();
         $.ajax({
            type:"POST",
            url:"getOutput.php",
            cache:false,
            data: {
              code:code,
              code1:code1,
              ips1:ips1,
              ips2:ips2,
              ips3:ips3,
              ips4:ips4
            },
            success: function(data,status) {
              loadingOverlay().cancel(spinHandle);

              var data= JSON.parse(data);
              if (data.error=="") {
                $('#ops1').text(data.userOutput1);
                $('#ops2').text(data.userOutput2);
                $('#ops3').text(data.userOutput3);
                $('#ops4').text(data.userOutput4);
              }else {
                showNotify();
              }
            }
         });

    });
    function showNotify() {
      $.notify({
     // options
     icon: 'glyphicon glyphicon-warning-sign',
     title: '<strong>Error!</strong><br>',
     message: 'Please provide the correct program and then try again',
     target: '_blank'
   },{
     // settings
     element: 'body',
     position: null,
     type: "danger",
     allow_dismiss: true,
     newest_on_top: true,
     showProgressbar: false,
     placement: {
       from: "top",
       align: "right"
     },
     offset: 20,
     spacing: 10,
     z_index: 1031,
     delay: 5000,
     timer: 1000,
     url_target: '_blank',
     mouse_over: null,
     animate: {
       enter: 'animated fadeInDown',
       exit: 'animated fadeOutUp'
     },
     onShow: null,
     onShown: null,
     onClose: null,
     onClosed: null,
     icon_type: 'class',
     template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
       '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
       '<span data-notify="icon"></span> ' +
       '<span data-notify="title">{1}</span> ' +
       '<span data-notify="message">{2}</span>' +
       '<div class="progress" data-notify="progressbar">' +
         '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
       '</div>' +
       '<a href="{3}" target="{4}" data-notify="url"></a>' +
     '</div>'
    });
    }
  </script>
