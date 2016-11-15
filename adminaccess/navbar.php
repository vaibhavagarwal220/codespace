<script src="../js/jquery.min.js"></script>

<link href="https://fonts.googleapis.com/css?family=Amatic+SC|Amatica+SC|Galada|Lato|Montserrat|PT+Sans|Suez+One" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
 
<link rel="stylesheet" href="https://code.getmdl.io/1.2.0/material.indigo-blue.min.css">
<link rel="stylesheet" type="text/css" href="../css/fonts.css">
<link rel="stylesheet" type="text/css" href="../css/deslog3.css">
  <script defer src="https://code.getmdl.io/1.2.0/material.min.js"></script>

  <style type="text/css">
@import url('https://fonts.googleapis.com/css?family=Roboto');

*{font-family: 'Roboto';font-size:16px;}
a:hover{text-decoration:none;}
a{text-decoration:none;}
  </style>

<style>

</style>

<?php
if(loggedin())
{
$name_f=getfield('fname');
$name_sr=getfield('srname');
$ln_img=getfield('imgln');
$usern=getfield('username');
$viewprof=getfield('username');
$id=getfield('id');
$lnimg=getfield('imgln');}?>

<div class="mdl-layout mdl-js-layout">
  <header class="mdl-layout__header mdl-layout__header--scroll">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title">CodeSpace</span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation -->
      <nav class="mdl-navigation">
        <a class="mdl-navigation__link" href="welcome.php">Dashboard</a>
        <a class="mdl-navigation__link" href="contest.php">Contests</a>
        <button id="demo-menu-lower-right"
        class="mdl-button mdl-js-button mdl-button--icon">
  <i class="material-icons">more_vert</i>
</button>

<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
    for="demo-menu-lower-right">
  <a href="profile.php"><li class="mdl-menu__item">Edit Profile</li></a>
    <a href="changep.php"><li class="mdl-menu__item">Change Password</li></a>
    <a href="logout.php"><li class="mdl-menu__item">Log Out</li></a>

</ul>
      </nav>
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title">Menu</span>
    <nav class="mdl-navigation">
          <a class="mdl-navigation__link" href="quesadd.php">Add Question</a>
      <a class="mdl-navigation__link" href="addcontest.php">Add Contest</a>
      <a class="mdl-navigation__link" href="quesm.php">Create Question Text</a>
        <a class="mdl-navigation__link" href="users.php">View Users</a>
 
  
    </nav>
  </div>
  <main class="mdl-layout__content">
    <div class="page-content">



    <script type="text/javascript">
        var box = $('#box');
        var link = $('#link');

    </script>
