<?php
    
    /*
     * MySQL Authentication Module
     *    
     */
     
    class Authenticator_mysql implements IAuthenticator {
     	 
		public function __construct() {
		}
    
    	public function initialise() {
			// Nothing required
		}
		
		public function uninitialise() {
			// Nothing required
		}
		
		public function user_exists( $username ) {
			return true;
		}
		
		public function authenticate( $username, $password ) {
			return true;
		}
		
		public function username2fullname( $username ) {
			throw new NotImplementedException();
		}
		
		public function fullname2username( $fullname ) {
			throw new NotImplementedException();
		}
	}; 
    
?>
