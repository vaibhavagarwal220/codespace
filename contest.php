

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
<div id="questions">
</div>

<script type="text/javascript">

$.post('remtime.php',{q:'<?php echo $quid;?>'},function(data){
        if(data!="0") {
          
          var inter=setInterval(function()
{

$.post('caltime.php',{q:'<?php echo $quid;?>'},function(data){
  if(data!="0") $("#time").hide().html(data).show();
  else {


    clearInterval(inter);
    
    alert("Contest has started");
    
    $.post('getprob.php',{q:'<?php echo $quid;?>'},function(data){$("#questions").hide().html(data).show();});
    
    var interq=setInterval(function(){

      $.post('getprob.php',{q:'<?php echo $quid;?>'},function(data){$("#questions").hide().html(data).show();});

    },10000);
    
    var interp=setInterval(function(){

      $.post('remtime.php',{q:'<?php echo $quid;?>'},function(data){
        if(data!="0") $("#time").hide().html(data).show();
        else 
        {
          clearInterval(interp);
          clearInterval(interq);
          alert('Ended');

        }
      });

    },1000);
        
  }
});
},1000);
        }
        else 
        {
          alert('Ended');
          
        }
      });


</script>

    
  
<div>
</body>
 </html>
