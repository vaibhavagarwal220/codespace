
<?php
require 'connect.inc.php'; 
if(isset($_POST['sterm'])){
	$sterm=mysql_real_escape_string(htmlentities($_POST['sterm']));
	if(!empty($sterm) && (strlen($sterm)>=3))
	{
	$query=mysql_query("SELECT * FROM user_in where (username LIKE '%$sterm%')||(fname LIKE '%$sterm%')||(srname LIKE '%$sterm%')||(concat(concat(fname,' '),srname) LIKE '%$sterm%')");
	$rows=mysql_num_rows($query);
	//$suffix=($rows!=1)?'s':'';
	//echo "<br> $rows result$suffix<br>";
	if($rows!=0){
	echo "<div class=\"mdl-grid\">";

	
	for($i=0;$i<$rows;$i++){
	$imln=mysql_result($query,$i,'imgln');
	$fname=mysql_result($query,$i,'fname');
	$srname=mysql_result($query,$i,'srname');
	$username=mysql_result($query,$i,'username');
	$scr=mysql_result($query,$i,'score');

	echo "<div class=\"mdl-cell mdl-cell--4-col\"><img src=$imln class=icn><br><br><a href=userprof.php?q=$username>$fname $srname <br><br> $username</a></div>";
	}
	echo "</div>";
}
else{echo "<div class=searche>No Users found</div>";}



	}
	else{echo "<div class=searche>Enter atleast 3 characters</div>";}
}
?>

