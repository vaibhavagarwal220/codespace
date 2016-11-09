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
  <style type="text/css">
  aside{float:left;position:absolute;left:75%;top:5%;overflow:auto;}
  #contain{width:70%;margin:auto;}
  </style>
</head>
<body>
  
<?php
include 'navbar.php'
 ?>

 <div id="contain">

 	<div class=mdl-grid>

 		<div class="mdl-cell mdl-cell--6-col"></div>
 		<div class="mdl-cell mdl-cell--6-col"></div>
 		<div class="mdl-cell mdl-cell--6-col"></div>
 		<div class="mdl-cell mdl-cell--6-col"></div>
 		<div class="mdl-cell mdl-cell--6-col"></div>
 		<div class="mdl-cell mdl-cell--6-col"></div>
 		<div class="mdl-cell mdl-cell--6-col"></div>

 	</div>


 </div>

</div>
  </main>
</div>
</body>
 </html>
