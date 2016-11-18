

<?php
require 'core.inc.php';
require 'connect.inc.php';
if(!loggedin()) {header('Location:index.php');}

if(isset($_GET['q']))
  $quid=$_GET['q'];
else
  header('Location:practice.php');
?>
 <html>
 <head>
   
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Practice Arena</title>

  <style type="text/css">
  .nt{margin-top:40px;}
  a.sub{color:blue;}
  table a{color:blue;}
  .page{width:90%;margin:auto;}
img.pport{display:inline;}
  .mycard{background:white;margin-bottom:10px;padding:20px;color:#424242;text-align:center;}
h2.name,h5{display:inline;}
  </style>
</head>
<body>
<?php
include 'navbar.php'
 ?>

<div class=page>
    <?php
require 'connect.inc.php';
$query="SELECT * from submissions where id='".$quid."'";
$result=@mysql_query($query);
if($result); 
	{
			$qid=@mysql_result($result,0,'qid');
			$userid=@mysql_result($result,0,'user_id');
      $codeln=@mysql_result($result,0,'subln');
      $stat=@mysql_result($result,0,'result');
      $tme=@mysql_result($result,0,'time');

      $query1="SELECT * from user_in where id=".$userid;
      $result1=@mysql_query($query1);
      $num=@mysql_num_rows($result1);
      $unm=@mysql_result($result1,0,'username');

      $query2="SELECT * from keptin where qid='".$qid."'";
      $result2=@mysql_query($query2);
      $num1=@mysql_num_rows($result2);

        if($num==0) 
        {
          echo "<div class=mycard><h1>404</h1><h3>No such Submission</h3></div>";
        }

      else if($num1==0) 
        {
          echo "<a href=userprof.php?q=".$unm." class=sub>".$unm."</a> >> <a href=problem.php?q=".$qid.">".$qid." >></a> ".$quid."<br><br>

        <div class=mycard>CodeSpace submission $quid. Status: $stat, problem $qid. By $unm , $tme.</div><pre class=line-numbers><code class=\"language-cpp\">";
          $inread=file($codeln);
          foreach($inread as $line)
          echo htmlspecialchars($line."");
    	    echo "</code></pre>";
        }
      else 
        {
          echo "<div class=mycard><h1>403</h1><h3>Access Denied ! You don't have permissions to this page</h3></div>";
        } 
   }
?>
  
</div>

</body>
 </html>
