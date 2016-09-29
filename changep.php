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

    <title>Change Your Password</title>   
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Amatica+SC|Galada|Lato|Montserrat|PT+Sans|Suez+One" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/weldes.css">
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
        
            
            <li><div class="btn-group"><a class="btn btn-xs" href="profile.php"><img src= <?php echo $ln_img ?> class="icn" >&nbsp;&nbsp;<?php echo $name_f;?></a>&nbsp;&nbsp;&nbsp;<a class="btn dropdown-toggle " data-toggle="dropdown"><span class="caret"></span></a>
        <ul class="dropdown-menu"><li><a href="logout.php">Log Out</a></li><li><a>Change Password</a></li></ul>
        </div></li>

      </ul>
    </div>
  </div>
</nav>

    <div id="slideNotice"></div> 
                
    
                  <input type=password placeholder="enter old password" id="opwd" required maxlength="40">
                  <input type=password placeholder="enter new password" id="npwd" required maxlength="40">
                  <input type=password placeholder="re-enter new password" id="npwdc" required maxlength="40">
                  <input type=button id="save_btn" value="save" class="btn btn-success">
                
            </article>
        </section>
<br>
        
  </div>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/changep.js"></script>
</body>
 </html>
