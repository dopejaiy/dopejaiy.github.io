<?php
include "./includes/application_top.php";


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

    <title>Login :: <?php echo $site_title; ?></title>

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
</head>

<body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
                    aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <span class="navbar-brand"><?php echo $site_title; ?></span>
            </div>
             
            <!--/.nav-collapse -->
        </div>
    </nav>

    <div class="container">

        <div class="row">
  <div class="col-md-6 col-md-offset-2">

  

    <?php
        if(isset($_SESSION['session_msg_success'])) {
    ?>
    <div class="alert alert-success" role="alert">
        <?php echo $_SESSION['session_msg_success']; unset($_SESSION['session_msg_success']); ?>
    </div>
    <?php
        } //end if(isset($_SESSION['session_msg_success'])) {
    ?>

    <?php
        if(isset($_SESSION['session_msg_fail'])) {
    ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $_SESSION['session_msg_fail']; unset($_SESSION['session_msg_fail']); ?>
    </div>
    <?php
        } //end if(isset($_SESSION['session_msg_fail'])) {
    ?>


    <form name="login" id="form1" method="post" action="login_process.php">
      <h3>Login</h3>
      <div class="well">
        
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" class="form-control"/>          
        </div>
      
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control"/>            
        </div>
      
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Login</button>
          <input name="login" type="hidden" id="login" value="1" />  
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
<?php
unset($_SESSION['admin_member_id']);
unset($_SESSION['session_member_id']);
$_SESSION = array();
?>