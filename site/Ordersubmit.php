<?php
	include './includes/config.php';
	session_start();
	if (isset($_SESSION['name']))
	{
		//prx($_POST);exit;
		
		$email = $_SESSION['email'];
		$userid = $_SESSION['current_user_id'];
		
		$collar = $_POST['collar'];
		$seleeve = $_POST['sleeves'];
		$color = $_POST['color'];		
		$anote = $_POST['anote'];
		
		$chest = $_POST['chest'];
		$neck = $_POST['neck'];
		$waist = $_POST['waist'];
		$sleeves_dimension = $_POST['sleeves_dimension'];
		$body_shape = $_POST['body_shape'];

		if ($collar == 0) {
			$collar =  "Traditional Button Dow";
		} elseif ($collar == 1) {
			$collar =  "Parisian Cutaway";
		}elseif ($collar == 2) {
			$collar =  "Parisian Button Dow";
		}

		if ($seleeve == 0) {
			$seleeve = "Full";
		}
		elseif ($seleeve == 1) {
			$seleeve = "Half";
		}
		
		
		
		// to get product details
		$sqlProduct = "SELECT * FROM products WHERE product_id='1' ";
		$resultProduct = mysqli_query($conn, $sqlProduct);
		$rowProduct = mysqli_fetch_assoc($resultProduct);

		$sql = "INSERT INTO orderdetail 
		(product_id,userid,email,
		sleeves, collar, color,
		anote, order_price, created,
		chest,neck,waist,
		sleeves_dimension,body_shape
		) 
		VALUES 
		('1','$userid','$email',
		'$seleeve','$collar','$color',
		'$anote','".$rowProduct['price']."',now(),
		'$chest','$neck','$waist',
		'$sleeves_dimension','$body_shape'
		)";

		if (mysqli_query($conn, $sql)) {
		    
		    header("Location:?Page=Home&ordersuccess=true");
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

	}
	else
	{
		header("location:?Page=Login");
	}
?>