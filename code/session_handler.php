<?php
    
    /*
     * SessionHandler
     * This class handles using php sessions to maintain user state across
     * multiple sessions
     */
     
    class SessionHandler {
    	
    	private $authentication;
    	
    	public function __construct() {
    		global $_config;
    		
    		// Initialise PHP's Session subsystem
    		session_start();
    		
    		// Check to see if this is a new session
    		if( !isset( $_SESSION['initialised'] ) || !$_SESSION['initialised'] ) {
				$this->start_new_session();
			} else {
				// The session already exists, check its validity
				if( $this->is_session_valid() ) {
					
				} else {
					// BAD USER SESSION, start a new one
					$this->start_new_session();
					// And inform the user
					$_template['messages'][] = "Bad session, starting a new one";
				}
			}
			
			// Load the Authentication modules
			$this->authentication 	= IAuthenticatorFactory::get( $_config['authentication-module'] );
			$this->authentication->initialise();
			
		}
		
		public function __destruct() {
			// Shut down the authentication modules
			$this->authentication->uninitialise();
		}
		
	/*
	 * Accessors
	 */
	public function authenticator() { return $this->authentication; }
		
	/*
	 *	The following methods deal with the user session
	 */
		
		// Initialises all the variables we require in each user session
		public function start_new_session() {
			global $_config;
			
    		// Set up all the session variables
    		$_SESSION['initialised'] = true;
    		$_SESSION['logged_in'] = false;
    		$_SESSION['username'] = '';
    		$_SESSION['hash'] = $this->generate_hash();
    		$_SESSION['previous_page'] = $_config['homepage'];
    		$_SESSION['requested_page'] = '';
    		$_SESSION['history'] = array('home');
    		$_SESSION['lockout'] = false;
    		$_SESSION['lockout-attempts'] = 0;
    		
			// Be paranoid, change session id
			$this->auth_state_changed();			
		}
		
		public function is_session_valid() {
			// Check that the identifying information given by the user matches that which was
			// saved in the session when it was created
			return ($_SESSION['hash'] == $this->generate_hash());
		}
		
		/*
		 * This function should be called whenever the authorisation level
		 * changes in order to keep the session secure.
		 * It prevents against Session Fixation (http://www.acros.si/papers/session_fixation.pdf)
		 */
		public function auth_state_changed() {
			session_regenerate_id();
		}
		
		/*
		 * This function marks a user as having been logged into the system
		 */
		private function mark_logged_in_as( $username ) {
			$_SESSION['username']	= $username;
			$_SESSION['logged_in']	= true;
			
			// The login state has changed
			$this->auth_state_changed();
		}
		
		/*
		 * This function marks a user as having been logged out of the system
		 */
		private function mark_logged_out() {
			$_SESSION['logged_in'] = false;
			
			// The login state has changedd
			$this->auth_state_changed();
		}
		
		/*
		 * This function returns whether or not the user is logged in
		 */
		public function is_logged_in() {
			return $_SESSION['logged_in'];
		}
		
		/*
		 * This function returns the username of the currently logged in user
		 */
		public function username() {
			return $_SESSION['username'];
		}
		
		/*
		 * This function requires a user to be logged in, else an exception is thrown
		 */
		public function require_logged_in() {
			if( !$_SESSION['logged_in'] ) throw new AuthenticationException('You must be logged on to view this resource');
		}
		
		/*
		 * This function generates a hash from user identifiable information
		 * to try and prevent session theft.
		 * If the session id is stolen by an attacker, chances are some of the
		 * information used to generate the hash will change, and the session
		 * will be immediately marked as invalid. This hash is checked for
		 * consistency on every request.
		 */
		public function generate_hash() {
			global $_config;
			// Hash together the following pieces of identifying information which remain constant throughout the session:
			//	User Agent string - This will be constant for the user, but might not be for the attacker
			//	Netork Mask - ensures each request is coming from the same network. We may not be able to use the
			//		while ip, because some ISPs use load-balanced proxies, so subsequent requests may come from a
			//		different machine ip, but we can still use at least part of the address to filter out would be attackers.
			$key = $_SERVER['HTTP_USER_AGENT'] . get_network_mask( $_SERVER['REMOTE_ADDR'], $_config['session-network-mask'], $_config['session-network-mode']);
			return md5( $key );
		}
		
	 /*
	  * The following methods deal with the users history
	  * These will be used to set up redirection after special pages, such as login
	  */
		
		// Add a new item to the user history
		public function history_add_request( $page ) {
			global $_config;
			// Add this item to the beginning of the history array
			array_unshift( $_SESSION['history'], $page );
			// Keep the size below a fixed limit
			if( count($_SESSION['history']) > $_config['max-history'] ) {
				array_pop( $_SESSION['history'] );
			}
		}
		
		// Remove the current item from the user history
		public function history_drop_request() {
			// remove the item from the beginning of the array
			array_shift( $_SESSION['history'] );
		}
		
		// Return an item from the user history
		public function history_get( $index ) {
			if( is_numeric($index) ) {
				if( $index < count($_SESSION['history']) ) {
					return $_SESSION['history'][$index];
				}
			}
		}
		
	/*
	 * The following methods deal with user authentication and authorisation
	 */
	 
	 	// Log the user in
	 	public function login( $username, $password ) {
	 		global $_config; 
	 		
	 		// Check the user hasnt been locked out before trying to login
	 		if( $_SESSION['lockout'] == true ) {
	 			// See if the lockout has expired
	 			if($_SESSION['lockout-expiry'] > time() ) throw new AccountLockoutException('Your session is currently locked as a result of enterring too many incorrect passwords. You will not be able to attempt a login for another ' . date('i \m\i\n(\s), s \s\e\c(\s)', $_SESSION['lockout-expiry']-time()));
	 			else {
	 				// Unset the lockout
	 				$_SESSION['lockout'] = false;
	 				$_SESSION['lockout-expiry'] = 0;
	 				$_SESSION['lockout-attempts'] = 0;
				}
			}
	 	
	 		
	 		try {
	 			// Attempt to authenticate with these credentials
	 			$this->authentication->authenticate( $username, $password );
			} catch( Exception $e ) {
				// Increment the number of failed authentication attempts
				$_SESSION['lockout-attempts']++;
				// Check the lockout attempts
				if( $_SESSION['lockout-attempts'] >= $_config['lockout-attempts'] ) {
					$_SESSION['lockout'] = true;
					$_SESSION['lockout-expiry'] = time() + $_config['lockout-duration'];
					throw new AccountLockoutException('You have enterred an incorrect password too many times, and your session has been locked. You will not be able to attempt another login for the next 10 minutes.');
				}
				
				// The login failed, rethrow the original exception
				throw $e;
			}
			
	 		// Successful login, update the session state
	 		$this->mark_logged_in_as( $username );
		}
		
		// Log the current user out
		public function logout() {
			$this->mark_logged_out();	
		}		
    	
	};
    
?>
