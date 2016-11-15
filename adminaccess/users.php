<html lang="en">
<head>
  <title>Users on Our Page</title>
 <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
<style type="text/css">
img.pport{width: 130px;height: 170px;}
.icn-lg {width:20px;height: 20px;}
    #pos{position:absolute;left:50px;top:50px;}
    #users{text-align:center;}
</style>
</head>
<body>
	<?php 
	require 'connect.inc.php';
	require 'core.inc.php';
	require 'navbar.php';
	?>
	<a class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored" href=index.php id="pos">
  <i class="material-icons" title=Back to Dashboard>fast_rewind</i>
</a>
<div id="users">
</div>

</div>
</main>
</div>

<script type="text/javascript">

setInterval(function()
{
var un=$('#un').val();
$.post('getusers.php',{},function(data){
  $("#users").hide().html(data).show();
});
},1000);
</script>
</body>
</html>
