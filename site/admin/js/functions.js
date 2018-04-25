function isEmail(val)
{
        // Return false if e-mail field does not contain a '@' and '.' .
        if (val.indexOf ('@',0) == -1 || val.indexOf ('.',0) == -1)
        {
                return 1;
        }
        else
        {
                return 0;
        }
}

function display_message(display_msg)
{
	if (confirm('Are you sure want to '+display_msg +'?'))
	{
		//formName.ID.value = id;
		return true;
	}
	else
	{	
		return false;
		//formName.action.value = 'delete';
		//formName.submit();
	}
}


function display_msg(msg)
{
	if (confirm(msg))
	{
		//formName.ID.value = id;
		return true;
	}
	else
	{	
		return false;
		//formName.action.value = 'delete';
		//formName.submit();
	}
}

function display_message_order()
{
	if (confirm('Are you sure you want to delete this order line?'))
	{
		//formName.ID.value = id;
		return true;
	}
	else
	{	
		return false;
		//formName.action.value = 'delete';
		//formName.submit();
	}
}


function redirect_window(url)
{
	window.location.href=url;
}

function windowGoBack()
{
	window.history.back();
}

function myPopupWindow(pageName)
{
	window.open( pageName, "myWindow", "status = 1, height = 600, width = 600, resizable = 0" );
}

// THE SCRIPT THAT CHECKS IF THE KEY PRESSED IS A NUMERIC OR DECIMAL VALUE.
function isNumber(evt, element) {

	var charCode = (evt.which) ? evt.which : event.keyCode

	if (
		(charCode != 45 || $(element).val().indexOf('-') != -1) &&      // “-” CHECK MINUS, AND ONLY ONE.
		(charCode != 46 || $(element).val().indexOf('.') != -1) &&      // “.” CHECK DOT, AND ONLY ONE.
		(charCode < 48 || charCode > 57))
		return false;

	return true;
} 
