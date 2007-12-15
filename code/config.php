<?php
    
    /*
     * Configuration
     * This file contains all global configuration variables
     */
     
    $_config = array();
    
    // DEBUG MODE
    // This config variable triggers verbose error output, which is useful for developers, but
    // would be ugly or bad practice to show to users. Enable this variable on development systems
    // and disable it for a production system.
    $_config['DEBUG']						= true;
        error_reporting( E_ALL | E_NOTICE | E_STRICT );
    
    // Current timezone settings
    date_default_timezone_set('Europe/London');

    require_once('request_handler.php');
    require_once("functions.php");
    require_once("exceptions.php");
    require_once("session_handler.php");

     
    // Variable used for passing information around the script,
    // Should not be used by the user
    $_meta		= array(	'base-dir'		=> get_web_base_dir(),
							'script-dir'	=> get_fs_base_dir(),
							'error-code'	=> 403,
							'error-message'	=> 'Unknown Error');
	// Placeholder for template fragments
	$_template	= array(	'messages'		=> array(),
							'redirect-to'	=> false,
							'head'			=> '',
							'title'			=> 'Default',
							'page'			=> '');					
	// Forward declarations
	$_session	= null;
	
    // Templating
    $_config['template-file']				= "{$_meta['script-dir']}/templates/default.php";
    
    // Homepage
    $_config['homepage']					= "{$_meta['script-dir']}/page-sources/home.php";
    
    // Sessions
	// How long a logged in session will last without activity from the user
    $_config['session-login-timeout']		= 60*60*1; // One hour
    // How long the username will be stoed in the users cookie
    $_config['session-username-timeout']	= 60*60*24*7; // Seven days
    
    // See session-handler.php for reasons behind the session-network-* config variables
    // session-network-mask is used to determine how much of the users IP is hashed into the salt
    $_config['session-network-mask']		= 24;
    // session-network-mode defines whether the above parameter was passed as a CIDR form, or dotted decimal form
    $_config['session-network-mode']		= MASK_CIDR;
    
    // Maximum number of items to keep in the users session history
    $_config['max-history']					= 5;
    
	// Account Lockout
    // How many incorrect authentication attempts before the user is locked out
    $_config['lockout-attempts']			= 3;
    // How long the account lockout period lasts. During this time, the user will not
    // be able to authenticate, even witha valid passwords
    $_config['lockout-duration']			= 60*10; // Ten minutes

    
    // Authantication
    require_once( "{$_meta['script-dir']}/code/iauthenticator.php" );
    $_config['authentication-module']		= 'mysql';
    
    // Database 
    // Mysql connections parameters
    $_config['db']							= null;
    $_config['mysql']						= array();
    $_config['mysql']['host']				= 'localhost';
    $_config['mysql']['port']				= 3306;
    $_config['mysql']['username']			= '';
    $_config['mysql']['password']			= '';
    $_config['mysql']['database']			= '';
    
    // Database tables
    $_config['mysql']['prefix']				= '';
    
    // Connecting to the database
    $_db = null;
    require_once( "{$_meta['script-dir']}/code/db_mysql.php" );
	
    // Only show php error messages if the application is in debug mode
    if( isset($_GET['nodebug']) ) $_config['DEBUG'] = false;
    if( !$_config['DEBUG'] ) {
    	set_error_handler( "null_error_handler" );
    	set_exception_handler( "null_exception_handler" );
    }
    
    // Set the default template for all individual pages
    $_template['template-file'] = $_config['template-file'];

    
    
?>
