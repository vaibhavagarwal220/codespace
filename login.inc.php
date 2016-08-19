<?php
if(!empty($_COOKIE['uid'])&&isset($_COOKIE['uid'])){$_SESSION['user_id']=$_COOKIE['uid'];
            header('Location: index1.php');}/*to directly login in case of preset cookies*/
else {if(isset($_POST['uname'])&&isset($_POST['pword']))//check if the values are set i.e. form is submitted by user
{$usern=$_POST['uname'];//getting values using more secure post method

$passw=$_POST['pword'];

$hashed=md5($passw);

if(!empty($usern) && !empty($passw))/*check the fields are not empty*/
    {
    $query="SELECT id from user_in where username='".mysql_real_escape_string($usern)."' AND pword='".mysql_real_escape_string($hashed)."';";/*query to see any user is there with a given username and password*/

      if($result=mysql_query($query))/*run the query */
      {
        $num_rows=mysql_num_rows($result);
        if($num_rows==0)/*check if no rows are returned there is no such user*/
          echo "<div class=\"alert alert-danger fade in log\">Invalid Credentials<a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a></div>";
        else if($num_rows==1)
          { /*get user id from mysql table*/
            $us_id=mysql_result($result,0,'id');
			$t=time();
       /*check if the checkbox is selected to make cookies*/  
       if(isset($_POST['rmmbr'])&&!empty($_POST['rmmbr'])) setcookie('uid',$us_id,$t+60*60*24*365);

			/*start a session and send to index1.php*/$_SESSION['user_id']=$us_id;
            
            $qry="INSERT INTO `promine`.`online` (`id`, `username`, `time`) VALUES (NULL, '$usern', CURRENT_TIMESTAMP);";
            if($res=mysql_query($qry));     
            {
            header('Location: index1.php');}
          }
      }
    }//check all fields are filled
else echo "<div class=\"alert alert-danger fade in log\">Please fill in all the fields<a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a></div>";
}}
?>

<!--sign up -->
<?php
  if(!loggedin()){
    if(isset($_POST['uname1'])&&isset($_POST['pword1'])&&isset($_POST['pword11'])&&isset($_POST['namef1'])&&isset($_POST['namel1'])&&isset($_FILES['proim']['name']))/*to check that user has submitted the signup form*/
    {$usern1=$_POST['uname1'];//getting values from fields using post method
      $passw=$_POST['pword1'];
      $fname=$_POST['namef1'];
      $lname=$_POST['namel1'];
      $tomatch=$_POST['pword11'];
      $impronm=$_FILES['proim']['name'];//getting file name
      $improtmp=$_FILES['proim']['tmp_name'];//getting its temporary location
      $hashed=md5($passw);//encrypting the password

      if(!empty($usern1) && !empty($passw)&& !empty($fname)&& !empty($lname)&&!empty($impronm))/*to see the values are not empty*/
        {
          if($tomatch==$passw)/*matching password and re-enter password*/
            {
              $query1="SELECT username from user_in where username='$usern1';";/*query to check username already exists*/
              $reslt=mysql_query($query1);/*running the query*/
              if(mysql_num_rows($reslt)==1)/*checking that same username exists*/
              {
                echo "<div class=\"alert alert-danger fade in signup\">Username already Exists<a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a></div>";//producing error if same username exists 
              }
              else
              {$location='imgprof/'.$impronm;
          			echo $location;
          			echo $improtmp;/*moving the profile picture onto our server*/
                if(move_uploaded_file($improtmp,$location))
                {
		                $query="INSERT into `promine`.`user_in` (`username`,`fname`,`srname`,`pword`,`imgln`) VALUES ('".mysql_real_escape_string($usern1)."','".mysql_real_escape_string($fname)."','".mysql_real_escape_string($lname)."','".mysql_real_escape_string($hashed)."','".$location."');";//query to upload our data on server database
		                if($result=mysql_query($query))//run the query
		                {
		                  echo "<br><br><br><br><div class=\"alert alert-success signup\">Your account has been created successfully<a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a></div>";/*giving notification about successful creation of account*/
		                   $query="SELECT id from user_in where username='".mysql_real_escape_string($usern1)."' AND pword='".mysql_real_escape_string($hashed)."';";//finding the id of newly made account
		                    $result=mysql_query($query);//run the query

		                    $us_id=mysql_result($result,0,'id');
		                      //getting the user id
		                    $t=time(); 
		                    $query1="CREATE TABLE `promine`.`$us_id` ( `id` INT NOT NULL AUTO_INCREMENT ,  `msgto` INT NOT NULL ,  `type` VARCHAR(10) NOT NULL ,  `time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,  `content` VARCHAR(1000) NOT NULL ,    PRIMARY KEY  (`id`)) ENGINE = InnoDB";
		                      if(!mysql_query($query1)) echo 'error';
					
								$_SESSION['user_id']=$us_id;//starting the session for the user
		            			header('Location: index1.php');
		                }
              }
              else {echo "<div class=\"alert alert-danger fade in signup\">error uploading image<a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a></div>";}//display error about image
            }
            }
        else
        {
        echo "<div class=\"alert alert-danger fade in signup\">Passwords do not match<a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a></div>";//display error about password
        }

      }
  else echo "<div class=\"alert alert-danger fade in signup\">Please fill in all the fields<a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a></div>";//display error about empty fields
  }
}
else if(loggedin())
{
  echo "<div class=\"alert alert-danger fade in signup\">Already logged in and registered<a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a></div>";//display error on already being logged in
}
?>








