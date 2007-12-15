<?php
    
    /*
     *    Utility Functions
     *    
     */
     
	define("MASK_DOTTED_DECIMAL", 1);
	define("MASK_CIDR", 2);
     
    // Override the default error handler to prevent error messages being shown to the user
	function null_error_handler( $errno, $errstr, $errfile, $errline, $errcontext ) {
		switch( $errono ) {
			case E_ERROR:
			case E_CORE_ERROR:
			case E_COMPILE_ERROR:
			case E_USER_ERROR:
			case E_RECOVERABLE_ERROR: {
				// Fatal error, cause the page to fail here
				header("HTTP/1.1 500 Internal Server Error");
				exit(0);
			}
			
			default: {
				// non fatal error, let it pass
				return true;
			}
		}
	}
	
	// Override the default exception handler to prevent error messages being shown to the user
	function null_exception_handler( $exception ) {
		return true;
	}
     
	function get_web_base_dir() {
		static $Dir;
		if (!isset($Dir))
			$Dir = dirname($_SERVER['SCRIPT_NAME']);
		return $Dir;
	}
	function get_fs_base_dir() {
		static $Dir;
		if (!isset($Dir))
			$Dir = dirname($_SERVER['SCRIPT_FILENAME']);
		return $Dir;
	}
	
	function get_network_mask( $ip, $subnet, $mode = MASK_DOTTED_DECIMAL ) {
		$ip_l		= ip2long( $ip );
		if( $mode == MASK_DOTTED_DECIMAL ) 
			// 255.255.255.0 type subnet
			$subnet_l	= ip2long( $subnet );
		else
			// CIDR type subnet
			$subnet_l = (~0) << (32 - $subnet);
			
		// Mask the two together
		$network_l = $ip_l & $subnet_l;
		
		return long2ip($network_l);
	}
	
	 function array_clone( &$source, &$dest ) {
		foreach( $source as $key => $value ) {
			$dest[$key] = $value;
		}	
	}
	
	function print_rating_graph( $star_rating ) {
		global $_meta;
?>
		<img class="foreground" src="<?php echo $_meta['base-dir']; ?>/resources/ratings/<?php echo $star_rating; ?>" alt="Rated: <?php echo $star_rating; ?>" />
<?php
	}
?>
