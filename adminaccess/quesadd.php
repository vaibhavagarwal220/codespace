<?php
require 'core.inc.php';
require 'connect.inc.php';
if(!loggedin()) {header('Location:index.php');}

if(isset($_GET['q']))
  $qc=$_GET['q'];

?>
<!--sign up -->






<!DOCTYPE html>
<html lang="en">
<head>
  <title>CodeSpace|Problem Adder</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.2.0/material.indigo-blue.min.css">
<script defer src="https://code.getmdl.io/1.2.0/material.min.js"></script>
  <script src="js/jquery.min.js"></script>

  <style type="text/css">
  body,input{text-align:center;}
    .mdl-textfield{width:100%;}
    #pos{position:absolute;left:50px;top:50px;}
    .mycard{width:50%;margin:auto;}


  </style>

</head>
<body>

  <style type="text/css">
  #contain{width:100%;margin:auto;}
  </style>
  
<?php
include 'navbar.php'
 ?>

 <div id="contain">


                    <!-- Colored FAB button with ripple -->
<a class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored" href=index.php id="pos">
  <i class="material-icons" title=Back to Dashboard>fast_rewind</i>
</a><br><br><br>
<div class="mycard"><h2>Problem Adder</h2>
<?php

if(isset($_POST['qcode'])&&isset($_POST['qname'])&&isset($_FILES['inp']['name'])&&isset($_FILES['outp']['name'])&&isset($_FILES['ques']['name'])&&isset($_POST['tl']))/*to check that user has submitted the signup form*/
    { //getting values from fields using post method
      $qcode=$_POST['qcode'];
      $qnm=$_POST['qname'];
      $tl=$_POST['tl'];
      $tester=$_POST['pbte'];
      $edit=$_POST['editorial']; 
      $author=$_POST['pbau'];
      $in=$_FILES['inp']['name'];//getting file name
      $int=$_FILES['inp']['tmp_name'];//getting its temporary location
      $out=$_FILES['outp']['name'];//getting file name
      $outt=$_FILES['outp']['tmp_name'];//getting its temporary location
      $ques=$_FILES['ques']['name'];//getting file name
      $quest=$_FILES['ques']['tmp_name'];//getting its temporary location
      

      if(!empty($qcode)&&!empty($in)&&!empty($out)&&!empty($ques)&&!empty($tl)&&!empty($qnm))/*to see the values are not empty*/
        {
          
              $query1="SELECT `qid` from `oj`.`questions` where `qid`='".$qcode."';";/*query to check username already exists*/
              $reslt=mysql_query($query1);/*running the query*/
              if(mysql_num_rows($reslt)!=0)/*checking that same username exists*/
              {
                echo "<div class=error>Question Code Already Exists&nbsp;&nbsp;&nbsp;&nbsp;<a class=close align=right href=#>&#215;</a></div>";//producing error if same username exists 
              }
              else
              {$locin='input/'.$in;
            $locout='output/'.$out;
            $locqu='questions/'.$ques;
               /*moving the profile picture onto our server*/
                if(move_uploaded_file($int,$locin)&&move_uploaded_file($outt,$locout)&&move_uploaded_file($quest,$locqu))
                {
                    $locin="adminaccess/".$locin;
                    $locout="adminaccess/".$locout;
                    $locqu="adminaccess/".$locqu;
                    if(isset($qc)&&!empty($qc)) $query="INSERT INTO `oj`.`questions` (`qid`,`qname`, `inpln`, `outln`, `qln`, `tl`,`cid`) VALUES ('".mysql_real_escape_string($qcode)."',
                      '".mysql_real_escape_string($qnm)."','".mysql_real_escape_string($locin)."','".mysql_real_escape_string($locout)."',
                      '".mysql_real_escape_string($locqu)."',".mysql_real_escape_string($tl).",'".mysql_real_escape_string($qc)."');";
                    //query to upload our data on server database
                    else $query="INSERT INTO `oj`.`questions` (`qid`,`qname`, `inpln`, `outln`, `qln`, `tl`) VALUES ('".mysql_real_escape_string($qcode)."',
                      '".mysql_real_escape_string($qnm)."','".mysql_real_escape_string($locin)."','".mysql_real_escape_string($locout)."',
                      '".mysql_real_escape_string($locqu)."',".mysql_real_escape_string($tl).");";
                    
                    
                    if(mysql_query($query))//run the query
                    {

                        if(isset($qc)&&!empty($qc)) 
                          {
                            $qury="INSERT INTO `oj`.`keptin` (`id`, `cid`, `score`, `qid`) VALUES (NULL, '$qc', 100, '$qcode');";
                            if(@mysql_query($qury))
                              echo "<div class=success>Your question has been added successfully&nbsp;&nbsp;&nbsp;&nbsp;<a class=close align=right href=#>&#215;</a></div>";
                            else {echo "<div class=error>Error Adding Question To Contest &nbsp;&nbsp;&nbsp;&nbsp;<a class=close align=right href=#>&#215;</a></div>";}  
                          }
                        
                      else echo "<div class=success>Your question has been added successfully&nbsp;&nbsp;&nbsp;&nbsp;<a class=close align=right href=#>&#215;</a></div>";/*giving notification about successful creation of account*/
                       
                    }
                    else {echo "<div class=error>Error Adding Question to Database &nbsp;&nbsp;&nbsp;&nbsp;<a class=close align=right href=#>&#215;</a></div>";}
              }
              else {echo "<div class=error>Error Uploading Question&nbsp;&nbsp;&nbsp;&nbsp;<a class=close align=right href=#>&#215;</a></div>";}//display error about image
            }
        

      }
      else echo "<div class=error>Please fill in all the fields&nbsp;&nbsp;&nbsp;&nbsp;<a class=close align=right href=#>&#215;</a></div>";//display error about empty fields

    }
