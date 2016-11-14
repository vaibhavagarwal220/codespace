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
  .mdl-grid{margin:auto;width:70%;text-align:center;}
  </style>
</head>
<body>
  
<?php
include 'navbar.php'
 ?>

 	<div class=mdl-grid>

 		<div class="mdl-cell mdl-cell--4-col">
 			<div class="mdl-card mdl-shadow--4dp">
			  <div class="mdl-card__media"><img src="Icon.png" width="173" height="157" border="0" alt="" style="padding:10px;">
			  </div>
		<div class="mdl-card__supporting-text">
			<a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" href=quesm.php>
			  CREATE QUESTION TEXT
			</a>
		</div></div></div>

 	
 		<div class="mdl-cell mdl-cell--4-col">
 			<div class="mdl-card mdl-shadow--4dp">
			  <div class="mdl-card__media"><img src="contest.png" width="173" height="157" border="0" alt="" style="padding:10px;">
			  </div>
		<div class="mdl-card__supporting-text">
			<a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" href=addcontest.php>
			  ADD CONTEST
			</a>
		</div></div></div>
 	
 		<div class="mdl-cell mdl-cell--4-col">
 			<div class="mdl-card mdl-shadow--4dp">
			  <div class="mdl-card__media"><img src="add.png" width="173" height="157" border="0" alt="" style="padding:10px;">
			  </div>
		<div class="mdl-card__supporting-text">
			<a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" href=quesadd.php>
			  ADD QUESTION
			</a>
		</div></div></div>
 	
 	
 		 	
 	</div>
 	


</div></main></div>


</body>
 </html>
