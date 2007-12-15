<?php
    
    /*
     *    
     *    
     */
     
     // Log the user our of their current session
     $_session->logout();
     
     // Leave the user a notice, and redirect them back to the home page
     $_template['title'] = 'Logout';
     $_template['messages'][]	= 'You have successfully been logged out.';
     $_template['redirect-to']	= $_req->construct('page','home');
     
    
?>