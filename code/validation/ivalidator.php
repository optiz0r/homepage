<?php
    
    /*
     *    IValidator
     *    
     */
     
    interface IValidator {
    
    	/* Overhead to be called internally by the validator */
    	
    	// Called when the class is first loaded
    	public static function initialise();
    	// Called whent the validation engine shuts down
    	public static function shutdown();
    	// Called when a validator object is associated with a variable to be validated
    	public function associate();
    	// Called when a validator obhject is disassociated from a variable having been validated
    	public function disassociate();
    	
    	// Validate some input against the constructor parameters
		public function validate($input);
    
	};
	
	/*
	 * IValidatorFactory
	 * Creates an instance of an Validator module, given its name
	 */
	class IValidatorFactory {
	 
		// Prevent any instances of this class being constructed
		private function __construct() {
		 
		}
		 
		public static function get( $module ) {
			global $_meta;
			 
			// Get the filename and classnames for this module
			$filename = "{$_meta['script-dir']}/code/validation/{$module}_validator.php";
			$classname = "{$module}Validator";
			
			// Check to make sure this module exists
			if( !file_exists($filename) ) throw new ConfigException("Validation module could not be found: '{$filename}.'", 500);
			
			// Import the auth modules code
			require_once( $filename );
			
			// Ensure the class has been defined
			if( !class_exists( $classname ) ) throw new ConfigException("Validation module is invalid: '{$classname}'.", 500);
			
			// Create an instance of the module, and return it
			return new $classname();
			
		}
	};
	
	
	/*
	 * Validator
	 * This class provides validation for a variable using a variety of algorithms
	 */
	
	abstract class Validator {
		
		public static function check($name, &$value) {
			// Retrieve the varargs for this function
			$args = func_get_args();
			// Remove the first two arguments, since we already have those by name
			array_shift($args); array_shift($args);
			
			try {
				// Each of the remaining arguments should be implementations of IValidator
				foreach ($args as $validator) {
					// Ensure this object is a validator
					if (!( $validator instanceof IValidator)) {
						throw new ValidationException("Invalid Validator object");
					}
				
					// Attempt to validate the input through each validator in turn
					$validator->validate( $value );
				}
				
				// All successful
				
			} catch (ValidationException $e) {
				// Add the friendly name of the variable that failed validation, and rethrow the exception
				// for the calling code to catch
				$e->append_name($name);
				throw $e;
			}
		}
		
		
	};
	
	/*
	 * Validation Exceptions
	 */
	
	class ValidationException extends BaseException {
		
		public function __construct($message) {
			parent::__construct($message);
		}
		
		public function append_name($name) {
			$this->e .= ", while validating '{$name}'.";
		}
		
	};

    
?>
