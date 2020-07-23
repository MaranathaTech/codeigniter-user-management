//js for home login functionality

	//hide elements
	$( "#registration-div" ).slideToggle(0,'linear');
	$( "#reset-div" ).slideToggle(0,'linear');
	$( "#password-error" ).slideToggle(0,'linear');
	$( "#pass-strength-error" ).slideToggle(0,'linear');

	//click to review registration functions
	$( "#show-registration-btn" ).click(function() {
		$( "#login-div" ).slideToggle();
		$( "#show-btns-div" ).slideToggle();
		$( "#registration-div" ).slideToggle();
	});

	$( "#show-reset-btn" ).click(function() {
		$( "#login-div" ).slideToggle();
		$( "#show-btns-div" ).slideToggle();
		$( "#reset-div" ).slideToggle();
	});


	var check = setInterval(myCheckTimer, 500);


	function myCheckTimer() {
  		
  		//check login form contains info
  		if($( "#InputEmail1" ).val() != '' && $( "#InputPassword1" ).val() != ''){

			$( "#login-submit-btn" ).prop('disabled', false);

  		}
  		else{

			$( "#login-submit-btn" ).prop('disabled', true);

  		}




  		//check registration form password is valid
  		if($( "#InputPassword2" ).val() != ''){

			if($( "#InputPassword2" ).val().length < 5){

  				$( "#reg-submit-btn" ).prop('disabled', true);

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
	 	if($( "#InputPassword2" ).val() == $( "#ConfirmPassword2" ).val() && $( "#ConfirmPassword2" ).val() != ''){

			$( "#reg-submit-btn" ).prop('disabled', false);

  			//hide password mismatch message
			if($( "#password-error" ).is(':visible')){

				$( "#password-error" ).slideToggle();

			}

  		}
	 	else if($( "#ConfirmPassword2" ).val() == ''){
				
			$( "#reg-submit-btn" ).prop('disabled', true);

  			//hide password mismatch message
			if($( "#password-error" ).is(':visible')){

				$( "#password-error" ).slideToggle();

			}

  		}  		
  		else{

  			$( "#reg-submit-btn" ).prop('disabled', true);

  			//display password mismatch message
			if($( "#password-error" ).is(':hidden')){

				$( "#password-error" ).slideToggle();

			}

  		}

  		

  		//check reset form contains info
  		if($( "#InputEmail3" ).val() != ''){

  			$( "#reset-submit-btn" ).prop('disabled', false);

  		}
  		else{

  			$( "#reset-submit-btn" ).prop('disabled', true);

  		}

	}


