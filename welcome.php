<?php
require 'core.inc.php';
require 'connect.inc.php';
if(!loggedin()) {header('Location:index.php');}
$id=getfield('fname');
?>
 <html>
 <head>
   
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CodeSpace</title>
  
</head>
<body>
  
<?php
include 'navbar.php'
 ?>
<style type="text/css">
  body{background-color:#eceff1;}
  aside{float:left;position:absolute;left:75%;top:5%;overflow:auto;}
  .mycard{background:white;margin-bottom:10px;padding:20px;color:#424242;}
  #contain{width:20%;margin-left:40px;text-align:center;margin-top:20px;}
  .mdl-cell{text-align:center;}
  a.mdl-cell{color:#424242;}
  .lnk{font-size:90px;}
  #poslnk{width:60%;margin-left:40px;}
  </style>
 
<div class="mycard mdl-grid" id="poslnk">

                <a class="mdl-cell mdl-cell-4-col" href="practice.php">
 	      			<i class="material-icons lnk">description</i>
                    <h4><strong>Practice</strong></h4>
                    <p>Practice through different difficulty levels.</p>
                </a>

                <a class="mdl-cell mdl-cell-4-col" href=contest.php>
                     <i class="material-icons lnk">assessment</i>
                    <h4><strong>Compete</strong></h4>
                    <p>Compete in regularly held competitions.</p>
                </a>

                <a class="mdl-cell mdl-cell-4-col" href=leaderboard.php>
                    <i class="material-icons lnk">assignment</i>
                    <h4><strong>Leaderboard</strong></h4>
                    <p>Lead the board with points you earn.</p>
                </a>
 </div>


 <div id="contain" class=mycard>
<h4>Judge Environment</h4>

<i class=material-icons>done</i><br>AC (Accepted)<br><br>
<i class=material-icons>highlight_off</i><br>WA (Wrong Answer)<br><br>
<i class=material-icons>error_outline</i><br>RE (Runtime Error)<br><br>
<i class=material-icons>alarm</i><br>TLE (Time Limit Exceeded)<br><br>
<i class=material-icons>warning</i><br>CE (Compilation Error)<br><br>
 </div>

 <br><br><br><br><br><br><br><br>
 



</div>
  </main>
</div>
</body>
 </html>
