
<?php
require 'connect.inc.php';
require 'core.inc.php';
if(!loggedin()) {header('Location:index1.php');}
$uid=getfield('id');
if(isset($_POST['un']))
  {$username=$_POST['un'];
   $query="SELECT  `id`,`fname`,`srname` FROM `promine`.`user_in` WHERE `username`= '$username';";
   $res=@mysql_query($query);
   $rows=@mysql_num_rows($res);
   $ud=@mysql_result($res,0,'id');
   $fn=@mysql_result($res,0,'fname');
   $sr=@mysql_result($res,0,'srname');

  if(!empty($username)){
    $query1="SELECT  `content`,`type` FROM `promine`.`$uid` WHERE `msgto`= $ud ORDER BY `time` DESC;";
    $query2="SELECT  `imgln` FROM `promine`.`user_in` WHERE `id`= $uid";
    $query3="SELECT  `imgln` FROM `promine`.`user_in` WHERE `id`= $ud";                  
    
    $res2=@mysql_query($query2);
    $res3=@mysql_query($query3);
    $imgl=mysql_result($res2,0,'imgln');
    $imgr=mysql_result($res3,0,'imgln');
      echo "<h5 class=cname>$fn $sr <a id=hd>&times;</a></h5>";
      
      if($result=mysql_query($query1))
      {
        $num_rows=mysql_num_rows($result);
        if($num_rows==0)
          echo '<div class=nt>No messages yet</div>';
        else if($num_rows>=1)
          {

            for($ind=$num_rows-1;$ind>=0;$ind--)
            {
             $content=mysql_result($result,$ind,'content');
             $type=mysql_result($result,$ind,'type');
             
             if($type=='rec')
              echo "<div class=recim><img src=$imgr class=\"icn img img-circle\"><div class=rec>$content</div></div><br>";
            else if($type=='sent')
              echo "<div class=sentim><div class=sent>$content</div><img src=$imgl class=\"icn img img-circle\"></div><br>";
            }
            
            
          }
      
      }
      else {echo 'Loading...';}
  }}
?>
<html>
<head></head>
<body>
  <script src="js/jquery.min.js"></script>  
  <script type="text/javascript">
    $(document).ready(function(){
  
  $('#hd').click(function(){
  $('.pmsg').hide();
  
});
});
  </script>
</body>
</html>

