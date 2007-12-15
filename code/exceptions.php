<?php
    
    /*
     * Exceptions
     * 
     */
     
    class BaseException				extends Exception {
    
    	// Overridden constuctor with message and code parameters, which will optionally display error output
    	public function __construct( $message = '', $code = 0) {
    		global $_config;
    		
    		parent::__construct( $message, $code );
    		// If debug mode is on, print out the raw data
    		if( $_config['DEBUG'] ) {
    			echo get_class($this) . ": Code='{$code}', Message='{$message}'<br />\n";
    			echo '<pre>';print_r($this->getTrace());echo '</pre>';
			}
		}
    	
	};
	
	
	class FatalException			extends BaseException {
		// Overridden constructor prints an error message, then terminates the application
		public function __construct( $message = '', $code = 0 ) {
			parent::__construct( $message, $code );
			die( 'FATAL EXCEPTION: ' . $message );
		}
	};
    
    
    class ConfigException			extends BaseException {};
    class SessionException			extends BaseException {};
    class AccountLockoutException	extends BaseException {};
    class AuthenticationException	extends BaseException {};
    class ParameterException		extends BaseException {};
    class NotImplementedException	extends BaseException {};
    
?>
