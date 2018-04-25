<?php
	include './includes/config.php';
	if(isset($_POST['submit']))
	{
		$email = $_POST['email'];
		$password = sha1($_POST['password']);

		$query = "SELECT * FROM userdetail WHERE email = '$email' AND password = '$password'" ;
		$result = mysqli_query($conn,$query);
		if (mysqli_num_rows($result) == 1) 
		{
			$row = mysqli_fetch_assoc($result);
			session_start();
			$_SESSION['current_user_id'] = $row['id'];
			$_SESSION['name'] = $row['name'];
			$_SESSION['email'] = $row['email'];
			header("Location:index.php?Page=Home");
		} 
		else 
		{
		//Fail
			//echo "Wrong credential";
			header("Location:index.php?Page=Login&loginFailed=true");

		}
	}
	else
	{
		header("Location:index.php?Page=Login");
		
	}
?>