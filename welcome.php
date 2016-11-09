<?php
require 'core.inc.php';
require 'connect.inc.php';
if(!loggedin()) {header('Location:index.php');}
$id=getfield('fname');
?>
 <html>
 <head>
   
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CodeSpace</title>
  <style type="text/css">
  aside{float:left;position:absolute;left:75%;top:5%;overflow:auto;}
  #contain{width:70%;margin:auto;}
  </style>
</head>
<body>
  
<?php
include 'navbar.php'
 ?>

 <div id="contain">
<h2>Judge Enviroment</h2>
<div class="col-sm-6">
<div class="btn btn-success"><i class=material-icons>done</i> AC (Accepted)</div><br><br>
<div class="btn btn-danger"><i class=material-icons>highlight_off</i> WA (Wrong Answer)</div><br><br>
<div class="btn btn-warning"><i class=material-icons>error_outline</i> RE (Runtime Error)</div><br><br>
<div class="btn btn-info"><i class=material-icons>alarm</i> TLE (Time Limit Exceeded)</div><br><br>
<div class="btn btn-primary"><i class=material-icons>warning</i> CE (Compilation Error)</div><br><br>
      </div>
<?php
prirecsub();
?>
 <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

 </div>

</div>
  </main>
</div>
</body>
 </html>
