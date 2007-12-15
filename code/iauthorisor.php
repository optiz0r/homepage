<?php
    
    /*
     * IAuthorisor
     * Interfakce for authorisation classes
     */
     
    interface IAuthorisor {
    	
    	// Do any module-specific initialisation
     	 public function initialise();
     	 // Shutdown the module cleanly when finished
     	 public function uninitialise();
    	
    	// Find out which usergroup a given member belongs
    	public function is_student( $username, $module, $year = null );
    	public function is_lecturer( $username, $module, $year = null );
    	public function is_sysadmin( $username );
    	// A sysadmin should not be able to administrate a course for which they are a student
    	public function may_sysadmin( $username, $module, $year = null );
    	
    	
	};
	
	
    /*
     * IAuthorisor
     * Interface for authorisation classes
     */
     
    class IAuthorisorFactory {
    	
    	public function __construct() {
    		
		}
		
		public static function get( $module ) {
	 	 	 global $_meta;
	 	 	 
	 	 	 // Get the filename and classnames for this module
	 	 	 $filename = "{$_meta['script-dir']}/code/auth_{$module}.php";
	 	 	 $classname = "Authorisor_{$module}";
	 	 	 
	 	 	 // Check to make sure this module exists
	 	 	 if( !file_exists($filename) ) throw new ConfigException("Authorisation module could not be found: '{$filename}.'", 500);
	 	 	 
	 	 	 // Import the auth modules code
	 	 	 require_once( $filename );
	 	 	 
	 	 	 // Ensure the class has been defined
	 	 	 if( !class_exists( $classname ) ) throw new ConfigException("Authorisation module is invalid: '{$classname}'.", 500);
	 	 	 
	 	 	 // Create an instance of the module, and return it
	 	 	 return new $classname();
		}
	};
	
?>
