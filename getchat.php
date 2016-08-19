<?php
require 'connect.inc.php';
require 'core.inc.php';
$id=getfield('id');
$query="SELECT * from user_in;";

      if($result=mysql_query($query))
      {
        $num_rows=mysql_num_rows($result);
        if($num_rows==0)
          echo 'error retrieving';
        else if($num_rows>=1)
          {

            
            echo "<ul>";
      
            for($ind=$num_rows-1;$ind>=0;$ind--)
            {
             $us_id=mysql_result($result,$ind,'id');
             $unm=mysql_result($result,$ind,'username');
             $fnm=mysql_result($result,$ind,'fname');
             $srnm=mysql_result($result,$ind,'srname');
             $imgl=mysql_result($result,$ind,'imgln');
             $stat=(onln($unm))?"<img src=onln.jpg class=\"icn-lg\">":"<img src=ofln.jpg class=\"icn-lg\">";
            if($id!=$us_id)echo "<a title=$unm class=\"msgb\"><div class=persn><img src=\"$imgl\" class=\"icn-lg\"> $fnm $srnm $stat</div></a>";
            }
            echo"<ul>";
          }
      }

?>
<html>
<head></head>
<body>
<style type="text/css">
  .msgb{cursor: pointer;}
</style>
  <script src="js/jquery.min.js"></script>  
  <script type="text/javascript" >
      
  $('.msgb').click(function(){
      $('.pmsg').show();
      $('#un').val($(this).attr('title'));
      var un=$('#un').val();
      $.post('getmsg.php',{un:un},function(data)
      {
        $("#messages").html(data).show(function(){
          $("#messages").scrollTop($("#messages")[0].scrollHeight);
        });  
      });

    });
    
  </script>
  <script type="text/javascript" src=js/bottom.js></script>
</body>
</html>
