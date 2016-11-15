<?php
include 'core.inc.php';
include 'connect.inc.php';
if(!loggedin()) {header('Location:index.php');}
?>

 <html>
 <head>

    <title>Change Your Password</title>   
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 

  <style type="text/css">

    .contain{width:90%;margin:auto;text-align:center;}
  </style>

</head>
<body>

<?php
include 'navbar.php'
 ?>
    <div class=contain>
 
                
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type=password id="opwd" maxlength="40">
    <label class="mdl-textfield__label" for="unam">Old Password
  </label></div>
           <br> <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type=password id="npwd" maxlength="40">
    <label class="mdl-textfield__label" for="unam">New password
  </label></div>
        <br>    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type=password id="npwdc" maxlength="40">
    <label class="mdl-textfield__label" for="unam">New Password
  </label></div>
<br>

                  <button type=button id="save_btn" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                    Save Changes
                  </button>
        
 <div id="demo-snackbar-example" class="mdl-js-snackbar mdl-snackbar">
  <div class="mdl-snackbar__text"></div>
  <button class="mdl-snackbar__action" type="button"></button>
</div>

 
  </div>



  <script type="text/javascript">
  (function() {
  'use strict';
  var snackbarContainer = document.querySelector('#demo-snackbar-example');
  var showSnackbarButton = document.querySelector('#save_btn');
  var handler = function(event) {
    showSnackbarButton.style.backgroundColor = '';
  };
  showSnackbarButton.addEventListener('click', function() {
    'use strict';
    var op=$('#opwd').val();
var np=$('#npwd').val();
var npc=$('#npwdc').val();
$.post('savepchange.php',{op:op,np:np,npc:npc},function(dataout){
  //$("#slideNotice").html(dataout).slideDown().delay(500).slideUp();
    var data = {
      message: dataout,
      timeout: 2000,
    };
    snackbarContainer.MaterialSnackbar.showSnackbar(data);
    });

  });
}());
  </script>
</body>
 </html>
