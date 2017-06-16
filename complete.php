<?php
require 'core.inc.php';
require 'connect.inc.php';
if(!loggedin()) {header('Location:index.php');}

$id=getfield('id');
$qcode=$_GET['q'];
//$sid=$_GET['id'];


$qry="select count(*) from submissions";
$rslt=mysql_query($qry);
$cnt=mysql_result($rslt,0);
$cnt++;
?>
 <html>
 <head>
   <title>Submit <?php echo $qcode;?></title>
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style type="text/css">
  
  #sample5{height:400px;}
  a{color:white;}
  h6{display:inline;}
  .contain{width:90%;margin: auto;}

  </style>
</head>
<body>
  
 <?php
include 'navbar.php'
 ?>
 <div class=contain>

<?php



if(isset($_POST['ln'])) {
$code=$_POST['ln'];
echo "<h6>Problem Code:".$qcode."</h6>";
if(!empty($code)&&!empty($qcode)){

$lang=$_POST['options'];

if($lang=="C") $my_file = 'adminaccess/codes/'.$qcode.$id.$cnt.".c";
else if($lang=="C++") $my_file = 'adminaccess/codes/'.$qcode.$id.$cnt.".cpp";
$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
fwrite($handle, $code);
          $query="SELECT * FROM `questions` WHERE qid='$qcode'";
          $resultq=mysql_query($query);
          $tltle=mysql_result($resultq,0,'tl');
          $in=mysql_result($resultq,0,'inpln');
          $out=mysql_result($resultq,0,'outln');
          $contid=mysql_result($resultq,0,'cid');
          $termin="./bin/Controller.EXE $lang $tltle $my_file $in $out 2>&1";
          exec("./bin/Controller.EXE $lang $tltle $my_file $in $out 2>&1", $output, $status);
          
          //echo "<br>status: " . $status;
          if($status==0) 
            {
              $res="AC";
              echo "<div class=mycard><img src=images/ac.png><br><h2>All Correct(";
                if($lang=="C") $inread = 'tmp/'.$qcode.$id.$cnt.".c.out.time";
                else if($lang=="C++") $inread = 'tmp/'.$qcode.$id.$cnt.".cpp.out.time";
                $read=file($inread);
                foreach($read as $line)
                       echo $line;

                echo ")</h2></div>";

                if(proincon($qcode)) {
                  $querycnt="SELECT * from submissions where user_id=".$id." and qid='$qcode'";
                                            $resultcnt=mysql_query($querycnt);
                                            $st=mysql_num_rows($resultcnt);

                  $querycnt1="SELECT * from submissions where user_id=".$id." and qid='$qcode' and result='AC'";
                                            $resultcnt1=mysql_query($querycnt1);
                                            $act=mysql_num_rows($resultcnt1);

                  if($act==0) {$queryupd="UPDATE `user_in` set `score`=`score`+100 where id=".$id."";
                                            $resultupd=mysql_query($queryupd);}}

            }
          else if($status==1) {$res="TLE";
                          echo "<div class=mycard><img src=images/tle1.png><br><h2>Time Limit Exceeded($tltle)</h2></div>";

              }
          else if($status==2) {$res="CE";
                          echo "<div class=mycard><img src=images/ce.png><br><h2>Compilation Error</h2>";
                if($lang=="C") $inread = 'tmp/'.$qcode.$id.$cnt.".c.err";
                else if($lang=="C++") $inread = 'tmp/'.$qcode.$id.$cnt.".cpp.err";
                $read=file($inread);
                foreach($read as $line)
                       echo $line."<br>";

                echo "</div>";
        }
          else if($status==3) {$res="RE";
                          echo "<div class=mycard><img src=images/re.png><br><h2>Runtime Error(";
                if($lang=="C") $inread = 'tmp/'.$qcode.$id.$cnt.".c.out.time";
                else if($lang=="C++") $inread = 'tmp/'.$qcode.$id.$cnt.".cpp.out.time";
                $read=file($inread);
                foreach($read as $line)
                       echo $line;

                echo ")</h2></div>";
        }
          else if($status==4) {$res="WA";
                          echo "<div class=mycard><img src=images/wa.png><br><h2>Wrong Answer(";
                if($lang=="C") $inread = 'tmp/'.$qcode.$id.$cnt.".c.out.time";
                else if($lang=="C++") $inread = 'tmp/'.$qcode.$id.$cnt.".cpp.out.time";
                $read=file($inread);
                foreach($read as $line)
                       echo $line;

                echo ")</h2></div>";
        }

			//echo "<br>status: " . $status;
          //echo "<br>output: " . implode("<br>", $output);

          $queryins="INSERT INTO `oj`.`submissions` (`id`, `result`, `qid`, `user_id`, `subln`,`lang`) VALUES (NULL, '".$res."','".$qcode."',".$id.",'".$my_file."','".$lang."');";
          $resultqu=mysql_query($queryins);
          //$queryupd="UPDATE `cboard` set `score`=`score`+100 where uid=".$id." and cid='".$contid."'";
          //$resultupd=mysql_query($queryupd);

          }

          
}