<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css" type="text/css">
  <style>
    .log{position:absolute;top:80px;left:900px;padding:15px;}
    .signup{position:absolute;top:500px;left:500px;padding:15px;}
    .form-group{margin-left: 10px;margin-right: 10px;}
    .lg {font-size:100px;}
    h1,h2.ttl,h3.subttl {padding:7px; margin-left:10px;}
    #login{position: relative;top:10px;left: 30px;border: 1px solid rgb(131,131,112);padding: 8px;
      font-family: Tahoma;background-color: #B6E97C;}
    .jumbotron{background-color: rgba(231,131,112,0.6);background-image: url(phone1.jpg);
    	background-repeat: round;color:#7DA1E9;}
      .bg-grey{background-color: grey;}
      *{color: white;}
  </style>
  <script>
    $(document).ready(function(){
    $('[data-toggle="popover"]').popover(); 
    }); 
  </script>
</head>
<body>       
<div class="container-fluid">
<div class=jumbotron><h1>Title</h1><p>Join the most awesome social network right here, right now</p>
      <div class="container-fluid">
    <div id="login" class=row>
        <form method="post" action="<?php echo $current_file;?>" class="form-inline">
            <h4>Log in!</h4><div class='form-group'>
            <div><input type="text" name="uname" maxlength="40" value="<?php if(isset($usern)) echo $usern;?>" placeholder="enter username" required class="form-control"></div></div>
      <div class='form-group'>
            <div><input type="password" name="pword" required class="form-control" placeholder="enter Password"></div>
      </div>
      
      <div class="form-group"> 
        
          <div class="checkbox">
            <label><input type="checkbox" name=rmmbr> Remember me</label>
          </div>
        
      </div>
          <input type="submit" value="Log In" class="btn btn-primary"  class="form-control">
        </form></div></div>
    </div>

  <div id="signup">
    <form method="post" action="<?php echo $current_file;?>" enctype="multipart/form-data" class= "form-horizontal">
    <h1>SIGN UP</h1>
        <div class='form-group'>
            <div class="col-sm-offset-2 col-sm-6"><input type="text" name="uname1" maxlength="40" value="<?php if(isset($usern1)) echo $usern1;?>" required placeholder=username class="form-control" id=nameuser minlength=6></div>
            <div class="col-sm-3" id=ustatus>
            </div>
            </div><br><br>
      <div class='form-group'>
            <div class="col-sm-offset-2 col-sm-6"><input placeholder="password" type="password" name="pword1" required class="form-control"></div></div><br><br>
        
        
        <div class="form-group"><div class="col-sm-offset-2 col-sm-6"><input type="password" name="pword11" required class="form-control" placeholder="re-enter password"></div></div><br><br>
      
        
        <div class="form-group"><div class="col-sm-offset-2 col-sm-6"><input type="text" name="namef1" maxlength="30" value="<?php if(isset($fname)) echo $fname;?>" required class="form-control" placeholder="first name"></div></div><br><br>
      
        
        <div class="form-group"><div class="col-sm-offset-2 col-sm-6"><input type="text" name="namel1" maxlength="30" value="<?php if(isset($fname)) echo $lname;?>" required class="form-control" placeholder="last name"></div></div><br><br>
      
        
        <div class="form-group"><label for="proim" class="control-label col-sm-2">Image:</label><div class=col-sm-6>   <input type="file" name="proim" required  class="form-control" accept="image/*"></div></div>
      
        
        <label for="butn" class="control-label col-sm-2"></label> <div class=col-sm-6>   <input type="submit" value="Sign Up" class="btn btn-primary"  class="form-control" id=btnsignup></div>
    </form>
  </div>
        
    </div>
    <br><br>
        
    <br><br>
    <div class="container-fluid">
      <div class=row>
        <div class="col-sm-2 col-sm-offset-2">
          <span class="glyphicon glyphicon-globe lg"></span>
        </div>
        <div class="col-sm-1 col-sm-offset-1">
          <span class="glyphicon glyphicon-leaf lg"></span>
        </div>
        <div class="col-sm-3 col-sm-offset-2 ">
          <span class="glyphicon glyphicon-heart lg"></span>
        </div>
      </div>
      <br><br><br><br><br>
      <div class=row>
        <div class="col-sm-2 col-sm-offset-2">
          <span class="glyphicon glyphicon-headphones lg"></span>
        </div>
        <div class="col-sm-1 col-sm-offset-1">
          <span class="glyphicon glyphicon-phone lg"></span>
        </div>
        <div class="col-sm-3 col-sm-offset-2">
          <span class="glyphicon glyphicon-envelope lg"></span>
        </div>
      </div><br><br>
    <br><br>
    <div class="container-fluid bg-grey">
        <h3 class="text-center">CONTACT</h3>
        <div class=row>
        <div class=col-sm-6>
            <p><span class="glyphicon glyphicon-map-marker"></span> B6 Hostel,IIT Mandi</p>
            <a href=tel:9736260564><p><span class="glyphicon glyphicon-phone"></span> 9736260564</p>
             </a> <a href=mailto:vaibhavagarwal220@gmail.com><p>  <span class="glyphicon glyphicon-envelope"></span> vaibhavagarwal220@gmail.com
            </p></a></div>
        <div class=col-sm-6>
        <div class="row">
        <div class="col-sm-5 form-group">
            <input type="text" placeholder="Name" class="form-control"></div>
            
                <div class="col-sm-6 form-group">
                    <input type="text" placeholder="Email Address" class="form-control">
                </div>
            </div>
            <textarea class="form-control" rows=5 placeholder=Comment></textarea><br>
        <div class=row>
        <div class=col-sm-12>
            <button class="btn btn-default pull-right" type="submit">Send</button><br><br>
                </div>
        </div></div>     
        </div>
        </div>
    </div>
    <br><br>
    <br><br>
    <script type="text/javascript" src=js/check.js></script>
</body>
</html>
