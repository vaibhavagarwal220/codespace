

<?php
require 'core.inc.php';
require 'connect.inc.php';

if(isset($_GET['q']))
  $qcode=$_GET['q'];
else
  header('Location:practice.php');
?>
 <html>
 <head>
   
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CodeSpace User|CodeSpace</title>
    

  <style type="text/css">
 
  a.sub{color:blue;}
.posrec{padding-left:40px;}
  table a{color:blue;}
  .page{width:90%;margin:auto;}
img.pport{display:inline;}
h2.name,h5{display:inline;}
.demo-card-square.mdl-card {
  width: 100%;
  }
.demo-card-square > .mdl-card__title {
  color: #fff;
  background:url('../assets/demos/dog.png') bottom right 15% no-repeat #46B6AC;
}
.smallimg{width:200px;height:200px;}
  .mycard{background:white;margin-bottom:10px;padding:20px;color:#424242;text-align:center;}


  </style>
</head>
<body>

  
 <?php
include 'navbar.php'
 ?>

<div class=page>
    <?php
require 'connect.inc.php';
$query="SELECT fname,srname,imgln,username,id from user_in where username='".$qcode."'";
$result=@mysql_query($query);
$numu=@mysql_num_rows($result);
if($numu==0) echo "<div class=mycard><h1>404</h1><h3>No such User in our database</h3></div>";
else
{
if($result) 
  {   
      $id=@mysql_result($result,0,'id');
      $fname=@mysql_result($result,0,'fname');
      $srname=@mysql_result($result,0,'srname');
      $img=@mysql_result($result,0,'imgln');
      
      $query1="SELECT distinct qid from submissions where result='AC' and user_id=".$id;
      $result1=@mysql_query($query1);
      $num=@mysql_num_rows($result1);

      $queryt="SELECT qid from submissions where result='TLE' and user_id=".$id;
      $resultt=@mysql_query($queryt);
      $numt=@mysql_num_rows($resultt);

      $queryc="SELECT qid from submissions where result='CE' and user_id=".$id;
      $resultc=@mysql_query($queryc);
      $numc=@mysql_num_rows($resultc);

      $queryw="SELECT qid from submissions where result='WA' and user_id=".$id;
      $resultw=@mysql_query($queryw);
      $numw=@mysql_num_rows($resultw);

      $queryr="SELECT qid from submissions where result='RE' and user_id=".$id;
      $resultr=@mysql_query($queryr);
      $numr=@mysql_num_rows($resultr);?>

      <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Result', 'Submissions'],
          ['AC',     <?php echo $num;?>],
          ['TLE',      <?php echo $numt;?>],
          ['CE',  <?php echo $numc;?>],
          ['WA', <?php echo $numw;?>],
          ['RE',    <?php echo $numr;?>],
          

        ]);

        var options = {
          title: 'All submissions',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>

      <?php
      
     echo "<div class=mdl-grid><div class=\"mdl-cell mdl-cell--8-col\">"; 
     echo "<div class=\"demo-card-square mdl-card mdl-shadow--2dp\">
            <div class=\"mdl-card__title mdl-card--expand\">
    <h2 class=\"mdl-card__title-text\">
    <img src=".$img." class=\"smallimg\">&nbsp;&nbsp;&nbsp;<h2 class=name>".$fname." ".$srname."</h2>
  </div>
  <div class=\"mdl-card__supporting-text\"><h6>Username</h6><h5> ".$qcode." </h5><br>";
  if($num>0){echo "<h6>List of problems successfully solved</h6><h5>";
          for($i=0;$i<$num;$i++)
    { $qid=@mysql_result($result1,$i,'qid');
      if($i==$num-1) echo "<a href=subm.php?q=".$qid."&id=".$qcode." class=sub>".$qid."</a>";
      else echo "<a href=subm.php?q=".$qid."&id=".$qcode." class=sub>".$qid."</a>,";
      
    }
    echo "</h5><div id=\"piechart_3d\" style=\"width: 600px; height: 300px;\"></div>";
   }

    echo "</div>";

  if(getfield('username')==$qcode) echo "<div class=\"mdl-card__actions mdl-card--border\">
    <a class=\"mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect\" href=\"profile.php\">
      EDIT PROFILE
    </a>
  </div>";
echo "</div></div>";


   
  }


?>

<?php
echo "<div class=\"mdl-cell mdl-cell--4-col posrec\">
<div class=succard><h4>RECENT SUBMISSIONS</h4>";

$query1="SELECT id from user_in where username='$qcode';";
$result1=@mysql_query($query1);
$idsub=@mysql_result($result1,0,'id');

$query="SELECT * from submissions where user_id=$idsub order by time desc limit 10 ;";
$result=@mysql_query($query);

$num=@mysql_num_rows($result);
if($result&&$num) 
  {
    
    


    echo "<table class=\"mdl-data-table mdl-js-data-table mdl-shadow--2dp\">
        <thead>
          <tr>
              <th class=\"mdl-data-table__cell--non-numeric\">  <i class=\"material-icons\" title=\"Submission Time\">&#xE88C;</i></th>
              <th class=\"mdl-data-table__cell--non-numeric\"><i class=\"material-icons\" title=\"Problem Code\">credit_card</i></th>
              <th class=\"mdl-data-table__cell--non-numeric\"><i class=\"material-icons\" title=\"Result\">&#xE890;</i></th>
            </tr>
          </thead>
          <tbody>";

    for($i=0;$i<$num;$i++)
    { $quid=@mysql_result($result,$i,'id');
      $qid=@mysql_result($result,$i,'qid');
      $res=@mysql_result($result,$i,'result');
      $uid=@mysql_result($result,$i,'user_id');
      $timsub=@mysql_result($result,$i,'time');

      $query2="SELECT username from user_in where id=".$uid;
      $result2=@mysql_query($query2);
      $uname=@mysql_result($result2,0,'username');
      

      echo "<tr>";
      echo "<td class=\"mdl-data-table__cell--non-numeric\">$timsub</td>";
      echo "<td class=\"mdl-data-table__cell--non-numeric\"><a href=\"problem.php?q=".$qid."\">".$qid."</a></td>";
      if ($res=="AC") echo "<td class=\"mdl-data-table__cell--non-numeric\"><i class=material-icons>done</i></td>";
      else if ($res=="WA") echo "<td class=\"mdl-data-table__cell--non-numeric\"><i class=material-icons>highlight_off</i></td>";
      else if ($res=="RE") echo "<td class=\"mdl-data-table__cell--non-numeric\"><i class=material-icons>error_outline</i></td>";
      else if ($res=="TLE") echo "<td class=\"mdl-data-table__cell--non-numeric\"><i class=material-icons>alarm</i></td>";
      else if ($res=="CE") echo "<td class=\"mdl-data-table__cell--non-numeric\"><i class=material-icons>warning</i></td>";  
      echo "</tr>";
    }
  echo "</tbody>
    </table></div></div></div>";
  }
  else {
    echo "<div class=mycard><h5>No Submissions</h5></div></div></div></div>";
  }
  }

?>


  
  


</div>

</body>
 </html>
