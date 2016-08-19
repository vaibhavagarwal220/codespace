
<?php
require 'connect.inc.php';
require 'core.inc.php';
if(!loggedin()) {header('Location:index1.php');}
$uid=getfield('id');
  
    $query1="SELECT  `imgln`,`id`,`time` FROM `promine`.`imgup` WHERE `upby`= $uid ORDER BY `time` ASC;";
                      

      if(@($result=mysql_query($query1)))
      {
        $num_rows=mysql_num_rows($result);
        if($num_rows==0)
          echo '<div class=nt>No images uploaded </div>';
        else if($num_rows>=1)
          {

            for($ind=$num_rows-1;$ind>=0;$ind--)
            {
             $ln=mysql_result($result,$ind,'imgln');
             $idimg=mysql_result($result,$ind,'id');
             $t=mysql_result($result,$ind,'time');
              echo "
              
                 <a class=imge title=$t  id=$idimg><div><img src=$ln class=imgd><span class=\"glyphicon glyphicon-remove\" id=$idimg></span></div></a>
              
              ";
            }
            
            
          }
      
      }
      else {echo '<div class=nt>Loading...</div>';}
  

?>
<html>
<head></head>
<body>
  <script src="js/jquery.min.js"></script>  
  <script type="text/javascript">
  
  $(document).ready(function() {
      
      $('.glyphicon-remove').click(function(){
        $('#'+$(this).attr('id')).remove();
        var id=$(this).attr('id');
        $.post('delimg.php',{id:id},function(data){
        $('.nt').html(data).show();
});
      });
    
   /*    var id=$(this).attr('id');
     var myImg = document.getElementById(id);
        var realWidth = myImg.naturalWidth;
        var realHeight = myImg.naturalHeight;
        myImg.height=""+realHeight;
        $('#'+id).css('height',realHeight +'px').css('width',realWidth +'px').delay(3000);
             });
     $('.imgd').mouseleave(function(){
      var id=$(this).attr('id');
      
             });

*/});
    </script>
  </body>
</html>

