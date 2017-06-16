<?php
include 'core.inc.php';
include 'connect.inc.php';
if(!loggedin()) {header('Location:index.php');}
$id=getfield('id');
$pwd=getfield('pword');
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
              $update=mysql_query("UPDATE user_in SET pword='$newpwd' WHERE id=$id;");
                if($update==true) 
                 echo "Password Succesfully Changed";
                else 
                  echo "There Was an Error";
            }
            else 
              echo "Please Enter a New Password";
          }
    else 
      echo 'Passwords Do Not Match';
    }
  else 
    echo 'Old Password is Not Correct';
  }
  else 
  {
   echo 'Enter At Least 8 Characters'; 
  }
}
?>
