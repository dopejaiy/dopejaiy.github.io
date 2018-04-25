<?php	
if(!isset($_SESSION['admin_member_id']) )
{
	$_SESSION['session_msg_fail'] = "Please login to access account.";
	header("Location: ./login.php");
	exit;
}



//$inactivityTime = $rowS['inactivity_logout_time_min']*60;

//echo time();echo '<br />';
//echo $_SESSION['timestamp'];
//echo time() - $_SESSION['timestamp'];
//echo '<br />';


// logout if inactive
/*
if(time() - $_SESSION['timestamp'] > $inactivityTime) 
{ 
	//subtract new timestamp from the old one    
	unset($_SESSION['admin_member_id']);
	unset($_SESSION['session_member_id']);
	$_SESSION = array();
	ob_start();
	header("Location: ../login.php?logout=1&return=".$_SERVER['REQUEST_URI']);
	exit;
}
else
{
    $_SESSION['timestamp'] = time(); //set new timestamp
}
*/


?>