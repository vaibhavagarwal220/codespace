

<?php
require 'core.inc.php';
require 'connect.inc.php';
if(!loggedin()) {header('Location:index1.php');}
$name_f=getfield('fname');
$name_sr=getfield('srname');
$ln_img=getfield('imgln');
$usern=getfield('username');
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
  <title>Practice Arena</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/weldes.css">  
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.2.0/material.indigo-pink.min.css">
<script defer src="https://code.getmdl.io/1.2.0/material.min.js"></script>

  <style type="text/css">
  .nt{margin-top:40px;}
  a.sub{color:blue;}
  table a{color:blue;}
  .page{width:70%;margin:auto;}
img.pport{display:inline;}
h2.name,h5{display:inline;}
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
        <li><a href=welcome.php>Home</a></li>
        <li><a href=practice.php>Practice</a></li>
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

<div class=page>
    <?php
require 'connect.inc.php';
$query="SELECT fname,srname,imgln,username,id from user_in where username='".$qcode."'";
$result=mysql_query($query);
if($result) 
	{
			$id=mysql_result($result,0,'id');
			$fname=mysql_result($result,0,'fname');
      $srname=mysql_result($result,0,'srname');
      $img=mysql_result($result,0,'imgln');
      $query1="SELECT distinct qid from submissions where result='AC' and user_id=".$id;
      $result1=mysql_query($query1);
      $num=mysql_num_rows($result1);
      echo "<img src=".$img." class=pport><h2 class=name>".$fname." ".$srname."</h2><hr><h6>Username</h6><h5> ".$qcode." <h5><br><h6>List of problems successfully solved</h6><h5>";

      for($i=0;$i<$num;$i++)
    { $qid=mysql_result($result1,$i,'qid');
      if($i==$num-1) echo "<a href=subm.php?q=".$qid."&id=".$id." class=sub>".$qid."</a>";
      else echo "<a href=subm.php?q=".$qid."&id=".$id." class=sub>".$qid."</a>,";
      
    }
    echo "</h5>";
     
	 
	}
?>
  
<div>
</body>
 </html>
