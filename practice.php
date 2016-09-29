

<?php
require 'core.inc.php';
require 'connect.inc.php';
if(!loggedin()) {header('Location:index1.php');}
$name_f=getfield('fname');
$name_sr=getfield('srname');
$ln_img=getfield('imgln');
$usern=getfield('username');
$time=time()+3.5*60*60;
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
  a{color:white;}
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
        <li class=active><a>Practice</a></li>
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
$query="SELECT qid,qname from questions";
$result=mysql_query($query);
$num=mysql_num_rows($result);
if($result) 
	{
		echo "<table class=\"mdl-data-table mdl-js-data-table mdl-shadow--2dp\">
			  <thead>
    			<tr>
      				<th class=\"mdl-data-table__cell--non-numeric\">Name</th>
      				<th class=\"mdl-data-table__cell--non-numeric\">Code</th>
      				<th class=\"mdl-data-table__cell--non-numeric\">Successful Submissions</th>
              <th class=\"mdl-data-table__cell--non-numeric\">Accuracy</th>
    				</tr>
  			  </thead>
  			  <tbody>";
		for($i=0;$i<$num;$i++)
		{	$qid=mysql_result($result,$i,'qid');
			$qname=mysql_result($result,$i,'qname');
      $query1="SELECT count(*) from submissions where result='AC' AND qid='".$qid."'";
      $result1=mysql_query($query1);
      $succnum=mysql_result($result1,0,'count(*)');
      $query2="SELECT count(*) from submissions where qid='".$qid."'";
      $result2=mysql_query($query2);
      $totalnum=mysql_result($result2,0,'count(*)');
      if($totalnum==0) $acc=0; 
      else $acc=$succnum*100/$totalnum;
			echo "<tr>";
			echo "<td class=\"mdl-data-table__cell--non-numeric \"><a href=\"problem.php?q=".$qid."\">".$qname."</a></td>";
      echo "<td class=\"mdl-data-table__cell--non-numeric\"><a href=\"submit.php?q=".$qid."\">".$qid."</a></td>";
      echo "<td class=\"mdl-data-table__cell--non-numeric\"><a href=\"submit.php?q=".$qid."\">".$succnum."</a></td>";
			echo "<td class=\"mdl-data-table__cell--non-numeric\"><a href=\"submit.php?q=".$qid."\">".$acc."</a></td>";
      
      echo "</tr>";
		}
	echo "</tbody>
		</table>";
	}
?>
  
<div>
</body>
 </html>
