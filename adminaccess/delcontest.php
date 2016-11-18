<?php
$querycon="INSERT INTO `oj`.`contests` (`id`, `cid`, `name`, `stime`, `etime`, `sdate`, `edate`) VALUES 
(NULL, 'frst', 'First by CodeSPACE', CURRENT_TIME(), '12:50:40', CURRENT_DATE(), '2016-11-20')";
?>

<?php
require 'core.inc.php';
require 'connect.inc.php';
if(!loggedin()) {header('Location:index.php');}


?>
<!--sign up -->





<!DOCTYPE html>
<html lang="en">
<head>
  <title>CodeSpace|Contest Adder</title>
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
  </style>

</head>
<body>


  
<?php
include 'navbar.php'
 ?>
  <style type="text/css">
  #contain{width:100%;margin:auto;}
    #delbtn{background-color:#e53935;}
        .mycard{width:50%;margin:auto;}
  </style>
 <div id="contain">



                    <!-- Colored FAB button with ripple -->
<a class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored" href=index.php id="pos">
  <i class="material-icons" title=Back to Dashboard>fast_rewind</i>
</a><br><br>
<div class=mycard>
<h2>Contest Deletion</h2>
<?php

if(isset($_POST['cc']))/*to check that user has submitted the signup form*/
    { //getting values from fields using post method
      $cc=$_POST['cc'];
      if(!empty($cc))/*to see the values are not empty*/
        {
          
              $query1="SELECT `cid` from `oj`.`contests` where `cid`='".$cc."';";/*query to check username already exists*/
              $reslt=mysql_query($query1);/*running the query*/
              if(mysql_num_rows($reslt)==0)/*checking that same username exists*/
              {
                echo "<div class=error>Contest Does'nt Exist&nbsp;&nbsp;&nbsp;&nbsp;<a class=close align=right href=#>&#215;</a></div>";//producing error if same username exists 
              }
              else
              {
               
                    $query="DELETE FROM `contests` WHERE `cid`='$cc';";
                    //query to upload our data on server database
                    

                    
                    if(mysql_query($query))//run the query
                    {

                  
                      echo "<div class=success>Your Contest has been Deleted successfully&nbsp;&nbsp;&nbsp;&nbsp;<a class=close align=right href=#>&#215;</a></div>";/*giving notification about successful creation of account*/
                       
                    }
              
              //display error about image
            }
        

      }
      else echo "<div class=error>Please fill in all the fields&nbsp;&nbsp;&nbsp;&nbsp;<a class=close align=right href=#>&#215;</a></div>";//display error about empty fields

    }
?>

                <form method="post" action=delcontest.php>
                    

          <br><div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample3" name="cc" maxlength="30" value="<?php if(isset($cc)) echo $cc;?>" >
    <label class="mdl-textfield__label" for="sample3">Contest Code</label>
  </div>


<br>
<br>  <br>

<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" id="delbtn">
  DELETE CONTEST
</button>
              </form>
<br><br>

 </div>
</div>
</div>
  </main>
</div>




</body>
</html>



