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

            
            echo "<div class=form-control><select id=usernm value=hello><option value='def'>choose....</option>";
      
            for($ind=$num_rows-1;$ind>=0;$ind--)
            {
             $us_id=mysql_result($result,$ind,'id');
             $unm=mysql_result($result,$ind,'username');
             $fnm=mysql_result($result,$ind,'fname');
             $srnm=mysql_result($result,$ind,'srname');
             
            if($id!=$us_id)echo "<option value='$unm'>$fnm $srnm </option>";
            }
            echo"</select></div>";
          }
      }

?>
<html>
<head></head>
<body>

  <script src="js/jquery.min.js"></script>  
  <script type="text/javascript">
    $(document).ready(function(){
      $('#usernm').change(function(){
        v=$( "#usernm option:selected" ).attr('value');
        $('#un').val(v);
        var un=$('#un').val();
      $.post('getmsg.php',{un:un},function(data)
      {
        $("#messages").html(data).show(function(){
          $("#messages").scrollTop($("#messages")[0].scrollHeight);
        });  
      });

    });
});
  </script>
</body>
</html>
