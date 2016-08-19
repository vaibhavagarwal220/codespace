
<?php
require 'connect.inc.php';
require 'core.inc.php';
if(!loggedin()) {header('Location:index1.php');}

if(isset($_POST['id']))
  {$id=$_POST['id'];
    $q1="SELECT `imgln` FROM `promine`.`imgup` WHERE `id`= $id;";
  $result=@mysql_query($q1);
  $imglocn=mysql_result($result,0,'imgln');
  unlink($imglocn);
   $query="DELETE FROM `promine`.`imgup` WHERE `id`= $id;";
   if($res=@mysql_query($query)) echo 'Deletion Successful';
  
}

?>
<html>
<head></head>
<body>
  <script src="js/jquery.min.js"></script>  
  <script type="text/javascript">
    $(document).ready(function(){

});
  </script>
</body>
</html>

