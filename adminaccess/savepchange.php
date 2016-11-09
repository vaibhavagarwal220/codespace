<?php
include 'core.inc.php';
include 'connect.inc.php';
if(!loggedin()) {header('Location:index.php');}
$id=getfield('id');
?>
<?php
if(isset($_POST['op'])&&isset($_POST['np'])&&isset($_POST['np']))
{
$oldpwd=md5(mysql_real_escape_string(htmlentities($_POST['op'])));
$newpwd=md5(mysql_real_escape_string(htmlentities($_POST['np'])));
$newpwdmatch=md5(mysql_real_escape_string(htmlentities($_POST['npc'])));
  if(strlen($_POST['np'])>=8 || strlen($_POST['np'])>=8)
  {
    if($pwd==$oldpwd)
    {
    if($newpwd==$newpwdmatch)
          {
            if($oldpwd!=$newpwd)
            {
              $update=mysql_query("UPDATE admin SET pword='$newpwd' WHERE id=$id;");
                if($update==true) 
                 echo "New details are saved";
                else 
                  echo "There was an error";
            }
            else 
              echo "please enter a new password";
          }
    else 
      echo 'Passwords do not match';
    }
  else 
    echo 'Old Password is not correct';
  }
  else 
  {
   echo 'Enter at least 8 characters'; 
  }
}
?>
