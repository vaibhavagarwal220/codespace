<?php
include 'core.inc.php';
include 'connect.inc.php';
if(!loggedin()) {header('Location:index1.php');}
$idimup=getfield('id');
?>
<?php
if(isset($_FILES['filein']['name'])&&!empty($_FILES['filein']['name']))
{   $name=$_FILES['filein']['name'];
 
    $tmpname=$_FILES['filein']['tmp_name'];
    $location='imgprof/'.$name;
    $query="UPDATE `oj`.`user_in` SET `imgln`='$location' WHERE `id`='$idimup'";
    if(move_uploaded_file($tmpname,$location)&&mysql_query($query))
    {
        echo '';

    }
    else
    {
        echo '';
    }
}
?>

<?php
if(!loggedin()) {header('Location:index1.php');}
$name_f=getfield('fname');
$name_sr=getfield('srname');
$ln_img=getfield('imgln');
$usern=getfield('username');
?>

 <html>
 <head>
       
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $name_f?></title>
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Amatica+SC|Galada|Lato|Montserrat|PT+Sans|Suez+One" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  

  <style type="text/css">

      *{font-family: "Tahoma";}
    .artic {width:70%;}
    #slideNotice{display:none;height:50px;position:relative;top:0;left:0;width:100%;text-align:center;font-family: Tahoma;font-size: 20px;font-weight: bold;padding: 8px;scroll-behavior: auto;color: black;}
    .upld,.btn-success,.pport{margin-left:40px;}
    button{font-family: Tahoma;}
  </style>
<link rel="stylesheet" href="css/weldes.css">
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#">OnlineJudge</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="welcome.php">Home</a></li>
        <li><a href="practice.php">Practice</a></li>
        <li><a href="ide.php">OnlineIDE</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        
            
            <li><div class="btn-group"><button class="btn btn-xs" href="profile.php"><img src= <?php echo $ln_img ?> class="icn" >&nbsp;&nbsp;<?php echo $name_f;?></button>&nbsp;&nbsp;&nbsp;<button class="btn dropdown-toggle " data-toggle="dropdown"><span class="caret"></span></button>
        <ul class="dropdown-menu"><li><a href="logout.php">Log Out</a></li><li><a href="changep.php">Change Password</a></li></ul>
        </div></li>

      </ul>
    </div>
  </div>
</nav>

    <div id="slideNotice"></div> 
                
    
        <article>
                <img src= <?php echo $ln_img ?> class="pport">
                
      <form action="profile.php" method="POST" enctype="multipart/form-data" >
            <input type="file" name="filein" class=upld accept="image/*" required>
            <br><br>
            <button type="submit" class="btn btn-success">
            <span class="glyphicon glyphicon-camera"></span>&nbsp;&nbsp;&nbsp;Change profile picture</button>
        </form>
                <h2 class="ttl">
                  <input type=text value="<?php echo $name_f;?>" id="fnm" required minlength="6" maxlength="40">
                </h2>
                
                <h2 class="ttl"> 
                  <input type=text value="<?php echo $name_sr;?>" id="srnm" required minlength="6" maxlength="40">
                </h2>
                <h2 class="ttl"> 
                  <input type=text value="<?php echo $usern;?>" id="un" required minlength="6" maxlength="40">
                </h2>

                &nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;<input type=button id=save_btn value=save class="btn btn-info">
                
            </article>
        
<br>
        
  </div>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/pro.js"></script>
</body>
 </html>
