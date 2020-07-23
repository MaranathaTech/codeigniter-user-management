 <div class="row content-heading p-5">
    	<div class="w-100 p-3">
			<h1>Welcome to Quik Proof!</h1>
			Access all your proofs in one secure location.
		</div>
	</div>
<div class="content-main"> 
    <div id="login-div" class="row text-center">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<h3>Login</h3>
			<form action="user/login" method="POST">
				<div class="form-group">
                	<input type="email" name="user_email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="Email Address">
            	</div>
				<div class="form-group">
                	<input type="password" name="user_password" class="form-control" id="InputPassword1" placeholder="Password">
            	</div>
	            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
	 				<button id="login-submit-btn" type="submit" class="btn btn-success" disabled>Submit</button>
				</div>
			</form>
			<small class="form-text text-muted small-white-text">Be sure to use the email address that received the proof.</small>
		</div>
		<div class="col-md-4"></div>
	</div>
	<div id="show-btns-div" class="row text-center">
		<div class="w-100 p-3">
			<a href="#" id="show-reset-btn"><span class="login-btn">Reset Your Password</span></a>&nbsp;&nbsp; | &nbsp;&nbsp;<a href="#" id="show-registration-btn"><span class="login-btn">Sign Up For An Account</span></a>
		</div>
	</div>
		
    <div id="registration-div" class="row text-center">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<h3>Register</h3>
			<form action="user/register" method="POST">
				<div class="form-group">
	                <input type="email" name="user_email" class="form-control" id="InputEmail2" aria-describedby="emailHelp" placeholder="Enter Email Address">
	            </div>
				<div class="form-group">
	                <input type="password" name="user_password" class="form-control" id="InputPassword2" placeholder="Enter Password">
	            </div>	
	           	<div id="pass-strength-error" class="error-div">
	            	Passwords must be longer than 5 characters and should contain both numbers and letters.
	            </div>	
				<div class="form-group">
	                <input type="password" name="user_password2" class="form-control" id="ConfirmPassword2" placeholder="Confirm Password">
	            </div>	
	            <div id="password-error" class="error-div">
	            	Passwords do not match!
	            </div>
	            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
	 				<button id="reg-submit-btn" type="submit" class="btn btn-info" disabled>Submit</button>
				</div>	
			</form>
			<small class="form-text text-muted small-white-text">Be sure to use the email address that received the proof.</small>
        </div>
        <div class="col-md-4"></div>
	</div>
	    <div id="reset-div" class="row text-center">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<h3>Reset Password</h3>
			<small class="form-text text-muted">Enter your email address below to receive a password reset email.</small>
			<form action="user/reset" method="POST">
				<div class="form-group">
	                <input type="email" name="user_email" class="form-control" id="InputEmail3" aria-describedby="emailHelp" placeholder="Email Address">
	            </div>
	            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
	 				<button id="reset-submit-btn" type="submit" class="btn btn-info" disabled>Submit</button>
				</div>	
			</form>
        </div>
        <div class="col-md-4"></div>
	</div>
</div>
<script src="assets/js/login.js" crossorigin="anonymous"></script>