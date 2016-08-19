
<?php
require 'connect.inc.php';
require 'core.inc.php';
if(!loggedin()) {header('Location:index1.php');}
$uid=getfield('id');
if(isset($_POST['un'])&&isset($_POST['un']))
  {$username=$_POST['un'];
   $con=$_POST['con'];
   $query="SELECT  `id` FROM `promine`.`user_in` WHERE `username`= '$username';";
   $res=@mysql_query($query);
   $rows=@mysql_num_rows($res);
   $ud=@mysql_result($res,0,'id');
  if(!empty($username)&&!empty($con)){
    $query1="INSERT INTO `promine`.`$uid` (`id`, `msgto`, `type`, `time`, `content`) VALUES (NULL, '$ud', 'sent', CURRENT_TIMESTAMP, '$con');";
    $query2="INSERT INTO `promine`.`$ud` (`id`, `msgto`, `type`, `time`, `content`) VALUES (NULL, '$uid', 'rec', CURRENT_TIMESTAMP, '$con');";
    $res1=@mysql_query($query1);
    $res2=@mysql_query($query2);

      if($res1 && $res2) echo '<div class=nt>Sent</div>';
      else {echo '<div class=nt>Loading...</div>';}
  }}

?>