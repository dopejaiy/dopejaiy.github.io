<?php 
	error_reporting(0); 
	
	if ($_GET["ServerSideErrors"])
	{
		echo $message = $_SESSION['server_errors'];exit;
		$_SESSION['server_errors'] = "";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
	
	if ($_GET["duplicateEmail"])
	{
		$message = "Already Resgistred with this email";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
?>

<div class="banner-top">
	<div class="container">
		<h1>Sign up</h1>
		<em></em>
		<h2><a href="index.php?Page=Home">Home</a><label>/</label>Sign Up</h2>
	</div>
</div>


<div class="container">
	<div class="login">
		<form action="?Page=SignupSubmit" method="post">
			<div class="col-md-6 login-do">
				<div class="login-mail">
					<input type="text" placeholder="E-mail" name="email" required>
					<i class="far fa-envelope"></i>
				</div>
				<div class="login-mail">
					<input type="text" placeholder="Name" name="name" required>
					<i class="fas fa-user-plus"></i>
				</div>
				<div class="login-mail">
					<input type="text" placeholder="Address"  name="adress" required>
					<i class="fas fa-map-marker"></i>
				</div>
				<div class="login-mail">
					<input type="number" placeholder="Phone Number" name="phone" required>
					<i class="glyphicon glyphicon-phone"></i>
				</div>
				<div class="login-mail">
					<input type="number" placeholder="Weight" name="weight" required>
					<i class="fas fa-compress-wide"></i>
				</div>
				<div class="login-mail">
					<input type="number" placeholder="Height" name="height" required>
					<i class="fas fa-compress-wide"></i>
				</div>
				<div class="login-mail">
					<input type="number" placeholder="Collar Size" name="collarSize">
					<i class="fas fa-compress-wide"></i>
				</div>
				<div class="login-mail">
					<input type="password" placeholder="Password" name="password" required="">
					<i class="glyphicon glyphicon-lock"></i>
				</div>
				<label class="hvr-skew-backward"><input type="submit" name="submit" value="Sign up"></label>
			</div>
			<div class="col-md-6 login-right">
				 <h3>Login</h3>
				 <p>If you already have account, please login.</p>
				 <a href="?Page=Login" class="hvr-skew-backward">Login</a>
			</div>
			<div class="clearfix"> </div>
		</form>
	</div>
</div>


