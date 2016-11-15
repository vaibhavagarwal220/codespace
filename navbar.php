<link rel="shortcut icon" href="" type="image/x-icon" />
<script src="js/jquery.min.js"></script>

<link href="https://fonts.googleapis.com/css?family=Amatic+SC|Amatica+SC|Galada|Lato|Montserrat|PT+Sans|Suez+One" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
 
<link rel="stylesheet" href="https://code.getmdl.io/1.2.0/material.indigo-blue.min.css">
<link rel="stylesheet" type="text/css" href="css/fonts.css">
<link rel="stylesheet" type="text/css" href="css/deslog3.css">
<link href="css/prism.css" rel="stylesheet" />
<link rel="stylesheet" href="https://code.getmdl.io/1.1.1/material.indigo-blue.min.css">
<script defer src="https://code.getmdl.io/1.1.1/material.min.js"></script>
  <script src="js/prism.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/g/ace@1.2.4(min/ace.js+min/mode-c_cpp.js)"></script>
  <script defer src="https://code.getmdl.io/1.2.0/material.min.js"></script>
  <script type="text/javascript" src="edit_area/edit_area_full.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

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
@import url('https://fonts.googleapis.com/css?family=Roboto');

*{font-family: 'Roboto';font-size:16px;}
a:hover{text-decoration:none;}
a{text-decoration:none;}

.mcard{color:white;width:97.3%;background:#263238;padding:20px;max-height:100px;height:90px;margin-bottom:30px;}
.title-mcard{font-size:30px;padding:20px;}

a.wbtn,.usr { color:white;}
body{background-color:#EFF3F6;}
.icnew{
  width:20px;
  height:20px;
  border-radius:10px;
}
.lnko{text-decoration:none;color:black;}
.left{float:left;}
.right{float:right;padding-right:15px;display:inline;z-index:5;}
#sample-input{position:absolute;top:15px;right:15px;width:300px;}
#result{position:absolute;top:50px;right:15px;background-color:white;color:black;display:inline;width:280px;display:none;padding:10px;line-height:20px;z-index:10;text-align: center;}
.mdl-grid{line-height:20px;padding:10px;}
.mdl-cell{margin:5px;}
.searche{color:gray;text-align:center;}
#out1{margin:10px 0px 10px 0px;font-size:25px;}
#out2{margin:10px 0px 10px 0px;font-size:25px;}
#res1{margin:20px 0px 20px 0px;}
#res2{margin:20px 0px 20px 0px;}

</style>

<?php
if(loggedin())
{
$name_f=getfield('fname');
$name_sr=getfield('srname');
$ln_img=getfield('imgln');
$usern=getfield('username');
$viewprof=getfield('username');
$id=getfield('id');
$lnimg=getfield('imgln');}?>
<div class="mcard"><div class="title-mcard mdl-shadow--12dp">CodeSpace   
<input type=text id="sample-input" placeholder="Search Users,Problems.." title="Press Enter to Search">

<div id="result">
<div id="res1">Users
<div id="out1">
</div></div>
<div id="res2">Problems
<div id="out2">
</div></div>

</div>

</div>
        <div class=left><a class="mdl-button mdl-js-button mdl-js-ripple-effect wbtn" href="welcome.php">Home</a>
        <a class="mdl-button mdl-js-button mdl-js-ripple-effect wbtn" href="practice.php">Practice</a>
        <a class="mdl-button mdl-js-button mdl-js-ripple-effect wbtn" href="contest.php">Compete</a>
        <a class="mdl-button mdl-js-button mdl-js-ripple-effect wbtn" href="leaderboard.php">Leaderboard</a>
        </div>
  <div class=right>        
            <a class="usr mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect"  href="userprof.php?q=<?php echo $viewprof;?>">
              <img src=<?php echo $lnimg;?> class="icnew" >&nbsp;&nbsp;&nbsp;<?php echo $name_f;?>
            </a>
          

<button id="demo-menu-lower-right"
        class="mdl-button mdl-js-button mdl-button--icon">
  <i class="material-icons">more_vert</i>
</button>

<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
    for="demo-menu-lower-right">
  <li class="mdl-menu__item" id="ep">Edit Profile</li>
  <li class="mdl-menu__item" id="cp">Change Password</li>
  <li class="mdl-menu__item" id="lo">Log Out</li>
</ul>
</div>
</div>

    <script type="text/javascript">
     $('#sample-input').keyup(function (e) {
    if (e.keyCode === 13) {
window.location.href = "find.php?q="+$('#sample-input').val();
    }
  });
     $('#sample-input').focus(function (e) {
       $('#result').fadeIn('fast');
  });
     $('#sample-input').blur(function (e) {
       $('#result').fadeOut('fast');
  });

          $('#ep').click(function () {
  window.location.href='profile.php';
  });
               $('#cp').click(function () {
                window.location.href='changep.php';
  });
                    $('#lo').click(function () {
              window.location.href='logout.php';
  });



    </script>
    <script type="text/javascript" src="js/searchnav.js"></script>

