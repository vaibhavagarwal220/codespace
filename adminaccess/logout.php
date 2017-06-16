<?php
require 'core.inc.php';
require 'connect.inc.php';
setcookie('usid',$us_id,$t-60*60*24*365);
unset($_SESSION['u_id']);
header('Location:index.php');
$unm=getfield('username');
$query="DELETE FROM `online` WHERE username='$unm'";
$res=mysql_query($query);
?>
