<?php
include "./includes/application_top.php";
include "./includes/admin_login_check.php";

$active_link_change_password="active";

if(isset($_POST) && isset($_POST['change_password']) && $_POST['change_password']==1 && !empty($_POST['current_password']))
	{ //pr($_POST);
//prx($_SESSION);
			$current_password = sha1($_POST['current_password']);			
			$current_username=$_POST['current_username'];
			
			$queryC 	= 	"SELECT * FROM admins WHERE id='".$_SESSION['admin_member_id']."' AND password= '".$current_password."'";			
			$resultC	= 	$db->query($queryC) or die(mysqli_error($db));			
			
			if($resultC->num_rows>0)
			{	
				$rowC		=	$resultC->fetch_assoc();
				$new_password= sha1($_POST['new_password']);
					
				$queryChange 	= "UPDATE admins SET `password`= '".$new_password."' WHERE id='".$rowC['id']."'";
				$resultChange	= $db->query($queryChange) or die (mysqli_error($db));
				if($resultChange)
				{
					$_SESSION['session_msg_success']= "New Password Updated successfully !";
				}					
			}				 
			else
			{			 
				$_SESSION['session_msg_fail'] = "Wrong Username or Password !";
			}			 
	}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/favicon.ico">

    <title>Change Password :: <?php echo $site_title; ?></title>

    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="./css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/navbar-fixed-top.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<script language="javascript" src="./js/functions.js"></script>
	<script language="javascript" src="./js/retype_pass.js"></script>

</head>

<body>

    <!-- Fixed navbar -->
    <?php include "includes/nav_header.php"; ?>

    <div class="container">

        <div class="row">
  <div class="col-md-6 col-md-offset-2">
  

    <?php include "includes/session_fail_success_msg.php";?>


    <form action="" method="post" name="change_password" id="change_password" onsubmit="return check_form_change_password();">
      <h3>Change Password</h3>
      <div class="well">
        
        <div class="form-group">
            <label for="current_password">Current Password</label>
            <input type="password" id="current_password" name="current_password" class="form-control"/>            
        </div>
      
        <div class="form-group">
            <label for="new_password">New Password</label>
            <input type="password" id="new_password" name="new_password" class="form-control"/>            
        </div>
		
		<div class="form-group">
            <label for="re_password">Confirm Password</label>
            <input type="password" id="re_password" name="re_password" class="form-control"/>            
        </div>
      
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Change Password</button>
          <input name="change_password" type="hidden" id="change_password" value="1" />
        </div>

      </div>
    </form>
  </div>
</div>


    
	
	
	</div>
    <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>