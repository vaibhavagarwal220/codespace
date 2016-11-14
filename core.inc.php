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

if($resultqw&&$numqw) 
  {
    echo "<table class=\"mdl-data-table mdl-js-data-table mdl-shadow--2dp\">
        <thead>
          <tr>
              <th class=\"mdl-data-table__cell--non-numeric\">Contest Name</th>
              
              <th class=\"mdl-data-table__cell--non-numeric\">Start Time</th>
              <th class=\"mdl-data-table__cell--non-numeric\">End Time</th>
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


      echo "<tr>";
      echo "<td class=\"mdl-data-table__cell--non-numeric \"><a href=\"contest.php?q=".$cid."\">".$nm."</a></td>";
      echo "<td class=\"mdl-data-table__cell--non-numeric\">".$sd."<br>".$st."</td>";
      echo "<td class=\"mdl-data-table__cell--non-numeric\">".$ed."<br>".$et."</td>";      
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
echo "<aside>";
echo "<h4>Recent submissions</h4>";

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
  else echo "<h2>No submissions</h2>";

echo "</aside>";

}
?>