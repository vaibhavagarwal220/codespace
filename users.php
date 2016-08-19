<html lang="en">
<head>
  <title>Users on Our Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="files\bootstrap-3.3.6-dist\css\bootstrap.min.css">
  <script src="files/jquery.min.js"></script>
  <script src="files\bootstrap-3.3.6-dist\js\bootstrap.min.js"></script>
<style type="text/css">
img.pport{width: 130px;height: 170px;}
.icn-lg {width:20px;height: 20px;}
</style>
</head>
<body>
<div id=users>
</div>

<script type="text/javascript" src=js/jquery.min.js></script>
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
