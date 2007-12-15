<?php
    
    /*
     * MySQL Database wrappper
     *    
     */
     
    if( $_config['db'] == 'mysql' ) {
	    
	    // Egress checking, make sure everyting we need is available
		if( !class_exists( 'mysqli' ) ) throw new ConfigException('Missing required PHP Extension "mysqli".');
		if( !is_array( $_config['mysql'] ) ) throw new ConfigException('Missing configuration data: mysql');
		
		// Connect to the database using the config variables provided in _config    
		$_db = new mysqli( $_config['mysql']['host'], $_config['mysql']['username'], $_config['mysql']['password'], $_config['mysql']['database'], $_config['mysql']['port'] );
			if( mysqli_connect_errno() ){
		throw new ConfigException('Cannot connect to the mysql database');
		}
	}

?>
