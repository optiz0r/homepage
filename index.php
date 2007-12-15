<?php
		
	/*
	 * Index
	 * This page handles all requests, authentication, authorisation, etc.
	 * It loads the page requested by the user, embeds it in the template, and sends it to the browser
	 */
	 
	 // Begin output buffering on the entire document, so we can set cookies
	 // after some output has been printed.
	 ob_start();
	 
	 // Include our global configuration.
	 // It will pull all other includes we need, as well as define all global configuration and state variables.
	require_once('code/config.php');
	
	// Process the request uri for this page
	$_req = new RequestHandler( $_SERVER['REQUEST_URI'] );
	
	try {						
		// We will use PHP sessions to track users of the system.
		// On their own, php sessions are not secure by default, so we will
		// do some additional work to ensure they are used correctly.
		$_session = new SessionHandler();
		
		// See if the requested page exists
		$_chroot = realpath("{$_meta['script-dir']}/page-sources/");
		$_pagename = (!is_null($_req->get('page')) ? strtolower($_req->get('page')) : 'home');
		$_page = $_chroot . '/' . $_pagename  . '.php';
		
		// Capture this request so we know where the user wanted to go
		$_session->history_add_request( $_SERVER['REQUEST_URI'] );
		
		// Check that this path exists
		$_realpath = realpath($_page);
		if( $_realpath === false ) throw new Exception('Requested page doesnt exist', 404);
		
		// Check that the real file exists under the pages directory
		if( substr($_realpath, 0, strlen($_chroot)) != $_chroot ) throw new Exception('Forbidden', 403);
		
		
	} catch( Exception $e ) {
		$_meta['error-code'] = $e->getCode();
		$_meta['error-message'] = $e->getMessage();
		$_page = "{$_meta['script-dir']}/page-sources/error.php";
	}

	// Capture the output and store it in the template
	ob_start();
	
	try {
		include( $_page );
	} catch( AuthenticationException $e ) {
		// Redirect to the login page
		$_template['messages'][] = $e->getMessage();
		$_page = "{$_meta['script-dir']}/page-sources/login.php";
		// Get the new page
		ob_clean();
		include( $_page );
	} catch( ParameterException $e ) {
		// Redirect to the error page
		$_meta['error-code'] = $e->getCode();
		$_meta['error-message'] = "Required parameter is either missing, or contains an illegal value: '{$e->getMessage()}'";
		$_page = "{$_meta['script-dir']}/page-sources/error.php";
		// Get the new page
		ob_clean();
		include( $_page );
	}	

	$_template['page'] = ob_get_contents();
	
	// Since we've already caught them, prevent the contents from being
	// passed to the browser
	ob_end_clean();

	// Get the template
	include( $_template['template-file'] );
	
	// Send any remaining output to the browser
	ob_end_flush();
		
?>