else if(isset($_FILES['file']['name'])&&!empty($_FILES['file']['name']))
{   echo "<h6>Problem Code:".$qcode."</h6>";  
  $name=$_FILES['file']['name'];
    $langu=$_POST['options1'];

    $tmpname=$_FILES['file']['tmp_name'];
    if($langu=="C")$location = 'adminaccess/codes/'.$qcode.$id.$cnt.".c";
    else if($langu=="C++")$location = 'adminaccess/codes/'.$qcode.$id.$cnt.".cpp";

    if(move_uploaded_file($tmpname,$location))
    {
        
          $queryq="SELECT * FROM `questions` WHERE qid='$qcode'";
          $resultqq=mysql_query($queryq);
          $tltleq=mysql_result($resultqq,0,'tl');
          $inq=mysql_result($resultqq,0,'inpln');
          $outq=mysql_result($resultqq,0,'outln');
          $terminq="./bin/Controller.EXE $langu $tltleq $location $inq $outq 2>&1";
          exec("./bin/Controller.EXE $langu $tltleq $location $inq $outq 2>&1", $outputq, $status);
  //        echo "<br>status: " . $statusq;

    if($status==0) 
            {
              $res="AC";
              echo "<div class=mycard><img src=images/ac.png><br><h2>All Correct(";
                if($langu=="C") $inread = 'tmp/'.$qcode.$id.$cnt.".c.out.time";
                else if($langu=="C++") $inread = 'tmp/'.$qcode.$id.$cnt.".cpp.out.time";
                $read=file($inread);
                foreach($read as $line)
                       echo $line;

                echo ")</h2></div>";
                 if(proincon($qcode)) {
                  $querycnt="SELECT * from submissions where user_id=".$id." and qid='$qcode'";
                                            $resultcnt=mysql_query($querycnt);
                                            $st=mysql_num_rows($resultcnt);

                  $querycnt1="SELECT * from submissions where user_id=".$id." and qid='$qcode' and result='AC'";
                                            $resultcnt1=mysql_query($querycnt1);
                                            $act=mysql_num_rows($resultcnt1);

                  if($act==0) {$queryupd="UPDATE `user_in` set `score`=`score`+100 where id=".$id."";
                                            $resultupd=mysql_query($queryupd);}

            }
            }
          else if($status==1) {$res="TLE";
                          echo "<div class=mycard><img src=images/tle2.png><br><h2>Time Limit Exceeded($tltleq)</h2></div>";

              }
          else if($status==2) {$res="CE";
                          echo "<div class=mycard><img src=images/ce.png><br><h2>Compilation Error</h2>";
                if($langu=="C") $inread = 'tmp/'.$qcode.$id.$cnt.".c.err";
                else if($langu=="C++") $inread = 'tmp/'.$qcode.$id.$cnt.".cpp.err";
                $read=file($inread);
                foreach($read as $line)
                       echo $line."<br>";

                echo "</div>";
        }
          else if($status==3) {$res="RE";
                          echo "<div class=mycard><img src=images/re.png><br><h2>Runtime Error(";
                if($langu=="C") $inread = 'tmp/'.$qcode.$id.$cnt.".c.out.time";
                else if($langu=="C++") $inread = 'tmp/'.$qcode.$id.$cnt.".cpp.out.time";
                $read=file($inread);
                foreach($read as $line)
                       echo $line;

                echo ")</h2></div>";
        }
          else if($status==4) {$res="WA";
                          echo "<div class=mycard><img src=images/wa.png><br><h2>Wrong Answer(";
                if($langu=="C") $inread = 'tmp/'.$qcode.$id.$cnt.".c.out.time";
                else if($langu=="C++") $inread = 'tmp/'.$qcode.$id.$cnt.".cpp.out.time";
                $read=file($inread);
                foreach($read as $line)
                       echo $line;

                echo ")</h2></div>";
        }
//                  echo "<br>output: " . implode("<br>", $outputq);
				


          $queryins="INSERT INTO `oj`.`submissions` (`id`, `result`, `qid`, `user_id`, `subln`,`lang`) VALUES (NULL, '".$res."','".$qcode."',".$id.",'".$location."','".$langu."');";
          $resultqu=mysql_query($queryins);
          

    }
    else
    {
        echo 'Problem Uploading';
    }
}

else echo "<div class=mycard><h1>404</h1><h3>Access Denied !</h3></div>"
?>




  </div>

</body>
 </html>
