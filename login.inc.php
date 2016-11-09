




<!DOCTYPE html>
<html lang="en">
<head>
  <title>CodeSpace</title>
  <link rel="shortcut icon" href="" type="image/x-icon" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

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

  <script>
    $(document).ready(function(){
    $('[data-toggle="popover"]').popover(); 
    });
  //alert($(window).height());
  //alert($(window).width());
    var h=$(window).height();
    var w=$(window).width();
    $('.page').height(h);
    $('.page').width(w);
    $('#login').height(h);
    $('#login').width(w); 
  </script>
</head>
<body>

  <style>

#logins{background:white;box-shadow:6px 6px 20px 2px;margin-left:auto;margin-right:auto;margin-top:50px;margin-bottom:50px; }
#logups{background:white;box-shadow: 6px 6px 20px 2px;margin-left:auto;margin-right:auto;margin-top:50px;margin-bottom:50px; }
.mdl-grid{margin:auto;}
img.small1,img.icn{width: 160px;height: 160px;border-radius: 80px;}


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


<div id="logins" class="mdl-cell mdl-cell--6-col">
<form method="post" action="log.php">
                  <br>
                    <h4>LOG IN</h4>

                  <br>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type ="text" name="uname" id="unam" maxlength="40" value="<?php if(isset($usern)) echo $usern;?>">
                    <label class="mdl-textfield__label" for="unam">
                      Username
                    </label>
                  </div>
                <br><br>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input class="mdl-textfield__input" type ="password" name="pword" id="unam3" value="">
                  <label class="mdl-textfield__label" for="unam3">
                    Password
                  </label>
                </div>
                
               <br><br><label>Remember Me<input type="checkbox" id="rmmbr" name=rmmbr class="mdl-switch__input">
                </label>
                <br>
                <br><br>
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type=submit>
                LOG IN
                </button>                 <br><br>
                  </form><br><br>
</div>

<br><br>

<div id="logups" class="mdl-cell mdl-cell--6-col">
  <br>
  <h4>SIGN UP</h4>
  <br>
<form method="post" action="signup.php" enctype="multipart/form-data">
                    <br><br>
                      <input type="file" id="file" accept='image/*' name="proim" >
<label for="file" class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored">
  <i class="material-icons">person_outline</i>
</label>
<br> Choose Image

                    <div id="ustatus"> </div> <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type ="text" name="uname1" maxlength="40" id="nameuser">
    <label class="mdl-textfield__label" for="nameuser">Username:
  </label></div>
    
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
    <input class="mdl-textfield__input" type ="text" name="namef1" maxlength="30" id="fnm">
    <label class="mdl-textfield__label" for="fnm">First Name:</label>
  </div>
  <br><br>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type ="text" name="namel1" maxlength="30" id="lnm">
    <label class="mdl-textfield__label" for="lnm">Last Name:</label>
  </div>
  <br><br>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type ="email" name="eml" maxlength="30" id="em">
    <label class="mdl-textfield__label" for="lnm">Email:</label>
  </div>
<br><br>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="phn" maxlength="30" id="ph">
    <label class="mdl-textfield__label" for="ph">Phone</label>
    <span class="mdl-textfield__error">Input is not a number!</span>
  </div>
  <br><br>
                  <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type=submit>
                SIGN UP
                </button><br>
</form><br><br>
</div>

<h4>ABOUT US</h4><br>
<div class="mdl-grid">
<figure>
<img class="small1 mdl-cell mdl-cell--4-col" src="img/2.jpg">
<figcaption>Vaibhav</figcaption>
</figure>
<figure>
<img class="small1 mdl-cell mdl-cell--4-col" >
<figcaption>Deepanshu</figcaption>
</figure>

<figure>
<img class="small1 mdl-cell mdl-cell--4-col" src="img/1.jpg" >
<figcaption>Kushagra</figcaption>
</figure>
</div>




    </div>
  </main>
</div>


    <script type="text/javascript" src="js/check1.js"></script>

</body>
</html>
