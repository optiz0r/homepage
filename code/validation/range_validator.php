<?php
    
    /*
     *    
     *    
     */
     
    class RangeValidator implements IValidator {
    	
    	private $min;
    	private $max;
    	
    	public function __construct($min, $max) {
    		
		}
    	
    	public static function initialise() {
    		// Nothing to do
		}
		
		public static function shutdown() {
			// Nothing to do
		}
		
		public function associate() {
			// Nothing to do
		}
		
		public function disassociate() {
			// Nothing to do
		}
		
		public function validate($input) {
			if( $input < $min || $input > $max )
				throw new ValidationException("Input is no in the range {$this->min}-{$this->max}");
		}
    	
	};
    
?>
