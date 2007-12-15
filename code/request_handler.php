<?php
    
    /*
     * RequestHandler
     * This class decodes the Request URI in order to store multiple variables in the request URI itself
     */
     
    class RequestHandler {
    	
    	// The request uri
    	private $request_string;
    	// Stores a list of all the variables we've already found to avoid needing to
    	// find them using regular expressions many times.
    	private $cache;
    	
    	public function __construct( $request_string ) {
    		$this->request_string = $request_string;
    		$this->cache = array();
		}
		
		public function current_page() {
			return $this->request_string;
		}
		
		public function get( $key, $value_pattern = '[^/]*' ) {
			// Look in the cache to see if weve already decoded this variable
			if( in_array( $key, $this->cache ) ) return $this->cache[ $key ];
			
			// Construct the regex to search for /$key/$value/ pairs, and return the $value part
			$key = str_replace('£', '\£', $key);
			$value_pattern = str_replace('£', '\£', $value_pattern);
			$pattern = "£/{$key}/({$value_pattern})(/|\$)£";
			
			// Look to see if this variable is in the request string
			$count = preg_match( $pattern, $this->request_string, $matches );
			
			// See if the variable was set
			if( $count == 0 ) return null;
			
			// Store the result for next time
			$this->cache[ $key ] = $matches[1];
			
			// And return it to the user
			return $matches[1];
		}
		
		public function construct() {
			global $_meta;
			
			// Varargsy
			$args = func_get_args();
			
			// Construct the proper request string for these arguments
			$request_string = "{$_meta['base-dir']}/";
			$count = count( $args );
			for( $i = 0 ; $i < $count; $i++ ) {
				$arg = $args[ $i ];
				// If this item is null, try to find the value of the previous key from the current
				// request object as a convenience to the user. It assumes the default value pattern.
				if( $arg === null && $i > 0) {
					$arg = $this->get( $args[ $i -1 ] );
				}
				$request_string .= urlencode($arg) . '/';
			}
			
			return $request_string;
		}
    	
	};
    
?>
