<?php


session_start();
$current_file=$_SERVER['SCRIPT_NAME'];
if(isset($_SERVER['HTTP_REFERER'])&&!empty($_SERVER['HTTP_REFERER']))
{
  $page=$_SERVER['HTTP_REFERER'];
}
function loggedin()
{
  if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))
    return true;
  else
    return false;
}
//function onln($uname)
//{
  //$query="SELECT COUNT(*) from online where username='$uname'";
  //$res=mysql_query($query);
  //$rows=mysql_result($res,0,'COUNT(*)');
  //if ($rows==0) return false;
 // else if($rows==1) return true;
//}
function getfield($field)
{
  $query="SELECT $field from user_in where id='".@$_SESSION['user_id']."';";
if($query_res=@mysql_query($query))
  {if($fieldres=@mysql_result($query_res,0,$field))
    {
    return $fieldres;
    }
  }
}

function cexists($cont)
{
  $query="SELECT * from contests where cid='".$cont."';";
$query_res=@mysql_query($query);
  if(@mysql_num_rows($query_res))
    {
    return true;
    }
    else 
      return false;
  
}

function retip()
{
  if(@$ipc=$_SERVER['HTTP_CLIENT_IP']||
  @$ipf=$_SERVER['HTTP_X_FORWARDED_FOR']||
  @$ipr=$_SERVER['REMOTE_ADDR']){
if(!empty($ipc)) return $ipc;
else if(!empty($ipf)) return $ipf;
else return $ipr;
}}

function getcontests($queryqw)
{

$resultqw=@mysql_query($queryqw);

$numqw=@mysql_num_rows($resultqw);

$query1="SELECT NOW();";
$result1=mysql_query($query1);

if($resultqw&&$numqw) 
  {
    echo "<table class=\"mdl-data-table mdl-js-data-table mdl-shadow--2dp\">
        <thead>
          <tr>
              <th class=\"mdl-data-table__cell--non-numeric\">Contest Name</th>
              
              <th class=\"mdl-data-table__cell--non-numeric\">Start Time</th>
              <th class=\"mdl-data-table__cell--non-numeric\">End Time</th>
              <th class=\"mdl-data-table__cell--non-numeric\">Status</th>
            </tr>
          </thead>
          <tbody>";
    
    for($i=0;$i<$numqw;$i++)
    { $nm=@mysql_result($resultqw,$i,'name');
      $cid=@mysql_result($resultqw,$i,'cid');
      $st=@mysql_result($resultqw,$i,'stime');
      $sd=@mysql_result($resultqw,$i,'sdate');
      $et=@mysql_result($resultqw,$i,'etime');
      $ed=@mysql_result($resultqw,$i,'edate');
      $status="Ended";

       $sstamp=$sd.' '.$st;
      $estamp=$ed.' '.$et;
      $nstamp=mysql_result($result1,0);
 




      $query21="SELECT TIMESTAMPDIFF(MINUTE,'".$nstamp."','".$estamp."')%60";
      $result21=mysql_query($query21);
      $min1=mysql_result($result21,0);

      $query31="SELECT TIMESTAMPDIFF(DAY,'".$nstamp."','".$estamp."')";
      $result31=mysql_query($query31);
      $day1=mysql_result($result31,0);

      $query41="SELECT TIMESTAMPDIFF(HOUR,'".$nstamp."','".$estamp."')%24";
      $result41=mysql_query($query41);
      $hour1=mysql_result($result41,0);

      $query51="SELECT TIMESTAMPDIFF(SECOND,'".$nstamp."','".$estamp."')%60";
      $result51=mysql_query($query51);
      $sec1=mysql_result($result51,0);

                  if($day1>0||$min1>0||$hour1>0||$sec1>0)
                        $status="Running";


      $query2="SELECT TIMESTAMPDIFF(MINUTE,'".$nstamp."','".$sstamp."')%60";
      $result2=mysql_query($query2);
      $min=mysql_result($result2,0);

      $query3="SELECT TIMESTAMPDIFF(DAY,'".$nstamp."','".$sstamp."')";
      $result3=mysql_query($query3);
      $day=mysql_result($result3,0);

      $query4="SELECT TIMESTAMPDIFF(HOUR,'".$nstamp."','".$sstamp."')%24";
      $result4=mysql_query($query4);
      $hour=mysql_result($result4,0);

      $query5="SELECT TIMESTAMPDIFF(SECOND,'".$nstamp."','".$sstamp."')%60";
      $result5=mysql_query($query5);
      $sec=mysql_result($result5,0);
                      if($day>0||$min>0||$hour>0||$sec>0)
                        $status="Future<br>Contest";



      echo "<tr>";
      echo "<td class=\"mdl-data-table__cell--non-numeric \"><a href=\"contest.php?q=".$cid."\">".$nm."</a></td>";
      echo "<td class=\"mdl-data-table__cell--non-numeric\">".$sd."<br>".$st."</td>";
      echo "<td class=\"mdl-data-table__cell--non-numeric\">".$ed."<br>".$et."</td>";
      echo "<td class=\"mdl-data-table__cell--non-numeric\">".$status."</td>";


      echo "</tr>";
    }
  echo "</tbody>
    </table>";
  }
  else {echo "<h1>No problems uploaded Yet</h1>";}



  
 
}


 ?>
