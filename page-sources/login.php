<?php
    
    /*
     * Login
     * This page allows and processes a user login
     *    
     */
     
     $_template['title'] = 'Login';

    // Has the login form been submitted?
    if( count( $_POST ) > 0 ) {
	     // Hide this request from the user's history
	    $_session->history_drop_request();
	    // Now it wont matter how many times a user fails authentication, they will always be redirected to the
	    // page they requested in the first place
    	 
     	 // Check for the presence of the required form fields
     	 if( !isset($_POST['username']) ) throw new ParameterException(); $username = $_POST['username'];

		$password = '';
		if( isset($_POST['password']) ) $password = $_POST['password'];
		     	 
     	 // Attempt the login
		try {
			$_session->login( $username, $password );
			
			// Present a message to the user
			$_template['messages'][] = 'You have successfully logged in.';

			// Set a redirection to the page the user was originally on (now the top of the list, because we dropped this page)
			$_template['redirect-to'] = $_session->history_get(0);
			
		} catch (AuthenticationException $e) {
			// Authentication failed
			$_template['messages'][] = 'Authentication failed';
			_show_login_form();
		} 
		
	} else {   
		_show_login_form();
	}
	
	function _show_login_form() {
	 	 global $_meta, $_req;
	 	 
	 	 // Present the login form to the user  
?>
<form method="post" action="<?php echo $_req->construct('page','login'); ?>">
<p class="loginform">
	<input class="username" name="username" type="text" /><label for="username">Username</label><br />
	<input name="submit" type="submit" value="Login" />
</p>
</form>
<?php
	 }

	 
?>
