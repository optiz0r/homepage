<?php

define('Homepage_File', 'index');

require '_inc.php';

try {
    $main = Homepage_Main::instance();
    Homepage_LogEntry::setLocalProgname('webui');        	
    $smarty = $main->smarty();
    
    $page = new Homepage_Page($smarty, $main->request());
    if ($page->evaluate()) {
        $smarty->display('index.tpl');
    }
    
} catch (Homepage_Exception $e) {
    die("Uncaught Exception: " . $e->getMessage());
}

?>