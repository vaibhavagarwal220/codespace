<?php
include 'core.inc.php';
include 'connect.inc.php';
if(!loggedin()) {header('Location:index1.php');}
$idimup=getfield('id');
?>
<?php
if(isset($_FILES['filein']['name'])&&!empty($_FILES['filein']['name']))
{   $name=$_FILES['filein']['name'];
 echo $name;
    $tmpname=$_FILES['filein']['tmp_name'];
    $location='imgprof/'.$name;
    $query="UPDATE `promine`.`user_in` SET `imgln`='$location' WHERE `id`='$idimup'";
    if(move_uploaded_file($tmpname,$location)&&mysql_query($query))
    {
        echo 'Uploaded';

    }
    else
    {
        echo 'Problem Uploading';
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
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Amatica+SC|Galada|Lato|Montserrat|PT+Sans|Suez+One" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  

  <style type="text/css">

      *{font-family: "Tahoma";}
    .artic {width:70%;color: black;}
    #slideNotice{background-color:#f0f0f0;display:none;height:50px;position:relative;top:0;left:0;width:100%;text-align:center;font-family: Tahoma;font-size: 20px;font-weight: bold;padding: 8px;scroll-behavior: auto;color: black;}
    .upld,.btn-success,.pport{margin-left:40px;}
    button{font-family: Tahoma;}
  </style>
<link rel="stylesheet" href="css/weld.css">
</head>
<body>

<div class="contaier-fluid" id=cont>
    <div class=jumbotron><h2 class="hed"><?php echo $name_f;?>'s Profile</h2>
    <br>
    <nav id=nv>
        <ul class="nav nav-pills">
            <li><a href=welcome.php>Feed</a></li>
            <li><a href=index.php>Gallery</a></li>
            <li ><div class="btn-group"><a class="btn btn-default btn-xs" class=active><img src= <?php echo $ln_img ?> class="icn" ><?php echo $name_f;?></a>&nbsp;&nbsp;&nbsp;<a class="btn btn-default dropdown-toggle " data-toggle="dropdown"><span class="caret"></span></a>
        <ul class="dropdown-menu"><li><a href="logout.php">LOG OUT</a></li><li><a href=messages.php>Messages</a></li><li><a href="changep.php">Change Password</a></li></ul>
        </div></li>
        </ul>
    </nav> </div>
    <div id=slideNotice></div> 
                
    <section class="artic">
        <article>
                <img src= <?php echo $ln_img ?> class="pport">
                
      <form action="profile.php" method="POST" enctype="multipart/form-data" >
            <input type="file" name="filein" class=upld accept="image/*" required>
            <br><br>
            <button type="submit" class="btn btn-success">
            <span class="glyphicon glyphicon-camera"></span>&nbsp;&nbsp;&nbsp;Change profile picture</button>
        </form>
                <h2 class="ttl">
                  <input type=text value="<?php echo $name_f;?>" id=fnm required minlength=6 maxlength=40>
                </h2>
                
                <h2 class="ttl"> 
                  <input type=text value="<?php echo $name_sr;?>" id=srnm required minlength=6 maxlength=40>
                </h2>
                <h2 class="ttl"> 
                  <input type=text value="<?php echo $usern;?>" id=un required minlength=6 maxlength=40>
                </h2>

                &nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;<input type=button id=save_btn value=save class="btn btn-info">
                
            </article>
        </section>
<br>
        
  </div>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/pro.js"></script>
</body>
 </html>
