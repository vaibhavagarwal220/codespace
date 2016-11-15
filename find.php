<?php
require 'core.inc.php';
require 'connect.inc.php';
if(!loggedin()) {header('Location:index.php');}
$id=getfield('fname');

if(isset($_GET['q']))
  $qcode=$_GET['q'];
  
?>
 <html>
 <head>
   
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search</title>
  <style type="text/css">
  .mdl-grid{text-align:center;}
  #contain{width:80%;margin:auto;}
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
    <input class="mdl-textfield__input" type="text" id="term" value="<?php if(isset($qcode)) echo $qcode;?>">
    <label class="mdl-textfield__label" for="term">Search...</label>
  </div>

      






<div class="tab-wrapper">
  
  <ul class="tab-menu">
    <li class="active">Users</li>
    <li>Problems</li>

  </ul>
  
  <div class="tab-content">
    <div id="data1"></div>
    <div id="data2"></div>
  </div><!-- //tab-content -->
  
</div><!-- //tab-wrapper -->




		<script type="text/javascript" src="js/search.js"></script>
	</div>	



<style type="text/css">

.tab-wrapper {
  margin: 60px auto;
  width: 100%;
  
}

.tab-menu li {
  position:relative;
  background-color: #fff;
  color:#bcbcbc;
  display: inline-block;
  padding: 20px 40px;
  opacity: 0.8;
  cursor:pointer;
  z-index:0;
}

.tab-menu li:hover {
  color:#464646;
}

.tab-menu li.active {
  color:#464646;
  opacity: 1;
}

.tab-menu li.active:hover {
  color:#464646;
}

.tab-content>div {
  background-color: #fff;

  width: 100%;
  padding: 50px;   
  min-height:200px;
}

.line {
  position:absolute;
  width: 0;
  height: 7px;
  background-color: aqua;
  top: 0;
  left: 0;
}




</style>
<script type="text/javascript">
$(document).ready(function() {
  
  var $wrapper = $('.tab-wrapper'),
      $allTabs = $wrapper.find('.tab-content > div'),
      $tabMenu = $wrapper.find('.tab-menu li'),
      $line = $('<div class="line"></div>').appendTo($tabMenu);
  
  $allTabs.not(':first-of-type').hide();  
  $tabMenu.filter(':first-of-type').find(':first').width('100%')
  
  $tabMenu.each(function(i) {
    $(this).attr('data-tab', 'tab'+i);
  });
  
  $allTabs.each(function(i) {
    $(this).attr('data-tab', 'tab'+i);
  });
  
  $tabMenu.on('click', function() {
    
    var dataTab = $(this).data('tab'),
        $getWrapper = $(this).closest($wrapper);
    
    $getWrapper.find($tabMenu).removeClass('active');
    $(this).addClass('active');
    
    $getWrapper.find('.line').width(0);
    $(this).find($line).animate({'width':'100%'}, 'fast');
    $getWrapper.find($allTabs).hide();
    $getWrapper.find($allTabs).filter('[data-tab='+dataTab+']').show();
  });

});//end ready
</script>
<script type="text/javascript">
        $(document).ready(function(){

                    var sterm=$('#term').val();
        $.post('search.php',{
        sterm:sterm         
        },function(data){
            $('#data1').html(data);
        });     

        $.post('sq.php',{
        sterm:sterm         
        },function(dataq){
            $('#data2').html(dataq);
        });


        });

</script>
</body>
 </html>



