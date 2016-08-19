<?php
require 'core.inc.php';
require 'connect.inc.php';
if(!loggedin()) {header('Location:index1.php');}
$uid=getfield('id');
$name_f=getfield('fname');
$name_sr=getfield('srname');
$ln_img=getfield('imgln');
$usern=getfield('username');
/*$time=time()+3.5*60*60;
echo "<div class=awe>Logged in since ".date('d-M-Y H:i:s' , $time)." </div><br><div class=awe>Your IP Address is ".retip()."</div>";*/    
?>

 <html>
 <head>
   
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="files/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/weld.css">  
  <style type="text/css">
    #messages{display:none;width:600px;overflow:auto;background-color:#D4D4FF;height:400px;margin:auto;}
    .artic {width:600px;}
    .awe{font-weight: bold;font-family: Tahoma;position: fixed;left:1050px;}
    .rec{background-color: #7DA1E9;color: white;padding: 10px;width:400px;border-radius: 10px;text-align: left;float: right;margin-right: 5px;}
    .sent{background-color: #E9B97F;color: white;padding: 10px;width:400px;border-radius: 10px;text-align: right;float:left;margin-right: 5px;}
    .recim{width:430px;margin-left: 20px;}
    .sentim{width:430px;margin-left: 45px;}
    .cname{color: white;background-color:#2A55FF;width:600px;padding:10px;position:absolute;top:40.5%;left:27.7%;}
    .nt{margin:-top:500px;position:relative;top:50px;}
    
    
  </style>
</head>
<body><div id=cont>
           <div class=jumbotron> <div class="contaier-fluid">    
<h1><?php echo $name_f;?></h1>
    <br>
    <nav id=nv>
        <ul class="nav nav-pills">
            <li><a href="welcome.php">Feed</a></li>
            <li><a href=index.php>Gallery</a></li>
            <li ><div class="btn-group"><a class="btn btn-default btn-xs" href=profile.php><img src= <?php echo $ln_img ?> class="icn" ><?php echo $name_f;?></a>&nbsp;&nbsp;&nbsp;<a class="btn btn-default dropdown-toggle " data-toggle="dropdown"><span class="caret"></span></a>
        <ul class="dropdown-menu"><li><a href="logout.php">LOG OUT</a></li><li class=active><a>Messages</a></li><li><a href="changep.php">Change Password</a></li></ul>
        </div></li>
        </ul>
    </nav> </div> </div>
    <input type=text id=un placeholder="username" class="form-control">
    <div id=users1></div><br><br><br>
    <div id=messages></div>
    <br>
    <input type=text id=msgc placeholder="type your message" class=form-control><br>
    <input type=button id=sendbtn class="btn btn-default" value=send>  
    <br><div id=msgfb></div>
    
</div>
     <script src=js/mesg.js></script>
     <script type="text/javascript">

$(document).ready(function(){
  $('#un').hide();
$.post('getopt.php',{},function(data){
  $("#users1").html(data).show();
});

});


</script>


  </div>
</body>
 </html>
