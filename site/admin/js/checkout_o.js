
function checkout_purchase()
{  
    var error=0;
    var message="There are following errors while processing the form:\n";
	
	
	
	var numbersStr = /^[0-9]+$/;
	
	var name=document.getElementById('name').value;
	var email=document.getElementById('email').value;	
	var name_on_credit_card=document.getElementById('name_on_credit_card').value;
	
	var credit_card_number=document.getElementById('credit_card_number').value;
	var cvv=document.getElementById('cvv').value;
	
	var exp_month=document.getElementById('exp_month').value;
	var exp_year=document.getElementById('exp_year').value;
	
	if(name=="")
	{			        
		message= message+ "Please enter name. \n";
		error=1;				
	}
	
	if(email=="" || isEmail(email))
	{			        
		message= message+ "Please enter correct email. \n";
		error=1;				
	}
	
	if(name_on_credit_card=="")
	{			        
		message= message+ "Please enter name on credit card. \n";
		error=1;				
	}
	
	if(!credit_card_number.match(numbersStr))						
	{
		message= message+ "Please enter correct card number. \n";
		error=1;
	}
	
	if(!cvv.match(numbersStr))						
	{
		message= message+ "Please enter correct cvv number. \n";
		error=1;
	}
	
	if(exp_month=="-1")
	{			        
		message= message+ "Please choose credit card exp month. \n";
		error=1;				
	}
	
	if(exp_year=="-1")
	{			        
		message= message+ "Please choose credit card exp year. \n";
		error=1;				
	}
	
	/*
	
	if(!cvv_2.match(numbersStr))						
	{
		message= message+ "Please enter correct cvv 2 number. \n";
		error=1;
		cvv_correct = 0;
	}
	
	if(exp_month=="-1")
	{			        
		message= message+ "Please choose credit card exp month. \n";
		error=1;				
	}
	
	if(exp_year=="-1")
	{			        
		message= message+ "Please choose credit card exp year. \n";
		error=1;				
	}
	*/
	
	
				 
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