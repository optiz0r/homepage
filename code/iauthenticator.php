<?php
    
    /*
     * IAuthenticator
     * Interface for authentication classes
     */
     
     interface IAuthenticator {
     	 
     	 // Do any module-specific initialisation
     	 public function initialise();
     	 // Shutdown the module cleanly when finished
     	 public function uninitialise();
     	 
     	 // Identifies whether a user with a given name exists
     	 public function user_exists( $username );
     	 // Checks a given username and password
     	 public function authenticate( $username, $password );
     	 
     	 // Does translation between a username and full name
     	 public function username2fullname( $username );
     	 // And vice versa
     	 public function fullname2username( $fullname );
     	 
	 };
	 
	 /*
	  * IAuthenticatorFactory
	  * Creates an instance of an Authenticator module, given its name
	  */
	 class IAuthenticatorFactory {
	 	 
	 	 // Prevent any instances of this class being constructed
	 	 private function __construct() {
	 	 	 
		 }
	 	 
	 	 public static function get( $module ) {
	 	 	 global $_meta;
	 	 	 
	 	 	 // Get the filename and classnames for this module
	 	 	 $filename = "{$_meta['script-dir']}/code/auth_{$module}.php";
	 	 	 $classname = "Authenticator_{$module}";
	 	 	 
	 	 	 // Check to make sure this module exists
	 	 	 if( !file_exists($filename) ) throw new ConfigException("Authentication module could not be found: '{$filename}.'", 500);
	 	 	 
	 	 	 // Import the auth modules code
	 	 	 require_once( $filename );
	 	 	 
	 	 	 // Ensure the class has been defined
	 	 	 if( !class_exists( $classname ) ) throw new ConfigException("Authentication module is invalid: '{$classname}'.", 500);
	 	 	 
	 	 	 // Create an instance of the module, and return it
	 	 	 return new $classname();
	 	 	 
		 }
	 };
    
?>
