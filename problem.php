<?php
require 'core.inc.php';
require 'connect.inc.php';
if(!loggedin()) {header('Location:index1.php');}
$name_f=getfield('fname');
$name_sr=getfield('srname');
$ln_img=getfield('imgln');
$usern=getfield('username');
$id=getfield('id');
$time=time()+3.5*60*60;
if(isset($_GET['q']))
  $qcode=$_GET['q'];
else
  header('Location:practice.php');

  /*echo "<div class=awe>Logged in since ".date('d-M-Y H:i:s' , $time)." </div><br><div class=awe>Your IP Address is ".retip()."</div><br><br>";*/    
?>
 <html>
 <head>
   
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Online Judge</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/weldes.css">  
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.2.0/material.indigo-pink.min.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/g/ace@1.2.4(min/ace.js+min/mode-c_cpp.js)"></script>
<script defer src="https://code.getmdl.io/1.2.0/material.min.js"></script>

  <style type="text/css">
  #ques{width:70%;margin: auto;}
  a{color:green;}
  </style>
</head>
<body>
  
 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#">OnlineJudge</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="welcome.php">Home</a></li>
        <li><a href="practice.php">Practice</a></li>
        <li><a href="ide.php">OnlineIDE</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        
            
            <li><div class="btn-group"><a class="btn btn-xs" href="profile.php"><img src= <?php echo $ln_img ?> class="icn" >&nbsp;&nbsp;<?php echo $name_f;?></a>&nbsp;&nbsp;&nbsp;<a class="btn dropdown-toggle " data-toggle="dropdown"><span class="caret"></span></a>
        <ul class="dropdown-menu"><li><a href="logout.php">Log Out</a></li><li><a href="changep.php">Change Password</a></li></ul>
        </div></li>
        
      </ul>
    </div>
  </div>
</nav>

<div id="ques">
<?php

if(!empty($qcode)){
$my_file = 'questions/'.$qcode."txt";
$inread = @file($my_file) or die('<h1>No Such Problem</h1>');
echo "<a href=\"submit.php?q=".$qcode."\" class=\"btn btn-default\" target=_blank>Submit</a>";
echo "<a href=\"subm.php?q=".$qcode."\" class=\"btn btn-default\" target=_blank>All Submissions</a>";
echo "<a href=\"subm.php?q=".$qcode."&id=".$id."\" class=\"btn btn-default\" target=_blank>My submissions</a>";
foreach($inread as $line)
  echo $line;
}
?>
</div>
  </body>
 </html>
