<?php
   include "../includes/config.php";
   //print_r($_POST);
   //exit;
	   
	   
	   if(isset($_POST['login'])) 
		{
			if(trim(empty($_POST['username'])) || trim(empty($_POST['password'])))
			{
				$_SESSION["session_msg_fail"] = "You have entered an incorrect username or password. Please try again.";
				header("Location: login.php");
				exit;
			}
				
			unset($_SESSION['admin_member_id']);
			$_SESSION = array();
			
				
			$login_validate=0;
			$password = sha1($_POST['password']);
		
		
			$query_check_admin	=	"SELECT * FROM admins WHERE username='".$_POST['username']."' AND password='".$password."'";
			
			$result_check_admin = $db->query($query_check_admin) or die(mysqli_error($db));
					
			// check that the username and password is valid or not
			if($result_check_admin->num_rows>0) 
			{
					$row_check_admin	=	$result_check_admin->fetch_assoc();

					$_SESSION['admin_member_id']	=	$row_check_admin["id"];
					$_SESSION['login_name']		=	$row_check_admin["username"];
					// print_r($_SESSION);exit;
					$login_validate=1;

					 

					header("Location: ./index.php");
					exit;

			} //end if
	   }
	   
	$_SESSION["session_msg_fail"] = "You have entered an incorrect username or password. Please try again.";
	header("Location: login.php");
	exit;   
?>