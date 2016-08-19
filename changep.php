<?php
include 'core.inc.php';
include 'connect.inc.php';
if(!loggedin()) {header('Location:index1.php');}
$id=getfield('id');
$name_f=getfield('fname');
$name_sr=getfield('srname');
$ln_img=getfield('imgln');
$usern=getfield('username');
$pwd=getfield('pword');

?>

 <html>
 <head>
       
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Amatica+SC|Galada|Lato|Montserrat|PT+Sans|Suez+One" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/weld.css">
  <link rel="stylesheet" type="text/css" href="css/fonts.css">
  <style type="text/css">

      *{font-family: "Acmeregular";}
    .artic {width:70%;color: black;}
    #slideNotice{background-color:#f0f0f0;display:none;height:50px;position:relative;top:0;left:0;width:100%;text-align:center;font-family: Aclonicaregular;font-size: 20px;font-weight: bold;padding: 8px;scroll-behavior: auto;color: black;}
    .upld,.btn-success,.pport{margin-left:40px;}
    input{border-radius: 5px;}
    button{font-family: Tahoma;}
  </style>

</head>
<body>

<div class="contaier-fluid" id=cont>
    <div class=jumbotron><h2 class="hed"><?php echo $name_f;?>'s Profile</h2>
    <br>
    <nav id=nv>
        <ul class="nav nav-pills">
            <li><a href=welcome.php>Feed</a></li>
            <li><a href=index.php>Gallery</a></li>
            <li ><div class="btn-group"><a class="btn btn-default btn-xs" href=profile.php><img src= <?php echo $ln_img ?> class="icn" ><?php echo $name_f;?></a>&nbsp;&nbsp;&nbsp;<a class="btn btn-default dropdown-toggle " data-toggle="dropdown"><span class="caret"></span></a>
        <ul class="dropdown-menu"><li><a href="logout.php">LOG OUT</a></li><li><a href=messages.php>Messages</a></li><li class=active><a>Change Password</a></li></ul>
        </div></li>
        </ul>
    </nav> </div>
    <div id=slideNotice></div> 
                
    <section class="artic">
        <article>
                <h2 class="ttl">
                  <input type=password placeholder="enter old password" id=opwd required minlength=8 maxlength=40>
                </h2>
                
                <h2 class="ttl"> 
                  <input type=password placeholder="enter new password" id=npwd required minlength=8 maxlength=40>
                </h2>
                <h2 class="ttl"> 
                  <input type=password placeholder="re-enter new password" id=npwdc required minlength=8 maxlength=40>
                </h2>

                <input type=button id=save_btn value=save class="btn btn-success">
                
            </article>
        </section>
<br>
        
  </div>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/changep.js"></script>
</body>
 </html>