<?php
function prirecsub()
{
echo "<div class=\"mdl-cell mdl-cell--3-col posrec\">";
echo "<h5>Recent submissions</h5>";

$query="SELECT id,qid,user_id,result from submissions order by time desc limit 10 ";

$result=mysql_query($query);

$num=mysql_num_rows($result);
if($result&&$num) 
  {
    
    


    echo "<table class=\"mdl-data-table mdl-js-data-table mdl-shadow--2dp\">
        <thead>
          <tr>
              <th class=\"mdl-data-table__cell--non-numeric\"><i class=\"material-icons\" title=\"Submission ID\">list</i></th>
              <th class=\"mdl-data-table__cell--non-numeric\"><i class=\"material-icons\" title=\"Problem Code\">credit_card</i></th>
              <th class=\"mdl-data-table__cell--non-numeric\"><i class=\"material-icons\" title=\"Result\">&#xE890;</i></th>
              <th class=\"mdl-data-table__cell--non-numeric\"><i class=\"material-icons\" title=Username>account_circle</i></th>
            </tr>
          </thead>
          <tbody>";
          if($num==0) echo "<tr><td></td><td>No submissions</td><td></td><td></td></tr>";
    for($i=0;$i<$num;$i++)
    { $quid=mysql_result($result,$i,'id');
      $qid=mysql_result($result,$i,'qid');
      $res=mysql_result($result,$i,'result');
      $uid=mysql_result($result,$i,'user_id');

      $query2="SELECT username from user_in where id=".$uid;
      $result2=mysql_query($query2);
      $uname=mysql_result($result2,0,'username');
      

      echo "<tr>";
      echo "<td class=\"mdl-data-table__cell--non-numeric\">".$quid."</td>";
      echo "<td class=\"mdl-data-table__cell--non-numeric\"><a href=\"showcode.php?q=".$quid."\">".$qid."</a></td>";
      if ($res=="AC") echo "<td class=\"mdl-data-table__cell--non-numeric\"><i class=material-icons  title=\"AC\">done</i></td>";
      else if ($res=="WA") echo "<td class=\"mdl-data-table__cell--non-numeric\"><i class=material-icons  title=\"WA\">highlight_off</i></td>";
      else if ($res=="RE") echo "<td class=\"mdl-data-table__cell--non-numeric\"><i class=material-icons title=\"RE\">error_outline</i></td>";
      else if ($res=="TLE") echo "<td class=\"mdl-data-table__cell--non-numeric\"><i class=material-icons title=\"TLE\">alarm</i></td>";
      else if ($res=="CE") echo "<td class=\"mdl-data-table__cell--non-numeric\"><i class=material-icons title=\"CE\">warning</i></td>";
      echo "<td class=\"mdl-data-table__cell--non-numeric\"><a href=\"userprof.php?q=".$uname."\">".$uname."</a></td>";      
      echo "</tr>";
    }
  echo "</tbody>
    </table>";
  }
  else echo "<h5>No submissions</h5>";

echo "</div>";

}
?>