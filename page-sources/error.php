<?php
    
    /*
     *    
     *    
     */
     
     // Hide this page from the users history in the session
     $_session->history_drop_request();
     // Display the error message, and redirect
     $_template['title'] = "Errawr";
     $_template['messages'][] = $_meta['error-message'];
     $_template['redirect-to'] = $_session->history_get(0); // Top of the list now
    
?>