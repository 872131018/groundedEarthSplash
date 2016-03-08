$(document).ready()
{
  /*
  * Set the logo sticker
  */
  Sticker.init('.logo-sticker');
  /*
  * Init the design slider
  */
  $("#Glide").glide({
    type: "carousel"
  });
	/*
  * Delegate all clicks to the document
  */
  $(document).on('click', '[data-delegate=signup]', function(event)
  {
		/*
		* Validate user email @TODO
		*/
    if(validateSignup())
		{
      /*
      * Set url for post to correct endpoint
      */
      var url = window.location.href+"/signup";
      $.post(url, $("form").serialize(), function(response, status)
    	{
    		if(status == "success")
    		{
          $('form').html(response);
    		}
        else
        {
          console.log("server error");
        }
    	});
		}
    /*
    * Submit user email to server via ajax
    * @param passedEmail -> url encoded value after validation
    * @param passedType -> url encoded value after validation
    * @return true on success false on failure
    */
    //function submitUser(passedEmail,passedType)
    //{
    	//$.post(window.location.href+"index.php/ajaxcontroller/saveEmail/"+passedEmail+"/"+passedType, function(data, responseStatus)
    	//{
    		//if(responseStatus == "success")
    		//{
    			/*
    			* @TODO: display success message to user
    			*/
    			//console.log('success!');
    			//return true;
    		//}
    		/*
    		*The success message should return so only a failure would get here
    		*/
    		//console.log(data);
    		//console.log(responseStatus);
    		//return false;
    	//});
	});
}
