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
   
  <style type="text/css">

      *{font-family: "Tahoma";}
    
    #slideNotice{display:none;height:50px;
      width:100%;text-align:center;font-family: Tahoma;
      background-color: gray;color:white;
      margin:auto;padding:auto;
    }
    
    button{font-family: Tahoma;}
    #contain{width:70%;margin:auto;}
    
  </style>
</head>
<body>

<?php
include 'navbar.php'
 ?>
  <div id="contain">
  <div id="slideNotice"></div>       
                
    
                <img src= <?php echo $ln_img ?> class="small1 img img-circle">
                
      <form action="profile.php" method="POST" enctype="multipart/form-data" >
            <input type="file" name="filein" class=upld accept="image/*" required>
            <br>
            <button type="submit" class="btn btn-success">
            <span class="glyphicon glyphicon-camera"></span>&nbsp;&nbsp;&nbsp;Change profile picture</button>
        </form>

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text"  value="<?php echo $name_f;?>" id="fnm" required maxlength="40">
    <label class="mdl-textfield__label" for="fnm">First Name</label>
  </div><br>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" value="<?php echo $name_sr;?>" id="srnm" required maxlength="40">
    <label class="mdl-textfield__label" for="srnm">Last Name</label>
  </div><br>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" value="<?php echo $usern;?>" id="un" required maxlength="40">
    <label class="mdl-textfield__label" for="un">Username</label>
  </div>
  <button id="savbtn" class="btn btn-info">
          Save </button>      

      
        
  </div>






  <script type="text/javascript" src="js/upprof.js"></script>
</body>
 </html>
