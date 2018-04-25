<?php
include "./includes/application_top.php";
include "./includes/admin_login_check.php";

$active_link_products="active";

if(isset($_POST) && isset($_POST['change_price']) && !empty($_POST['change_price']))
	{
				$queryChange 	= "UPDATE products SET `price`= '".$_POST['price']."' WHERE product_id='1'";
				$resultChange	= $db->query($queryChange) or die (mysqli_error($db));
				if($resultChange)
				{
					$_SESSION['session_msg_success']= "New Price Updated successfully !";
				}		 
	}
	
$sqlProduct = "SELECT * FROM products WHERE product_id='1' ";
$resultProduct = mysqli_query($conn, $sqlProduct);
$rowProduct = mysqli_fetch_assoc($resultProduct);

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

    <title>Change Product Price :: <?php echo $site_title; ?></title>

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
      <h3>Change Product Price</h3>
      <div class="well">
        
        <div class="form-group">
            <label for="current_password">Product Price ($)</label>
            <input type="text" id="price" name="price" class="form-control" required value="<?php echo $rowProduct['price']; ?>" />            
        </div>      
         
      
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Change Price</button>
          <input name="change_price" type="hidden" id="change_password" value="1" />
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