

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
  <title><?php echo $qcode; ?>'s Profile</title>
    

  <style type="text/css">
  .nt{margin-top:40px;}
  a.sub{color:blue;}
  table a{color:blue;}
  .page{width:70%;margin:auto;}
img.pport{display:inline;}
h2.name,h5{display:inline;}
.demo-card-square.mdl-card {
  width: 320px;
  height: 320px;
}
.demo-card-square > .mdl-card__title {
  color: #fff;
  background:
    url('../assets/demos/dog.png') bottom right 15% no-repeat #46B6AC;
}

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
if($numu==0) echo "<h1>No such user</h1>";
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
      $numr=@mysql_num_rows($resultr);
      
     echo '<div class="demo-card-square mdl-card mdl-shadow--2dp">
  <div class="mdl-card__title mdl-card--expand">
    <h2 class="mdl-card__title-text">Update</h2>
  </div>
  <div class="mdl-card__supporting-text">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
    Aenan convallis.
  </div>
  <div class="mdl-card__actions mdl-card--border">
    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
      View Updates
    </a>
  </div>
</div>';

      echo "<img src=".$img." class=\"pport img img-circle\"><h2 class=name>".$fname." ".$srname."</h2><hr><h6>Username</h6><h5> ".$qcode." <h5><br><h6>List of problems successfully solved</h6><h5>";

      for($i=0;$i<$num;$i++)
    { $qid=@mysql_result($result1,$i,'qid');
      if($i==$num-1) echo "<a href=subm.php?q=".$qid."&id=".$id." class=sub>".$qid."</a>";
      else echo "<a href=subm.php?q=".$qid."&id=".$id." class=sub>".$qid."</a>,";
      
    }
    echo "</h5>";
     
   
  }
}

?>

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
  <div id="piechart_3d" style="width: 600px; height: 300px;"></div>

  
</div>

</body>
 </html>
