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
<?php

if(isset($_POST['cc'])&&isset($_POST['cn'])&&isset($_POST['st'])&&isset($_POST['sd'])&&isset($_POST['et'])&&isset($_POST['ed']))/*to check that user has submitted the signup form*/
    { //getting values from fields using post method
      $cc=$_POST['cc'];
      $cn=$_POST['cn'];
      $st=$_POST['st'];
	  $sd=$_POST['sd'];
	  $et=$_POST['et'];
	  $ed=$_POST['ed'];      

      if(!empty($cc)&&!empty($cn)&&!empty($st)&&!empty($sd)&&!empty($et)&&!empty($ed))/*to see the values are not empty*/
        {
          
              $query1="SELECT `cid` from `oj`.`contests` where `cid`='".$cc."';";/*query to check username already exists*/
              $reslt=mysql_query($query1);/*running the query*/
              if(mysql_num_rows($reslt)!=0)/*checking that same username exists*/
              {
                echo "Contest Code Already Exists";//producing error if same username exists 
              }
              else
              {
               
                    $query="INSERT INTO `oj`.`contests` (`cid`,`name`, `stime`, `etime`, `sdate`, `edate`) VALUES ('$cc','$cn','$st','$et','$sd','$ed');";
                    //query to upload our data on server database
                    
						echo $query;
                    
                    if(mysql_query($query))//run the query
                    {

                  
                      echo "Your Contest has been added successfully";/*giving notification about successful creation of account*/
                       
                    }
              
              //display error about image
            }
        

      }
      else echo "Please fill in all the fields";//display error about empty fields

    }
?>





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
</a>
<h2>Contest Adder</h2>
                <form method="post" action=addcontest.php>
                    

          <br><div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample3" name="cc" maxlength="30" value="<?php if(isset($cc)) echo $cc;?>" >
    <label class="mdl-textfield__label" for="sample3">Contest Code</label>
  </div>


          <br><div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample4" name="cn" maxlength="200" value="<?php if(isset($cn)) echo $cn;?>" >
    <label class="mdl-textfield__label" for="sample4">Contest Name</label>
  </div>


          <br><div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample5" name="st">
    <label class="mdl-textfield__label" for="sample5">Start Time(HH:MM:SS)</label>
  </div>
          

          <br><div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample6" name="sd">
    <label class="mdl-textfield__label" for="sample6">Start Date(YYYY-MM-DD)</label>
  </div>


                   <br><div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample7" name="et">
    <label class="mdl-textfield__label" for="sample7">End Time(HH:MM:SS)</label>
  </div>


          <br><div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample8" name="ed">
    <label class="mdl-textfield__label" for="sample8">End Date(YYYY-MM-DD)</label>
  </div>

<br>
<br>  <br>

              
  
                
<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit">
  ADD CONTEST
</button>
              </form>
<br><br><br><br>
    <script type="text/javascript" src=js/check.js></script>




 </div>

</div>
  </main>
</div>




</body>
</html>



