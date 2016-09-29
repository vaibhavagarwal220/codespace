<?php
require 'core.inc.php';
require 'connect.inc.php';
if(!loggedin()) {header('Location:index1.php');}
$name_f=getfield('fname');
$name_sr=getfield('srname');
$ln_img=getfield('imgln');
$usern=getfield('username');
$id=getfield('id');
$time=time()+3.5*60*60;
  $qcode=$_GET['q'];


$qry="select count(*) from submissions where qid='".$qcode."'";
$rslt=mysql_query($qry);
$cnt=mysql_result($rslt,0);
$cnt++;

  /*echo "<div class=awe>Logged in since ".date('d-M-Y H:i:s' , $time)." </div><br><div class=awe>Your IP Address is ".retip()."</div><br><br>";*/    
?>
 <html>
 <head>
   <title>Submit <?php echo $qcode;?></title>
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/weldes.css">  
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.2.0/material.indigo-pink.min.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/g/ace@1.2.4(min/ace.js+min/mode-c_cpp.js)"></script>
<script defer src="https://code.getmdl.io/1.2.0/material.min.js"></script>
<script type="text/javascript" src="edit_area/edit_area_full.js"></script>



<script type="text/javascript">
    // initialisation
    
    
    editAreaLoader.init({
      id: "sample5" // id of the textarea to transform  
      ,start_highlight: true
      ,allow_toggle: true
      ,language: "en"
      ,syntax: "c"
      ,word_wrap: true  
      ,toolbar: "search, go_to_line, |, undo, redo, |, select_font, |, syntax_selection, |, change_smooth_selection, highlight, reset_highlight, |, help"
      ,syntax_selection_allow: "c,cpp"
      
      ,EA_load_callback: "editAreaLoaded"
      ,show_line_colors: true
    });
    
  </script>




  <style type="text/css">
  
  #sample5{height:400px;}
  a{color:white;}
  h6{display:inline;}
  .contain{width:70%;margin: auto;}

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
        <li class=active><a>OnlineIDE</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        
            
            <li><div class="btn-group"><a class="btn btn-xs" href="profile.php"><img src= <?php echo $ln_img ?> class="icn" >&nbsp;&nbsp;<?php echo $name_f;?></a>&nbsp;&nbsp;&nbsp;<a class="btn dropdown-toggle " data-toggle="dropdown"><span class="caret"></span></a>
        <ul class="dropdown-menu"><li><a href="logout.php">Log Out</a></li><li><a href="changep.php">Change Password</a></li></ul>
        </div></li>
        
      </ul>
    </div>
  </div>
</nav>
<div class=contain>

<?php
echo "<h6>Problem Code:".$qcode."</h6>";


if(isset($_POST['ln'])) {
$code=$_POST['ln'];

if(!empty($code)&&!empty($qcode)){
$my_file = 'codes/'.$qcode.$id.$cnt.".c";
$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
fwrite($handle, $code);
exec("./o", $output, $status);
        echo "status: " . $status;
          if($status==0) $res="AC";
          else if($status==1) $res="TLE";
          else if($status==2) $res="CE";
          else if($status==3) $res="RE";
          else if($status==4) $res="WA";
          else if($status==5) $res="MLE";
          echo "<br>output: " . implode("<br>", $output);

          $queryins="INSERT INTO `oj`.`submissions` (`id`, `result`, `qid`, `user_id`, `subln`) VALUES (NULL, '".$res."','".$qcode."','".$id."','".$my_file."');";
          $resultqu=mysql_query($queryins);
          
}
}

else if(isset($_FILES['file']['name'])&&!empty($_FILES['file']['name']))
{   $name=$_FILES['file']['name'];
 echo $name;
 echo $qcode;
    $tmpname=$_FILES['file']['tmp_name'];
    $location = 'codes/'.$qcode.$id.$cnt.".c";
    if(move_uploaded_file($tmpname,$location))
    {
        echo 'Uploaded';
        exec("./o", $output, $status);
        echo "status: " . $status;
          if($status==0) $res="AC";
          else if($status==1) $res="TLE";
          else if($status==2) $res="CE";
          else if($status==3) $res="RE";
          else if($status==4) $res="WA";
          
          echo "<br>output: " . implode("<br>", $output);

          $queryins="INSERT INTO `oj`.`submissions` (`id`, `result`, `qid`, `user_id`, `subln`) VALUES (NULL, '".$res."','".$qcode."','".$id."','".$location."');";
          $resultqu=mysql_query($queryins);
          echo $resultqu;

    }
    else
    {
        echo 'Problem Uploading';
    }
}


?>



<!-- Floating Multiline Textfield -->
<form action="submit.php?q=<?php echo $qcode;?>" method=post>
  
    <textarea class="mdl-textfield__input" type="text" rows= "3" id="sample5" name=ln></textarea>
    
  <input type="submit" value=submit>
</form>
 OR<br>
<form action="submit.php?q=<?php echo $qcode;?>" method="POST" enctype="multipart/form-data" >
            <input type="file" name="file" accept=".c,.cpp,.java">
            <input type="submit" value="submit">
        </form>
        



    
  </div>

</body>
<script>
     

</script>
 </html>
