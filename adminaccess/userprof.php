

<?php
require 'core.inc.php';
require 'connect.inc.php';
if(!loggedin()) {header('Location:index.php');}

if(isset($_GET['q']))
  $qcode=$_GET['q'];
else
  header('Location:practice.php');
?>
 <html>
 <head>
   
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $qcode; ?>'s Profile</title>
    

  <style type="text/css">
 
  a.sub{color:blue;}
  table a{color:blue;}
  .page{width:70%;margin-left:2.5%;}
img.pport{display:inline;}
h2.name,h5{display:inline;}
.demo-card-square.mdl-card {
  width: 100%;
  

  }
.demo-card-square > .mdl-card__title {
  color: #fff;
  background:
    url('') bottom right 15% no-repeat #46B6AC;

}
aside{background-color:#f1f1f1;box-shadow:0px 0px 5px 1px;text-align:center;}

  </style>
</head>
<body>

  
 <?php
include 'navbar.php'
 ?>

<div class=page>
    <?php
require 'connect.inc.php';
$query="SELECT fname,srname,imgln,username,id from admin where username='".$qcode."'";
$result=@mysql_query($query);
$numu=@mysql_num_rows($result);
if($numu==0) echo "<h1>No such user</h1>";
else
{
if($result) 
  {   
      ?>



      <?php
      
     echo "<div class=\"demo-card-square mdl-card mdl-shadow--2dp\">
  <div class=\"mdl-card__title mdl-card--expand\">
    <h2 class=\"mdl-card__title-text\"></h2>
    <img src=".$ln_img." class=\"small1\">&nbsp;&nbsp;&nbsp;<h2 class=name>".$name_f." ".$name_sr."</h2>
  </div>
  <div class=\"mdl-card__supporting-text\"><h6>Username</h6><h5> ".$qcode." <h5><br>";
  

    echo "</div>";

  if(getfield('username')==$qcode) echo "<div class=\"mdl-card__actions mdl-card--border\">
    <a class=\"mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect\" href=\"profile.php\">
      EDIT PROFILE
    </a>
  </div>";
echo "</div><br><br><br>";


   
  }
}

?>


  
  


</div>
</div>
  </main>
</div>
</body>
 </html>
