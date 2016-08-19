<?php
require 'core.inc.php';
require 'connect.inc.php';
if(!loggedin()) {header('Location:index1.php');}
$name_f=getfield('fname');
$name_sr=getfield('srname');
$ln_img=getfield('imgln');
$usern=getfield('username');
$time=time()+3.5*60*60;
  /*echo "<div class=awe>Logged in since ".date('d-M-Y H:i:s' , $time)." </div><br><div class=awe>Your IP Address is ".retip()."</div><br><br>";*/    
?>
 <html>
 <head>
   
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="files\bootstrap-3.3.6-dist\css\bootstrap.min.css">
  <script src="files/jquery.min.js"></script>
  <script src="files/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="design/weld.css">  
<link rel="stylesheet" href="css/a.css">  

  <style type="text/css">
  .nt{margin-top:40px;}
  </style>
</head>
<body>
<div class="contaier-fluid" id=cont>    
<div class=jumbotron><h1><?php echo $name_f;?></h1>
    <br>
    <nav id=nv>
        <ul class="nav nav-pills">
            <li class=active><a>Feed</a></li>
            <li><a href=index.php>Gallery</a></li>
            <li ><div class="btn-group"><a class="btn btn-default btn-xs" href=profile.php><img src= <?php echo $ln_img ?> class="icn" ><?php echo $name_f;?></a>&nbsp;&nbsp;&nbsp;<a class="btn btn-default dropdown-toggle " data-toggle="dropdown"><span class="caret"></span></a>
        <ul class="dropdown-menu"><li><a href="logout.php">LOG OUT</a></li><li><a href="messages.php">Messages</a></li><li><a href="changep.php">Change Password</a></li></ul>
        </div></li>
        </ul>
    </nav> </div>
    <section class="artic">
        <article><img src= <?php echo $ln_img ?> class="pport">
            
                <hgroup><h2 class="ttl"><?php echo $name_f.' '.$name_sr;?></h2>
                    <h3 class="subttl"><?php echo $usern.' @ourpage.com';?></h3></hgroup>
            </article>
        </section>
<br>
    <div class=aside>
      <input type=button id=cbtn class='btn btn-info cname2' value=CHAT>
      <div  id=cmenu><h4  class=cname1>Chat&nbsp;<a id=hd1>&times;</a></h4>
      <div id=chat class=chat></div></div>
    </div>    
  <div class=pmsg>
    <input type=text id=un placeholder="username" class="form-control">
    <div id=messages></div>
    <br>
    <input type=text id=msgc placeholder="type your message" class=form-control><br>
    <input type=button id=sendbtn class="btn btn-default" value=send>  
    <br><div id=msgfb></div>
  </div>
  </div>
  
  

<script src=js/mesg.js></script>
<script type="text/javascript">
$('#un').hide();
setInterval(function()
{

$.post('getchat.php',{},function(data){
  $("#chat").html(data).show();
});
},1000);
$('#hd1').click(function(){
  $('#cmenu').slideUp('fast',function(){
    $('#cbtn').show();
  });
  
});
$('#cbtn').click(function(){
  $('#cbtn').hide();
  $('#cmenu').slideDown();
});
</script>
</body>
 </html>
