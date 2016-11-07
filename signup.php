<?php
require 'connect.inc.php';
require 'core.inc.php';
if(isset($_POST['eml'])&&isset($_POST['phn'])&&isset($_POST['uname1'])&&isset($_POST['pword1'])&&isset($_POST['pword11'])&&isset($_POST['namef1'])&&isset($_POST['namel1'])&&isset($_FILES['proim']['name']))/*to check that user has submitted the signup form*/
    {$usern1=$_POST['uname1'];//getting values from fields using post method
      $passw=$_POST['pword1'];
      $fname=$_POST['namef1'];
      $lname=$_POST['namel1'];
      $eml=$_POST['eml'];
      $phn=$_POST['phn'];
      $tomatch=$_POST['pword11'];
      $impronm=$_FILES['proim']['name'];//getting file name
      $improtmp=$_FILES['proim']['tmp_name'];//getting its temporary location
      $hashed=md5($passw);
      
      if(!empty($usern1) && !empty($passw)&& !empty($fname) && !empty($lname)&&!empty($impronm) && !empty($eml) && !empty($phn))/*to see the values are not empty*/
        {
          if($tomatch==$passw)/*matching password and re-enter password*/
            {
              $query1="SELECT username from user_in where username='$usern1';";/*query to check username already exists*/
              $reslt=mysql_query($query1);/*running the query*/
              if(mysql_num_rows($reslt)==1)/*checking that same username exists*/
              {
                echo "<div class=\"\">Username already Exists</div>";//producing error if same username exists 
              }
              else
              {$location='imgprof/'.$impronm;
                echo $location;
                echo $improtmp;/*moving the profile picture onto our server*/
                if(move_uploaded_file($improtmp,$location))
                {
                    $query="INSERT INTO `oj`.`user_in` (`id`, `fname`, `srname`, `pword`, `username`, `email`, `phone`, `score`,`imgln`) VALUES (NULL,'".mysql_real_escape_string($fname)."','".mysql_real_escape_string($lname)."','".mysql_real_escape_string($hashed)."','".mysql_real_escape_string($usern1)."','".mysql_real_escape_string($eml)."','".mysql_real_escape_string($phn)."','1000','".mysql_real_escape_string($location)."');";//query to upload our data on server database
                    if($result=mysql_query($query))//run the query
                    {
                      echo "<div class=\"\">Your account has been created successfully</div>";/*giving notification about successful creation of account*/
                       $query="SELECT id from user_in where username='".mysql_real_escape_string($usern1)."' AND pword='".mysql_real_escape_string($hashed)."';";//finding the id of newly made account
                        $result=mysql_query($query);//run the query

                        $us_id=mysql_result($result,0,'id');
                          //getting the user id
                        //$t=time(); 
                        //$query1="CREATE TABLE `oj`.`$us_id` ( `id` INT NOT NULL AUTO_INCREMENT ,  `msgto` INT NOT NULL ,  `type` VARCHAR(10) NOT NULL ,  `time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,  `content` VARCHAR(1000) NOT NULL ,    PRIMARY KEY  (`id`)) ENGINE = InnoDB";
                          //if(!mysql_query($query1)) echo 'error';
          
                $_SESSION['user_id']=$us_id;//starting the session for the user
                      header('Location: index.php');
                    }
              }
              else {echo "<div class=\"\">error uploading image</div>";}//display error about image
            }
            }
        else
        {
        echo "<div class=\"\">Passwords do not match</div>";//display error about password
        }

      }
      else echo "<div class=\"\">Please fill in all the fields</div>";//display error about empty fields

    }
?>





<!DOCTYPE html>
<html lang="en">
<head>
  <title>CodeSpace</title>
  <link rel="shortcut icon" href="" type="image/x-icon" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.2.0/material.indigo-pink.min.css">
<script defer src="https://code.getmdl.io/1.2.0/material.min.js"></script>
  
  <script src="js/jquery.min.js"></script>
  
  <link rel="stylesheet" href="css/deslog1.css" type="text/css">
  <style> 
body {
    text-align: center;
      }

  #file { display: none;}
  </style>
</head>
<body>

  <style>
.demo-layout-transparent {
  background: #5890FF center / cover;
}
.demo-layout-transparent .mdl-layout__header,
.demo-layout-transparent .mdl-layout__drawer-button {
  /* This background is dark, so we set text to white. Use 87% black instead if
     your background is light. */
  color: white;
}
#logups{background:white;box-shadow: 1px 1px 5px 1px;width:30%;margin-left:auto;margin-right:auto;margin-top:50px;margin-bottom:50px; }
</style>

<div class="demo-layout-transparent mdl-layout mdl-js-layout">
  <header class="mdl-layout__header mdl-layout__header--transparent">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title">CodeSpace</span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation -->
    <!--<nav class="mdl-navigation">
        <a class="mdl-navigation__link" href="">Link</a>
        <a class="mdl-navigation__link" href="">Link</a>
        <a class="mdl-navigation__link" href="">Link</a>
        <a class="mdl-navigation__link" href="">Link</a>
      </nav>-->
    </div>
  </header>
  <!--
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title">Title</span>
    <nav class="mdl-navigation">
      <a class="mdl-navigation__link" href="">Link</a>
      <a class="mdl-navigation__link" href="">Link</a>
      <a class="mdl-navigation__link" href="">Link</a>
      <a class="mdl-navigation__link" href="">Link</a>
    </nav>
  </div>-->
  <main class="mdl-layout__content">
    
<div id="logups">
  <br>
  <h4>SIGN UP</h4>
<br>
<form method="post" action="signup.php" enctype="multipart/form-data">
                    <br><br>
                      <input type="file" id="file" accept='image/*' name="proim" >
<label for="file" class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored">
  <i class="material-icons">person_outline</i>
</label>

                    <div id="ustatus"> </div> <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type ="text" name="uname1" maxlength="40" value="<?php if(isset($usern1)) echo $usern1;?>" id="nameuser">
    <label class="mdl-textfield__label" for="nameuser">Username:
  </div></label>
    
    <br><br>

  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="password" type="password" name="pword1" id="p1">
    <label class="mdl-textfield__label" for="p1">Password:</label>
  </div>

<br><br>

  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="password" name="pword11" id="p2">
    <label class="mdl-textfield__label" for="p2">Retype Password:</label>
  </div>
<br><br>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type ="text" name="namef1" maxlength="30" value="<?php if(isset($fname)) echo $fname;?>" id="fnm">
    <label class="mdl-textfield__label" for="fnm">First Name:</label>
  </div>
  <br><br>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type ="text" name="namel1" maxlength="30" value="<?php if(isset($lname)) echo $lname;?>" id="lnm">
    <label class="mdl-textfield__label" for="lnm">Last Name:</label>
  </div>
  <br><br>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type ="email" name="eml" maxlength="30" value="<?php if(isset($eml)) echo $eml;?>" id="em">
    <label class="mdl-textfield__label" for="lnm">Email:</label>
  </div>
<br><br>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="phn" maxlength="30" value="<?php if(isset($phn)) echo $phn;?>" id="ph">
    <label class="mdl-textfield__label" for="ph">Phone</label>
    <span class="mdl-textfield__error">Input is not a number!</span>
  </div>
  <br><br>
  <input type="submit" value="Create Account" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
  <br><br><br><br>

              </form>
</div>

  </main>
</div>

    <script type="text/javascript" src=js/check.js></script>

</body>
</html>
