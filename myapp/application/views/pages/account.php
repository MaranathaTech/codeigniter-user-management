 <div class="row content-heading p-5">
    	<div class="w-100 p-3">
			<h1>My Account</h1>
			Update or change your information below.
		</div>
	</div>
<div class="content-main"> 	
    <div id="update-div" class="row text-center">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<h2>  <?php echo $this->session->userdata('email'); ?></h2>

			<form action="myaccount/update" method="POST">
				<h4>Update Organization:</h4>
				<div class="form-group">
	                <input type="text" name="user_org" class="form-control" id="InputOrg" aria-describedby="emailHelp" placeholder="Enter Organization Name">
	            </div>
	            <h4>Update Password:</h4>
				<div class="form-group">
	                <input type="password" name="user_password" class="form-control" id="InputPassword" placeholder="Enter Password">
	            </div>		
	           	<div id="pass-strength-error" class="error-div">
	            	Passwords must be longer than 5 characters and should contain both numbers and letters.
	            </div>	
				<div class="form-group">
	                <input type="password" name="user_password2" class="form-control" id="ConfirmPassword" placeholder="Confirm Password">
	            </div>	
	            <div id="password-error" class="error-div">
	            	Passwords do not match!
	            </div>
	            <small class="form-text text-muted small-white-text">Leave blank to keep the same password.</small>

	            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
	 				<button id ="update-submit-btn" type="submit" class="btn btn-info" disabled>Update</button>
				</div>	
			</form>
        </div>
        <div class="col-md-4"></div>
	</div>

	</div>
</div>
<script src="assets/js/account.js" crossorigin="anonymous"></script>