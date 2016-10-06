

<?php
require 'core.inc.php';
require 'connect.inc.php';
if(!loggedin()) {header('Location:index.php');}
$name_f=getfield('fname');
$name_sr=getfield('srname');
$ln_img=getfield('imgln');
$usern=getfield('username');
$time=time()+3.5*60*60;
if(isset($_GET['q']))
  $quid=$_GET['q'];
else
  header('Location:practice.php');

  /*echo "<div class=awe>Logged in since ".date('d-M-Y H:i:s' , $time)." </div><br><div class=awe>Your IP Address is ".retip()."</div><br><br>";*/    
?>
 <html>
 <head>
   
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Practice Arena</title>

  <style type="text/css">
  .nt{margin-top:40px;}
  a.sub{color:blue;}
  table a{color:blue;}
  .page{width:70%;margin:auto;}
img.pport{display:inline;}
h2.name,h5{display:inline;}
  </style>
</head>
<body>
<?php
include 'navbar.php';
 ?>

<div class=page>
    
<div id="time">
</div>


<script type="text/javascript">

var inter=setInterval(function()
{

$.post('caltime.php',{q:'<?php echo $quid;?>'},function(data){
  if(data!="0") $("#time").hide().html(data).show();
  else {
    clearInterval(inter);
    alert("Contest has started");
    var interq=setInterval(function(){

      $.post('getprob.php',{q:'<?php echo $quid;?>'},function(data){$("#time").hide().html(data).show();});

    },100);






  }
});
},1000);
</script>

    
  
<div>
</body>
 </html>
