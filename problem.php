<?php
require 'core.inc.php';
require 'connect.inc.php';
if(!loggedin()) {header('Location:index.php');}

if(isset($_GET['q']))
  $qcode=$_GET['q'];
else
  header('Location:practice.php');
?>
 <html>
 <head>
   
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<title>CodeSpace|Problem Page</title>

  <style type="text/css">
   .mycard{background:white;margin-bottom:10px;padding:20px;color:#424242;text-align:center;}
    .qcard{background:white;margin-bottom:10px;padding:20px;color:#424242;}
  .page{width:90%;margin: auto;}
  a{color:green;}
  .sbtns{float:right;}
  </style>
</head>
<body>
  
 <?php
include 'navbar.php'
 ?>

<div class="page">
<?php

if(!empty($qcode)){
$my_file = 'adminaccess/questions/'.$qcode."txt";
$inread = @file($my_file) or die("<div class=mycard><h1>404</h1><h3>No such Problem in our database</h3></div>");
echo "<div class=qcard><div class=sbtns>";
echo "<a href=\"submit.php?q=".$qcode."\" class=\"mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent\" target=_blank>Submit</a>";
echo "<a href=\"subm.php?q=".$qcode."\" class=\"mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent\" target=_blank>All Submissions</a>";
echo "<a href=\"subm.php?q=".$qcode."&id=".$id."\" class=\"mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent\" target=_blank>My submissions</a>";
echo "</div>";
foreach($inread as $line)
  echo $line;
}
?>
</div>
</div>
  </body>
 </html>
