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
    <title>Leaderboard</title>
  <style type="text/css">
  #contain{width:70%;margin:auto;}
  </style>
</head>
<body>
  
<?php
include 'navbar.php'
 ?>

 <div id="contain">
<style type="text/css">
  
  table a{color:blue;}
  .page{width:70%;margin:auto;}
  table{width:100%;}
  .imgi{width:100%;}
  </style>
  <img src="img/lead.png" class=imgi>
  
    <?php
require 'connect.inc.php';

$query="SELECT * from user_in order by score desc;";
$result=mysql_query($query);
$num=mysql_num_rows($result);

if($result) 
  {
    echo "<table class=\"mdl-data-table mdl-js-data-table mdl-shadow--2dp\">
        <thead>
          <tr>
              <th class=\"mdl-data-table__cell--non-numeric\">RANK</th>
              <th class=\"mdl-data-table__cell--non-numeric\">USER</th>
              <th class=\"mdl-data-table__cell--non-numeric\">SCORE</th>
            </tr>
          </thead>
          <tbody>";
      $scr1=0;$rank=0;
    for($i=0;$i<$num;$i++)
    { $unm=mysql_result($result,$i,'username');
      $scr=mysql_result($result,$i,'score');
      $rank=($scr==$scr1)?$rank:$rank+1;
      echo "<tr>";
      echo "<td class=\"mdl-data-table__cell--non-numeric \">".$rank."</td>";
      echo "<td class=\"mdl-data-table__cell--non-numeric\"><a href=\"userprof.php?q=".$unm."\">".$unm."</a></td>";
      echo "<td class=\"mdl-data-table__cell--non-numeric\">".$scr."</td>";      
      echo "</tr>";
      $scr1=$scr;
    }
  echo "</tbody>
    </table>";
  }
?>
<br><br><br>


 </div>

</body>
 </html>