?>
                <form method="post" action=<?php if(isset($qc)&&!empty($qc)) echo "quesadd.php?q=$qc"; else echo "quesadd.php";?> enctype="multipart/form-data">
                    

          <br><div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample3" name="qcode" maxlength="30" value="<?php if(isset($qcode)) echo $qcode;?>" >
    <label class="mdl-textfield__label" for="sample3">Question Code</label>
  </div>


          <br><div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample4" name="qname" maxlength="200" value="<?php if(isset($qnm)) echo $qnm;?>" >
    <label class="mdl-textfield__label" for="sample4">Question Name</label>
  </div>


          <br><div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample5" name="pbau" maxlength="40">
    <label class="mdl-textfield__label" for="sample5">Author</label>
  </div>
          

          <br><div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample6" name="pbte" maxlength="40">
    <label class="mdl-textfield__label" for="sample6">Tester</label>
  </div>


          <br><div class="mdl-textfield mdl-js-textfield">
    <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="sample7" name="tl" maxlength="40">
    <label class="mdl-textfield__label" for="sample7">Time Limit(for TLE)</label>
    <span class="mdl-textfield__error">Enter a Number</span>
  </div>


          <br><div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample3" name="editorial">
    <label class="mdl-textfield__label" for="sample8">Editorial</label>
  </div>

<br>
<br>  <br>Input<br><br><input type="file" id="file" accept='text' name="inp" >
<br>  <br>Output<br><br><input type="file" id="file" accept='text' name="outp" >
<br>  <br>Question<br><br><input type="file" id="file" accept='text' name="ques" >
<br>  <br>

              
  
                
<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit">
  ADD QUESTION
</button>
              </form>
<br><br><br><br>
   </div>



 </div>

</div>
  </main>
</div>




</body>
</html>



<script type="text/javascript">
    $('.close').click(function(){
      $('.error').fadeOut();
      $('.success').fadeOut();
    });
    </script>
