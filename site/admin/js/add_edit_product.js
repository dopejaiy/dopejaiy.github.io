function check_product_add_edit_form()
{  
    var error=0;
    var message="There are following errors while processing the form:\n";
    	
	
	var region_id=document.getElementById('region_id').value;
	var shoe_size=document.getElementById('shoe_size').value;
	var email=document.getElementById('email').value;
	var password=document.getElementById('password').value;	
	var time_left=document.getElementById('time_left').value;
	var price=document.getElementById('price').value;
	
	
	if(product_title=="")
    {			        
        message= message+ "Please enter product title. \n";
        error=1;
    }
	
	if(region_id=="-1")
    {			        
        message= message+ "Please choose region. \n";
        error=1;
    }
	
	if(shoe_size=="-1")
    {			        
        message= message+ "Please choose shoe size. \n";
        error=1;
    }
	
	if(email=="" || isEmail(email))
    {			        
        message= message+ "Please enter correct email. \n";
        error=1;
    }
	
	if(password=="")
    {			        
        message= message+ "Please enter password. \n";
        error=1;
    }	
	
	if(time_left=="")
    {			        
        message= message+ "Please enter time left. \n";
        error=1;
    }
	
	if(price=="")
    {			        
        message= message+ "Please enter price. \n";
        error=1;
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
