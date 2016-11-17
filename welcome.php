<?php
require 'core.inc.php';
require 'connect.inc.php';
if(!loggedin()) {header('Location:index.php');}

?>
 <html>
 <head>
       <title>CodeSpace</title>
</head>
<body>
  
  

<?php
include 'navbar.php';?>
<style type="text/css">
  a.mdl-cell{color:#424242;text-align: center;}
  .lnkrsz{font-size:90px;}
  .page{width:90%;margin:auto;}
  .mycard{text-align:center;}
  </style>
<div class=page>
<div class=mdl-grid>
<div class="mdl-cell mdl-cell--8-col mdl-grid mycard">
  <br>
                  <a class="mdl-cell mdl-cell-4-col" href="practice.php">
              <i class="material-icons lnkrsz">description</i>
                    <h4><strong>Practice</strong></h4>
                    <p>Practice through different difficulty levels.</p>
                </a>

                <a class="mdl-cell mdl-cell-4-col" href=contest.php>
                     <i class="material-icons lnkrsz">assessment</i>
                    <h4><strong>Compete</strong></h4>
                    <p>Compete in regularly held competitions.</p>
                </a>

                <a class="mdl-cell mdl-cell-4-col" href=leaderboard.php>
                    <i class="material-icons lnkrsz">assignment</i>
                    <h4><strong>Leaderboard</strong></h4>
                    <p>Lead the board with points you earn.</p>
                </a>
  <br>
</div>
  <div class="mycard mdl-cell mdl-cell-4-col">
<h4>Judge Environment</h4>

<i class=material-icons>done</i><br>AC (Accepted)<br><br>
<i class=material-icons>highlight_off</i><br>WA (Wrong Answer)<br><br>
<i class=material-icons>error_outline</i><br>RE (Runtime Error)<br><br>
<i class=material-icons>alarm</i><br>TLE (Time Limit Exceeded)<br><br>
<i class=material-icons>warning</i><br>CE (Compilation Error)<br><br>
 </div></div>




 

</body>
 </html>
