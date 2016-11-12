<link rel="shortcut icon" href="" type="image/x-icon" />
<script src="js/jquery.min.js"></script>

<link href="https://fonts.googleapis.com/css?family=Amatic+SC|Amatica+SC|Galada|Lato|Montserrat|PT+Sans|Suez+One" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
 
<link rel="stylesheet" href="https://code.getmdl.io/1.2.0/material.indigo-blue.min.css">
<link rel="stylesheet" type="text/css" href="css/fonts.css">
<link rel="stylesheet" type="text/css" href="css/deslog2.css">
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
.mcard{margin-bottom:10px;color:white;position:fixed;width:100%;}
.title-mcard{font-size:20px;padding:10px;background:url('navi.jpeg');max-height:50px;}

a.wbtn,.usr { color:white ;
 }
.srch {
  padding-bottom :10px;
  padding-top:6px;
}
.icnew{
  width:30px;
  height:30px;
  border-radius: 15px;
}
.mnu{position:absolute;}

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
<a class="mdl-button mdl-js-button mdl-js-ripple-effect wbtn" href="welcome.php">Home</a>
        <a class="mdl-button mdl-js-button mdl-js-ripple-effect wbtn" href="practice.php">Practice</a>
        <a class="mdl-button mdl-js-button mdl-js-ripple-effect wbtn" href="contest.php">Compete</a>
        <a class="mdl-button mdl-js-button mdl-js-ripple-effect wbtn" href="leaderboard.php">Leaderboard</a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a class="usr"  href="userprof.php?q=<?php echo $viewprof;?>">
              <img src=<?php echo $lnimg;?> class="icnew" >&nbsp;&nbsp;&nbsp;&nbsp;Welcome&nbsp;<?php echo $name_f;?>
            </a>
    <button id="demo-menu-lower-right"
        class="mdl-button mdl-js-button mdl-button--icon">
  <i class="material-icons">more_vert</i>
</button>

<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect mnu mdl-shadow--12dp"
    for="demo-menu-lower-right">
  <li class="mdl-menu__item">Some Action</li>
  <li class="mdl-menu__item">Another Action</li>
  <li disabled class="mdl-menu__item">Disabled Action</li>
  <li class="mdl-menu__item">Yet Another Action</li>
</ul>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                  mdl-textfield--floating-label mdl-textfield--align-right">
        <label class="mdl-button mdl-js-button mdl-button--icon"
               for="waterfall-exp">
          <i class="material-icons">search</i>
        </label>
        <div class="mdl-textfield__expandable-holder">
          <input class="mdl-textfield__input" type="text" name="sample"
                 id="waterfall-exp">
        </div>
      </div>
</div></div>
<!--<div id = "navi">
<div class="dummy-card-wide mdl-card mdl-shadow--12dp">
  <div class="mdl-card__title ">
    <h2 class="mdl-card__title-text">CodeSpace</h2>
        <a class="mdl-button mdl-js-button mdl-js-ripple-effect wbtn" href="welcome.php">Home</a>
        <a class="mdl-button mdl-js-button mdl-js-ripple-effect wbtn" href="practise.php">Practice</a>
        <a class="mdl-button mdl-js-button mdl-js-ripple-effect wbtn" href="contest.php">Compete</a>
        <a class="mdl-button mdl-js-button mdl-js-ripple-effect wbtn" href="leaderboard.php">Leaderboard</a>
       
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable srch">
  <div class="mdl-textfield__expandable-holder">
      <input class="mdl-textfield__input" type="text" id="sample-input" />
      <label class="mdl-textfield__label" for="sample-input">Expandable Input</label>
    </div>
    <label class="mdl-button mdl-js-button mdl-button--icon" for="sample-input">
      <i class="material-icons">search</i>
    </label>
    
  </div>
    
  </div>
  <!--<div class="mdl-card__supporting-text">
    Learn Material Design....
  </div>
  <div class="mdl-card__actions mdl-card--border"> Search
    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" align="center">
      Learn More
    </a>
  </div>
</div>
</div>-->


    <script type="text/javascript">
        var box = $('#box');
        var link = $('#link');
     $('#sample-input').keyup(function (e) {
    if (e.keyCode === 13) {
window.location.href = "find.php?q="+$('#sample-input').val();
    }
  });


    </script>

    <br><br><br><br><br>
