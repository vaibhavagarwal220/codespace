<?php
require '../connect.inc.php';
require '../core.inc.php';
$query="SELECT * from user_in;";

      if($result=mysql_query($query))
      {
        $num_rows=mysql_num_rows($result);
        if($num_rows==0)
          echo 'error retrieving';
        else if($num_rows>=1)
          {
            echo"<h3>CodeSpace Users</h3>";
            echo "<table class=\"mdl-data-table mdl-js-data-table mdl-shadow--2dp\">";
            echo 
            "
            <thead>
            <tr>
            <th>User ID</th>
            <th>Username</th>
            <th>Name</th>
            <th>Password(md5 Hash)</th>
            <th>Image</th>
            </tr>
            </thead><tbody>";
            for($ind=$num_rows-1;$ind>=0;$ind--)
            {
             $us_id=mysql_result($result,$ind,'id');
             $unm=mysql_result($result,$ind,'username');
             $fnm=mysql_result($result,$ind,'fname');
             $srnm=mysql_result($result,$ind,'srname');
             $pw=mysql_result($result,$ind,'pword');
             $imgl='../'.mysql_result($result,$ind,'imgln');
             
            echo 
            "<tr>
            <td>$us_id</td>
            <td>$unm</td>
            <td>$fnm $srnm</td>
            <td>$pw</td>
            <td><img src=\"$imgl\" class=pport></td>
            
            </tr>";
            }
            echo "</tbody></table>";
          }
      }

?>