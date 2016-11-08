<?php
require 'core.inc.php';
require 'connect.inc.php';
if(!loggedin()) {header('Location:index.php');}
$id=getfield('fname');
?>
 <html>
 <head>
   
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search</title>
  <style type="text/css">
  #contain{width:70%;margin:auto;}
  #wide{width:100%;font-family:'Roboto';}
  #term{font-size:30px;font-weight:bold;}
  h2{font-size:40px;font-family:'Roboto';}
  </style>
</head>
<body>
  
<?php
include 'navbar.php'
 ?>
	<div id="contain">
 <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="wide">
    <input class="mdl-textfield__input" type="text" id="term">
    <label class="mdl-textfield__label" for="term">Search...</label>
  </div>

      


<div class="tabs">
    <ul class="tab-links">
        <li class="active"><a href="#data1">Users</a></li>
        <li><a href="#data2">Problems</a></li>
    </ul>
 
    <div class="tab-content">
        <div id="data1" class="tab active">
        </div>
 
        <div id="data2" class="tab">
        </div> 
    </div>
</div>



		<script type="text/javascript" src="js/search.js"></script>
	</div>	


</div>
  </main>
</div>
<style type="text/css">
.tabs {
    width:100%;
    display:inline-block;
}
 
    /*----- Tab Links -----*/
    /* Clearfix */
    .tab-links:after {
        display:block;
        clear:both;
        content:'';
    }
 
    .tab-links li {
        margin:0px 5px;
        float:left;
        list-style:none;
    }
 
        .tab-links a {
            padding:9px 15px;
            display:inline-block;
            border-radius:3px 3px 0px 0px;
            background:#7FB5DA;
            font-size:16px;
            font-weight:600;
            color:#4c4c4c;
            transition:all linear 0.15s;
        }
 
        .tab-links a:hover {
            background:#a7cce5;
            text-decoration:none;
        }
 
    li.active a, li.active a:hover {
        background:#fff;
        color:#4c4c4c;
    }
 
    /*----- Content of Tabs -----*/
    .tab-content {
        padding:15px;
        border-radius:3px;
        box-shadow:-1px 1px 1px rgba(0,0,0,0.15);
        background:#fff;
    }
 
        .tab {
            display:none;
        }
 
        .tab.active {
            display:block;
        }
        .tab{text-align:center;}
</style>
<script type="text/javascript">
$(document).ready(function() {
    $('.tabs .tab-links a').on('click', function(e)  {
        var currentAttrValue = $(this).attr('href');
 
        // Show/Hide Tabs
        $('.tabs ' + currentAttrValue).show().siblings().hide();
 
        // Change/remove current tab to active
        $(this).parent('li').addClass('active').siblings().removeClass('active');
 
        e.preventDefault();
    });
});
</script>
</body>
 </html>



