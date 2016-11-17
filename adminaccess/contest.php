

<?php
require 'core.inc.php';
require 'connect.inc.php';
if(!loggedin()) {header('Location:index.php');}
?>
 <html>
 <head>
   

  <title>COMPETE|CodeSpace</title>

  <style type="text/css">
  a.sub{color:blue;}
  table a{color:blue;}
  .page{width:90%;margin:auto;}
img.pport{display:inline;}
h2.name,h5{display:inline;}
  .mycard{background:white;margin-bottom:10px;padding:20px;color:#424242;text-align:center;}

#time {padding:20px;display:none;}

  </style>
</head>
<body>
<?php
include 'navbar.php';?>
<div class=page>


<?php

 if(isset($_GET['q'])&&cexists($_GET['q']))
  {$quid=$_GET['q'];

  }

  else if(isset($_GET['q']))
            echo "<br><br><div class=mycard><h1>404</h1><h3>No such Contest</h3></div>";

else
  {
//echo "<script>
//$(\"#time\").hide();
//</script>";
$queryqw="SELECT * from contests where now()>concat(concat(edate,' '),etime)";//past
$queryqw1="SELECT * from contests where now()<concat(concat(sdate,' '),stime)";//future
$queryqw2="SELECT * from contests where now()>concat(concat(sdate,' '),stime) && now()<concat(concat(edate,' '),etime)";//current
echo "<div class=mdl-grid>";
echo "<div class=\"mdl-cell mdl-cell--8-col\"><br>Future Contests<br>";
getcontests($queryqw1);
echo "<br>Present Contests<br>";
getcontests($queryqw2);
echo "<br>Past Contests<br>";
getcontests($queryqw);

echo "</div><div class=\"mdl-cell mdl-cell--3-col\">dsdsasdad</div></div>";


}?>
<br><br>
<div id="questions" class=mycard>
</div>

<div id="time" class=mycard>
</div>

<?php

if(isset($_GET['q'])&&cexists($_GET['q']))
  {
    echo "<a class=\"mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent\" href=quesadd.php?q=$quid>
          ADD QUESTION
          </a>";
  }

 ?>

 <script>
$.post('remtime.php',{q:'<?php echo $quid;?>'},function(data){
$.post('caltime.php',{q:'<?php echo $quid;?>'},function(data1){
          
        if(data!="0"&&data1=="0") {
          $("#time").hide().html(data).show();
          
        }
        else if(data=="0"&&data1=="0") {
  
          <?php
           $quer="DELETE from keptin where cid='".$quid."';";
           $quer_res=@mysql_query($query);
          ?>
        }
        else 
        {
          
        }
      });
    });
</script>


    


    
  
</div>

</body>
<script type="text/javascript">

          var inter=setInterval(function()
{

$.post('caltime.php',{q:'<?php echo $quid;?>'},function(data){
  if(data!="0") $("#time").hide().html(data).show();
  else {


    clearInterval(inter);
    
    
    $.post('getprob.php',{q:'<?php echo $quid;?>'},function(data){$("#questions").hide().html(data).show();});
    
    var interq=setInterval(function(){

      $.post('getprob.php',{q:'<?php echo $quid;?>'},function(data){$("#questions").hide().html(data).show();});

    },10000);
    
    var interp=setInterval(function(){

      $.post('remtime.php',{q:'<?php echo $quid;?>'},function(data){
        if(data!="0") $("#time").hide().html(data).show();
        else 
        {
          <?php
           $quer="DELETE from keptin where cid='".$quid."';";
           $quer_res=@mysql_query($query);
          ?>
          clearInterval(interp);
          clearInterval(interq);
          alert('Contest Ended');

        }
      });

    },1000);
        
  }
});
},100);
        
        


</script>

 </html>
