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
  #ques{width:70%;margin: auto;}
  a{color:green;}

  </style>
</head>
<body>
  
 <?php
include 'navbar.php'
 ?>

<div id="ques">
<?php

if(!empty($qcode)){
$my_file = 'adminaccess/questions/'.$qcode."txt";
$inread = @file($my_file) or die('<h2>Error 404:No Problem Found</h2>');
echo "<a href=\"submit.php?q=".$qcode."\" class=\"mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect\" target=_blank>Submit</a>";
echo "<a href=\"subm.php?q=".$qcode."\" class=\"mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect\" target=_blank>All Submissions</a>";
echo "<a href=\"subm.php?q=".$qcode."&id=".$id."\" class=\"mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect\" target=_blank>My submissions</a>";
foreach($inread as $line)
  echo $line;
}
?>
</div>
</div>
  </main>
</div>
  </body>
 </html>
