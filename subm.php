

<?php
require 'core.inc.php';
require 'connect.inc.php';
if(!loggedin()) {header('Location:index.php');}

$myid=getfield('id');

if(isset($_GET['q']))
  {$qcode=$_GET['q'];
  $flag="and 1";}

if(isset($_GET['id'])){
  $usernm=$_GET['id'];

  $query5="SELECT id from user_in where username='".$usernm."'";
      $result5=@mysql_query($query5);
      $user=@mysql_result($result5,0,'id');
  
  $flag="and user_id=".$user;
   

}
  /*echo "<div class=awe>Logged in since ".date('d-M-Y H:i:s' , $time)." </div><br><div class=awe>Your IP Address is ".retip()."</div><br><br>";*/    
?>
 <html>
 <head>
   
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Practice Arena</title>


  <style type="text/css">
  h3 a{font-size:30px;}
  table a{color:blue;}
  .page{width:90%;margin:auto;}
  .mycard{text-align:center;}
  table{text-align: center;margin:auto;width:100%;}

  </style>
</head>
<body>
  
<?php
include 'navbar.php'
 ?>

<div class=page>
    <?php
require 'connect.inc.php';

$query2="SELECT username from user_in where id=".$myid;
      $result2=@mysql_query($query2);
      $uname=@mysql_result($result2,0,'username');

$query="SELECT id,qid,user_id,result from submissions where qid='".$qcode."' ".$flag;

$result=@mysql_query($query);

$num=@mysql_num_rows($result);
if($result&&$num) 
	{
    if($flag=="and 1") echo "<div class=mycard><h3>All submissions for ".$qcode." </h3></div>";
    else if($myid!=$user) 
      {

        echo "<div class=mycard><h3><a href=userprof.php?q=".$usernm.">".$usernm."</a>'s submissions for <a href=problem.php?q=".$usernm.">".$qcode."</a> </h3></div>";
        
      }
    else echo "<div class=mycard><h3>My submissions for ".$qcode." </h3></div>";

		echo "<table class=\"mdl-data-table mdl-js-data-table mdl-shadow--2dp\">
			  <thead>
    			<tr>
              <th class=\"mdl-data-table__cell--non-numeric\"><i class=\"material-icons\" title=\"Submission ID\">list</i></th>
              <th class=\"mdl-data-table__cell--non-numeric\"><i class=\"material-icons\" title=\"Problem Code\">credit_card</i></th>
              <th class=\"mdl-data-table__cell--non-numeric\"><i class=\"material-icons\" title=\"Result\">&#xE890;</i></th>
              <th class=\"mdl-data-table__cell--non-numeric\"><i class=\"material-icons\" title=Username>account_circle</i></th>
              <th class=\"mdl-data-table__cell--non-numeric\">Solution</th>
      			</tr>
  			  </thead>
  			  <tbody>";

		for($i=0;$i<$num;$i++)
		{	$quid=@mysql_result($result,$i,'id');
      $qid=@mysql_result($result,$i,'qid');
      $res=@mysql_result($result,$i,'result');
      $uid=@mysql_result($result,$i,'user_id');
      $query4="SELECT username from user_in where id=".$uid;
      $result4=@mysql_query($query4);
      $unam=@mysql_result($result4,0,'username');
        $href="href=showcode.php?q=$quid";
      $btn='enabled';
      if(proincon($qid)) {$btn='disabled';
      $href="";}

			echo "<tr>";
			echo "<td class=\"mdl-data-table__cell--non-numeric\">".$quid."</td>";
      echo "<td class=\"mdl-data-table__cell--non-numeric\"><a href=\"problem.php?q=".$qid."\">".$qid."</a></td>";
      if ($res=="AC") echo "<td class=\"mdl-data-table__cell--non-numeric\"><i class=material-icons>done</i></td>";
      else if ($res=="WA") echo "<td class=\"mdl-data-table__cell--non-numeric\"><i class=material-icons>highlight_off</i></td>";
      else if ($res=="RE") echo "<td class=\"mdl-data-table__cell--non-numeric\"><i class=material-icons>error_outline</i></td>";
      else if ($res=="TLE") echo "<td class=\"mdl-data-table__cell--non-numeric\"><i class=material-icons>alarm</i></td>";
      else if ($res=="CE") echo "<td class=\"mdl-data-table__cell--non-numeric\"><i class=material-icons>warning</i></td>";
      echo "<td class=\"mdl-data-table__cell--non-numeric\"><a href=\"userprof.php?q=".$unam."\">".$unam."</a></td>";
      echo "<td class=\"mdl-data-table__cell--non-numeric\"><a $btn $href class=\"mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent\">SHOW</a></td>";      
      echo "</tr>";
		}
	echo "</tbody>
		</table><br><br><br><br><br><br>";
	}
  else echo "<div class=mycard><h3>No submissions</h3></div>";
?>
  
</div>

</body>
 </html>
