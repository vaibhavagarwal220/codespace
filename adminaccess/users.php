<html lang="en">
<head>
  <title>CodeSpace|Users|Admin</title>
  <script src="../js/jquery.min.js"></script>
</head>
<body>
	<?php 
	require 'connect.inc.php';
	require 'core.inc.php';
	require 'navbar.php';
	?>
  <style type="text/css">
img.pport{width: 100px;height: 120px;}
#pos{position:absolute;left:50px;top:50px;}
#users{text-align:center;width:70%;margin:auto;}
table{width:100%;}
</style>

	<a class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored" href=index.php id="pos">
  <i class="material-icons" title=Back to Dashboard>fast_rewind</i>
</a>

<div id="users">
</div>

</div>
</main>
</div>
</body>
<script type="text/javascript">

setInterval(function()
{
var un=$('#un').val();
$.post('getusers.php',{},function(data){
  $("#users").hide().html(data).show();
});
},1000);
</script>
</html>
