<?php
    
    /*
     *    
     *    
     */
     
    require_once( 'code/config.php' );
     
     if( isset($_GET['destroy']) ) {
	 	session_start();
	 	session_destroy();
	 	echo "Session destroyed";
	 }
	 
	 if( isset($_GET['request']) ) {
	 	require_once( "code/request_handler.php" );
	 	
	 	echo '<pre>';
	 	$req1 = new RequestHandler( "/page/user_reviews/username/tw205/aux&/true/false/" );
	 	var_dump( $req1->get("page") );
	 	var_dump( $req1->get("username") );
	 	var_dump( $req1->get("aux") );
	 	var_dump( $req1->get("aux&", ".+") );
	 	
	 	var_dump( $req1->construct('page', $req1->get('page'), 'username', null, 'aux&', null) );
	 	
	 	echo '</pre>';
	 }
	 
	 if( isset($_GET['session']) ) {
	 	session_start();
	 	
	 	echo '<pre>'; 
	 	var_dump($_SESSION);
	 	echo '</pre>';
	 }
	 
	 if (isset($_GET['validate'])) {
	 	 require_once('code/validation/ivalidator.php');
	 	 
	 	 try {
	 	 	 Validator::check('Value', $_GET['value'], IValidatorFactory::get('Range',5,32));
		 } catch (ValidationException $e) {
		 	 	 echo $e->getMessage();
		 }
	 }
    
?>