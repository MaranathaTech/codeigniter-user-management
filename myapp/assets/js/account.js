//js for account page functionality

	//hide elements
	$( "#password-error" ).slideToggle(0,'linear');
	$( "#pass-strength-error" ).slideToggle(0,'linear');

	var check = setInterval(myCheckTimer, 500);


	function myCheckTimer() {
  		

  		//check registration form password
  		if($( "#InputPassword" ).val() != ''){

			if($( "#InputPassword" ).val().length < 5){

  				$( "#update-submit-btn" ).prop('disabled', true);

				//display message about password strength
				if($( "#pass-strength-error" ).is(':hidden')){
					
					$( "#pass-strength-error" ).slideToggle();

				}

			}
			else {

				//hide message about password strength
				if($( "#pass-strength-error" ).is(':visible')){
					
					$( "#pass-strength-error" ).slideToggle();

				}	

			}

		}

  		//check registration form password matches
	 	if($( "#InputPassword" ).val() == $( "#ConfirmPassword" ).val() && $( "#ConfirmPassword" ).val() != ''){
				
			$( "#update-submit-btn" ).prop('disabled', false);

  			//hide password mismatch message
			if($( "#password-error" ).is(':visible')){

				$( "#password-error" ).slideToggle();

			}

  		}
	 	else if($( "#ConfirmPassword" ).val() == ''){
				
			$( "#update-submit-btn" ).prop('disabled', true);

  			//hide password mismatch message
			if($( "#password-error" ).is(':visible')){

				$( "#password-error" ).slideToggle();

			}

  		}  		
  		else{

  			$( "#update-submit-btn" ).prop('disabled', true);

  			//display password mismatch message
			if($( "#password-error" ).is(':hidden')){

				$( "#password-error" ).slideToggle();

			}

  		}

  		


	}
