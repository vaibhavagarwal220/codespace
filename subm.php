

<?php
require 'core.inc.php';
require 'connect.inc.php';
if(!loggedin()) {header('Location:index1.php');}
$name_f=getfield('fname');
$name_sr=getfield('srname');
$ln_img=getfield('imgln');
$usern=getfield('username');
$myid=getfield('id');
$time=time()+3.5*60*60;

if(isset($_GET['q']))
  {$qcode=$_GET['q'];
  $flag="and 1";}
else
  header('Location:practice.php');
if(isset($_GET['id'])){
  $user=$_GET['id'];
  $flag="and user_id=".$user;
   

}
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
  a{color:green;}
  table a{color:blue;}
  .page{width:70%;margin:auto;}

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

$query2="SELECT username from user_in where id=".$myid;
      $result2=mysql_query($query2);
      $uname=mysql_result($result2,0,'username');

$query="SELECT id,qid,user_id,result from submissions where qid='".$qcode."' ".$flag;

$result=mysql_query($query);

$num=mysql_num_rows($result);
if($result) 
	{
    if($flag=="and 1") echo "<h3>All submissions for ".$qcode." </h3>";
    else if($myid!=$user) 
      {
        $query3="SELECT username from user_in where id=".$user;
      $result3=mysql_query($query3);
      $numr=mysql_num_rows($result3);
      if($numr==0) header("Location:practice.php");
      $uname=@mysql_result($result3,0,'username');

        echo "<h3><a href=userprof.php?q=".$uname.">".$uname."</a>'s submissions for <a href=problem.php?q=".$qcode.">".$qcode."</a> </h3>";
        
      }
    else echo "<h3>My submissions for ".$qcode." </h3>";

		echo "<table class=\"mdl-data-table mdl-js-data-table mdl-shadow--2dp\">
			  <thead>
    			<tr>
              <th class=\"mdl-data-table__cell--non-numeric\">ID</th>
      				<th class=\"mdl-data-table__cell--non-numeric\">Code</th>
              <th class=\"mdl-data-table__cell--non-numeric\">Result</th>
              <th class=\"mdl-data-table__cell--non-numeric\">Username</th>
      			</tr>
  			  </thead>
  			  <tbody>";
          if($num==0) echo "<tr><td></td><td>No submissions</td><td></td><td></td></tr>";
		for($i=0;$i<$num;$i++)
		{	$quid=mysql_result($result,$i,'id');
      $qid=mysql_result($result,$i,'qid');
      $res=mysql_result($result,$i,'result');
      $uid=mysql_result($result,$i,'user_id');
      

			echo "<tr>";
			echo "<td class=\"mdl-data-table__cell--non-numeric\">".$quid."</td>";
      echo "<td class=\"mdl-data-table__cell--non-numeric\"><a href=\"showcode.php?q=".$quid."\">".$qid."</a></td>";
      if ($res=="AC") echo "<td class=\"mdl-data-table__cell--non-numeric\"><i class=material-icons>done</i></td>";
      else if ($res=="WA") echo "<td class=\"mdl-data-table__cell--non-numeric\"><i class=material-icons>highlight_off</i></td>";
      else if ($res=="RE") echo "<td class=\"mdl-data-table__cell--non-numeric\"><i class=material-icons>error_outline</i></td>";
      else if ($res=="TLE") echo "<td class=\"mdl-data-table__cell--non-numeric\"><i class=material-icons>alarm</i></td>";
      else if ($res=="CE") echo "<td class=\"mdl-data-table__cell--non-numeric\"><i class=material-icons>warning</i></td>";
      echo "<td class=\"mdl-data-table__cell--non-numeric\"><a href=\"userprof.php?q=".$uname."\">".$uname."</a></td>";      
      echo "</tr>";
		}
	echo "</tbody>
		</table>";
	}
?>
  
<div>
</body>
 </html>
