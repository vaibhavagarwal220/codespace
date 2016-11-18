<?php
require 'core.inc.php';
require 'connect.inc.php';
if(!loggedin()) {header('Location:index.php');}
if(isset($_GET['q'])&&!empty($_GET['q'])) $cc=$_GET['q'];
?>
 <html>
 <head>
   
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Leaderboard</title>
  <style type="text/css">
  #contain{width:90%;margin:auto;}
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
  .imgi{width:100%;height:300px;}
  </style>
  <img src="images/lead.png" class=imgi>
  
    <?php
require 'connect.inc.php';

if(isset($cc)&&!empty($cc)&&cexists($cc))
{
      $query="SELECT * FROM `cboard` where cid='$cc' order by score DESC;";
      $query1="SELECT * FROM `questions` where cid='$cc';";
      $result1=mysql_query($query1);
      $num1=mysql_num_rows($result1);
      $result=mysql_query($query);
      $num=mysql_num_rows($result);

      if($result&&$num) 
        {
          echo "<table class=\"mdl-data-table mdl-js-data-table mdl-shadow--2dp\">
              <thead>
                <tr>
                    <th class=\"mdl-data-table__cell--non-numeric\">RANK</th>
                    <th class=\"mdl-data-table__cell--non-numeric\">USER</th>
                    "; 
                    for($j=0;$j<$num1;$j++)
                            {
                             $qid=mysql_result($result1,$j,'qid');
                             echo "<th class=\"mdl-data-table__cell--non-numeric\">$qid</th>";                              
                            }
                    echo "<th class=\"mdl-data-table__cell--non-numeric\">SCORE</th>
                  </tr>
                </thead>
                <tbody>";
            $scr1=0;$rank=0;
          for($i=0;$i<$num;$i++)
          { $ui=mysql_result($result,$i,'uid');
            $scr=mysql_result($result,$i,'score');
            $query2="SELECT username FROM `user_in` where id=$ui;";
            $result2=mysql_query($query2);
            $unm=mysql_result($result2,0,'username');

            $rank=($scr==$scr1)?$rank:$rank+1;
            echo "<tr>";
            echo "<td class=\"mdl-data-table__cell--non-numeric \">".$rank."</td>";
            echo "<td class=\"mdl-data-table__cell--non-numeric\"><a href=\"userprof.php?q=".$unm."\">".$unm."</a></td>";
                                for($j=0;$j<$num1;$j++)
                            {
                             $qid=mysql_result($result1,$j,'qid');
                              $querys="SELECT DISTINCT id FROM `submissions` where qid='$qid' AND user_id='$ui' AND result='AC';";
                              $results=mysql_query($querys);
                              $nums=mysql_num_rows($results);
                              $queryt="SELECT DISTINCT id FROM `submissions` where qid='$qid' AND user_id='$ui';";
                              $resultt=mysql_query($queryt);
                              $numt=mysql_num_rows($resultt);
                              $queryce="SELECT DISTINCT id FROM `submissions` where qid='$qid' AND user_id='$ui' AND result='CE';";
                              $resultce=mysql_query($queryce);
                              $numce=mysql_num_rows($resultce);
                              $numw=$numt-$numce-$nums;

                              if($numt==0)echo "<td class=\"mdl-data-table__cell--non-numeric\">-</td>";
                              else if($nums>0&&$numw==0) echo "<td class=\"mdl-data-table__cell--non-numeric\">100<div class=green>(0)</div></td>";
                              else if($nums>0&&$numw>0) echo "<td class=\"mdl-data-table__cell--non-numeric\">100<div class=red>($numw)</div></td>";
                              else echo "<td class=\"mdl-data-table__cell--non-numeric\">0<div class=red>($numw)</div></td>";                                                      
                            }
            echo "<td class=\"mdl-data-table__cell--non-numeric\">".$scr."</td>";      
            echo "</tr>";
            $scr1=$scr;
          }
        echo "</tbody>
          </table>";
        }
}

else{
      $query="SELECT * from user_in order by score desc;";
      $result=mysql_query($query);
      $num=mysql_num_rows($result);

      if($result&&$num) 
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

}
?>

<br><br><br>


 </div>

</body>
 </html>
