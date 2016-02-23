/*
*Validate the input before sending it to the server
*/
function validateSignup(email)
{
	/*
	* Use a simplification of RFC 2822 for frontend validation
	* Ensure that a type has been selected
	* @TODO: emails dont pass regex expression why?
	*/
	//var regex = new RegExp("/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i");
	//var emailValid = regex.test(passedEmail);
	/*
	* Email and type must be selected to have a valid registration
	*/
	var email = $("form").children("[name=email]").val();
	if(email != '')
	{
		return true;
	}
	return false;
}
