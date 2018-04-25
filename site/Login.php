<?php 
	error_reporting(0); 
	if ($_GET["loginFailed"])
	{
		$message = "Incorrect Credential";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
?>
<?php 
	error_reporting(0); 
	if ($_GET["success"])
	{
		$message = "Register Successfuly Thank You";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
?>

<div class="banner-top">
		<div class="container">
			<h1>Login</h1>
			<em></em>
			<h2><a href="index.php?Page=Home">Home</a><label>/</label>Login</h2>
		</div>
</div>


<div class="container">
	<div class="login">
		<form action="?Page=LoginSubmit" method="post">
			<div class="col-md-6 login-do">
				<div class="login-mail">
					<input type="text" placeholder="Email" name="email" required>
					<i class="glyphicon glyphicon-envelope"></i>
				</div>
				<div class="login-mail">
					<input type="password" placeholder="Password" name="password" required>
					<i class="glyphicon glyphicon-lock"></i>
				</div>
				<label class="hvr-skew-backward"><input type="submit" name="submit" value="Login"></label>
			</div>
			<div class="col-md-6 login-right">
				 <h3>Free Account</h3>
				 <p>Create your account for free and order product.</p>
				 <a href="?Page=Signup" class=" hvr-skew-backward">Register</a>
			</div>
			<div class="clearfix"> </div>
		</form>
	</div>
</div>

 
