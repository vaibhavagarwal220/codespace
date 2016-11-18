




<!DOCTYPE html>
<html lang="en">
<head>
  <title>CodeSpace</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.2.0/material.indigo-blue.min.css">
<script defer src="https://code.getmdl.io/1.2.0/material.min.js"></script>
  
  <script src="js/jquery.min.js"></script>
  

  <style> 
body {
    text-align: center;
      }

  #file { display: none;}
  </style>
</head>
<body>

  <style>
#logins{background:white;margin-left:auto;margin-right:auto;margin-top:50px;margin-bottom:50px; }
#logups{background:white;margin-left:auto;margin-right:auto;margin-top:50px;margin-bottom:50px; }
.error{background-color:#ff3333;color:white;font-size:20px;padding:15px;}
.error a{font-size:30px;text-decoration:none;color:white;}
.error a:active{font-size:30px;text-decoration:none;color:white;}
.error a:visited{font-size:30px;text-decoration:none;color:white;}
.success{background-color:#2eb82e;color:white;font-size:20px;padding:15px;}

.mdl-grid{margin:auto;}
</style>

<div class="mdl-layout mdl-js-layout">
  <header class="mdl-layout__header mdl-layout__header--scroll">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title">CodeSpace</span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation -->
      
    </div>
  </header>

  <main class="mdl-layout__content">
    <div class="page-content"><!-- Your content goes here -->

<div id="logups" class="mdl-cell mdl-cell--6-col mdl-shadow--6dp">
  <br>
  <h4>SIGN UP</h4>
<br>
<?php
require 'connect.inc.php';
require 'core.inc.php';
if(isset($_POST['eml'])&&isset($_POST['uname1'])&&isset($_POST['pword1'])&&isset($_POST['pword11'])&&isset($_POST['namef1'])&&isset($_POST['namel1'])&&isset($_FILES['proim']['name']))/*to check that user has submitted the signup form*/
    {$usern1=$_POST['uname1'];//getting values from fields using post method
      $passw=$_POST['pword1'];
      $fname=$_POST['namef1'];
      $lname=$_POST['namel1'];
      $eml=$_POST['eml'];

      $tomatch=$_POST['pword11'];
      $impronm=$_FILES['proim']['name'];//getting file name
      $improtmp=$_FILES['proim']['tmp_name'];//getting its temporary location
      $hashed=md5($passw);
      
      if(!empty($usern1) && !empty($passw)&& !empty($fname) && !empty($lname)&&!empty($impronm) && !empty($eml))/*to see the values are not empty*/
        {
          if($tomatch==$passw)/*matching password and re-enter password*/
            {
              $query1="SELECT username from admin where username='$usern1';";/*query to check username already exists*/
              $reslt=@mysql_query($query1);/*running the query*/
              if(@mysql_num_rows($reslt)==1)/*checking that same username exists*/
              {
                echo "<div class=\"error\">Username already Exists&nbsp;&nbsp;&nbsp;&nbsp;<a class=close align=right href=#>&#215;</a></div>";//producing error if same username exists 
              }
              else
              {$location='imgprof/'.$impronm;
                echo $location;
                echo $improtmp;/*moving the profile picture onto our server*/
                if(move_uploaded_file($improtmp,$location))
                {
                    $query="INSERT INTO `oj`.`admin` (`id`, `fname`, `srname`, `pword`, `username`, `email`,`imgln`) VALUES (NULL,'".@mysql_real_escape_string($fname)."','".@mysql_real_escape_string($lname)."','".@mysql_real_escape_string($hashed)."','".@mysql_real_escape_string($usern1)."','".@mysql_real_escape_string($eml)."','".@mysql_real_escape_string($location)."');";//query to upload our data on server database
                    if($result=@mysql_query($query))//run the query
                    {
                      echo "<div class=\"success\">Your account has been created successfully&nbsp;&nbsp;&nbsp;&nbsp;<a class=close align=right href=#>&#215;</a></div>";/*giving notification about successful creation of account*/
                       $query="SELECT id from admin where username='".@mysql_real_escape_string($usern1)."' AND pword='".@mysql_real_escape_string($hashed)."';";//finding the id of newly made account
                        $result=@mysql_query($query);//run the query

                        $us_id=@mysql_result($result,0,'id');
                          //getting the user id
                        //$t=time(); 
                        //$query1="CREATE TABLE `oj`.`$us_id` ( `id` INT NOT NULL AUTO_INCREMENT ,  `msgto` INT NOT NULL ,  `type` VARCHAR(10) NOT NULL ,  `time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,  `content` VARCHAR(1000) NOT NULL ,    PRIMARY KEY  (`id`)) ENGINE = InnoDB";
                          //if(!@mysql_query($query1)) echo 'error';
          
                $_SESSION['u_id']=$us_id;//starting the session for the user
                      header('Location: index.php');
                    }
                    else
                    {
                      echo "<div class=\"error\">Error creating your Account&nbsp;&nbsp;&nbsp;&nbsp;<a class=close align=right href=#>&#215;</a></div>";       
                    }
              }
              else {echo "<div class=\"error\">Error uploading image&nbsp;&nbsp;&nbsp;&nbsp;<a class=close align=right href=#>&#215;</a></div>";}//display error about image
            }
            }
        else
        {
        echo "<div class=\"error\">Passwords do not match&nbsp;&nbsp;&nbsp;&nbsp;<a class=close align=right href=#>&#215;</a></div>";//display error about password
        }

      }
      else echo "<div class=\"error\">Please fill in all the fields&nbsp;&nbsp;&nbsp;&nbsp;<a class=close align=right href=#>&#215;</a></div>";//display error about empty fields

    }
?>


<form method="post" action="signup.php" enctype="multipart/form-data">
                    <br><br>
                      <input type="file" id="file" accept='image/*' name="proim" >
<label for="file" class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored">
  <i class="material-icons">person_outline</i>
</label><br>
Choose Image<br><br>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type ="text" name="uname1" maxlength="40" value="<?php if(isset($usern1)) echo $usern1;?>" id="nameuser">
    <label class="mdl-textfield__label" for="nameuser">Username
  </label></div><div id="ustatus"> </div> 
    
    <br><br>

  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="password" type="password" name="pword1" id="p1">
    <label class="mdl-textfield__label" for="p1">Password</label>
  </div>

<br><br>

  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="password" name="pword11" id="p2">
    <label class="mdl-textfield__label" for="p2">Retype Password</label>
  </div>
<br><br>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type ="text" name="namef1" maxlength="30" value="<?php if(isset($fname)) echo $fname;?>" id="fnm">
    <label class="mdl-textfield__label" for="fnm">First Name</label>
  </div>
  <br><br>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type ="text" name="namel1" maxlength="30" value="<?php if(isset($lname)) echo $lname;?>" id="lnm">
    <label class="mdl-textfield__label" for="lnm">Last Name</label>
  </div>
  <br><br>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type ="email" name="eml" maxlength="30" value="<?php if(isset($eml)) echo $eml;?>" id="em">
    <label class="mdl-textfield__label" for="lnm">Email</label>
  </div>
<br><br>
     <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type=submit>
                SIGN UP
                </button> 
  <br><br><br><br>

              </form>
</div>
</div>
  </main>
</div>

    <script type="text/javascript" src="js/check1.js"></script>
    <script type="text/javascript">
    $('.close').click(function(){
      $('.error').fadeOut();
      $('.success').fadeOut();
    });
    </script>
</body>
</html>
