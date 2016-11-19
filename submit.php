<?php
require 'core.inc.php';
require 'connect.inc.php';
if(!loggedin()) {header('Location:index.php');}

$id=getfield('id');
  $qcode=$_GET['q'];

?>
 <html>
 <head>
   <title>Submit <?php echo $qcode;?></title>
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style type="text/css">
  
  #sample5{height:400px;}
  a{color:white;}
  h6{display:inline;}
  .contain{width:90%;margin: auto;}

  </style>
</head>
<body>
  
 <?php
include 'navbar.php'
 ?>
 <div class=contain>




<!-- Floating Multiline Textfield -->



<form action="complete.php?q=<?php echo $qcode;?>" method=post>
  
    <textarea class="mdl-textfield__input" type="text" rows= "3" id="sample5" name=ln></textarea>
    <br><br>
   Language &nbsp;:&nbsp; <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-1">
  <input type="radio" id="option-1" class="mdl-radio__button" name="options" value="C" checked>
  <span class="mdl-radio__label">C</span>&nbsp;&nbsp;&nbsp;
</label>
<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-2">
  <input type="radio" id="option-2" class="mdl-radio__button" name="options" value="C++">
  <span class="mdl-radio__label">C++</span>
</label><br><br>
<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">SUBMIT</button>
</form>
<br><br>
 OR
 <br><br>

<form action="complete.php?q=<?php echo $qcode;?>" method="POST" enctype="multipart/form-data" >
            <input type="file" name="file" accept=".c,.cpp" required>
            <br><br>
   Language &nbsp;:&nbsp; <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-11">
  <input type="radio" id="option-11" class="mdl-radio__button" name="options1" value="C" checked>
  <span class="mdl-radio__label">C</span>&nbsp;&nbsp;&nbsp;
</label>
<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-21">
  <input type="radio" id="option-21" class="mdl-radio__button" name="options1" value="C++">
  <span class="mdl-radio__label">C++</span>
</label><br><br>
          <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">SUBMIT</button>
        </form>
        
    
  </div>

</body>
 </html>
