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