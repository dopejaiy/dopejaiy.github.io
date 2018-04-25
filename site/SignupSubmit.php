<?php
include './includes/config.php';
/*
echo "Email = ".$_GET["email"] . "</br>";
echo "Name = ".$_GET["name"] . "</br>";
echo "Address = ".$_GET["address"] . "</br>";
echo "Phone = ".$_GET["phone"] . "</br>";
echo "Password = ".$_GET["password"] . "</br>";*/

$error_flag = 1;

if(isset($_POST['submit']))
{
	$email = $_POST['email'];
	$name = $_POST['name'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$weight = $_POST['weight'];
	$height = $_POST['height'];
	$collarSize = $_POST['collarSize'];
	$password = $_POST['password'];
	
	// to apply server side validations
	if(empty($email))
	{
		$error_flag = 0;
		$message .= "Please enter email. \n";
	}
	
	if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email))
	{
		$error_flag = 0;
		$message .= "Please enter correct email. \n";
	}
	
	if(empty($name))
	{
		$error_flag = 0;
		$message .= "Please enter name. \n";
	}
	
	if(empty($password))
	{
		$error_flag = 0;
		$message .= "Please enter password. \n";
	}
	
	if ($error_flag == 0) 
	{
		$_SESSION['server_errors'] = $message;
		header("Location:index.php?Page=Signup&ServerSideErrors=true");
    }
	
	$sqlSelect = "SELECT email FROM userdetail where email = '$email'";
	$result = mysqli_query($conn, $sqlSelect);

	if (mysqli_num_rows($result) > 0) 
	{
		header("Location:index.php?Page=Signup&duplicateEmail=true");
    }
    else
    {

		$passwordSha1 = sha1($password);
		$sql = "INSERT INTO userdetail (email, name, address, phone, weight, height, collarSize, password, created) VALUES ('$email','$name','$address','$phone','$weight','$height','$collarSize','$passwordSha1', now())";
		
		if (mysqli_query($conn, $sql)) {
		    
		    header("Location:index.php?Page=Login&success=true");
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}	
}
else
{
	header("Location:index.php?Page=Signup");
}
mysqli_close($conn);
?>