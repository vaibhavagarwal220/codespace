<?php
require 'core.inc.php';
require 'connect.inc.php';
if(!loggedin()) {header('Location:index1.php');}
$name_f=getfield('fname');
$id=getfield('id');
$name_sr=getfield('srname');
$ln_img=getfield('imgln');
$usern=getfield('username');
$time=time()+3.5*60*60;
  /*echo "<div class=awe>Logged in since ".date('d-M-Y H:i:s' , $time)." </div><br><div class=awe>Your IP Address is ".retip()."</div><br><br>";*/    
?>

<?php
if(isset($_FILES['file']['name'])&&!empty($_FILES['file']['name']))
{   $name=$_FILES['file']['name'];

    $tmpname=$_FILES['file']['tmp_name'];
    $location='img/'.$name;
    $query="INSERT INTO `promine`.`imgup` (`id`, `imgln`, `upby`, `time`) VALUES (NULL, '$location', $id, CURRENT_TIMESTAMP)";
    if(move_uploaded_file($tmpname,$location)&&mysql_query($query))
    {;
    }
    else
    {
    echo '<div class=nt>Problem Uploading</div>';
    }
}
?>


<html>
	<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/weld.css">
  <link rel="stylesheet" href="css/a.css">
  <script type="text/javascript" src=js/up.js></script>
	</head>
	<body>
		<div class="container-fluid" id=cont>
		<div class=jumbotron><h1>Gallery</h1><p>Contains images you have uploaded</p>
			<nav id=nv><div class=container-fluid>
            
        <ul class="nav nav-pills">
            <li><a href=welcome.php>Feed</a></li>
            <li class=active><a>Gallery</a></li>
            <li ><div class="btn-group"><a class="btn btn-default btn-xs" href=profile.php><img src= <?php echo $ln_img ?> class="icn" ><?php echo $name_f;?></a>&nbsp;&nbsp;&nbsp;<a class="btn btn-default dropdown-toggle " data-toggle="dropdown"><span class="caret"></span></a>
        <ul class="dropdown-menu"><li><a href="logout.php">LOG OUT</a></li><li><li><a href="messages.php">Messages</a></li><li><a href="changep.php">Change Password</a></li>
        </div></li>
        </ul></div>
    </nav>
		</div>
		<div>
			<div class="imgc">Hello</div>
			<div id=newim></div>
			<form action="index.php" method="POST" enctype="multipart/form-data" >
            <input type="file" name="file" accept="image/*" >
            <br><br>
            <button type="submit" class="btn btn-success">
            <span class="glyphicon glyphicon-camera"></span>&nbsp;&nbsp;&nbsp;Upload to Gallery</button>
        </form>
        </div>
			<!--<input type=file id=imgin>
			<input type=button id=btn value=upload>/-->

		</div>
		<script src=js/fetchim.js></script>
        
		
	</body>
</html>