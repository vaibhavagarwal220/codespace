
<?php
require 'connect.inc.php'; 
if(isset($_POST['sterm'])){
	$sterm=mysql_real_escape_string(htmlentities($_POST['sterm']));
	if(!empty($sterm) && (strlen($sterm)>=3))
	{
	$query1=mysql_query("SELECT * FROM questions where (qid LIKE '%$sterm%')||(qname LIKE '%$sterm%')");
	$rows1=mysql_num_rows($query1);
	//$suffix=($rows1!=1)?'s':'';
	strlen($sterm);
	//echo "<br> $rows1 result$suffix <br>";

	if($rows1!=0){
		echo "<div class=\"mdl-grid\">";

	for($j=0;$j<$rows1;$j++){
	$imln1=mysql_result($query1,$j,'qid');
	$fname1=mysql_result($query1,$j,'qname');


	echo "<div class=\"mdl-cell mdl-cell--4-col\"><a href=problem.php?q=$imln1> $fname1</a></div>";
	}
	echo "</div>";
}
	else{echo "No problem found";}

	}
	else{echo "Enter atleast 3 Characters";}
}
?>

