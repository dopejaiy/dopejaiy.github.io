
function check_form_change_password() {
         var error_message = "There are following errors while processing the change password form:\n";
         var error = 0;

	    var current_password= document.change_password.current_password.value;	   
	   
	    var new_password= document.change_password.new_password.value;	   
	   	var re_password= document.change_password.re_password.value;	 
	   
	   
	   
	    
		if (current_password == "") {
                error_message = error_message + "Please enter current password\n";
                error = 1;
        }
		if (new_password == "") {
                error_message = error_message + "Please enter new password\n";
                error = 1;
        }
		if (re_password == "") {
                error_message = error_message + "Please enter confirm password\n";
                error = 1;
        }
		
		// Validation for re-password
        if (new_password != re_password) {
                error_message = error_message + "Password Mismatch. Please Retype the correct password\n";
                error = 1;
        }
		

        if (error == 1) {
                alert(error_message);
                return false;
        } else {
                return true;
        }
}


function check_form_member_reset_password() {
         var error_message = "There are following errors while processing the reset password form:\n";
         var error = 0;

	    var password= document.frm_member.password.value;	   
	    var confirm_password= document.frm_member.confirm_password.value;	   
	   
	    
	   
	    if (password == "") {
                error_message = error_message + "Please enter password.\n";
                error = 1;
        }
		if (confirm_password == "") {
                error_message = error_message + "Please enter confirm password.\n";
                error = 1;
        }
		 		
		// Validation for confirm_password
        if (password != confirm_password) {
                error_message = error_message + "Password Mismatch. Please Retype the correct password\n";
                error = 1;
        }
		

        if (error == 1) {
                alert(error_message);
                return false;
        } else {
                return true;
        }
}