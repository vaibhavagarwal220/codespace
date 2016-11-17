<?php


require 'core.inc.php';
require 'connect.inc.php';
$query = "SELECT * from contests where TIMESTAMPDIFF(MINUTE,NOW(),concat(sdate,concat(' ',stime)) )=1 AND noti=0";
$result=mysql_query($query); 

if($result && mysql_num_rows($result))
{
	$cc =mysql_result($result,0,'cid');
	$cn = mysql_result($result,0,'name');

	$url="contest.php?q=$cc";


echo '<script type="text/javascript">
	
	document.addEventListener(\'DOMContentLoaded\', function(){
	if(Notification.permission !== "granted")
		Notification.requestPermission();
});

function notifyMe(){
	if (!Notification) {
		alert("Sorry, The Desktop Notification Cannot Run On This Browser. Try Using Other Browsers.");
		return;
	}
	
	if(Notification.permission !== "granted")
		Notification.requestPermission();
	else {
		var notification = new Notification("Contest Reminder ", {
		icon: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXasOKGnVVU-HgxfiZlTiFMZ_-0lhXS3e2-g0IbfjSgNlzVHPHjA",
			body: "\nContest '.$cn.' is about to Start"
		});
		
		notification.onclick = function() {
			window.open("'.$url.'");
		};
	}
}
</script>' ; 
}
if($result && mysql_num_rows($result))
{
	echo "contest about to start"; 
	echo '<script type="text/javascript"> notifyMe()</script>' ;
	$query1 = "UPDATE contests SET noti=1 where cid='$cc'";
	$result=mysql_query($query1);

}

?>




