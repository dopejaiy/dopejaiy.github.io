function check_region_add_edit_form()
{  
    var error=0;
    var message="There are following errors while processing the form:\n";
	
	var region_name=document.getElementById('region_name').value;
	var region_auto_login_link=document.getElementById('region_auto_login_link').value;
	
	var usernameEmailStr = 'ENTERYOUREMAILHERE';
	var passwordStr = 'ENTERYOURPASSWORDHERE';
	
	if(region_name=="")
    {			        
        message= message+ "Please enter region name. \n";
        error=1;
    }
	
	if(region_auto_login_link=="")
    {			        
        message= message+ "Please enter region auto login link with place holder value "+usernameEmailStr+" for username/email & place holder value "+passwordStr+" for password . \n";
        error=1;
    }
	else
	{		
		// check if username str exists
		if( !(region_auto_login_link.indexOf(usernameEmailStr) >= 0)){
			message= message+ "Please enter place holder value "+usernameEmailStr+" for username/email. \n";
			error=1;		  
		}
		
		// now check password place holder exists
		if( !(region_auto_login_link.indexOf(passwordStr) >= 0)){
			message= message+ "Please enter place holder value "+passwordStr+" for password. \n";
			error=1;		  
		}
	}
	
	if( error==1)
	{
		alert (message);
		return false;
	}
	else
	{
		return true;
	}
}
